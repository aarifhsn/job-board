@extends('layouts.app')

@section('content')

<section class="py-16">
    <div class="container mx-auto">
        
        <div class="grid items-center grid-cols-12 gap-8 mt-8">
        
        @foreach($articles as $article)
            <div class="col-span-12 lg:col-span-6 px-12 text-gray-500 dark:text-gray-300">
                <h3 class="mb-3 text-gray-900 dark:text-gray-50"><a href="{{$article['link']}}">{{ $article['title'] }}</a></h3>
                <p class="text-gray-500 dark:text-gray-300">
                    {!! $article['description'] !!}
                </p>
                <a href="{{$article['link']}}" class="inline-block mt-3 text-blue-500 dark:text-blue-400">Read More</a>

            </div><!--end col-->
        @endforeach
        </div>
    </div>
</section>

@endsection