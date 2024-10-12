@extends('layouts.app')

@section('content')
    <main id="room__lobby__container">
        <div id="form__container">
            <div id="form__container__header" class="py-5">
                <p class="py-5">Connexion</p>
            </div>

            @if (session('status'))
                <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
                    {{ session('status') }}
                </div>
            @endif

            <form id="lobby__form" action="{{ route('login') }}" method="POST">
                @csrf

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
                    <button type="submit">
                        Se connecter
                    </button>
                </div>
            </form>
        </div>
    </main>
@endsection
