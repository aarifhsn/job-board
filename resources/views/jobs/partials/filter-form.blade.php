<div data-tw-accordion="collapse">
    <div class="text-gray-700 accordion-item">
        <h6>
            <button type="button" class="flex items-center justify-between w-full px-4 py-2 font-medium text-left accordion-header group-data-[theme-color=violet]:bg-violet-500/20 group-data-[theme-color=sky]:bg-sky-500/20 group-data-[theme-color=red]:bg-red-500/20 group group-data-[theme-color=green]:bg-green-500/20 group-data-[theme-color=pink]:bg-pink-500/20 group-data-[theme-color=blue]:bg-blue-500/20 active">
                <span class="text-gray-900 dark:text-gray-50">Salart Range</span>
                <i class="mdi mdi-chevron-down text-xl group-[.active]:rotate-180 text-gray-900 dark:text-gray-50"></i>
            </button>
        </h6>
        <div class="block accordion-body">
            <div class="p-5">
                <div class="area-range">
                    <div class="mb-3 form-label dark:text-gray-300">Salary Range: {{Number::currency($job->salary_range)}}<span class="mt-2 example-val" id="slider1-span">9.00</span></div>
                    <div id="slider1" class="noUi-target noUi-ltr noUi-horizontal noUi-txt-dir-ltr"> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div data-tw-accordion="collapse">
    <div class="text-gray-700 accordion-item dark:text-gray-300">
        <h6>
            <button type="button" class="flex items-center justify-between w-full px-4 py-2 font-medium text-left accordion-header group-data-[theme-color=violet]:bg-violet-500/20  group active">
                <span class="text-gray-900 text-15 dark:text-gray-50"> Work experience</span>
                <i class="mdi mdi-chevron-down text-xl group-[.active]:rotate-180 text-gray-900 dark:text-gray-50"></i>
            </button>
        </h6>
        <div class="block accordion-body">
            <div class="p-5">

                @foreach ($job_experiences as $job_experience)
             
                <div class="mt-2">
                    <input class="rounded cursor-pointer group-data-[theme-color=violet]:checked:bg-violet-500  dark:bg-neutral-600 dark:checked:bg-violet-500/20" type="checkbox" value="{{$job_experience->experience}}" id="flexCheckChecked1">
                    <label class="text-gray-500 cursor-pointer ltr:ml-2 rtl:mr-2 dark:text-gray-300">{{$job_experience->experience}} Years</label>
                </div>

                @endforeach
            </div>
        </div>
    </div>
</div>
<div data-tw-accordion="collapse">
    <div class="text-gray-700 accordion-item dark:text-gray-300">
        <h6>
            <button type="button" class="flex items-center justify-between w-full px-4 py-2 font-medium text-left accordion-header group-data-[theme-color=violet]:bg-violet-500/20  group active">
                <span class="text-gray-900 text-15 dark:text-gray-50">Type of employment</span>
                <i class="mdi mdi-chevron-down text-xl group-[.active]:rotate-180 text-gray-900 dark:text-gray-50"></i>
            </button>
        </h6>
        <div class="block accordion-body">
            <div class="p-5">
                
            @foreach ($job_types as $job_type )

                <div class="mt-2">
                    <input class="cursor-pointer " type="radio" name="job_type" value="{{$job_type->type}}" id="flexCheckChecked1">
                    <label class="text-gray-500 cursor-pointer ltr:ml-2 rtl:mr-2 dark:text-gray-300">{{$job_type->type}}</label>
                </div>

            @endforeach
            
        </div>
        </div>
    </div>
</div>
<div data-tw-accordion="collapse">
    <div class="text-gray-700 accordion-item dark:text-gray-300">
        <h6>
            <button type="button" class="flex items-center justify-between w-full px-4 py-2 font-medium text-left accordion-header group-data-[theme-color=violet]:bg-violet-500/20 group-data-[theme-color=sky]:bg-sky-500/20 group-data-[theme-color=red]:bg-red-500/20 group group-data-[theme-color=green]:bg-green-500/20 group-data-[theme-color=pink]:bg-pink-500/20 group-data-[theme-color=blue]:bg-blue-500/20 group active">
                <span class="text-gray-900 text-15 dark:text-gray-50">Date Posted</span>
                <i class="mdi mdi-chevron-down text-xl group-[.active]:rotate-180 text-gray-900 dark:text-gray-50"></i>
            </button>
        </h6>
        <div class="block accordion-body">
            <div class="p-5">
                <div class="mt-2">
                    <input class="rounded cursor-pointer group-data-[theme-color=violet]:checked:bg-violet-500 group-data-[theme-color=sky]:checked:bg-sky-500 group-data-[theme-color=red]:checked:bg-red-500 group-data-[theme-color=green]:checked:bg-green-500 group-data-[theme-color=pink]:checked:bg-pink-500 group-data-[theme-color=blue]:checked:bg-blue-500 focus:ring-0 focus:ring-offset-0 dark:bg-zinc-600 dark:checked:bg-violet-500/20" type="checkbox" value="" id="flexCheckChecked1">
                    <label class="text-gray-500 cursor-pointer ltr:ml-2 rtl:mr-2 dark:text-gray-300">All</label>
                </div>
                <div class="mt-2">
                    <input class="rounded cursor-pointer group-data-[theme-color=violet]:checked:bg-violet-500 group-data-[theme-color=sky]:checked:bg-sky-500 group-data-[theme-color=red]:checked:bg-red-500 group-data-[theme-color=green]:checked:bg-green-500 group-data-[theme-color=pink]:checked:bg-pink-500 group-data-[theme-color=blue]:checked:bg-blue-500 focus:ring-0 focus:ring-offset-0 dark:bg-zinc-600 dark:checked:bg-violet-500/20" checked type="checkbox" value="" id="flexCheckChecked1">
                    <label class="text-gray-500 cursor-pointer ltr:ml-2 rtl:mr-2 dark:text-gray-300">Last Hour</label>
                </div>
                <div class="mt-2">
                    <input class="rounded cursor-pointer group-data-[theme-color=violet]:checked:bg-violet-500 group-data-[theme-color=sky]:checked:bg-sky-500 group-data-[theme-color=red]:checked:bg-red-500 group-data-[theme-color=green]:checked:bg-green-500 group-data-[theme-color=pink]:checked:bg-pink-500 group-data-[theme-color=blue]:checked:bg-blue-500 focus:ring-0 focus:ring-offset-0 dark:bg-zinc-600 dark:checked:bg-violet-500/20" type="checkbox" value="" id="flexCheckChecked1">
                    <label class="text-gray-500 cursor-pointer ltr:ml-2 rtl:mr-2 dark:text-gray-300">Last 24 hours</label>
                </div>
                <div class="mt-2">
                    <input class="rounded cursor-pointer group-data-[theme-color=violet]:checked:bg-violet-500 group-data-[theme-color=sky]:checked:bg-sky-500 group-data-[theme-color=red]:checked:bg-red-500 group-data-[theme-color=green]:checked:bg-green-500 group-data-[theme-color=pink]:checked:bg-pink-500 group-data-[theme-color=blue]:checked:bg-blue-500 focus:ring-0 focus:ring-offset-0 dark:bg-zinc-600 dark:checked:bg-violet-500/20" type="checkbox" value="" id="flexCheckChecked1">
                    <label class="text-gray-500 cursor-pointer ltr:ml-2 rtl:mr-2 dark:text-gray-300">Last 7 days</label>
                </div>
                <div class="mt-2">
                    <input class="rounded cursor-pointer group-data-[theme-color=violet]:checked:bg-violet-500 group-data-[theme-color=sky]:checked:bg-sky-500 group-data-[theme-color=red]:checked:bg-red-500 group-data-[theme-color=green]:checked:bg-green-500 group-data-[theme-color=pink]:checked:bg-pink-500 group-data-[theme-color=blue]:checked:bg-blue-500 focus:ring-0 focus:ring-offset-0 dark:bg-zinc-600 dark:checked:bg-violet-500/20" type="checkbox" value="" id="flexCheckChecked1">
                    <label class="text-gray-500 cursor-pointer ltr:ml-2 rtl:mr-2 dark:text-gray-300">Last 14 days</label>
                </div>
                <div class="mt-2">
                    <input class="rounded cursor-pointer group-data-[theme-color=violet]:checked:bg-violet-500 group-data-[theme-color=sky]:checked:bg-sky-500 group-data-[theme-color=red]:checked:bg-red-500 group-data-[theme-color=green]:checked:bg-green-500 group-data-[theme-color=pink]:checked:bg-pink-500 group-data-[theme-color=blue]:checked:bg-blue-500 focus:ring-0 focus:ring-offset-0 dark:bg-zinc-600 dark:checked:bg-violet-500/20" type="checkbox" value="" id="flexCheckChecked1">
                    <label class="text-gray-500 cursor-pointer ltr:ml-2 rtl:mr-2 dark:text-gray-300">Last 30 days</label>
                </div>
            </div>
        </div>
    </div>
</div>