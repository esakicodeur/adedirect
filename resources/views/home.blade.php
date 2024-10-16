<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Direct') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Inria+Sans:wght@300;400;700&family=Inria+Serif:wght@300;400;700&display=swap" rel="stylesheet">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body>
        <nav class="p-3 flex bg-white justify-between items-center">
            <a href="{{ route('home') }}" id="brand" class="flex gap-2 items-center">
                <img src="{{ asset('images/ade.png') }}" alt="" class="w-14 h-14">
            </a>


            <div class="hidden lg:flex gap-5 items-center">
                @auth
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <div class="hidden h-16 space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <x-nav-link href="{{ route('dashboard') }}">
                                {{ Auth::user()->username }}
                            </x-nav-link>
                        </div>

                        <div class="relative ml-3">
                            <div align="right" width="48"  class="inline-flex rounded-md">
                                <form action="{{ route('logout') }}" method="POST" class="inline p-3">
                                    @csrf
                                    <button type="submit" class="px-3">{{ __('Se deconnecter') }}</button>
                                </form>
                            </div>
                        </div>

                    </div>
                    @else
                    <div class="flex">
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <x-nav-link href="{{ route('login') }}">
                                {{ __('Login') }}
                            </x-nav-link>

                            <x-nav-link href="{{ route('register') }}">
                                {{ __('Register') }}
                            </x-nav-link>
                        </div>
                    </div>
                    @endauth
            </div>

            <button onclick="handleMenu()" class="lg:hidden md:hidden">
                <x-zondicon-menu class="h-8 text-black" />
            </button>

            <div id="nav-dialog" class="hidden fixed z-10 md:hidden bg-white inset-0 p-3">
                <div id="nav-bar" class="flex justify-between">
                    <a href="{{ route('home') }}" id="brand" class="flex gap-2 items-center">
                        <img src="{{ asset('images/ade.png') }}" alt="" class="w-16 h-16">
                    </a>

                    <button class="p-2 bg-white md:hidden" onclick="handleMenu()">
                        <x-zondicon-close class="text-gray-900 h-8" />
                    </button>
                </div>

                <div class="mt-6">

                <div class="h-[1px] bg-gray-300"></div>

                <div class="w-full mt-6 flex flex-col gap-2">
                    @auth
                        <div class="relative ml-3">
                            <div align="right" width="48"  class="flex flex-col rounded-md">
                                <div>
                                    <button type="button" class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none">
                                        {{ Auth::user()->username }}
                                    </button>
                                </div>

                                <div>
                                    <form action="{{ route('logout') }}" method="POST" class="inline p-3">
                                        @csrf
                                        <button type="submit" class="p-3">{{ __('Se deconnecter') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @else
                    <div class="flex flex-col space-y-5">
                            <div>
                                <x-nav-link href="{{ route('login') }}">
                                    {{ __('Login') }}
                                </x-nav-link>
                            </div>

                            <div>
                                <x-nav-link href="{{ route('register') }}">
                                    {{ __('Register') }}
                                </x-nav-link>
                            </div>
                    </div>
                    @endauth
                </div>
            </div>
        </nav>

        {{-- Hero Section --}}
        <main>
            <div id="hero" class="min-h-screen bg-gradient-to-br from-purple-50 via-blue-50 to-transparent">
                <div id="hero-container" class="max-w-4xl mx-auto px-6 pb-5 mb-5 flex flex-col sm:items-center sm:text-center">
                    <div id="version-text" class="flex items-center my-6 gap-2 border border-blue-300 bg-blue-50 rounded-lg px-3 py-1 w-fit shadow-md hover:shadow-lg hover:-translate-y-1 transition group">
                        <div class="w-2 h-2 bg-blue-400 rounded-full border border-blue-600"></div>
                        <p class="font-display text-blue-600">v0.21.1: <span>Live avec Académie des élites</span></p>
                        <x-zondicon-arrow-thin-right class="h-4 text-blue-600 group-hover:translate-x-2 transition duration-300" />
                    </div>
                    <h1 class="text-4xl font-semibold leading-snug mt-4 sm:text-6xl sm:leading-normal">Identifier vos difficultés et notre équipe s'occupe de les solutionner.</h1>
                    <p class="text-xl mt-4 sm:text-2xl sm:mt-8 text-gray-800">Augmentez votre confiance, vos aptitudes et améliorez vos notes en résolvant en temps réel et peu importe où vous êtes vos lacunes.</p>
                    <div id="buttons-container" class="mt-12 flex gap-4 flex-col sm:flex-row">
                        <button class="px-8 py-3 font-semibold rounded-lg text-white bg-indigo-900 shadow-sm hover:bg-opacity-90">Nous contacter</button>
                    </div>
                </div>
            </div>
        </main>

        <div id="companies-container" class="flex flex-col gap-8 mt-6 mb-6">
            <div id="companies-title" class="flex justify-center gap-2">
                <x-heroicon-o-arrow-turn-left-down class="w-8 h-8 text-xl text-black translate-y-2" />
                <span class="text-xl font-bold">NOS LIVRETS D'ACTIVITES</span>
                <x-heroicon-o-arrow-turn-right-down class="w-8 h-8 text-xl text-black translate-y-2" />
            </div>

            <div id="lines-group" class="flex flex-col gap-4 justify-center items-center">
                <div id="line1" class="flex flex-wrap gap-4">
                    <div class="flex flex-col min-w-24 min-h-24 items-center justify-center bg-white rounded-xl border border-gray-300 md:min-h-32 md:min-w-32">
                        <img class="w-14 h-16 md:w-14 md:h-16" src="{{ asset('images/6e.png') }}" alt="livret">
                        <span class="text-[12px] md:text-[16px] font-semibold">6ème</span>
                    </div>
                    <div class="flex flex-col min-w-24 min-h-24 items-center justify-center bg-white rounded-xl border border-gray-300 md:min-h-32 md:min-w-32">
                        <img class="w-14 h-16 md:w-14 md:h-16" src="{{ asset('images/5e.png') }}" alt="livret">
                        <span class="text-[12px] md:text-[16px] font-semibold">5ème</span>
                    </div>
                    <div class="flex flex-col min-w-24 min-h-24 items-center justify-center bg-white rounded-xl border border-gray-300 md:min-h-32 md:min-w-32">
                        <img class="w-14 h-16 md:w-14 md:h-16" src="{{ asset('images/4e.png') }}" alt="livret">
                        <span class="text-[12px] md:text-[16px] font-semibold">4ème</span>
                    </div>
                    <div class="flex flex-col min-w-24 min-h-24 items-center justify-center bg-white rounded-xl border border-gray-300 md:min-h-32 md:min-w-32">
                        <img class="w-14 h-16 md:w-14 md:h-16" src="{{ asset('images/3e.png') }}" alt="livret">
                        <span class="text-[12px] md:text-[16px] font-semibold">3ème</span>
                    </div>
                    <div class="flex flex-col min-w-24 min-h-24 items-center justify-center bg-white rounded-xl border border-gray-300 md:min-h-32 md:min-w-32">
                        <img class="w-14 h-16 md:w-14 md:h-16" src="{{ asset('images/2A.png') }}" alt="livret">
                        <span class="text-[12px] md:text-[16px] font-semibold">2nde A</span>
                    </div>
                    <div class="flex flex-col min-w-24 min-h-24 items-center justify-center bg-white rounded-xl border border-gray-300 md:min-h-32 md:min-w-32">
                        <img class="w-14 h-16 md:w-14 md:h-16" src="{{ asset('images/2C.png') }}" alt="livret">
                        <span class="text-[12px] md:text-[16px] font-semibold">2nde C</span>
                    </div>
                </div>

                <div id="line2" class="flex flex-wrap gap-4">
                    <div class="flex flex-col min-w-24 min-h-24 items-center justify-center bg-white rounded-xl border border-gray-300 md:min-h-32 md:min-w-32">
                        <img class="w-14 h-16 md:w-14 md:h-16" src="{{ asset('images/PA.png') }}" alt="livret">
                        <span class="text-[12px] md:text-[16px] font-semibold">1ère A</span>
                    </div>
                    <div class="flex flex-col min-w-24 min-h-24 items-center justify-center bg-white rounded-xl border border-gray-300 md:min-h-32 md:min-w-32">
                        <img class="w-14 h-16 md:w-14 md:h-16" src="{{ asset('images/PC.png') }}" alt="livret">
                        <span class="text-[12px] md:text-[16px] font-semibold">1ère C</span>
                    </div>
                    <div class="flex flex-col min-w-24 min-h-24 items-center justify-center bg-white rounded-xl border border-gray-300 md:min-h-32 md:min-w-32">
                        <img class="w-14 h-16 md:w-14 md:h-16" src="{{ asset('images/PD.png') }}" alt="livret">
                        <span class="text-[12px] md:text-[16px] font-semibold">1ère D</span>
                    </div>
                    <div class="flex flex-col min-w-24 min-h-24 items-center justify-center bg-white rounded-xl border border-gray-300 md:min-h-32 md:min-w-32">
                        <img class="w-14 h-16 md:w-14 md:h-16" src="{{ asset('images/TA.png') }}" alt="livret">
                        <span class="text-[12px] md:text-[16px] font-semibold">Tle A</span>
                    </div>
                    <div class="flex flex-col min-w-24 min-h-24 items-center justify-center bg-white rounded-xl border border-gray-300 md:min-h-32 md:min-w-32">
                        <img class="w-14 h-16 md:w-14 md:h-16" src="{{ asset('images/TC.png') }}" alt="livret">
                        <span class="text-[12px] md:text-[16px] font-semibold">Tle C</span>
                    </div>
                    <div class="flex flex-col min-w-24 min-h-24 items-center justify-center bg-white rounded-xl border border-gray-300 md:min-h-32 md:min-w-32">
                        <img class="w-14 h-16 md:w-14 md:h-16" src="{{ asset('images/TD.png') }}" alt="livret">
                        <span class="text-[12px] md:text-[16px] font-semibold">Tle D</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Testimonials -->
        <div class="p-3 bg-gradient-to-br from-purple-50 via-blue-50 to-transparent mb-6">
            <div id="testimonials" class="container justify-center text-center m-0">
                <h3 class="text-xl mb-6 font-bold">A PROPOS</h3>
                <div class="rounded-xl border flex flex-col lg:flex-row items-end">
                    <div id="left" class="flex flex-col gap-12 p-8 lg:w-1/2">
                        <div class="w-16 h-16">
                            <img src="{{ asset('images/ade.png') }}" alt="">
                        </div>

                        <h3 class="text-2xl leading-relaxed">De la haine à l'amour, revolutionnez votre approche d'apprentissage.</h3>
                        <p class="text-xl leading-relaxed">La meilleure approche pour transformer votre matière la plus detestée en votre préférée.</p>

                        <div id="tag-container">
                            <h2 class="text-2xl font-bold my-3">Nos services</h2>
                            <div class="flex gap-3 flex-wrap">
                                <div class="flex gap-2 items-center justify-center bg-yellow-50 w-fit border border-yellow-300 px-3 py-1 rounded-md text-yellow-800">
                                    <x-heroicon-c-check class="w-4 h-4 text-yellow-800"/>
                                    <span class="font-bold">Aide à la résolution de vos exercices</span>
                                </div>
                                <div class="flex gap-2 items-center justify-center bg-yellow-50 w-fit border border-yellow-300 px-3 py-1 rounded-md text-yellow-800">
                                    <x-heroicon-c-check class="w-4 h-4 text-yellow-800"/>
                                    <span class="font-bold">Cours particuliers à domicile</span>
                                </div>
                                <div class="flex gap-2 items-center justify-center bg-yellow-50 w-fit border border-yellow-300 px-3 py-1 rounded-md text-yellow-800">
                                    <x-heroicon-c-check class="w-4 h-4 text-yellow-800"/>
                                    <span class="font-bold">Cours particuliers en ligne</span>
                                </div>
                                <div class="flex gap-2 items-center justify-center bg-yellow-50 w-fit border border-yellow-300 px-3 py-1 rounded-md text-yellow-800">
                                    <x-heroicon-c-check class="w-4 h-4 text-yellow-800"/>
                                    <span class="font-bold">Cours en ligne en groupe</span>
                                </div>
                                <div class="flex gap-2 items-center justify-center bg-yellow-50 w-fit border border-yellow-300 px-3 py-1 rounded-md text-yellow-800">
                                    <x-heroicon-c-check class="w-4 h-4 text-yellow-800"/>
                                    <span class="font-bold">Cours en groupe dans un centre</span>
                                </div>
                                <div class="flex gap-2 items-center justify-center bg-yellow-50 w-fit border border-yellow-300 px-3 py-1 rounded-md text-yellow-800">
                                    <x-heroicon-c-check class="w-4 h-4 text-yellow-800"/>
                                    <span class="font-bold">Session intensive de rémédiations</span>
                                </div>
                            </div>
                        </div>

                        <p class="text-lg font-light text-gray-500"><span class="font-bold mr-3 text-blue-500">AETchat : Pour répondre instantanément à vos questions et planifier une session de travail</span><br>
                            AETchat est un service de messagerie intégré à notre plateforme qui permet de transmettre sous forme de capture d'écran, le message vocal, le message texte l'exactitude de leurs difficultés à nos professeurs, d'assurez un suivi propre de chaque enfant à sa difficulté et d'enregistrer les conversations afin d'avoir une traçabilité sur l'évolution de l'apprenant et assurer la Programmation des cours.</p>

                            <p class="text-lg font-light text-gray-500"><span class="font-bold mr-3 text-blue-500">AEClass : Notre espace d'enseignement virtuel</span><br>
                                AEClass dispose de plusieurs outils collaboratifs : une plateforme d'audio conférence, de visioconférence enregistré pour permettre de reviser en cas besoin; le partage des documents pour faciliter la coordinnation et le tableau blanc numérique pour les cours interactifs.</p>

                        <div id="user-card" class="flex gap-4">
                            <div class="w-12">
                                <img class="rounded-full" src="{{ asset('images/empty.png') }}" alt="avatar">
                            </div>
                            <div class="flex flex-col">
                                <h3>Rodrigue Amakam</h3>
                                <p class="text-gray-500">CEO</p>
                            </div>
                        </div>
                    </div>

                    <div class="lg:w-1/2 flex flex-col">
                        <img src="{{ asset('images/ade2.PNG') }}" alt="persons">
                        <img src="{{ asset('images/ade3.PNG') }}" alt="persons">
                        <img src="{{ asset('images/ade5.PNG') }}" alt="persons">
                        <img src="{{ asset('images/ade8.PNG') }}" alt="persons">
                        <img src="{{ asset('images/ade9.PNG') }}" alt="persons">
                        <img src="{{ asset('images/ade7.PNG') }}" alt="persons">
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQ -->
        <div id="faq" class="container">
            <div class="text-center">
                <h3 class="text-xl mb-6 font-bold">FAQs</h3>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 mt-6 gap-6">
                <div class="group rounded-xl border border-gray-200 bg-gray-50 p-6">
                    <dt class="flex justify-between items-center" aria-controls="faq-1">
                        <p class="font-semibold text-lg">AcademieDesElites, c’est quoi ?</p>
                        <x-heroicon-c-chevron-up id="icon" class="w-8 h-8 -rotate-180 transition" />
                    </dt>
                    <dd id="faq-1" class="hidden text-lg font-light mt-6">
                        <p>AcademieDesElites est le futur des cours particuliers et de l'assistance scolaire. Nous mettons à la disposition de nos élèves toutes les ressources pédagogiques et les outils pédagogiques (plateformes AETchat et AEClass) innovants les permettant d'atteindre leurs objectifs.</p>
                    </dd>
                </div>

                <div class="group rounded-xl border border-gray-200 bg-gray-50 p-6">
                    <dt class="flex justify-between items-center" aria-controls="faq-2">
                        <p class="font-semibold text-lg">A qui s’adresse l’offre de AcademieDesElites ?</p>
                        <x-heroicon-c-chevron-up class="w-8 h-8 -rotate-180 transition" />
                    </dt>
                    <dd id="faq-2" class="hidden text-lg font-light mt-6">
                        <p>L’offre s’adresse aux élèves et aux étudiants de tous les âges qui ont besoin d’aide pour apprendre ou qui veulent développer leurs connaissances avec notre soutien.</p>
                    </dd>
                </div>

                <div class="group rounded-xl border border-gray-200 bg-gray-50 p-6">
                    <dt class="flex justify-between items-center" aria-controls="faq-3">
                        <p class="font-semibold text-lg">Quelles sont les avantages de notre solution ?</p>
                        <x-heroicon-c-chevron-up id="icon" class="w-8 h-8 -rotate-180 transition" />
                    </dt>
                    <dd id="faq-3" class="hidden text-lg font-light mt-6">
                        <p>Suivi en temps réel sur toutes les disciplines et sur tous les niveaux d'étude.
                            Les cours PDF, les quiz, les audios, les vidéos, les fiches de TD bien élaborées, les sujets type séquentiels et d'examens disponibles pour nos apprenants.
                            Consultation gratuite avec un de nos conseillers pédagogiques pour établir la situation scolaire et psychologique de l'apprenant et lui affecter le meilleur professeur.
                            Des conférences en ligne.
                            La formation des parents (conseils de nos experts).
                            La première semaine de soutien est gratuite.</p>
                    </dd>
                </div>

                <div class="group rounded-xl border border-gray-200 bg-gray-50 p-6">
                    <dt class="flex justify-between items-center" aria-controls="faq-4">
                        <p class="font-semibold text-lg">Comment puis-je organiser une leçon avec un.e professeur.e ?</p>
                        <x-heroicon-c-chevron-up class="w-8 h-8 -rotate-180 transition" />
                    </dt>
                    <dd id="faq-4" class="hidden text-lg font-light mt-6">
                        <p>Pour organiser un suivi et une première leçon avec un.e professeur.e merci de contacter la ligne de support pédagogique AcademieDesElites, un.e de nos coéquipier.ère.s vous répondra dans les meilleurs délais. Pour une demande d’un. professeur.e dans une nouvelle matière merci de contacter le support pédagogique par message whatsApp à ce numéro : +237 676 546 499</p>
                    </dd>
                </div>
            </div>
        </div>


        <div class=" bg-gray-800 p-5 mt-5">
            <footer class="container text-center">
                <div class="rounded-lg border bg-gray-50 flex flex-col lg:flex-row justify-between items-center px-8 py-12 gap-8">
                    <div>
                        <a href="{{ route('home') }}" id="brand" class="flex gap-2 items-center">
                            <img src="{{ asset('images/ade.png') }}" alt="">
                        </a>
                    </div>
                    <div class="flex flex-col gap-4">
                        <div class="text-md font-medium inline-flex"><x-heroicon-s-phone class="w-8 h-8 text-black mr-3"/> <span class="font-bold mr-3">Téléphone : </span> 698 110 561 / 695 478 293 / 694 212 383</div>
                        <div class="text-md font-medium inline-flex"><x-heroicon-s-envelope class="w-8 h-8 text-black mr-3"/> <span class="font-bold mr-3">Email : </span> academiedeselites237@gmail.com</div>
                        <div class="text-md font-medium inline-flex"><x-heroicon-s-map-pin class="w-8 h-8 text-black mr-3"/> <span class="font-bold mr-3">Adresse : </span> Cité des palmiers-Carrefour Express, Douala</div>
                    </div>
                </div>

                <hr class="text-white mt-5 ">

                <div id="sub-footer" class="flex flex-col gap-6 items-center justify-center my-12">
                    <div class="flex gap-2 items-center">
                        <a href="https://academiedeselites.com" id="brand" class="flex gap-2 items-center">
                            <img src="{{ asset('images/ade.png') }}" alt="" class="w-6 h-6">
                        </a>
                        <p class="text-md font-bold text-gray-400">Académie des élites</p>
                    </div>
                    <p class="text-md font-bold text-gray-400">Copyright © 2024 - Academie des élites - Tous droits réservés</p>
                </div>
            </footer>
        </div>

        <script src="{{ asset('js/script.js') }}"></script>
    </body>
</html>
