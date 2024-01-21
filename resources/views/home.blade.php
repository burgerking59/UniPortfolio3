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
                                <input class="form-check-input" type="radio" name="searchBy" value="start_date" id="start_date">
                                <label class="form-check-label" for="start_date">
                                    Start Date
                                </label>
                            </div>
                            @if(!empty($search))
                            <label>Search results for {{ $search }}</label><br>
                            <a href="{{ route('home') }}">Clear Search</a>
                            @endif
                        </div>
                    </form>

                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
