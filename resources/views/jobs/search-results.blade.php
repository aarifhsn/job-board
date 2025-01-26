@extends('layouts.app')

@section('content')
    <!-- Start team -->
        <section class="pt-44 pb-24">
            <div class="container mx-auto">
                <div class="grid grid-cols-12 gap-y-10 lg:gap-10">
                    <div class="col-span-12 xl:col-span-9 pb-12">
                        <div class="job-list-header">
                            <form action="{{ route('jobs.search') }}" method="GET">
                                <div class="grid grid-cols-12 gap-3">
                                    <div class="col-span-12 xl:col-span-4">
                                        <div class="relative filler-job-form">
                                            <i class="uil uil-briefcase-alt"></i>
                                            <input type="search" name="search" class="w-full filter-job-input-box dark:text-gray-100" id="exampleFormControlInput1" placeholder="Job, company... " value="{{ request('search') }}">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-span-12 xl:col-span-4">
                                        <div class="relative filler-job-form">
                                            <i class="uil uil-location-point"></i>
                                            <select class="form-select" data-trigger name="country" id="choices-single-location" aria-label="Default select example">
                                                <option value="0" selected>Location</option>
                                                @foreach (config('countries') as $code => $name)
                                                <option value="{{ $code }}" {{ request('country') == $code ? 'selected' : '' }}>{{ $name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <!--end col-->
                                    <div class="col-span-12 xl:col-span-4">
                                        <button class="w-full text-white border-transparent btn group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500 focus:ring focus:ring-custom-500/30" type="submit"><i class="uil uil-filter"></i> Find Job</button>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end grid-->
                            </form>
                        </div>

                        <div class="mt-14">
                        @if ($jobs->count() > 0)
                            @foreach ($jobs as $job )
                                <div class="relative mt-4 overflow-hidden transition-all duration-500 ease-in-out bg-white border rounded-md border-gray-100/50 group/job group-data-[theme-color=violet]:hover:border-violet-500 group-data-[theme-color=sky]:hover:border-sky-500  hover:-translate-y-2 dark:bg-neutral-900 dark:border-neutral-600">
                                    <div class="w-48 absolute -top-[5px] -left-20 -rotate-45 group-data-[theme-color=violet]:bg-violet-500/20  transition-all duration-500 ease-in-out p-[6px] text-center dark:bg-violet-500/20">
                                        <a href="javascript:void(0)" class="text-2xl text-white align-middle"><i class="mdi mdi-star"></i></a>
                                    </div>
                                    <div class="p-4">
                                        <div class="grid items-center grid-cols-12">
                                            <div class="col-span-12 lg:col-span-2">
                                                <div class="mb-4 text-center mb-md-0">
                                                    <a href="company-details.html"><img src="assets/images/featured-job/img-01.png" alt="" class="mx-auto img-fluid rounded-3"></a>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-span-12 lg:col-span-3">
                                                <div class="mb-2 mb-md-0">
                                                    <h5 class="font-bold mb-1 fs-18"><a href="job-details.html" class="text-gray-900 dark:text-gray-50">{{$job->title}}</a>
                                                    </h5>
                                                    <p class="mb-0 text-gray-500 fs-14 dark:text-gray-300">{{$job->company->name}}</p>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-span-12 lg:col-span-3">
                                                <div class="mb-2 lg:flex">
                                                    <div class="flex-shrink-0">
                                                        <i class="mr-1 mdi mdi-map-marker group-data-[theme-color=violet]:text-violet-500 group-data-[theme-color=sky]:text-sky-500 group-data-[theme-color=red]:text-red-500 group-data-[theme-color=green]:text-green-500 group-data-[theme-color=pink]:text-pink-500 group-data-[theme-color=blue]:text-blue-500"></i>
                                                    </div>
                                                    <p class="mb-0 text-gray-500 dark:text-gray-300">{{$job->company->city}}, {{$job->company->country}}</p>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-span-12 lg:col-span-2">
                                                <div>
                                                    <p class="mb-0 text-gray-500 dark:text-gray-300"> <i class="mr-1 uil uil-clock-three group-data-[theme-color=violet]:text-violet-500 group-data-[theme-color=sky]:text-sky-500 group-data-[theme-color=red]:text-red-500 group-data-[theme-color=green]:text-green-500 group-data-[theme-color=pink]:text-pink-500 group-data-[theme-color=blue]:text-blue-500"></i> {{$job->created_at->diffForHumans()}}</p>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-span-12 lg:col-span-2">
                                                <div class="flex flex-wrap gap-1.5">
                                                    <span class="bg-green-500/20 text-green-500 text-13 px-2 py-0.5 font-medium rounded capitalize">{{$job->type}}</span>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <div class="px-4 py-3 bg-gray-50 dark:bg-neutral-700">
                                        <div class="grid grid-cols-12">
                                            <div class="col-span-12 lg:col-span-6">
                                                <div>
                                                    <p class="mb-0 text-gray-500 dark:text-gray-300"><span class="font-medium text-gray-900 dark:text-gray-50">Experience : </span>{{$job->experience}} years</p>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-span-12 mt-2 lg:col-span-6 lg:mt-0">
                                                <div class="ltr:lg:text-right rtl:lg:text-left dark:text-gray-50">
                                                    <a href="#applyNow" data-bs-toggle="modal">Apply Now <i class="mdi mdi-chevron-double-right"></i></a>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="text-center">
                                <h2 class="text-2xl font-semibold text-gray-900 dark:text-gray-50">{{ __('messages.no_jobs_found') }}</h2>
                            </div>
                        @endif
                        </div>

                        
                    </div>
                    <div class="col-span-12 space-y-5 lg:col-span-3">
                        
                        @include('jobs.partials.filter-form')
                        
                        <div data-tw-accordion="collapse">
                            <div class="text-gray-700 accordion-item dark:text-gray-300">
                                <h6>
                                    <button type="button" class="flex items-center justify-between w-full px-4 py-2 font-medium text-left accordion-header group-data-[theme-color=violet]:bg-violet-500/20 group-data-[theme-color=sky]:bg-sky-500/20 group-data-[theme-color=red]:bg-red-500/20 group group-data-[theme-color=green]:bg-green-500/20 group-data-[theme-color=pink]:bg-pink-500/20 group-data-[theme-color=blue]:bg-blue-500/20 group active">
                                        <span class="text-gray-900 text-15 dark:text-gray-50">Tags Cloud</span>
                                        <i class="mdi mdi-chevron-down text-xl group-[.active]:rotate-180 text-gray-900 dark:text-gray-50"></i>
                                    </button>
                                </h6>
                                <div class="block accordion-body">
                                    <div class="flex flex-wrap gap-2 p-5">
                                        @foreach ($tags as $tag)
                                        <a href="{{ route('tags.index', ['name' => $tag->name]) }}" class="bg-gray-50 text-13 rounded px-2 py-0.5 font-medium text-gray-500 transition-all duration-300 ease-in-out dark:text-gray-50 dark:bg-neutral-600/40">{{ $tag->name }}</a>
                                        @endforeach
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- End team -->
        
@endsection
