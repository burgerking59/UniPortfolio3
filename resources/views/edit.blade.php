@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h1>Edit Project</h1>
        <form action="{{ route('home.save', $project -> pid) }}" id="editProject" method="POST">
            @csrf
            <label for="title" class="form-label">Title</label>
            <input required type="text" class="form-control" name="title" value="{{ $project -> title}}">

            <div class="row">
                <div class="col-sm">
                    <label for="sDate" class="form-label">Start Date</label>
                    <input required type="date" class="form-control" name="sDate" value="{{ $project -> start_date}}">
                </div>
                <div class="col-sm">
                    <label for="eDate" class="form-label">End Date</label>
                    <input required type="date" class="form-control" name="eDate" value="{{ $project -> end_date}}">
                </div>
            </div>

            <label for="phase" class="form-label">Phase</label>
            <select name="phase" class="form-control" value="{{ $project -> phase}}">
                <option name="design" value="design">Design</option>
                <option name="development" value="development">Development</option>
                <option name="testing" value="testing">Testing</option>
                <option name="deployment" value="deployment">Deployment</option>
                <option name="complete" value="complete">Complete</option>
            </select>

            <label for="description" class="form-label">Description</label>
            <textArea required form="editProject" class="form-control" name="description" value="{{ $project -> description}}"></textArea>

            <input value="Update" class="form-control btn btn-primary" type="submit">
        </form>
        <div class="row">
            <a href="{{ route('projects.show', $project -> pid) }}"  class="btn btn-primary col m-2">Back to Project</a><br>
            <a href="{{ route('home') }}"  class="btn btn-primary col m-2">Back to Dashboard</a>
        </div>
    </div>
</div>
@endsection        
