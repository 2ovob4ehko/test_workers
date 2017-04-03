@extends('layouts.app')

@section('content')
<div class="panel-body">
    <div class="container">
        <form action="/save" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="{{ $worker->id }}">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="photo">Photo</label>
                        <input type="file" id="photo_file" name="photo">
                        <p id="preview_placeholder">Press to load new photo</p>
                        <div id="preview" class="img-rounded" style="background-image: url({{ $worker->photo }});"></div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="name">Full name</label>
                        <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{ $worker->name }}">
                    </div>
                    <div class="form-group">
                        <label for="position">Position</label>
                        <input type="text" class="form-control" id="position" placeholder="Position" name="position" value="{{ $worker->position }}">
                    </div>
                    <div class="form-group">
                        <label for="recruited">Recruited</label>
                        <input type="date" class="form-control" id="recruited" placeholder="Recruited" name="recruited" value="{{ $worker->recruited }}">
                    </div>
                    <div class="form-group">
                        <label for="salary">Salary</label>
                        <input type="number" class="form-control" id="salary" placeholder="Salary" min="0" step="0.01" name="salary" value="{{ $worker->salary }}">
                    </div>
                    <div class="form-group">
                        <label for="chief">Chief</label>
                        <input type="number" class="form-control" id="chief" placeholder="Chief" min="1" step="1" name="chief" value="{{ $worker->chief }}">
                    </div>
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
            <a href="/admin" class="btn btn-default">Cancel</a>
            <input type="submit" class="btn btn-success" name="form_button" value="Save">
            <a href="/del/{{ $worker->id }}" class="btn btn-danger">Delete</a>
        </form>
    </div>
</div>
@endsection