@extends('layouts.app')

@section('content')
<div class="container hvh-100">
    <div class="row justify-content-center align-items-center h-100">
        <div class="col-xl-4">
            <div class="card shadow">
                <div class="card-header">{{ __('backoffice.global.login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-12">
								<x-partials.inputs.floating-input id="email" type="email" name="email" :label="__('backoffice.global.email')" required="true" autofocus="true" autocomplete="email"/>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
								<x-partials.inputs.floating-input id="password" type="password" name="password" :label="__('backoffice.global.password')" required="true" :show-hidden-toggle="true" autocomplete="current-password"/>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                    	{{ __('backoffice.global.remember-me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('backoffice.global.login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('backoffice.global.forgot-password') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
