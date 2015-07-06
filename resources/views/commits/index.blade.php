@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h3>Recent Commits</h3>
            @foreach ($commits as $commit)
            <div><a href="commits/{{$commit->login}}">{{$commit->login}}</a><pre>{{ $commit->message }}</pre></div>
            @endforeach
    </div>
</div>
@stop