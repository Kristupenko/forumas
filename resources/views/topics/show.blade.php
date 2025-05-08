@extends('layouts.app')

@section('content')
<h1>{{ $topic->title }}</h1>
<p><strong>Kategorija:</strong> {{ $topic->category->title }}</p>
<p><strong>Autorius:</strong> {{ $topic->user->name }}</p>
<hr>
<h4>Komentarai:</h4>
@if ($topic->posts->count())
    <ul class="list-group mb-4">
        @foreach($topic->posts as $post)
            <li class="list-group-item">
                <p>{{ $post->content }}</p>
                <small><i>{{ $post->user->name }}</i></small>
            </li>
        @endforeach
    </ul>
@else
    <p>Nėra komentarų.</p>
@endif
<hr>
<h4>Pridėti komentarą:</h4>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{ route('topics.addPost', $topic->id) }}">
    @csrf
    <div class="mb-3">
        <textarea name="content" class="form-control" rows="4" placeholder="Įveskite komentarą..." required>{{ old('content') }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Siųsti</button>
</form>
@endsection
