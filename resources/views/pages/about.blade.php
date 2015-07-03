@extends('layout.default')
@section('content')
    <div ng-repeat="product in store.products">
        <h1> @{{product.name}} </h1>
        @{{product.description}}
        <br>
        <button ng-show="product.canHire" class="btn btn-success">@@{{product.price | currency}}/hour</button>
    </div>
@stop