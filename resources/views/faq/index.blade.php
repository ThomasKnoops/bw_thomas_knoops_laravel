@extends(auth()->check() && auth()->user()->is_admin ? 'layouts.adminPannel' : 'layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">FAQ</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($faq_categories as $category)
                        <div class="card">
                            <div class="card-header">
                                {{ $category->name }}
                            </div>
                            <div class="card-body">
                                @foreach($category->faqs as $faq)
                                    <div class="card">
                                        <div class="card-header">
                                            {{ $faq->question }}
                                        </div>
                                        <div class="card-body">
                                            {{ $faq->answer }}
                                        </div>
                                    </div>
                                    <br>
                                @endforeach
                            </div>
                        </div>
                        <br>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
