@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h3>Recent Commits by {{ $author }}</h3>        
            @foreach ($commits as $commit)
                <div class='{{ (is_numeric(substr($commit->sha, -1))) ? 'blue' : '' }}'><p>{{ $commit->sha }}</p><p>{{ $commit->message }}</p></div>
            @endforeach
    </div>
</div>
@stop