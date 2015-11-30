@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				@if (count($authors) > 0)
					<?php $i=0; ?>
					@foreach ($authors as $author)
						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="heading{{$i}}">
								<h4 class="panel-title">
								<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$i}}" aria-expanded="true" aria-controls="collapse{{$i}}">
									{{ $author }}
								</a>
								</h4>
							</div>
							<div id="collapse{{$i}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{$i}}">
								<div class="panel-body">							
									@foreach ($commits as $commit)
										@if($commit['commit']['author']['name'] == $author)

											<div class="commitRow <?php echo is_numeric(substr($commit['sha'], -1)) ? 'isint' : 'isnotint'?>">
												<div class="row">
													<div class="col-xs-12 col-sm-2 underline">Sha</div>
													<div class="col-xs-12 col-sm-10">{{ $commit['sha'] }}</div>
												</div>
 												<div class="row">
													<div class="col-xs-12 col-sm-2 underline">Timestamp</div>
													<div class="col-xs-12 col-sm-10">{{ $commit['commit']['author']['date'] }}</div>
												</div>
												<div class="row">
													<div class="col-xs-12 col-sm-2 underline">Message</div>
													<div class="col-xs-12 col-sm-10">{{ $commit['commit']['message'] }}</div>
												</div> 
											</div>
										@endif
									@endforeach
								</div>
							</div>
						</div>
						<?php $i++; ?>
					@endforeach
				@else
					<div class="alert alert-warning" role="alert">No authors found :( (Get them in admin)</div>
				@endif
			</div>
		</div>
	</div>
</div>
@endsection