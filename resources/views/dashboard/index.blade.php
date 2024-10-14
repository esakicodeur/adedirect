@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg mt-32">
            <div class="text-black">
                Bienvenu {{ Auth::user()->username }} !
            </div>
        </div>
    </div>
@endsection
