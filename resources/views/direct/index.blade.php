@extends('layouts.app')

@section('content')
    <main class="w-full">
        <div id="room__container">

            <section id="members__container">
                <div id="members__header" class="w-full py-3">
                    <p>Participants</p>
                    <strong id="members__count">0</strong>
                </div>

                <div id="member__list" class="min-h-screen py-3"></div>
            </section>

            <section id="stream__container">

                <div id="stream__box"></div>

                <div id="streams__container"></div>

                <div class="stream__actions">
                    <!-- fa-video fa-phone -->
                    <button id="camera-btn" class="active">
                        <i class="fas fa-camera"></i>
                    </button>
                    <button id="mic-btn" class="active">
                        <i class="fas fa-microphone"></i>
                    </button>
                    <button id="screen-btn">
                        <i class="fas fa-display"></i>
                    </button>
                    <button id="leave-btn" style="background-color: #FF5050;">
                        <i class="fas fa-right-from-bracket"></i>
                    </button>
                </div>

                <button id="join-btn">Rejoindre le Stream</button>
            </section>

            <section id="messages__container">
                <div id="messages"></div>

                <form id="message__form">
                    <input type="text" name="message" placeholder="Envoyer un message...">
                </form>
            </section>
        </div>
    </main>
@endsection
