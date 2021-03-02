<?php
use Illuminate\Support\Facades\Auth;

$user = Auth::user();

//TODO user roles redirect
if($user->name == "student"){
    return redirect()->to('/student/index')->send();
}else{
    return redirect()->to('/teacher/index')->send();
}

?>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} HOME
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
