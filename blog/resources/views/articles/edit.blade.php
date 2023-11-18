@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 600px">

    @if($errors->any())
        <div class="alert alert-warning">
            @foreach ($errors->all() as $msg)
            {{ $msg }}
            @endforeach
        </div>
    @endif

    <form method="post">
        @csrf
        <input type="text" class="form-control mb-2" name="title" placeholder="Title" value="{{ $article->title }}">
        <textarea name="body" placeholder="Body" class="form-control mb-2">{{ $article->body }}</textarea>
        <select name="category_id" class="form-select mb-3">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" 
                    @selected($article->category_id == $category->id)>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        <button class="btn btn-primary">Update Article</button>
    </form>
</div>
@endsection