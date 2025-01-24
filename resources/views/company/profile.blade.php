@extends('layouts.app')

@section('content')

    <!-- Start grid -->
    <section class="pt-44 pb-20">
        <div class="container mx-auto">
            <div class="grid grid-cols-12 gap-y-10 lg:gap-10">
                <div class="col-span-12 lg:col-span-4">
                    <div
                        class="border rounded border-gray-100/50 dark:border-neutral-600"
                    >
                        <div
                            class="p-5 border-b border-gray-100/50 dark:border-neutral-600"
                        >
                            <div class="text-center">
                                <img
                                    src="{{asset('images/featured-job/img-01.png')}}"
                                    alt=""
                                    class="w-20 h-20 mx-auto rounded-full"
                                />
                                <h6
                                    class="mt-4 mb-0 text-lg text-gray-900 dark:text-gray-50"
                                >
                                    {{$company->name}}
                                </h6>
                                <p
                                    class="mb-4 text-gray-500 dark:text-gray-300"
                                >
                                    {{$company->industry}}
                                </p>
                                <ul
                                    class="flex flex-wrap justify-center gap-4"
                                >
                                    <li
                                        class="h-10 w-10 text-center leading-[2.2] bg-gray-50 rounded-full text-lg text-gray-500 group-data-[theme-color=violet]:hover:bg-violet-500 hover:text-white cursor-pointer transition-all duration-300 ease-in dark:bg-neutral-700 dark:text-white dark:hover:bg-violet-500/20"
                                    >
                                        <a
                                            href="javascript:void(0)"
                                            class="social-link"
                                            ><i
                                                class="uil uil-twitter-alt"
                                            ></i
                                        ></a>
                                    </li>
                                    <li
                                        class="h-10 w-10 text-center leading-[2.2] bg-gray-50 rounded-full text-lg text-gray-500 group-data-[theme-color=violet]:hover:bg-violet-500  cursor-pointer transition-all duration-300 ease-in dark:bg-neutral-700 dark:text-white dark:hover:bg-violet-500/20"
                                    >
                                        <a
                                            href="javascript:void(0)"
                                            class="social-link"
                                            ><i
                                                class="uil uil-whatsapp"
                                            ></i
                                        ></a>
                                    </li>
                                    <li
                                        class="h-10 w-10 text-center leading-[2.2] bg-gray-50 rounded-full text-lg text-gray-500 group-data-[theme-color=violet]:hover:bg-violet-500  hover:text-white cursor-pointer transition-all duration-300 ease-in dark:bg-neutral-700 dark:text-white dark:hover:bg-violet-500/20"
                                    >
                                        <a
                                            href="javascript:void(0)"
                                            class="social-link"
                                            ><i
                                                class="uil uil-phone-alt"
                                            ></i
                                        ></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div
                            class="p-5 border-b border-gray-100/50 dark:border-neutral-600"
                        >
                            <h6
                                class="mb-5 font-semibold text-gray-900 text-17 dark:text-gray-50"
                            >
                                Profile Overview
                            </h6>
                            <ul class="space-y-4">
                                <li>
                                    <div class="flex flex-wrap">
                                        <label
                                            class="text-gray-900 w-[118px] font-medium dark:text-gray-50"
                                            >Owner Name</label
                                        >
                                        <div>
                                            <p
                                                class="mb-0 text-gray-500 dark:text-gray-300"
                                            >
                                                Charles Dickens
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex flex-wrap">
                                        <label
                                            class="text-gray-900 w-[118px] font-medium dark:text-gray-50"
                                            >Employees</label
                                        >
                                        <div>
                                            <p
                                                class="mb-0 text-gray-500 dark:text-gray-300"
                                            >
                                                1500 - 1850
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex flex-wrap">
                                        <label
                                            class="text-gray-900 w-[118px] font-medium dark:text-gray-50"
                                            >Location</label
                                        >
                                        <div>
                                            <p
                                                class="mb-0 text-gray-500 dark:text-gray-300"
                                            >
                                                {{$company->country}}
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex flex-wrap">
                                        <label
                                            class="text-gray-900 w-[118px] font-medium dark:text-gray-50"
                                            >Website</label
                                        >
                                        <div>
                                            <p
                                                class="mb-0 text-gray-500 dark:text-gray-300"
                                            >
                                                {{$company->website}}
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex flex-wrap">
                                        <label
                                            class="text-gray-900 w-[118px] font-medium dark:text-gray-50"
                                            >Established</label
                                        >
                                        <div>
                                            <p
                                                class="mb-0 text-gray-500 dark:text-gray-300"
                                            >
                                                July 10 2017
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex flex-wrap">
                                        <label
                                            class="text-gray-900 w-[118px] font-medium dark:text-gray-50"
                                            >Views</label
                                        >
                                        <div>
                                            <p
                                                class="mb-0 text-gray-500 dark:text-gray-300"
                                            >
                                                2574
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="mt-8">
                                <a
                                    href="javascript:void(0)"
                                    class="btn w-full bg-red-600 border-transparent text-white hover:-translate-y-1.5"
                                    ><i class="uil uil-phone"></i>
                                    Contact</a
                                >
                            </div>
                        </div>
                        <div
                            class="p-5 border-b border-gray-100/50 dark:border-neutral-600"
                        >
                            <h6
                                class="mb-3 font-semibold text-gray-900 text-17 dark:text-gray-50"
                            >
                                Working Days
                            </h6>
                            <div>
                                <ul class="space-y-3 text-gray-900">
                                    <li
                                        class="text-gray-900 dark:text-gray-50"
                                    >
                                        Monday<span
                                            class="text-gray-500 ltr:float-right rtl:float-left text-13 dark:text-gray-300"
                                            >9AM - 5PM</span
                                        >
                                    </li>
                                    <li
                                        class="text-gray-900 dark:text-gray-50"
                                    >
                                        Tuesday<span
                                            class="text-gray-500 ltr:float-right rtl:float-left text-13 dark:text-gray-300"
                                            >9AM - 5PM</span
                                        >
                                    </li>
                                    <li
                                        class="text-gray-900 dark:text-gray-50"
                                    >
                                        Wednesday<span
                                            class="text-gray-500 ltr:float-right rtl:float-left text-13 dark:text-gray-300"
                                            >9AM - 5PM</span
                                        >
                                    </li>
                                    <li
                                        class="text-gray-900 dark:text-gray-50"
                                    >
                                        Thursday<span
                                            class="text-gray-500 ltr:float-right rtl:float-left text-13 dark:text-gray-300"
                                            >9AM - 5PM</span
                                        >
                                    </li>
                                    <li
                                        class="text-gray-900 dark:text-gray-50"
                                    >
                                        Friday<span
                                            class="text-gray-500 ltr:float-right rtl:float-left text-13 dark:text-gray-300"
                                            >9AM - 5PM</span
                                        >
                                    </li>
                                    <li
                                        class="text-gray-900 dark:text-gray-50"
                                    >
                                        Saturday<span
                                            class="text-gray-500 ltr:float-right rtl:float-left text-13 dark:text-gray-300"
                                            >9AM - 5PM</span
                                        >
                                    </li>
                                    <li
                                        class="text-gray-900 dark:text-gray-50"
                                    >
                                        Sunday<span
                                            class="text-red-600 ltr:float-right rtl:float-left text-13"
                                            dark:text-gray-300
                                            >Close</span
                                        >
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="p-5">
                            <h6
                                class="mb-4 font-semibold text-gray-900 text-17 dark:text-gray-50"
                            >
                                Company Location
                            </h6>
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.15830869428!2d-74.119763973046!3d40.69766374874431!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sin!4v1628067715234!5m2!1sen!2sin"
                                style="width: 100%"
                                height="250"
                                allowfullscreen=""
                                loading="lazy"
                            ></iframe>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-8">
                    <div
                        class="p-6 border rounded border-gray-100/50 dark:border-neutral-600"
                    >
                        <div>
                            <h6
                                class="mb-3 text-gray-900 text-17 dark:text-gray-50"
                            >
                                About Company
                            </h6>
                            <p
                                class="mb-4 text-gray-500 dark:text-gray-300"
                            >
                                {{ $company->description }}
                            </p>
                        </div>
                        <div class="pt-8">
                            <h6
                                class="mb-5 text-gray-900 text-17 fw-bold dark:text-gray-50"
                            >
                                Gallery
                            </h6>
                            <div
                                class="grid grid-cols-12 gap-y-5 lg:gap-5"
                            >
                                <div class="col-span-6">
                                    <div
                                        class="relative overflow-hidden rounded-md group/gallery"
                                    >
                                        <img
                                            src="{{asset('images/blog/img-01.jpg')}}"
                                            alt=""
                                            class="transition-all duration-300 ease-in-out group-hover/gallery:scale-110"
                                        />
                                        <div
                                            class="transition-all duration-300 ease-in-out group-hover/gallery:bg-black/40 group-hover/gallery:absolute group-hover/gallery:inset-0"
                                        ></div>
                                        <div
                                            class="absolute top-[50%] left-[50%] -translate-x-5 -translate-y-5 group-hover/gallery:block hidden transition-all duration-300 ease-in-out text-2xl"
                                        >
                                            <a
                                                href="assets/images/blog/img-01.jpg"
                                                class="text-white image-popup"
                                                data-title="Project Leader"
                                                data-description="There are many variations of passages of available, but the majority alteration in some form."
                                                ><i
                                                    class="uil uil-search-alt"
                                                ></i
                                            ></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-span-6">
                                    <div
                                        class="relative overflow-hidden rounded-md group/gallery"
                                    >
                                        <img
                                            src="{{asset('images/blog/img-03.jpg')}}"
                                            alt=""
                                            class="transition-all duration-300 ease-in-out group-hover/gallery:scale-110"
                                        />
                                        <div
                                            class="transition-all duration-300 ease-in-out group-hover/gallery:bg-black/40 group-hover/gallery:absolute group-hover/gallery:inset-0"
                                        ></div>
                                        <div
                                            class="absolute top-[50%] left-[50%] -translate-x-5 -translate-y-5 group-hover/gallery:block hidden transition-all duration-300 ease-in-out text-2xl"
                                        >
                                            <a
                                                href="assets/images/blog/img-03.jpg"
                                                class="text-white image-popup"
                                                data-title="Project Leader"
                                                data-description="There are many variations of passages of available, but the majority alteration in some form."
                                                ><i
                                                    class="uil uil-search-alt"
                                                ></i
                                            ></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-span-12">
                                    <div
                                        class="relative overflow-hidden rounded-md group/gallery"
                                    >
                                        <img
                                            src="{{asset('images/blog/img-12.jpg')}}"
                                            alt=""
                                            class="transition-all duration-300 ease-in-out group-hover/gallery:scale-110"
                                        />
                                        <div
                                            class="transition-all duration-300 ease-in-out group-hover/gallery:bg-black/40 group-hover/gallery:absolute group-hover/gallery:inset-0"
                                        ></div>
                                        <div
                                            class="absolute top-[50%] left-[50%] -translate-x-5 -translate-y-5 group-hover/gallery:block hidden transition-all duration-300 ease-in-out text-2xl"
                                        >
                                            <a
                                                href="assets/images/blog/img-12.jpg"
                                                class="text-white image-popup"
                                                data-title="Project Leader"
                                                data-description="There are many variations of passages of available, but the majority alteration in some form."
                                                ><i
                                                    class="uil uil-search-alt"
                                                ></i
                                            ></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                        </div>
                        <div class="pt-10">
                            <h6
                                class="mb-0 text-gray-900 text-17 fw-bold dark:text-gray-50"
                            >
                                Current Opening
                            </h6>
                            <div class="mt-5 space-y-5">
                                @foreach ($company_jobs as $job)
                                <div
                                    class="relative overflow-hidden transition-all duration-500 ease-in-out bg-white border rounded-md border-gray-100/50 group group-data-[theme-color=violet]:hover:border-violet-500 group-data-[theme-color=sky]:hover:border-sky-500 group-data-[theme-color=red]:hover:border-red-500 group-data-[theme-color=green]:hover:border-green-500 group-data-[theme-color=pink]:hover:border-pink-500 group-data-[theme-color=blue]:hover:border-blue-500 hover:-translate-y-2 dark:bg-neutral-900 dark:border-neutral-600"
                                >
                                    <div class="p-6">
                                        <div
                                            class="grid grid-cols-12 gap-y-5 lg:gap-5"
                                        >
                                            <div
                                                class="col-span-12 lg:col-span-2"
                                            >
                                                <div
                                                    class="text-center"
                                                >
                                                    <a
                                                        href="company-details.html"
                                                        ><img
                                                            src="{{asset('images/featured-job/img-01.png')}}"
                                                            alt=""
                                                            class="md:mx-auto img-fluid rounded-3"
                                                    /></a>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div
                                                class="col-span-10"
                                            >
                                                <h5
                                                    class="mb-1 fs-17"
                                                >
                                                    <a
                                                        href="job-details.html"
                                                        class="text-gray-900 dark:text-gray-50"
                                                        >{{$job->title}}</a
                                                    >
                                                    <small
                                                        class="font-normal text-gray-500 dark:text-gray-300"
                                                        >({{$job->experience}} Yrs
                                                        Exp.)</small
                                                    >
                                                </h5>
                                                <ul
                                                    class="flex flex-wrap gap-3 mb-0"
                                                >
                                                    <li>
                                                        <p
                                                            class="mb-0 text-sm text-gray-500 dark:text-gray-300"
                                                        >
                                                            {{$job->company->name}}
                                                        </p>
                                                    </li>
                                                    <li>
                                                        <p
                                                            class="mb-0 text-sm text-gray-500 dark:text-gray-300"
                                                        >
                                                            <i
                                                                class="mdi mdi-map-marker"
                                                            ></i>
                                                            {{$job->city}}, {{$job->Country}}
                                                        </p>
                                                    </li>
                                                    <li>
                                                        <p
                                                            class="mb-0 text-sm text-gray-500 dark:text-gray-300"
                                                        >
                                                            <i
                                                                class="uil uil-wallet ltr:mr-2 rtl:ml-2"
                                                            ></i>
                                                            {{Number::currency($job->salary_range)}} /
                                                            month
                                                        </p>
                                                    </li>
                                                </ul>
                                                <div class="mt-4">
                                                    <div
                                                        class="flex flex-wrap gap-1.5"
                                                    >
                                                        <span
                                                            class="badge bg-green-500/20 text-green-500 text-11 px-2 py-0.5 font-medium rounded"
                                                            >{{$job->type}}</span
                                                        >
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <div
                                        class="px-4 py-3 bg-gray-50 dark:bg-neutral-700"
                                    >
                                        <div
                                            class="grid grid-cols-12"
                                        >
                                            <div
                                                class="col-span-12 lg:col-span-6"
                                            >
                                                <ul
                                                    class="flex flex-wrap gap-2 text-gray-700 dark:text-gray-50"
                                                >
                                                    <li>
                                                        <i
                                                            class="uil uil-tag"
                                                        ></i>
                                                        Keywords :
                                                    </li>
                                                    @foreach ($job->tag as $each_tag)
                                                    <li>
                                                        <a
                                                            href="javascript:void(0)"
                                                            class="primary-link text-muted"
                                                            >{{$each_tag->name}}</a
                                                        >
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <!--end col-->
                                            <div
                                                class="col-span-12 mt-2 lg:col-span-6 lg:mt-0"
                                            >
                                                <div
                                                    class="ltr:lg:text-right rtl:lg:text-left dark:text-gray-50"
                                                >
                                                    <a
                                                        href="#applyNow"
                                                        data-bs-toggle="modal"
                                                        >Apply Now
                                                        <i
                                                            class="mdi mdi-chevron-double-right"
                                                        ></i
                                                    ></a>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <div
                                        class="absolute top-4 ltr:right-4 rtl:left-4"
                                    >
                                        <div
                                            class="w-8 h-8 text-center text-white bg-red-600 rounded"
                                        >
                                            <a
                                                href="javascript:void(0)"
                                                ><i
                                                    class="uil uil-heart-alt text-lg leading-[1.9]"
                                                ></i
                                            ></a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End grid -->

@endsection