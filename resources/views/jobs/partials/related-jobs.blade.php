<div class="mt-10 space-y-8">
    <h5 class="text-gray-900 dark:text-gray-50">Related Jobs</h5>

    @foreach ($relatedJobs as $job )
        
    
    <div class="relative overflow-hidden transition-all duration-500 ease-in-out bg-white border rounded-md border-gray-100/50 group group-data-[theme-color=violet]:hover:border-violet-500 group-data-[theme-color=sky]:hover:border-sky-500 group-data-[theme-color=red]:hover:border-red-500 group-data-[theme-color=green]:hover:border-green-500 group-data-[theme-color=pink]:hover:border-pink-500 group-data-[theme-color=blue]:hover:border-blue-500 hover:-translate-y-2 dark:bg-neutral-900 dark:border-neutral-600">
        <div class="p-6">
            <div class="grid grid-cols-12 gap-5">
                <div class="col-span-12 lg:col-span-1">
                    <div class="mb-4 text-center mb-md-0">
                        <a href="company-details.html"><img src="assets/images/featured-job/img-01.png" alt="" class="mx-auto img-fluid rounded-3"></a>
                    </div>
                </div>
                <!--end col-->
                <div class="col-span-12 lg:col-span-10">
                    <h5 class="mb-1 text-gray-900 fs-17"><a href="{{route('job-details',$job)}}" class="dark:text-gray-50">{{$job->title}}</a> 
                        <small class="font-normal text-gray-500 dark:text-gray-300">({{$job->experience}} Yrs Exp.)</small>
                    </h5>
                    <ul class="flex flex-wrap gap-3 mb-0">
                        <li>
                            <p class="mb-0 text-sm text-gray-500 dark:text-gray-300">{{$job->company->name}}</p>
                        </li>
                        <li>
                            <p class="mb-0 text-sm text-gray-500 dark:text-gray-300"><i class="mdi mdi-map-marker"></i> {{$job->location}}</p>
                        </li>
                        <li>
                            <p class="mb-0 text-sm text-gray-500 dark:text-gray-300"><i class="uil uil-wallet"></i> {{Number::currency($job->salary_range)}} / month</p>
                        </li>
                    </ul>
                    <div class="mt-4">
                        <div class="flex flex-wrap gap-1.5">
                            <span class="bg-green-500/20 text-green-500 text-11 px-2 py-0.5 font-medium rounded">{{$job->type}}</span>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
        <div class="px-4 py-3 bg-gray-50 dark:bg-neutral-700">
            <div class="grid grid-cols-12">
                <div class="col-span-12 lg:col-span-6">
                    <ul class="flex flex-wrap gap-2 text-gray-700 dark:text-gray-50">
                        <li><i class="uil uil-tag"></i> Category :</li>
                        <li><a href="{{route('categories.index', $job->category->slug)}}" class="text-gray-500 dark:text-gray-50">{{$job->category->name}}</a>,</li>
                        
                    </ul>
                </div>
                <!--end col-->
                <div class="col-span-12 mt-2 lg:col-span-6 lg:mt-0">
                    <div class="ltr:lg:text-end rtl:lg:text-start dark:text-gray-50">
                        <a href="#applyNow" data-bs-toggle="modal">Apply Now <i class="mdi mdi-chevron-double-right"></i></a>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <div class="absolute top-4 ltr:right-4 rtl:left-4">
            <div class="w-8 h-8 text-center text-gray-100 transition-all duration-300 bg-transparent border rounded border-gray-100/50 hover:bg-red-600 hover:text-white hover:border-transparent dark:border-zinc-700">
                <a href="javascript:void(0)"><i class="uil uil-heart-alt text-lg leading-[1.8]"></i></a>
            </div>
        </div>
    </div>
    @endforeach


    <div class="mt-4 text-center">
        <a href="{{route('job-lists')}}" class="font-medium text-gray-900 dark:text-gray-50">View More <i class="mdi mdi-arrow-right"></i></a>
    </div>
</div>