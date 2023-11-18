@extends('layouts.app')

@section('content')
    <div class="container" style="max-width:600px">

        {{ $articles->links() }}

        @if(session('info'))
            <div class="alert alert-info">
                {{ session('info') }}
            </div>
        @endif

        @foreach($articles as $article)
            <div class="card mb-3">
                <div class="card-body">
                    <h4 class="card-title">{{ $article->title }}</h4>
                    <small class="text-muted">
                        <b class="text-success">
                            {{ $article->user->name }}
                        </b>,
                        <b>Category:</b>
                        <span class="text-success">
                            {{ $article->category->name ?? 'Unknown' }}
                        </span>,
                        <b>Comments:</b>
                        <span class="text-success">
                            {{ count($article->comments) }}
                        </span>,
                        {{ $article->created_at->diffForHumans() }}
                    </small>
                    <div class="mb-2">{{ $article->body }}</div>
                    <a href="{{ url("/articles/detail/$article->id") }}">
                        View Detail
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
