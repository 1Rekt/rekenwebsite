<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<style>
    #smallDiv{
        border: 1px solid;
        width: 60px;
        height: 60px;
        display: inline-block;
        font-size: 40px;
        text-align: center;
        background-color: lightblue;
    }
</style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 mx-auto">
                    @php $i = 1; @endphp
                        @foreach ($alleSommen as $key => $som)
                            @if($som->answerresult == 1)
                                <div id="smallDiv" class="groen">{{$i}}</div>
                            @elseif($som->answer !== NULL && $som->answerresult == 0)
                                <div id="smallDiv" class="rood">{{$i}}</div>
                            @else
                                <div id="smallDiv" class="blauw">{{$i}}</div>
                            @endif
                            @php $i++; @endphp
                        @endforeach
                    </div>
                </div>
                <br /><br /><br /><br /><br />
                <div class="row">
                    <div class="col-sm-8 mx-auto">
                        <h1>Wat is {{$currentSom->somstring}}?</h1><br />

                        <form method="POST">
                        {{ csrf_field() }}
                            <div class="form-group">
                                <label for="answer">Antwoord</label>
                                <input type="number" class="form-control" id="answer" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>