@extends('layouts.app') @section('content')

<!-- Start grid -->
<section class="pt-44 py-20">
    <div class="container mx-auto">
        <div class="grid grid-cols-12 gap-y-10 lg:gap-10">
            <div class="col-span-12 lg:col-span-6 lg:col-start-4">
                <div class="mb-5 text-center">
                    <p
                        class="inline px-2 py-1 text-sm font-medium text-white bg-yellow-500 rounded"
                    >
                        Jobs Live Today
                    </p>
                    <h4 class="mt-2 text-gray-900 text-22 dark:text-white">
                        Browse Job By Categories
                    </h4>
                    <p class="mt-2 text-gray-500 dark:text-gray-300">
                        Post a job to tell us about your project. We'll quickly
                        match you with the right freelancers.
                    </p>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-12 gap-y-5 md:gap-8">
            <div class="col-span-12 md:col-span-6 xl:col-span-4">
                <div class="mt-10 rounded bg-gray-50 dark:bg-neutral-700">
                    <div class="p-6">
                        <ul class="space-y-4">
                            @foreach ($all_categories as  $category)

                            <li
                                class="px-4 py-2 bg-white rounded dark:bg-neutral-600"
                            >
                                <a
                                    href="{{ route('categories.index', $category->slug) }}"
                                    class="text-gray-900 dark:text-white"
                                    >{{$category->name}}
                                    <span
                                        class="px-2 py-1 rounded bg-sky-500/20 text-11 text-sky-500 ltr:float-right rtl:float-left"
                                        >{{ $category->jobs()->count()}}</span
                                    ></a
                                >
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End grid -->

<!-- start cta -->
<section class="pb-20">
    <div class="container mx-auto">
        <div class="grid grid-cols-12">
            <div class="col-span-12 lg:col-span-8 lg:col-start-3">
                <div class="text-center">
                    <h3 class="text-3xl text-gray-900 dark:text-white">
                        See everything about your employee at one place.
                    </h3>
                    <p class="mt-8 text-gray-500 dark:text-gray-300">
                        Start working with Jobcy that can provide everything you
                        need to generate awareness, <br />
                        drive traffic, connect.
                    </p>
                    <div class="flex justify-center gap-3 mt-8">
                        <a
                            href="javascript:void(0)"
                            class="btn group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500 border-transparent text-white hover:-translate-y-1.5"
                            ><i class="uil uil-rocket"></i> Get Started Now</a
                        >
                        <a
                            href="javascript:void(0)"
                            class="btn border group-data-[theme-color=violet]:text-violet-500 group-data-[theme-color=sky]:text-sky-500 group-data-[theme-color=red]:text-red-500 group-data-[theme-color=green]:text-green-500 group-data-[theme-color=pink]:text-pink-500 group-data-[theme-color=blue]:text-blue-500 group-data-[theme-color=violet]:border-violet-500 group-data-[theme-color=sky]:border-sky-500 group-data-[theme-color=red]:border-red-500 group-data-[theme-color=green]:border-green-500 group-data-[theme-color=pink]:border-pink-500 group-data-[theme-color=blue]:border-blue-500 hover:-translate-y-1.5 group-data-[theme-color=violet]:hover:bg-violet-500 group-data-[theme-color=sky]:hover:bg-sky-500 group-data-[theme-color=red]:hover:bg-red-500 group-data-[theme-color=green]:hover:bg-green-500 group-data-[theme-color=pink]:hover:bg-pink-500 group-data-[theme-color=blue]:hover:bg-blue-500 group-data-[theme-color=violet]:hover:text-white group-data-[theme-color=sky]:hover:text-white group-data-[theme-color=red]:hover:text-white group-data-[theme-color=green]:hover:text-white group-data-[theme-color=pink]:hover:text-white group-data-[theme-color=blue]:hover:text-white hover:ring group-data-[theme-color=violet]:hover:ring-violet-500/20 group-data-[theme-color=sky]:hover:ring-sky-500/20 group-data-[theme-color=green]:hover:ring-green-500/20 group-data-[theme-color=pink]:hover:ring-pink-500/20 group-data-[theme-color=blue]:hover:ring-blue-500/20"
                            ><i class="uil uil-capsule"></i> Free Trial</a
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end cta -->

@endsection
