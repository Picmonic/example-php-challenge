@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Commits</div>

                    <div class="panel-body">
                        <p><a href="/pull">Click to pull new data</a></p>

                        @if ($commits->count() > 0)
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Commit Date
                                    </th>
                                    <th>
                                        sha
                                    </th>
                                    <th>
                                        Author
                                    </th>
                                    <th>
                                        Message
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($commits as $commit)
                                @if (is_numeric(substr($commit->sha, -1)))
                                    <tr class="challenge-colored">
                                @else
                                    <tr>
                                @endif
                                        <td>
                                            {{ $commit->id }}
                                        </td>
                                        <td>
                                            {{ $commit->date }}
                                        </td>
                                        <td>
                                            {{--show only first 7 of hash--}}
                                            {{-- substr($commit->sha, 0, 7) --}}
                                            {{ $commit->sha }}
                                        </td>
                                        <td>
                                            <a href="/commits/view/{{$commit->author_id}}">{{ $commit->author->name }}</a>
                                        </td>
                                        <td>
                                            <a tabindex="0" role="button" class="btn btn-sm btn-default" data-container="body" data-toggle="popover" data-placement="right" data-trigger="focus" title="Commit Message" data-content="{{ $commit->message }}">
                                                Commit Message
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>No commits stored</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection