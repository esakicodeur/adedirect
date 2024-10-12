@extends('layouts.app')

@section('content')
    <main id="room__lobby__container">
        <div id="form__container">
            <div id="form__container__header">
                <p class="py-5">Créer ou Joindre la salle</p>
            </div>

            <form id="lobby__form">
                <div class="form__field__wrapper">
                    <label for="name">Votre Nom</label>
                    <input type="text" name="name" id="name" required placeholder="Entrez votre nom...">
                </div>

                <div class="form__field__wrapper">
                    <label for="room">Nom de la salle</label>
                    <input type="text" name="room" id="room" placeholder="Entrez le nom de la salle...">
                </div>

                <div class="form__field__wrapper">
                    <button type="submit">Aller dans la salle
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </form>
        </div>
    </main>
@endsection
