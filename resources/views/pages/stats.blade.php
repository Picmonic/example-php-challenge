@extends('layout.default')
@section('content')
    <div ng-repeat="feature in githubbifier.features" class="#e3f2fd blue lighten-5">
        <h1> @{{feature.name}} </h1>
       <p> @{{feature.description}}</p>
    </div>
@stop