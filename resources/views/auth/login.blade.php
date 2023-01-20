@extends('frontend.layouts.layout')

<style>
    .login-remember {
        margin-bottom: 10px;
        font-size: 14px;
        display: flex;
        align-items: center;
    }
    .login-remember label {
        margin-left: 5px;
        cursor: pointer;
    }
    .invalid-feedback {
        font-size: 14px;
        margin-bottom: 5px;
        display: block;
    }
</style>

@section('content')
<section class="section details contacts">
    <div class="container">
        <div class="details__wrap">

            <h1 class="page-title">Вход</h1>

            <div class="contacts-form">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="E-mail" required class="contacts-form__input">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input type="password" name="password" value="{{ old('password') }}" placeholder="Пароль" required class="contacts-form__input">

                    <div class="login-remember">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">Запомнить меня</label>
                    </div>


                    <button class="contacts-form__btn card-price__btn">Войти</button>

{{--                    @if (Route::has('password.request'))--}}
{{--                        <a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--                            {{ __('Forgot Your Password?') }}--}}
{{--                        </a>--}}
{{--                    @endif--}}

                </form>
            </div>
        </div>
    </div>

</section>

@endsection
