@extends('layouts.app')

@section('content')

    @foreach ($commits as $commit)
    <div class="row">
        <div class="col-md-3">{{$commit["author"]}}</div>
        <div class="col-md-3">{{$commit["date"]}}</div>
        <div class="col-md-6">{{$commit["message"]}}</div>
    </div>
    @endforeach
@stop