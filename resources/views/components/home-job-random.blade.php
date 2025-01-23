<!-- start job list -->
<section class="py-20 bg-gray-50 dark:bg-neutral-700">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 gap-5">
            <div class="mb-5 text-center">
                <h3 class="mb-3 text-3xl text-gray-900 dark:text-gray-50">New & Random Jobs</h3>
                <p class="mb-5 text-gray-500 whitespace-pre-line dark:text-gray-300">Post a job to tell us about your project. We'll quickly match you with the right <br> freelancers.</p>
            </div>
        </div>
        <div class="nav-tabs chart-tabpill">
            <div class="grid grid-cols-12">
                <div class="col-span-12 lg:col-span-8 lg:col-start-3">
                    <div class="p-1.5 bg-white dark:bg-neutral-900 shadow-lg shadow-gray-100/30 rounded-lg dark:shadow-neutral-700">
                        <ul class="items-center text-sm font-medium text-center text-gray-700 nav md:flex">
                            <li class="w-full">
                                <a href="javascript:void(0);" data-tw-toggle="tab" data-tw-target="recent-job" class="inline-block w-full py-[12px] px-[18px] dark:text-gray-50 active" aria-current="page">Recent</a>
                            </li>
                            @foreach ($jobTypes as $type)
                            <li class="w-full">
                                <a href="javascript:void(0);" data-tw-toggle="tab" data-tw-target="{{ Str::slug($type) }}" class="inline-block w-full py-[12px] px-[18px] dark:text-gray-50">{{ ucfirst($type) }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div class="block w-full tab-pane" id="recent-job">
                    <div class="pt-8 ">
                        <div class="space-y-8">
                        
                        @foreach ($recent_jobs as $recent_job)
                            <div class="relative mt-4 overflow-hidden transition-all duration-500 ease-in-out bg-white border rounded-md border-gray-100/50 group/jobs group-data-[theme-color=violet]:hover:border-violet-500 group-data-[theme-color=sky]:hover:border-sky-500 group-data-[theme-color=red]:hover:border-red-500 group-data-[theme-color=green]:hover:border-green-500 group-data-[theme-color=pink]:hover:border-pink-500 group-data-[theme-color=blue]:hover:border-blue-500 hover:-translate-y-2 dark:bg-neutral-900 dark:border-neutral-600 ">
                                    <div class="w-48 absolute -top-[5px] -left-20 -rotate-45 group-data-[theme-color=violet]:bg-violet-500/20 group-data-[theme-color=sky]:bg-sky-500/20 group-data-[theme-color=red]:bg-red-500/20 group-data-[theme-color=green]:bg-green-500/20 group-data-[theme-color=pink]:bg-pink-500/20 group-data-[theme-color=blue]:bg-blue-500/20 group-data-[theme-color=violet]:group-hover/jobs:bg-violet-500 group-data-[theme-color=sky]:group-hover/jobs:bg-sky-500 group-data-[theme-color=red]:group-hover/jobs:bg-red-500 group-data-[theme-color=green]:group-hover/jobs:bg-green-500 group-data-[theme-color=pink]:group-hover/jobs:bg-pink-500 group-data-[theme-color=blue]:group-hover/jobs:bg-blue-500 transition-all duration-500 ease-in-out p-[6px] text-center dark:bg-violet-500/20">
                                        <a href="javascript:void(0)" class="text-2xl text-white align-middle"><i class="mdi mdi-star"></i></a>
                                    </div>
                                    <div class="p-4">
                                        <div class="grid items-center grid-cols-12">
                                            <div class="col-span-12 lg:col-span-2">
                                                <div class="mb-4 text-center mb-md-0">
                                                    <a href="company-details.html"><img src="{{ asset('images/featured-job/img-' . sprintf('%02d', rand(1, 10)) . '.png') }}" alt="" class="mx-auto img-fluid rounded-3"></a>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-span-12 lg:col-span-3">
                                                <div class="mb-2 mb-md-0">
                                                    <h5 class="mb-1 fs-18">
                                                        <a href="{{route('job-details', $recent_job->id)}}" class="text-gray-900 dark:text-gray-50">{{$recent_job->title}}
                                                        </a>
                                                    </h5>
                                                    <a href="{{route('company.profile', ['slug' => $recent_job->company->slug])}}" class="text-gray-500 dark:text-gray-300">{{$recent_job->company->name}}</a>
                                                    
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-span-12 lg:col-span-3">
                                                <div class="mb-2 lg:flex">
                                                    <div class="flex-shrink-0">
                                                        <i class="mr-1 group-data-[theme-color=violet]:text-violet-500 group-data-[theme-color=sky]:text-sky-500 group-data-[theme-color=red]:text-red-500 group-data-[theme-color=green]:text-green-500 group-data-[theme-color=pink]:text-pink-500 group-data-[theme-color=blue]:text-blue-500 mdi mdi-map-marker"></i>
                                                    </div>
                                                    <p class="mb-0 text-gray-500 dark:text-gray-300">{{$recent_job->company->city}}, {{$recent_job->company->country}}</p>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-span-12 lg:col-span-2">
                                                <div>
                                                    <p class="mb-2 text-gray-500 dark:text-gray-300"><span class="group-data-[theme-color=violet]:text-violet-500 group-data-[theme-color=sky]:text-sky-500 group-data-[theme-color=red]:text-red-500 group-data-[theme-color=green]:text-green-500 group-data-[theme-color=pink]:text-pink-500 group-data-[theme-color=blue]:text-blue-500">$</span>{{$recent_job->salary_range}}/m</p>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-span-12 lg:col-span-2">
                                                <div class="flex flex-wrap gap-1.5">
                                                    <span class="badge bg-green-500/20 text-green-500 text-13 px-2 py-0.5 font-medium rounded">{{$recent_job->type}}</span>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <div class="p-3 bg-gray-50 dark:bg-neutral-700">
                                        <div class="grid grid-cols-12">
                                            <div class="col-span-12 lg:col-span-4">
                                                <div>
                                                    <p class="mb-0 text-gray-500 dark:text-gray-300"><span class="text-gray-900 dark:text-gray-50">Experience : </span>{{$recent_job->experience}} years</p>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-span-12 lg:col-span-6">
                                                
                                            </div>
                                            <!--end col-->
                                            <div class="col-span-3 lg:col-span-2">
                                                <div class="text-start text-md-end dark:text-gray-50">
                                                    <a href="#applyNow" data-bs-toggle="modal">Apply Now <i class="mdi mdi-chevron-double-right"></i></a>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>

                @foreach ($jobTypes as $type)
                <div class="hidden w-full tab-pane" id="{{ Str::slug($type) }}">
                    <div class="pt-8 ">
                        <div class="space-y-8">

                        @foreach ($jobsByType[$type] as $job)

                            <div class="relative mt-4 overflow-hidden transition-all duration-500 ease-in-out bg-white border rounded-md border-gray-100/50 group group-data-[theme-color=sky]:hover:border-sky-500 group-data-[theme-color=red]:hover:border-red-500 group-data-[theme-color=green]:hover:border-green-500 group-data-[theme-color=pink]:hover:border-pink-500 group-data-[theme-color=blue]:hover:border-blue-500 hover:-translate-y-2 dark:bg-neutral-900 dark:border-neutral-600 dark:hover:bg-violet-500">
                                <div class="w-48 absolute -top-[5px] -left-20 -rotate-45 group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500 p-[6px] text-center">
                                    <a href="javascript:void(0)" class="text-2xl text-white align-middle"><i class="mdi mdi-star"></i></a>
                                </div>
                                <div class="p-4">
                                    <div class="grid items-center grid-cols-12">
                                        <div class="col-span-12 lg:col-span-2">
                                            <div class="mb-4 text-center mb-md-0">
                                                <a href="company-details.html"><img src="{{ asset('images/featured-job/img-' . sprintf('%02d', rand(1, 10)) . '.png') }}" alt="" class="mx-auto img-fluid rounded-3"></a>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-span-12 lg:col-span-3">
                                            <div class="mb-2 mb-md-0">
                                                <h5 class="mb-1 fs-18"><a href="{{route('job-details', $job->id)}}" class="text-gray-900 dark:text-gray-50">{{$job->title}}</a>
                                                </h5>
                                                <a href="{{route('company.profile', ['slug' => $job->company->slug])}}" class="text-gray-500 dark:text-gray-300">{{$job->company->name}}</a>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-span-12 lg:col-span-3">
                                            <div class="mb-2 lg:flex">
                                                <div class="flex-shrink-0">
                                                    <i class="mr-1 group-data-[theme-color=violet]:text-violet-500 group-data-[theme-color=sky]:text-sky-500 group-data-[theme-color=red]:text-red-500 group-data-[theme-color=green]:text-green-500 group-data-[theme-color=pink]:text-pink-500 group-data-[theme-color=blue]:text-blue-500 mdi mdi-map-marker"></i>
                                                </div>
                                                <p class="mb-0 text-gray-500 dark:text-gray-300">{{$job->company->city}}, {{$job->company->country}}</p>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-span-12 lg:col-span-2">
                                            <div>
                                                <p class="mb-2 text-gray-500 dark:text-gray-300"><span class="group-data-[theme-color=violet]:text-violet-500 group-data-[theme-color=sky]:text-sky-500 group-data-[theme-color=red]:text-red-500 group-data-[theme-color=green]:text-green-500 group-data-[theme-color=pink]:text-pink-500 group-data-[theme-color=blue]:text-blue-500">$</span>{{$job->salary_range}}/m</p>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-span-12 lg:col-span-2">
                                            <div class="flex flex-wrap gap-2">
                                                <span class="badge bg-green-500/20 text-green-500 text-13 px-2 py-0.5 font-medium rounded">{{$job->type}}</span>
                                                
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </div>
                                <div class="p-3 bg-gray-50 dark:bg-neutral-700">
                                    <div class="grid grid-cols-12">
                                        <div class="col-span-12 lg:col-span-4">
                                            <div>
                                                <p class="mb-0 text-gray-500 dark:text-gray-300"><span class="text-gray-900 dark:text-gray-50">Experience : </span> {{$job->experience}} years</p>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-span-12 lg:col-span-6">
                                            
                                        </div>
                                        <!--end col-->
                                        <div class="col-span-3 lg:col-span-2">
                                            <div class="text-start text-md-end dark:text-gray-50">
                                                <a href="#applyNow" data-bs-toggle="modal">Apply Now <i class="mdi mdi-chevron-double-right"></i></a>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </div>
                            </div>

                        @endforeach

                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>

        <div class="mt-8">
            <div class="grid grid-cols-1">
                <div class="text-center">
                    <a href="{{route('job-lists')}}" class="text-white border-transparent group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500 btn focus:ring focus:ring-custom-500/20">View More  <i class="uil uil-arrow-right ms-1"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end job list -->