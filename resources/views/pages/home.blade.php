@extends('layout.default')
@section('content')
    <div class="col-md-12">
        <div class="page-header">
            <h1>
                Githubbifier! <small>A thing that goes through joyent and makes stuff blue.</small>
            </h1>
        </div>
        <div>
            {!! $dump or 'NOT FOUND' !!}
        </div>
    </div>
@stop