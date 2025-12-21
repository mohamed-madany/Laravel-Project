<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Job Board{{' ' . $title ?? ' ' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>

    <!-- Include this script tag or install `@tailwindplus/elements` via npm: -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script> -->
    <!--
  This example requires updating your template:

  ```
  <html class="h-full bg-gray-100">
  <body class="h-full">
  ```
-->
    <div class="min-h-full">
        <nav class="bg-gray-800">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="shrink-0">
                            <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
                                alt="Your Company" class="size-8" />
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">

                                <x-nav-link href="/" :active="request()->is('/')">Dashboard</x-nav-link>
                                <x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link>
                                <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
                                <x-nav-link href="/blog" :active="request()->is('blog')">Blog</x-nav-link>

                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">
                            <button type="button"
                                class="relative rounded-full p-1 text-gray-400 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
                                <span class="absolute -inset-1.5"></span>


                            </button>

                            @auth
                                <span class="hidden md:inline text-gray-200 mr-4">Hi, {{ Auth::user()->name }}</span>

                                <form method="POST" action="/logout" class="hidden md:inline">
                                    @csrf
                                    <button type="submit"
                                        class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Logout</button>
                                </form>


                            @else
                                <a href="/login"
                                    class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Login</a>
                                <a href="/signup"
                                    class="ml-3 inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-medium text-white hover:bg-indigo-700">Sign up</a>
                            @endauth
                        </div>
                    </div>
                    <div class="-mr-2 flex md:hidden">
                        <!-- Mobile menu button -->
                        <button id="mobile-menu-button" type="button" aria-controls="mobile-menu" aria-expanded="false"
                            class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white/5 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">

                            <span class="sr-only">Open main menu</span>
                            <svg id="icon-open" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                aria-hidden="true" class="size-6">
                                <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            <svg id="icon-close" class="size-6 hidden" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                                <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div id="mobile-menu" class="md:hidden hidden">
                <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-white/5 hover:text-white" -->
                    <a href="/" aria-current="page"
                        class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white">Home</a>
                    <a href="/about" aria-current="page"
                        class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white">About</a><a
                        href="/contact" aria-current="page"
                        class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white">Contact</a>
                    <a href="/blog" aria-current="page"
                        class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white">Blog</a>
                </div>
                <div class="border-t border-white/10 pt-4 pb-3">
                    @auth
                        <div class="flex items-center px-5">
                            <div class="ml-3">
                                <div class="text-base/5 font-medium text-white">{{ Auth::user()->name }}</div>
                                <div class="text-sm font-medium text-gray-400">{{ Auth::user()->email }}</div>
                            </div>
                            <button type="button"
                                class="relative ml-auto shrink-0 rounded-full p-1 text-gray-400 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
                                <span class="absolute -inset-1.5"></span>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    data-slot="icon" aria-hidden="true" class="size-6">
                                    <path
                                        d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </div>

                        <div class="mt-3 space-y-1 px-2">


                            <form method="POST" action="/logout">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-white/5 hover:text-white">Sign
                                    out</button>
                            </form>
                        </div>
                    @else
                        <div class="px-5">
                            <a href="/login"
                                class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-white">Login</a>
                            <a href="/signup"
                                class="mt-2 block rounded-md px-3 py-2 text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">Sign
                                up</a>
                        </div>
                    @endauth
                </div>
            </div>
        </nav>

        <header class="relative bg-white shadow-sm">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">
                    {{ $title ?? ' ' }}
                </h1>
            </div>
        </header>
        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                {{$slot}}
            </div>
        </main>
    </div>

    <script>
        // Mobile menu toggle: toggles menu visibility and swaps icons
        (function () {
            const btn = document.getElementById('mobile-menu-button');
            const menu = document.getElementById('mobile-menu');
            const iconOpen = document.getElementById('icon-open');
            const iconClose = document.getElementById('icon-close');

            if (!btn || !menu) return;

            btn.addEventListener('click', (e) => {
                const expanded = btn.getAttribute('aria-expanded') === 'true';
                btn.setAttribute('aria-expanded', String(!expanded));
                menu.classList.toggle('hidden');
                if (iconOpen) iconOpen.classList.toggle('hidden');
                if (iconClose) iconClose.classList.toggle('hidden');
            });

            // Close menu when clicking outside
            document.addEventListener('click', (e) => {
                if (!menu.contains(e.target) && !btn.contains(e.target) && !menu.classList.contains('hidden')) {
                    menu.classList.add('hidden');
                    btn.setAttribute('aria-expanded', 'false');
                    if (iconOpen) iconOpen.classList.remove('hidden');
                    if (iconClose) iconClose.classList.add('hidden');
                }
            });
        }());
    </script>

</body>

</html>
