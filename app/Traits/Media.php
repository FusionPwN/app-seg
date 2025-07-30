<?php

namespace App\Traits;

use App\Models\Thumbnail;
use App\Models\Upload;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\DB;

trait Media
{
	public bool $media_expanded = false;
	public array $image_types = ['image/png', 'image/jpeg'];
	public array $video_types = ['video/mp4', 'video/quicktime'];

	# FORM FUNCTIONS
	public function isImage(string $type)
	{
		return in_array($type, $this->image_types);
	}

	public function isVideo(string $type)
	{
		return in_array($type, $this->video_types);
	}

	protected function makeMedia(array $data, mixed $model)
	{
		$nid = $model->nid;
		$type = strtolower(class_basename($model)) . 's';
		$files = [];
		if (isset($data['media'])) {
			foreach ($data['media'] as $media) {
				$path = "media/$type/$nid";

				if ($this->isVideo($media->getMimeType())) {
					$path .= "/videos";
				} else if ($this->isImage($media->getMimeType())) {
					$path .= "/photos/originals";
				}

				$file_path = $media->storePubliclyAs($path, $media->hashName(), 'public');

				$files[] = [
					'name' 			=> $media->hashName(),
					'format' 		=> $media->getMimeType(),
					'path' 			=> str_replace('public/', '', $file_path),
					'created_at' 	=> now(),
					'updated_at' 	=> now()
				];
			}
		}

		if (count($files) > 0) {
			DB::transaction(function () use ($files, $model) {
				Upload::insert($files);

				$lastId = Upload::orderByDesc('id')->first()->id;
				$ids = range($lastId - count($files) + 1, $lastId);

				if (count($ids) > 0) {
					if ($model->media()->count() > 0) {
						$model->media()->attach($ids);
					} else {
						$model->media()->attach($ids[0], ['default' => 1]);
						$model->media()->attach(array_slice($ids, 1));
					}
				}
			});
		}

		$this->media = [];
		$this->dispatch('upload-done');
	}

	public function deleteMedia(int $id)
	{
		$media = Upload::find($id);
		
		if (null !== $media) {
			if ($media->thumbnails->count() > 0) {
				foreach ($media->thumbnails as $thumbnail) {
					if (Storage::disk('local')->exists('public/' . $thumbnail->path)) {
						Storage::disk('local')->delete('public/' . $thumbnail->path);
					}
				}

				if (Storage::disk('local')->exists('public/' . $media->path)) {
					Storage::disk('local')->delete('public/' . $media->path);
				}

				$media->delete();
			}
		}
	}

	# MODEL FUNCTIONS
	public function makeThumbnail(mixed $media, string $size, mixed $model = null)
	{
		$type = isset($model) ? strtolower(class_basename($model)) . 's' : strtolower(class_basename($this)) . 's';
		$sizes = explode('x', $size);
		$name = explode('.', $media->name);
		$name = $name[0] . "_$size." . $name[1];
		$nid = isset($model) ? $model->nid : $this->nid;
		$path = "media/$type/$nid/photos/$size/$name";
		
		$image = ImageManager::imagick()->read(storage_path('app/public/' . $media->path));
		$image->resize($sizes[0], $sizes[1], function ($constraint) {
			$constraint->aspectRatio();
		});

		Storage::disk('public')->put($path, $image->core()->native());

		return Thumbnail::create([
			'upload_id' 	=> $media->id,
			'size'			=> $size,
			'path'			=> $path
		]);
	}

	public function defaultThumbnail(string $size, mixed $model = null)
	{
		$thumb = $this->defaultMedia()?->thumbnail($size);

		if (!isset($thumb)) {
			$default = $this->defaultMedia();

			if (isset($default)) {
				$thumb = $this->makeThumbnail($default, $size, $model);
			}
		}

		return isset($thumb->path) ? asset(Storage::url($thumb->path)) : null;
	}

	protected function url(): Attribute
	{
		return Attribute::make(
			get: fn() => asset(Storage::url($this->path)),
		);
	}

	public function thumbnailUrl(string $size, mixed $model = null)
	{
		$thumb = $this->thumbnail($size);

		if (!isset($thumb)) {
			$thumb = $this->makeThumbnail($this, $size, $model);
		}

		return asset(Storage::url($thumb->path));
	}
}
