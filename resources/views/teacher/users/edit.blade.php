@extends('teacher.layout')
@section('content')

<div class="container">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <a href="{{route("teacher.index")}}" class="btn btn-primary">Back</a>
                <br />
                <h2>Edit student {{$user->name}}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <form method="POST" action="{{route("teacher.user.update", [$user->id])}}">
                    {{ csrf_field() }}
                    @error('name')
                        <div class="alert alert-danger">
                            <p>{{ $errors->first('name') }}</p>
                        </div>
                    @enderror
                    @error('email')
                        <div class="alert alert-danger">
                            <p>{{ $errors->first('email') }}</p>
                        </div>
                    @enderror
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                    </div>

                    <div class="form-group">
                        <button style="cursor:pointer" type="submit" class="btn btn-success">Edit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection