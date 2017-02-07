@extends('layout')

@section('content')
  
  <h1>Most recent joyent/node commits.</h1>
  <table id="commits-table" data-pagination="true" data-search="true" data-toggle="table" data-sort-name="User" data-sort-order="desc" data-sortable="true" class="table commit-table">
    <thead>
      <tr>
        <th data-sortable="true">Commit Hash</th>
        <th data-sortable="true">User</th>
        <th>Message</th>
        <th data-sortable="true">Date</th>
      </tr>
    </thead>
    <tbody>
      @foreach($commits as $commit)
        @if (is_numeric(substr($commit->sha, -1)))
          <tr class="light-blue">
        @else
          <tr>
        @endif
          <td>{{ $commit->sha }}</td>
          <td>{{ $commit->committer }}</td>
          <td>{{ $commit->message }}</td>
          <td>{{ $commit->date }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
@stop