@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{ route('home.delete', $project -> pid) }}" method="POST">
            @csrf
            @method('DELETE')
            <label class="form-label">Are you sure you want to delete {{ $project -> title }}?</label>
            <div class="row">
                <input type="submit" class="form-control btn btn-primary col m-2" value="Delete">
                <a href="{{ route('projects.show', $project -> pid) }}" class="btn btn-primary col m-2">Cancel</a>
            </div>
        </form>
        
    </div>
</div>

@endsection