@extends('layouts.app')

@section('content')
    <h1>Search Results</h1>

    @if ($jobs->count())
        <ul>
            @foreach ($jobs as $job)
                <li>
                    <h3>{{ $job->title }}</h3>
                    <p>{{ $job->company->name }} - {{ $job->company->country }}</p>
                    <a href="#">View Details</a>
                </li>
            @endforeach
        </ul>

        {{ $jobs->links() }}
    @else
        <p>No jobs found matching your criteria.</p>
    @endif
@endsection
