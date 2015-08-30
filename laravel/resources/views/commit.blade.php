<!-- TO DO: ext css -->
<div>
	{{{ $recent_commit['author_name'] }}}
	{{{ $recent_commit['author_email'] }}}
	{{{ $recent_commit['author_date'] }}}
	<span style="max-width: 300px; overflow: hidden;">{{{ $recent_commit['message'] }}}</span>
	{{{ $recent_commit['url'] }}}
	{{{ $recent_commit['sha'] }}}
</div>
