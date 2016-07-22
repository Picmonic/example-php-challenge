@extends('layouts.app')

@section('title', 'Author list')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Author list</div>

                <div class="panel-body">
                    @if ($authors->count() > 0)
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Login ID
                                    </th>
                                    <th>
                                        Emmail
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($authors as $author)
                                <tr>
                                    <td>
                                        {{ $author->id }}
                                    </td>
                                    <td>
                                        <a href="/commits/view/{{$author->id}}">{{ $author->name }}</a>
                                    </td>
                                    <td>
                                        {{ $author->login }}
                                    </td>
                                    <td>
                                        {{ $author->email }}
                                    </td>
                                    <td>
                                        {{-- $author->commit->get() --}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        No authors stored
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
