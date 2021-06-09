
<!-- 
Group 4 = 0-10
Group 5 = 0-50
Group 6 = 0-100

-->
@extends('student.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>
    </div>
    <div class="row justify-content-center">
    
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Plus</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('student.som.index', ['+']) }}" class="btn btn-success">Plus sommen</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Minus</div>
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
    <br />
    <div class="row justify-content-center">
    
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Times</div>
                <div class="card-body">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Divided</div>
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection