<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>src/images/favicon.png" type="image/x-icon">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>node_modules/aos/dist/aos.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>src/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <section class="navbar bg-white py-5 drop-shadow-md px-6 xl:px-24 2xl:px-44">

        <div class="flex flex-wrap items-center justify-between md:px-10">

            <a href="<?php echo base_url() ?>kb" class="bg-transparent">
                <img src="<?php echo base_url(); ?>src/images/logo.png" alt="" class="nav-brand w-32 ml-3 md:w-40">
            </a>

            <?php if (logged_in()) : ?>
                <div class="flex ">

                    <button type="button" data-collapse-toggle="navbar-search" aria-controls="navbar-search" aria-expanded="false" class="md:hidden text-gray-400 focus:outline-none focus:ring-4 focus:ring-gray-200  rounded-lg text-sm p-2.5 mr-1">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>

                    <form action="<?php echo base_url() ?>kb/search" method="get" class="relative hidden" id="navbar-layout">
                        <button class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                            <span class="sr-only">Search icon</span>
                        </button>
                        <input name="search" type="text" id="search-navbar" class="block w-[18rem] lg:w-[30rem] p-2 pl-10 text-sm border border-gray-400 placeholder-gray-400 text-form rounded-2xl outline-main" placeholder="Search...">
                    </form>

                    <button data-collapse-toggle="navbar-search" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm rounded-lg md:hidden focus:outline-none focus:ring-2 focus:ring-gray-200 text-gray-400  " aria-controls="navbar-search" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                        </svg>
                    </button>

                </div>

                <button id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownAvatarName" class="items-center pe-2 text-sm font-medium text-form hover:text-blue-500 md:mr-0 focus:ring-4 focus:ring-gray-100 rounded-full hidden md:flex" type="button">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-12 h-12 mr-2 rounded-full" src="<?php echo base_url(); ?>src/images/profilepic.png" alt="user photo">
                    <div class="flex flex-col text-left">
                        <?= user()->name; ?>
                        <span class="text-form text-xs truncate w-32"><?= $project['name_project']; ?></span>
                    </div>
                </button>
                <!-- Element After Login -->
                <!-- Dropdown Profile -->
                <div id="dropdownAvatarName" class="z-99 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 ">
                    <ul class="py-2 text-sm text-black" aria-labelledby="dropdownInformdropdownAvatarNameButtonationButton">
                        <li>
                            <?php if (user()->level === "admin") : ?>
                                <a href="<?php echo base_url('kb/administrator/dashboard'); ?>" class="block px-4 py-2 bg-white hover:bg-gray-300 text-black">Dashboard</a>
                            <?php else : ?>
                                <a href="<?php echo base_url('kb/complain'); ?>" class="block px-4 py-2 bg-white hover:bg-gray-300 text-black">Dashboard</a>
                            <?php endif; ?>
                        </li>
                        <li>
                            <a href="<?php echo base_url('kb/history'); ?>" class="block px-4 py-2 bg-white hover:bg-gray-300 text-black">History</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('kb/personalarticle'); ?>" class="block px-4 py-2 bg-white hover:bg-gray-300 text-black">Article</a>
                        </li>
                    </ul>
                    <div class="py-2">
                        <a href="<?php echo base_url(); ?>kb/logout" class="block px-4 py-2 text-sm text-red-700 hover:bg-gray-300">Logout</a>
                    </div>
                </div>

                <div class="items-center justify-between hidden w-full p-5" id="navbar-search">
                    <form action="<?php echo base_url() ?>kb/search" method="get" class="relative mt-3 md:hidden flex justify-center items-center">
                        <button class="absolute inset-y-0 left-2 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </button>
                        <input name="search" type="text" id="search-navbar" class="block w-full p-2 pl-10  text-sm border border-gray-400 placeholder-gray-400 text-form rounded-2xl outline-main" placeholder="Search...">
                    </form>

                    <!-- After Login -->
                    <ul class="flex flex-col p-4 md:p-0 md:hidden mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white ">
                        <li>
                            <button class="flex w-full mb-3 items-center text-sm font-medium  hover:text-blue-500 focus:ring-4 focus:ring-gray-100 rounded-full text-form " type="button">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-12 h-12 mr-2 rounded-full" src="<?php echo base_url(); ?>src/images/profilepic.png" alt="user photo">
                                <div class="flex flex-col text-left ">
                                    <?= user()->name; ?>
                                    <span class="text-form text-xs truncate w-44"><?= $project['name_project']; ?></span>
                                </div>
                            </button>
                        </li>
                        <li>
                            <?php if (user()->level === "admin") : ?>
                                <a href="<?php echo base_url('kb/administrator/dashboard'); ?>" class="block py-2 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0  ">Dashboard</a>
                            <?php else : ?>
                                <a href="<?php echo base_url('kb/complain'); ?>" class="block py-2 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0  ">Dashboard</a>
                            <?php endif; ?>
                        </li>
                        <li>
                            <a href="<?php echo base_url('kb/history'); ?>" class="block py-2 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0  ">History</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('kb/personalarticle'); ?>" class="block py-2 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0  ">Article</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>kb/logout" class="block py-2 pr-4 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0 text-red-600 ">Logout</a>
                        </li>
                    </ul>
                </div>
            <?php else : ?>
                <!-- Element Before Login -->
                <div>
                    <form action="<?php echo base_url() ?>kb/search" method="get" class="relative hidden" id="navbar-layout">
                        <button class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                            <span class="sr-only">Search icon</span>
                        </button>
                        <input name="search" type="text" id="search-navbar" class="block w-[18rem] lg:w-[30rem] p-2 pl-10 text-sm border border-gray-400 placeholder-gray-400 text-form rounded-2xl outline-main" placeholder="Search...">
                    </form>
                </div>
                <div class="buttons grid grid-cols-2 gap-4 me-2 text-center">
                    <a href="/kb/login" class="px-4 py-2 whitespace-nowrap hover:text-main">Sign In</a>
                    <a href="/kb/register" class="bg-main hover:bg-sky-600 text-white rounded-md px-4 py-2 whitespace-nowrap">Sign Up</a>
                </div>
            <?php endif; ?>

        </div>
    </section>



    <?php echo $this->renderSection('content'); ?>

    <section id="footer" class="px-5 md:px-20 py-10 bg-[#1a2b31] text-sm">
        <img src="<?php echo base_url(); ?>src/images/logo-vsee.png" class="w-40 m-2 mb-4 ml-5" alt="">
        <div class="flex lg:flex-nowrap flex-wrap lg:justify-between p-5">
            <div class="w-full lg:w-5/12">
                <p class="text-white leading-relaxed">Virtusee dibuat untuk mengakselerasi bisnis, khususnya untuk monitoring & tracking data yang diberikan oleh tim lapangan</p>
                <p class="text-white mt-7 leading-relaxed">JL. Panjaringan Sari, YKP Pandugo 2 Blok P No 1, Panjaringan Sari, Kec. Rungkut, Kota Surabaya, Jawa Timur. Indonesia</p>
                <div class="flex flex-nowrap gap-10 text-white mt-10">
                    <a href="" class="p-3 bg-main rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                        </svg>
                    </a>
                    <a href="" class="p-3 bg-main rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                        </svg>
                    </a>
                    <a href="" class="p-3 bg-main rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                            <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="flex justify-between text-white font-medium gap-20 lg:gap-32 mt-10 lg:mt-0">
                <div class="flex flex-col gap-3">
                    <a href="">
                        <p class="mb-3">Home</p>
                    </a>
                    <a href="">
                        <p class="mb-3">Fitur</p>
                    </a>
                    <a href="">
                        <p class="mb-3">Penerapan</p>
                    </a>
                </div>
                <div class="flex flex-col gap-3">
                    <a href="">
                        <p class="mb-3">Kontak</p>
                    </a>
                    <a href="">
                        <p class="mb-3">Login</p>
                    </a>

                    <a href="<?= base_url('admin/faq') ?>" class="mb-3 tracking-wide">FAQ</a>





                </div>
            </div>
            <div class="font-medium pe-2 lg:pe-10 sm:ml-32 lg:ml-0 mt-10 lg:mt-0 w-full sm:w-auto">
                <a href="https://play.google.com/store/apps/details?id=com.virtusee.core" target="_blank" class="text-white">
                    <p class="whitespace-nowrap mb-4">Download Virtusee</p>
                    <img src="<?php echo base_url(); ?>src/images/logo_google_play.png" alt="" class="w-40">
                </a>
            </div>
        </div>
        <div class="border-b-[1px] border-white my-8"></div>
        <div class="flex flex-col gap-5 xl:justify-between xl:flex-row xl:gap-0">
            <a href="" class="text-white xl:mx-0 mx-auto">Copyright ©2023 PT. Virtusee Peta Sukses</a>
            <a href="" class="text-white xl:mx-0 mx-auto">Kebijakan Privasi</a>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?php echo base_url(); ?>node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>node_modules/aos/dist/aos.js"></script>
    <script src="<?php echo base_url(); ?>node_modules/flowbite/dist/flowbite.min.js"></script>
    <script src="<?php echo base_url(); ?>node_modules/timeago.js/dist/timeago.min.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="<?php echo base_url(); ?>/src/js/script.js"></script>

</body>

</html>