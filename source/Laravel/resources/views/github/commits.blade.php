@extends('layouts.app')

@section('content')

    @foreach ($commits as $commit)
    @if  (is_numeric(substr($commit["commit_hash"], -1))) 
    <div class="row" style="background-color: #E6F1F6" class="blue-highlight">
    @else
    <div class="row">
    @endif
        <div class="col-md-2">{{$commit["author"]}}</div>
        <div class="col-md-4">{{$commit["commit_hash"]}}</div>
        <div class="col-md-6">{{$commit["message"]}}</div>
    </div>
    <br />
    @endforeach
@stop