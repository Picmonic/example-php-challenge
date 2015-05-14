@extends('app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1>Commits by "{{ $user }}":</h1>

            @foreach($commits as $index=> $commit)
                <div class="well">
                    <h2>
                        {{ $index + 1 }}.
                        @if(is_numeric(substr($commit['sha'], -1, 1)))
                            <span style="color: darkblue;">
                            Date: {{ date(" d M Y a\t H:i a", strtotime($commit['commit']['author']['date'])) }}
                        </span>
                        @else
                            Date: {{ date(" d M Y a\t H:i a", strtotime($commit['commit']['author']['date'])) }}
                        @endif
                    </h2>
                    <ul>
                        <li> {!! Html::link($commit['html_url'], 'Commit URL') !!}</li>
                    </ul>
                    <p>
                        Details:<br />
                        {{ $commit['commit']['message'] }}
                    </p>

                </div>
            @endforeach


        </div>
    </div>

@endsection