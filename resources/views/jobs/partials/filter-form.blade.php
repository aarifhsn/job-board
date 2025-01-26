<form action="{{ route('jobs.filter') }}" method="GET">
    <div data-tw-accordion="collapse">
        <div class="text-gray-700 accordion-item">
            <button
                class="w-full text-black border-transparent btn group-data-[theme-color=violet]:bg-violet-300 focus:ring focus:ring-custom-500/30 mb-6"
                type="submit"><i class="uil uil-filter"></i> Filter Job</button>
            <h6>
                <button type="button"
                    class="flex items-center justify-between w-full px-4 py-2 font-medium text-left accordion-header group-data-[theme-color=violet]:bg-violet-500/20  active">
                    <span class="text-gray-900 dark:text-gray-50">Salary Range</span>
                    <i
                        class="mdi mdi-chevron-down text-xl group-[.active]:rotate-180 text-gray-900 dark:text-gray-50"></i>
                </button>
            </h6>

            <div class="block accordion-body">

                <div class="p-5">
                    <div class="area-range">
                        <label for="default-range"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Amount: 0 -100</label>
                        <input id="default-range" type="range" name="salary_range" value="50"
                            class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div data-tw-accordion="collapse">
        <div class="text-gray-700 accordion-item dark:text-gray-300">
            <h6>
                <button type="button"
                    class="flex items-center justify-between w-full px-4 py-2 font-medium text-left accordion-header group-data-[theme-color=violet]:bg-violet-500/20  group active">
                    <span class="text-gray-900 text-15 dark:text-gray-50"> Work experience</span>
                    <i
                        class="mdi mdi-chevron-down text-xl group-[.active]:rotate-180 text-gray-900 dark:text-gray-50"></i>
                </button>
            </h6>
            <div class="block accordion-body">
                <div class="p-5">

                    @foreach ($job_experiences as $job_experience)

                        <div class="mt-2">
                            <input
                                class="rounded cursor-pointer group-data-[theme-color=violet]:checked:bg-violet-500  dark:bg-neutral-600 dark:checked:bg-violet-500/20"
                                type="checkbox" name="job_experience[]" value="{{$job_experience->experience}}"
                                {{ is_array(request('work_experience')) && in_array($job_experience->experience, request('work_experience')) ? 'checked' : '' }}>
                            <label
                                class="text-gray-500 cursor-pointer ltr:ml-2 rtl:mr-2 dark:text-gray-300">{{$job_experience->experience}}
                                Years</label>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div data-tw-accordion="collapse">
        <div class="text-gray-700 accordion-item dark:text-gray-300">
            <h6>
                <button type="button"
                    class="flex items-center justify-between w-full px-4 py-2 font-medium text-left accordion-header group-data-[theme-color=violet]:bg-violet-500/20  group active">
                    <span class="text-gray-900 text-15 dark:text-gray-50">Type of employment</span>
                    <i
                        class="mdi mdi-chevron-down text-xl group-[.active]:rotate-180 text-gray-900 dark:text-gray-50"></i>
                </button>
            </h6>
            <div class="block accordion-body">
                <div class="p-5">

                    @foreach ($job_types as $job_type)
                        <div class="mt-2">
                            <input class="cursor-pointer " type="radio" name="job_type" value="{{$job_type->type}}"
                            {{ request('job_type') === $job_type->type ? 'checked' : '' }}>
                            <label
                                class="text-gray-500 cursor-pointer ltr:ml-2 rtl:mr-2 dark:text-gray-300">{{$job_type->type}}</label>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <div data-tw-accordion="collapse">
        <div class="text-gray-700 accordion-item dark:text-gray-300">
            <h6>
                <button type="button"
                    class="flex items-center justify-between w-full px-4 py-2 font-medium text-left accordion-header group-data-[theme-color=violet]:bg-violet-500/20  active">
                    <span class="text-gray-900 text-15 dark:text-gray-50">Date Posted</span>
                    <i
                        class="mdi mdi-chevron-down text-xl group-[.active]:rotate-180 text-gray-900 dark:text-gray-50"></i>
                </button>
            </h6>
            <div class="block accordion-body">
                <div class="p-5">
                    <div class="mt-2">
                        <input
                            class="rounded cursor-pointer group-data-[theme-color=violet]:checked:bg-violet-500"
                            type="checkbox" name="date_posted[]" value="all_date" id="flexCheckChecked1">
                        <label class="text-gray-500 cursor-pointer ltr:ml-2 rtl:mr-2 dark:text-gray-300">All</label>
                    </div>
                    <div class="mt-2">
                        <input
                            class="rounded cursor-pointer group-data-[theme-color=violet]:checked:bg-violet-500"
                            checked type="checkbox" value="" id="flexCheckChecked1">
                        <label class="text-gray-500 cursor-pointer ltr:ml-2 rtl:mr-2 dark:text-gray-300">Last
                            Hour</label>
                    </div>
                    <div class="mt-2">
                        <input
                            class="rounded cursor-pointer group-data-[theme-color=violet]:checked:bg-violet-500"
                            type="checkbox" name="date_posted[]" value="last_hour" {{ is_array(request('date_posted')) && in_array('last_hour', request('date_posted')) ? 'checked' : '' }} id="flexCheckChecked1">
                        <label class="text-gray-500 cursor-pointer ltr:ml-2 rtl:mr-2 dark:text-gray-300">Last 24
                            hours</label>
                    </div>
                    <div class="mt-2">
                        <input
                            class="rounded cursor-pointer group-data-[theme-color=violet]:checked:bg-violet-500"
                            type="checkbox" name="date_posted[]" value="last_7_days" {{ is_array(request('date_posted')) && in_array('last_7_days', request('date_posted')) ? 'checked' : '' }} id="flexCheckChecked1">
                        <label class="text-gray-500 cursor-pointer ltr:ml-2 rtl:mr-2 dark:text-gray-300">Last 7
                            days</label>
                    </div>
                    <div class="mt-2">
                        <input
                            class="rounded cursor-pointer group-data-[theme-color=violet]:checked:bg-violet-500"
                            type="checkbox" name="date_posted[]" value="last_14_days"
                            {{ is_array(request('date_posted')) && in_array('last_14_days', request('date_posted')) ? 'checked' : '' }} id="flexCheckChecked1">
                        <label class="text-gray-500 cursor-pointer ltr:ml-2 rtl:mr-2 dark:text-gray-300">Last 14
                            days</label>
                    </div>
                    <div class="mt-2">
                        <input
                            class="rounded cursor-pointer group-data-[theme-color=violet]:checked:bg-violet-500"
                            type="checkbox" name="date_posted[]" value="last_30_days" {{ is_array(request('date_posted')) && in_array('last_30_days', request('date_posted')) ? 'checked' : '' }}" id="flexCheckChecked1">
                        <label class="text-gray-500 cursor-pointer ltr:ml-2 rtl:mr-2 dark:text-gray-300">Last 30
                            days</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>