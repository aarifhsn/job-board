<!DOCTYPE html>
<html lang="en" dir="ltr" data-mode="light" class="scroll-smooths group" data-theme-color="violet">
    
<!-- Mirrored from themesdesign.in/jobcy-tailwind/layout/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 Jan 2025 03:57:44 GMT -->
<head>
        <meta charset="utf-8" />
        <title>{{config('app.name')}}</title>
        <meta
          name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <meta
          content="Jobboard - Complete Job and Recruitment System"
          name="description"
        />
        <meta content="" name="Themesbrand" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{(asset('images/favicon.ico'))}}" />

        <link rel="stylesheet" href="{{(asset('libs/choices.js/assets/styles/choices.min.css'))}}">

         <!-- Swiper Css -->
        <link rel="stylesheet" href="{{asset('libs/swiper/swiper-bundle.min.css')}}">

        <link rel="stylesheet" href=" {{asset('css/icons.css')}}" />
        <link rel="stylesheet" href="{{asset('css/tailwind.css')}}" />
    </head>
    
    <body class="bg-white dark:bg-neutral-800">

        <div class="main-content">
            <div class="page-content">
                
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>

                @endif

                <section class="flex items-center justify-center min-h-screen py-20 group-data-[theme-color=violet]:bg-violet-500/10  dark:bg-neutral-700">
                <div class="container mx-auto">
                    <div class="grid grid-cols-12">
                        <div class="col-span-12 lg:col-span-10 lg:col-start-2">
                            <div class="flex flex-col bg-white rounded-lg dark:bg-neutral-800">
                                <div class="grid flex-col grid-cols-12">
                                    <div class="col-span-6 ltr:rounded-l-lg rtl:rounded-r-lg">
                                        <div class="p-10">
                                            <a href="index.html">
                                                <img src="{{asset('images/logo-light.png')}}" alt="" class="hidden mx-auto dark:block">
                                                <img src="{{asset('images/logo-dark.png')}}" alt="" class="block mx-auto dark:hidden">
                                            </a>
                                            <div class="mt-5">
                                                <img src="{{asset('images/auth/sign-up.png')}}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 rounded-b-md lg:col-span-6 group-data-[theme-color=violet]:bg-violet-700 group-data-[theme-color=sky]:bg-sky-700 group-data-[theme-color=red]:bg-red-700 group-data-[theme-color=green]:bg-green-700 group-data-[theme-color=pink]:bg-pink-700 group-data-[theme-color=blue]:bg-blue-700 lg:rounded-b-none lg:ltr:rounded-r-lg rtl:rounded-l-lg">
                                        <div class="flex flex-col justify-center h-full p-12">
                                            <div class="text-center">
                                                <h5 class="text-[18.5px] text-white">Let's Get Started</h5>
                                                <p class="mt-3 text-gray-50">Sign Up and get access to all the features of Jobcy</p>
                                            </div>
                                            <form action="{{ route('company.register') }}" method="POST">
                                                @csrf
                                                <div>
                                                    <label for="email">Email:</label>
                                                    <input type="email" id="email" name="email" required>
                                                </div>
                                                <div>
                                                    <label for="password">Password:</label>
                                                    <input type="password" id="password" name="password" required>
                                                </div>
                                                <button type="submit">Login</button>
                                            </form>
                                            
                                            <div class="text-center">
                                                <p class="text-white">Not a member ? <a href="" class="text-white underline fw-medium"> Sign Up </a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                </section>
            </div>
        </div>

<script src="{{asset('unicons.iconscout.com/release/v4.0.0/script/monochrome/bundle.js')}}"></script>
<script src="{{asset('libs/@popperjs/core/umd/popper.min.js')}}"></script>
<script src="{{asset('libs/simplebar/simplebar.min.js')}}"></script>


<script src="{{asset('js/pages/switcher.js')}}"></script>

<script src="{{asset('libs/choices.js/assets/scripts/choices.min.js')}}"></script>

<script src="{{asset('js/pages/job-list.init.js')}}"></script>

<script src="{{asset('js/pages/dropdown&modal.init.js')}}"></script>

<!-- Swiper Js -->
    <script src="{{asset('libs/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('js/pages/swiper.init.js')}}"></script>

<script src="{{asset('js/pages/nav&tabs.js')}}"></script>

<script src="{{asset('js/app.js')}}"></script>

</body>

<!-- Mirrored from themesdesign.in/jobcy-tailwind/layout/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 Jan 2025 03:59:06 GMT -->
</html>