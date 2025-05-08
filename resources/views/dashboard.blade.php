@extends('layouts.app')

@section('content')
<h1>Sveikas, {{ Auth::user()->name }}</h1>
<a href="{{ route('topics.create') }}" class="btn btn-success mb-3">Sukurti temą</a>
<ul class="list-group">
    @forelse ($topics as $topic)
        <li class="list-group-item">
            <a href="{{ route('topics.show', $topic) }}">{{ $topic->title }}</a><br>
            <small>{{ $topic->category->title }} / {{ $topic->user->name }}</small>
        </li>
    @empty
        <li class="list-group-item">Temų kol kas nėra.</li>
    @endforelse
</ul>
@endsection
