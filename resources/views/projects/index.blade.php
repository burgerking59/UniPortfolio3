@extends('layouts.app')

@section('content')
<form action="{{ route('projects.index') }}" method="GET" class="card mb-3">
    <div class="card-body">
        <input type="text" placeholder="Search" name="search" class="form-control card-title">
        
        <input type="submit" class="btn btn-primary">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="searchBy" value="title" id="title" checked>
            <label class="form-check-label" for="title">
                Title
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="searchBy" value="start_date" id="start_date">
            <label class="form-check-label" for="start_date">
                Start Date
            </label>
        </div>
        @if(!empty($search))
        <label>Search results for {{ $search }}</label><br>
        @endif
    </div>
</form>

<div class="mx-auto pb-10 w-4/5">
</div>
@endsection        
