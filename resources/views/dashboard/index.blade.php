@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center">
        <div class="w-8/12 bg-white p-6 rounded-lg mt-32 flex flex-col justify-center items-center space-y-2">
            <div class="text-black text-xl">
                Bienvenu {{ Auth::user()->username }} !
            </div>


            @if (Auth::user()->role === 1)
                <div id="nav__links">
                    <div id="nav__links">
                        <a href="{{ route('lobby') }}">
                            <button type="submit">Creer ou rejoindre une salle</button>
                        </a>
                    </div>
                </div>
            @else
                <div id="nav__links">
                    <div id="nav__links">
                        <a href="{{ route('lobby') }}">
                            <button type="submit">Rejoindre une salle</button>
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
