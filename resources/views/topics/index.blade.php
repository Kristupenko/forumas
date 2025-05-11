@extends('layouts.app')

@section('content')
<h1>Temos</h1>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="GET" class="row g-3 mb-3">
    <div class="col-auto">
        <input type="text" name="search" class="form-control" placeholder="Ieškoti..." value="{{ request('search') }}">
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-primary">Ieškoti</button>
    </div>
</form>

<a href="{{ route('topics.create') }}" class="btn btn-success mb-3">Sukurti temą</a>

<ul class="list-group">
    @foreach($topics as $topic)
        <li class="list-group-item">
            <a href="{{ route('topics.show', $topic) }}">{{ $topic->title }}</a><br>
            <small>{{ $topic->category->title }} / {{ $topic->user->name }} / {{ $topic->updated_at->format('Y-m-d H:i') }}</small>
            <div class="mt-2 d-flex gap-2">
                <a href="{{ route('topics.download.pdf', $topic->id) }}" class="btn btn-sm btn-outline-secondary">
                    📄 Atsisiųsti PDF
                </a>
                <a href="{{ route('topics.show', $topic) }}" class="btn btn-sm btn-outline-primary">
                    Peržiūrėti temą
                </a>
            </div>
        </li>
    @endforeach
</ul>

<div class="mt-3">
    {{ $topics->links() }}
</div>
@endsection
