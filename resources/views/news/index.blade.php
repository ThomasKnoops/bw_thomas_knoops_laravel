@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Latest News</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($news_items as $news)
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h1>{{ $news->title }}</h1>
                                    </div>
                                    <div class="col-md-6 text-end">
                                        <small>{{ $news->created_at->format('d/m/y \o\m H:i') }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p> {{ $news->body }} </p>
                                    </div>
                                    <div class="col-md-6 text-end">
                                        <img src='{{ asset($news->cover_photo_path) }}' alt='cover' width=100px height=100px>
                                    </div>
                                </div>
                            </div>
                        </div> <br>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
