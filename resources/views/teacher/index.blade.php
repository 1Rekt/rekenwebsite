<?php
use App\Models\Message;
use App\Models\User;

$lastMessage = Message::latest("created_at")->first();
if($lastMessage == null){
    $lastMessage = "";
}else{
$lastMessage = $lastMessage->message;
}

$students = User::where("group", Auth::user()->group)->where('role', 'student')->get();

//dd($lastMessage);
?>
@extends('teacher.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Message</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            @error('message')
                                <div class="alert alert-danger">
                                    <p>{{ $errors->first('message') }}</p>
                                </div>
                            @enderror
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form method="POST" action="{{ route('teacher.message.create') }}">
                                {{ csrf_field() }}
                                {{-- <div class="form-group">
                                    <label for="message">New message</label>
                                    <textarea id="message" name="message" class="form-control mx-sm-3"></textarea>
                                </div> --}}
                                <div class="form-group">
                                    <label for="lmessage">Last message</label>
                                    <textarea class="form-control" id="lmessage" rows="3" disabled>{{$lastMessage}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="message">New message</label>
                                    <textarea class="form-control" id="message" rows="3" name="message"></textarea>
                                </div>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Add a new user</div>
                <div class="card-body">
                    <a class="btn btn-success" href="{{route('teacher.user.create')}}">Add new user</a>
                </div>
            </div>
        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">All students</div>
                <div class="card-body">
                    @foreach($students as $student)
                        <div>{{$student->name}} <a href="{{route('teacher.user.edit', [$student->id])}}" class="btn btn-primary">Edit</a></div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection