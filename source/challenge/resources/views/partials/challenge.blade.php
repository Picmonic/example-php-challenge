@extends ('layouts.master')

@section('title', 'Challenge')
@section('content')
    <div class="container">
        <div class="content">
            <div class="page-header"><h1>API Results<small> From https://github.com/nodejs/node</small></h1></div>
            <div class="panel panel-default">
                @if($alert)
                <div class="panel-heading">Current results, last updated {{ \Carbon\Carbon::parse($alert)->format('F j, Y \a\t g:i A') }}</div>
                <div class="panel-body">
                    <p>If you would like to retrieve new data, click the button below:</p>
                    <p><button id="newData" class="btn btn-success">Get New Data</button></p>
                </div>
                <table class="table">
                    <tr>
                        <th class="center">Commit Hash</th>
                        <th class="center">Commit Author</th>
                        <th class="center">Commit Date</th>
                    </tr>
                    @foreach($result as $row)
                        <tr class="{{ $row->commit_class }}">
                            <td>{{ $row->commit_hash }}</td>
                            <td>{{ $row->commit_author }}</td>
                            <td class="align-right">{{ \Carbon\Carbon::parse($row->commit_date)->format('F j, Y') }}</td>
                        </tr>
                    @endforeach
                </table>
                @else
                    <div class="panel-heading">
                        <p>Sorry, no data. This can occur under various circumstances.  You may click the button below to attempt to load data.</p>
                        <p><button id="newData" class="btn btn-danger">Get New Data</button></p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection