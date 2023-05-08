<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/output.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


    <title></title>

</head>

<body>
    <?php
    $uri = service('uri');
    ?>
    <nav
        class="relative flex w-full flex-wrap items-center justify-between bg-primary py-2 text-neutral-200 shadow-lg lg:flex-wrap lg:justify-start lg:py-4">
        <div class="container flex w-full flex-wrap items-center justify-between px-3">
            <div class="!visible mt-2 hidden flex-grow basis-[100%] items-center lg:mt-0 lg:!flex lg:basis-auto">
                <!-- Navbar title -->
                <a class="pr-2 text-xl font-semibold text-white" href="/">PW</a>
                <!-- Left navigation links -->
                <ul class="list-style-none mr-auto flex flex-col pl-0 lg:flex-row">
                    <!-- Dashboard link -->
                    <li class="my-4 lg:my-0 lg:pr-2">
                        <a class="text-white disabled:text-black/30 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
                            href="/">Dashboard</a>
                    </li>
                    <!-- Team link -->
                    <li class="mb-4 lg:mb-0 lg:pr-2">
                        <a href="payrolls/create"
                            class=" p-0 text-white opacity-60 hover:opacity-80 focus:opacity-80
                            disabled:text-black/30 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400">New Payroll</a>
                    </li>
                    <!-- Projects link -->
                    <li class="mb-4 lg:mb-0 lg:pr-2">
                        <a href="/index.php/payrolls"
                            class="p-0 text-white opacity-60 hover:opacity-80 focus:opacity-80 disabled:text-black/30 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400">Payrolls</a>
                    </li>
                </ul>
            </div>
            <div class="relative flex items-center">

                <?php if (session()->get('isLoggedIn')): ?>
                    <a class="mr-4 text-white opacity-60 hover:opacity-80 focus:opacity-80" href="#">
                        <span class="[&>svg]:w-5">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#ffffff" class=" w-5 h-5">
                                <path
                                    d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z" />
                            </svg>
                        </span>
                    </a>
                    <a class="hidden-arrow mr-4 flex items-center text-white opacity-60 hover:opacity-80 focus:opacity-80"
                        href="#" id="dropdownMenuButton1" role="button" data-te-dropdown-toggle-ref aria-expanded="false">
                        <!-- Dropdown trigger icon -->
                        <span class="[&>svg]:w-5">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                                <path fill-rule="evenodd"
                                    d="M5.25 9a6.75 6.75 0 0113.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 01-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 11-7.48 0 24.585 24.585 0 01-4.831-1.244.75.75 0 01-.298-1.205A8.217 8.217 0 005.25 9.75V9zm4.502 8.9a2.25 2.25 0 104.496 0 25.057 25.057 0 01-4.496 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                        <!-- Notification counter -->
                        <span class="absolute -mt-2.5 ml-4 rounded-full bg-red-700 px-1.5 py-0 text-xs text-white">1</span>
                    </a>
                    <div class="relative group">
                        <!-- Second dropdown trigger -->
                        <a class="hidden-arrow flex items-center whitespace-nowrap transition duration-150 ease-in-out motion-reduce:transition-none"
                            href="#" id="dropdownMenuButton2" role="button" aria-expanded="false">
                            <!-- User avatar -->
                            <img src="https://tecdn.b-cdn.net/img/new/avatars/2.jpg" class="rounded-full"
                                style="height: 25px; width: 25px" alt="" loading="lazy" />
                        </a>
                        <!-- Second dropdown menu -->
                        <ul
                            class="absolute left-auto top-3/4 right-0 z-[1000] float-left hidden group-hover:block m-0 mt-1 min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg dark:bg-neutral-700 ">
                            <!-- Second dropdown menu items -->
                            <li>
                                <a href="/profile"
                                    class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 hover:text-primary active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent  dark:text-neutral-200 dark:hover:bg-white/30 ">Profile</a>
                            </li>
                            <li>
                                <a href="/logout"
                                    class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 hover:text-primary active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent  dark:text-neutral-200 dark:hover:bg-white/30">Log
                                    Out</a>
                            </li>
                        </ul>
                    </div>
                <?php else: ?>
                    <ul class="flex items-center">
                        <li class=" ml-4 <?= ($uri->getSegment(1) == '' ? 'active' : null) ?>">
                            <a class="nav-link text-white" href="/">Login</a>
                        </li>
                        <li class="ml-4 <?= ($uri->getSegment(1) == 'register' ? 'active' : null) ?>">
                            <a class="nav-link text-white" href="/register">Register</a>
                        </li>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </nav>