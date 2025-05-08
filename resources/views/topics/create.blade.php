@extends('layouts.app')

@section('content')
<h1>Sukurti naują temą</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{ route('topics.store') }}">
    @csrf
    <div class="mb-3">
        <label class="form-label">Pavadinimas</label>
        <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Turinys</label>
        <textarea name="content" class="form-control" rows="5" required>{{ old('content') }}</textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Kategorija</label>
        <select name="category_id" class="form-select" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Sukurti temą</button>
</form>
@endsection
