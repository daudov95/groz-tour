@extends('frontend.layouts.layout')

<style>
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

                <h1 class="page-title">Регистрация</h1>

                <div class="contacts-form">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Имя" required class="contacts-form__input">

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
                        <input type="password" name="password" value="{{ old('password') }}" placeholder="Пароль" class="contacts-form__input" required autocomplete="new-password">
                        <input type="password" name="password_confirmation" placeholder="Повторный пароль" class="contacts-form__input" required autocomplete="new-password">

                        <button class="contacts-form__btn card-price__btn">Зарегистрироваться</button>
                    </form>
                </div>
            </div>
        </div>

    </section>

@endsection
