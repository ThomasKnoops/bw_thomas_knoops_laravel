@extends('layouts.app')

@section('content')
<div class="container">
    <div class="background-container">
        <div class="text-center text-black bg-white bg-opacity-50">
            <h1>The final Game</h1>
            <h2>Where real-time strategy game meets Stratego.</h2>
            <h2>Releases summer '24.</h2>
        </div>
    </div>
</div>

<style>
    body, html {
        height: 100%;
        margin: 0;
    }

    .background-container {
        background-image: url('{{ asset("images/background.jpg") }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 100vh; /* 100% of the viewport height */
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

@endsection
