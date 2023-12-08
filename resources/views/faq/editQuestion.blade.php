@extends('layouts.adminPannel')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add FAQ Question</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('faq.updateQuestion', $faq) }}">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="question" class="col-md-4 col-form-label text-md-end">Question</label>

                            <div class="col-md-6">
                                <input id="question" type="string" class="form-control @error('question') is-invalid @enderror" name="question" value="{{ old('question', $faq->question) }}" required>

                                @error('question')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="answer" class="col-md-4 col-form-label text-md-end">Answer</label>

                            <div class="col-md-6">
                                <input id="answer" type="string" class="form-control @error('answer') is-invalid @enderror" name="answer" value="{{ old('answer', $faq->answer) }}" required>

                                @error('answer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="faq_category_id" class="col-md-4 col-form-label text-md-end">Category</label>

                            <div class="col-md-6">
                                <select id="faq_category_id" class="form-control @error('faq_category_id') is-invalid @enderror" name="faq_category_id" required>                                    
                                @foreach($faq_categories as $category)
                                    <option value="{{ $category->id }}" {{ old('faq_category_id', $faq->faq_category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                                </select>

                                @error('faq_category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
