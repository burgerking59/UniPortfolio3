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
            <input class="form-check-input" type="radio" name="searchBy" value="end_date" id="end_date">
            <label class="form-check-label" for="end_date">
                End Date
            </label>
        </div>
        @if(!empty($search))
        <label>Search results for {{ $search }}</label><br>
        <a href="{{ route('projects.index') }}">Clear Search</a>
        @endif
    </div>
</form>

<div class="row" style="--bs-gutter-x: 0;">
@foreach($projects as $project)
    <div class="col-sm-6 mb-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{ $project -> title }}</h5>
        <h6 class="card-subtitle mb-2 text-body-secondary">Start Date: {{ $project -> start_date }}
        <p class="card-text">{{ $project -> description }}</p>
        <a href="{{ route('projects.show', $project -> pid) }}" class="btn btn-primary">More info</a>
      </div>
    </div>
  </div>
@endforeach
</div>
<div class="mx-auto pb-10 w-4/5">
    {{ $projects->links() }}
</div>
@endsection        
