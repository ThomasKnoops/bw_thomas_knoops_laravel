@extends(auth()->check() && auth()->user()->is_admin ? 'layouts.adminPanel' : 'layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- Outer card header -->
                <div class="card-header"><h1>Latest News</h1></div>
                <!-- Outer card body -->
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($news_items as $news)
                        <div class="card">
                            <!-- Inner card header -->
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h2>{{ $news->title }}</h2>
                                    </div>
                                    <div class="col-md-6 text-end">
                                        <p class="mb-1"><small>{{ $news->created_at->format('d/m/y \a\t H:i') }}</small></p>
                                        @if($news->updated_at != $news->created_at)
                                            <p class="mb-1"><small> Updated: {{ $news->updated_at->format('d/m/y \a\t H:i') }}</small></p>
                                        @endif
                                        @if(auth()->check() && Auth::user()->is_admin)
                                        <form action="{{ route('news.edit', $news->id) }}" method="GET">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Edit news</button>
                                        </form>
                                        <form action="{{ route('news.delete', $news->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete news</button>
                                        </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- Inner card body -->
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
