<!-- TO DO: this is a really dumb hack, but the only way I could figure out how to make it work -->
<div style="display: none;">{{ $highlight = $recent_commit['highlight_row'] }}</div>

<div class="
	col-xs-12
	com_row
	@if ($highlight)
		hash_ends_with_number
	@endif
	">
	<div class="col-xs-4 com_name">{{{ $recent_commit['author_name'] }}}
		&nbsp;(<a href="mailto:{{{ $recent_commit['author_email'] }}}">{{{ $recent_commit['author_email'] }}}</a>)
	</div>
	<div class="col-xs-2 com_date">{{{ $recent_commit['author_date'] }}}</div>
	<div class="col-xs-5 com_message">{{{ $recent_commit['message'] }}}</div>
	<div class="col-xs-1 com_url">
		<a href="{{{ $recent_commit['url'] }}}" target="_blank">{{{ $recent_commit['sha_10'] }}}</a>
	</div>
</div>