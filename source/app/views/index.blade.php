@extends('base')



@section('content')
<div class="row"><div class="xlarge-12 columns">
	<h3>Welcome...</h3>
</div></div>

<div class="row"><div class="xlarge-12 columns">
<!-- Angular App & View -->
{{ HTML::style('css/angularapp.css'); }} 
{{ HTML::script('js/app/ng_script.js'); }} 
@include('angular'); 

</div></div>

@stop



