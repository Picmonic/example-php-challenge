<div class="
	col-xs-12
	com_row
	@if (1)
		hash_ends_with_number
	@endif
	">
	<div class="col-xs-2 hideOverflow com_name">{{{ $recent_commit['author_name'] }}}</div>
	<div class="col-xs-2 hideOverflow com_email">{{{ $recent_commit['author_email'] }}}</div>
	<div class="col-xs-2 hideOverflow com_date">{{{ $recent_commit['author_date'] }}}</div>
	<div class="col-xs-5 hideOverflow com_message">{{{ $recent_commit['message'] }}}</div>
	<div class="col-xs-1 hideOverflow com_url"><a href="{{{ $recent_commit['url'] }}}">{{{ $recent_commit['sha_10'] }}}</a></div>
</div>