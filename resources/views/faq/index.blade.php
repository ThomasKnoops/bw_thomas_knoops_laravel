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
                                <div class="row">
                                    <div class="col-md-6">
                                        {{ $category->name }}                                    
                                    </div>
                                    <div class="col-md-6 text-end">
                                        @if(auth()->user()->is_admin)
                                            <a href="{{ route('faq.editCategory', $category->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('faq.deleteCategory', $category->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @foreach($category->faqs as $faq)
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    {{ $faq->question }}                                  
                                                </div>
                                                <div class="col-md-6 text-end">
                                                    @if(auth()->user()->is_admin)
                                                        <a href="{{ route('faq.editQuestion', $faq->id) }}" class="btn btn-primary">Edit</a>
                                                        <form action="{{ route('faq.deleteQuestion', $faq->id) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>
                                            
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
