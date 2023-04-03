@extends('layouts.app')

<?php use Illuminate\Support\Facades\Auth; ?>

@section('content')
<div class="card">
    <div class="card-body">
        <h1 class="card-title">{{ $project -> title }}</h1>
        <h6 class="card-subtitle mb-2 text-body-secondary">Start Date: {{ $project -> start_date }} End Date: {{ $project -> end_date }}</h6>
        <p>
            Phase: {{ $project -> phase }}
        </p>
        <p>
            User email: {{ $user -> email }}
        </p>
        <p class="card-text">
            {{ $project -> description }} 
        </p><br>

       <div class="row">
        @if(Auth::id() == $project -> id)
            <a href="{{ route('home.edit', $project -> pid) }}" class="btn btn-primary col m-2">Edit</a>
            <a href="{{ route('home.confirm', $project -> pid) }}" class="btn btn-primary col m-2">Delete</a>  
        @endif
        <a href="{{ route('projects.index') }}" class="btn btn-primary col m-2">Back to Projects</a>
        @if(Auth::id() == $project -> id)
            <a href="{{ route('home') }}" class="btn btn-primary col m-2">Back to Dashboard</a>
        @endif
</div>
    </div>
</div>




@endsection        
