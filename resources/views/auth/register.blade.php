@extends('layouts.app')

@section('content')
    <main id="room__lobby__container">
        <div id="form__container">
            <div id="form__container__header">
                <p class="py-5">Inscription</p>
            </div>

            <form id="lobby__form" action="{{ route('register') }}" method="POST">
                @csrf

                <div class="form__field__wrapper">
                    <label for="name">Nom</label>
                    <input type="text" name="name" id="name" placeholder="Entrez votre nom..." class="@error('name') border-red-500 @enderror" value="{{ old('name') }}">

                    @error('name')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form__field__wrapper">
                    <label for="username">Pseudo</label>
                    <input type="text" name="username" id="username" placeholder="Entrez votre pseudo..." class="@error('username') border-red-500 @enderror" value="{{ old('username') }}">

                    @error('username')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form__field__wrapper">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Entrez votre email..." class="@error('email') border-red-500 @enderror" value="{{ old('email') }}">

                    @error('email')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form__field__wrapper">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" placeholder="Entrez votre password..." class="@error('password') border-red-500 @enderror">

                    @error('password')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form__field__wrapper">
                    <label for="password_confirmation">Confirmez votre mot de passe</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirmez votre mot de passe..." class="@error('password_confirmation') border-red-500 @enderror">

                    @error('password_confirmation')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form__field__wrapper">
                    <button type="submit">
                        S'inscrire
                    </button>
                </div>
            </form>
        </div>
    </main>
@endsection
