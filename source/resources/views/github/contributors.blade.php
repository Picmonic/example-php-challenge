@extends('app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1>Joyent/Node Contributors:</h1>

            @foreach($contributors as $index=> $contributor)
                <div class="well">
                    <div class="col-md-2">
                        <img class="class" src="{{ $contributor['avatar_url'] }}" width="75" height="75" alt="avatar"/>
                    </div>
                    <div class="col-md-6">
                        <p>
                            <h3>{{ $index + 1 }}. {{ $contributor['login'] }}</h3>
                            <a href="contributors/{{ $contributor['login'] }}">View Commits</a>
                        </p>
                    </div>
                    <div class="clearfix"></div>


                </div>
            @endforeach


        </div>
    </div>

@endsection