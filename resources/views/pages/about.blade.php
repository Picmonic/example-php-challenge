@extends('layout.default')
@section('content')
    <div ng-repeat="product in store.products">
        <h1> @{{product.name}} </h1>
        @{{product.description}}
    </div>
@stop