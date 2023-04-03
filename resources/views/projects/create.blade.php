@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h1>Create Project</h1>
        <form action="{{ route('projects.store') }}" id="createProject" method="POST">
            @csrf
            <label for="title" class="form-label">Title</label>
            <input required type="text" class="form-control" name="title">

            <label for="sDate" class="form-label">Start Date</label>
            <input required type="date" class="form-control" name="sDate">

            <label for="eDate" class="form-label">End Date</label>
            <input required type="date" class="form-control" name="eDate">

            <label for="phase" class="form-label">Phase</label>
            <select name="phase" class="form-control">
                <option name="design" value="design">Design</option>
                <option name="development" value="development">Development</option>
                <option name="testing" value="testing">Testing</option>
                <option name="deployment" value="deployment">Deployment</option>
                <option name="complete" value="complete">Complete</option>
            </select>

            <label for="description" class="form-label">Description</label>
            <textArea required form="createProject" class="form-control" name="description"></textArea>

            <input value="Create" class="form-control btn btn-primary" type="submit">
        </form>
        <div class="row">
            <a href="{{ route('projects.index') }}"  class="btn btn-primary col m-2">Back to Projects</a><br>
            <a href="{{ route('home') }}"  class="btn btn-primary col m-2">Back to Dashboard</a>
        </div>
    </div>
</div>
@endsection        
