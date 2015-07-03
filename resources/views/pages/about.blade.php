@extends('layout.default')
@section('content')
    <div ng-repeat="product in store.products" class="#e3f2fd blue lighten-5">
        <h1> @{{product.name}} </h1>
       <p> @{{product.description}}</p>
    </div>
@stop