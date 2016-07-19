@extends('layout')

@section('content')
        <div class="container">
            <div class="row">
            <div class="col-sm-12 section">
                 <h2>Latest commit made {{ $lastUpdated->diffForHumans() }}</h2>
            </div>
                
            <div class="col-sm-12 col-md-10 col-md-offset-1 section">
                    @foreach($commits as $commit)
                    <a href="{{ $commit->url }}">
                    <!-- if I had more time, would do client side checking to see if sha ends in number -->
                        <div class="commit {{is_numeric(substr( $commit->sha, -1 )) ? 'endsNumber' : ''}}">
                        <img src="{{ $commit->avatar }}">
                            <p>{{ $commit->sha }}</p>
                            <span>{{$commit->author }}</span>

                        </div>
                    </a>
                    @endforeach
                 
                </div>
            </div>
        </div>
@stop