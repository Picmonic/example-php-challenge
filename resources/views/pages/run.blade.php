@extends('layout.default')
@section('content')
<div class="z-depth-1">
    <table class="white">
        <thead>
        <tr>
            <th data-field="name">
                Name
            </th>
            <th data-field="commit">
                Commit ID
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach ($dbDump as $line)

            @if (is_numeric(substr($line->commit_id, -1)) == 1)
                <tr class="x">
            @else
                <tr>
                    @endif
                    <td>{{ $line->committer_name }}</td>
                    <td>{{ $line->commit_id }}</td>
                </tr>
                @endforeach
        </tbody>
    </table>
</div>
@stop