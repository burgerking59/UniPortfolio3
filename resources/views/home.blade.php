@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}<br>

                    

                    <form action="/home" method="GET" class="card mb-3">
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
                            <a href="{{ route('home') }}">Clear Search</a>
                            @endif
                        </div>
                    </form>

                    <div class="row" style="--bs-gutter-x: 0;">
                    @foreach($projects as $project)
                        <div class="col-sm-6 mb-3">
                        <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $project -> title }}</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">Start Date: {{ $project -> start_date }}
                            <p class="card-text">{{ $project -> description }}</p>
                            <div class="row">
                                <a href="{{ route('projects.show', $project -> pid) }}" class="btn btn-primary">More Info</a>
                                <a href="{{ route('home.edit', $project -> pid) }}" class="btn btn-primary col m-2">Edit</a>
                                <a href="{{ route('home.confirm', $project -> pid) }}" class="btn btn-primary col m-2">Delete</a>  
                            </div>
                        </div>
                        </div>
                    </div>
                    @endforeach
                    </div>
                    <a href="{{ route('projects.create') }}" class="btn btn-primary m-1">Create</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
