<?php
use App\Models\Message;

$lastMessage = Message::latest("created_at")->first();
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
                            Last message: {{$lastMessage->message}} by: {{$lastMessage->createdby}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-inline" method="POST" action="{{ route('teacher.message.create') }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="message">New message</label>
                                    <input type="text" id="message" name="message" class="form-control mx-sm-3">
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
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Logged in as a teacher.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection