<?php

use Illuminate\Support\Facades\Route;

Auth::routes([
	'register' 	=> false,
	'verify'	=> false
]);

Route::group(['middleware' => 'auth'], function() {
	Route::get('/', function() {
		return redirect('/dashboard');
	});
	Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

	Route::prefix('users')->name('users.')->group(function () {
		Route::get('', App\Livewire\Users\Listing::class)->name('index');
		Route::get('{user}', App\Livewire\Users\Show::class)->name('show');
	});

	Route::prefix('clients')->name('clients.')->group(function () {
		Route::get('', App\Livewire\Clients\Listing::class)->name('index');
		Route::get('{client}', App\Livewire\Clients\Show::class)->name('show');
	});

	Route::prefix('leads')->name('leads.')->group(function() {
		Route::get('', App\Livewire\Leads\Listing::class)->name('index');
		Route::get('{lead}', App\Livewire\Leads\Show::class)->name('show');
	});

	Route::prefix('services')->name('services.')->group(function () {
		Route::get('', App\Livewire\Services\Listing::class)->name('index');
		Route::get('{service}', App\Livewire\Services\Show::class)->name('show');
	});

	Route::prefix('sections')->name('sections.')->group(function () {
		Route::get('', App\Livewire\Sections\Listing::class)->name('index');
		Route::get('{section}', App\Livewire\Sections\Show::class)->name('show');
	});
});