@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Profilio informacija</h2>

   
    <div class="card mb-4">
        <div class="card-header">Atnaujinti profilio informaciją</div>
        <div class="card-body">
            @include('profile.partials.update-profile-information-form')
        </div>
    </div>

    
    <div class="card mb-4">
        <div class="card-header">Atnaujinti slaptažodį</div>
        <div class="card-body">
            @include('profile.partials.update-password-form')
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header text-danger">Ištrinti paskyrą</div>
        <div class="card-body">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</div>
@endsection
