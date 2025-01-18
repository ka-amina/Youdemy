<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
    <!-- dir="rtl" for RTL support -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />

    <title>Taildashboards Project</title>

    <!-- Inter web font from bunny.net (GDPR compliant) -->
    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link
        href="https://fonts.bunny.net/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />

    <!-- Tailwind CSS Play CDN (mainly for development/testing purposes) -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio"></script>

    <!-- Tailwind CSS v3 Configuration -->
    <script>
        const defaultTheme = tailwind.defaultTheme;
        const colors = tailwind.colors;
        const plugin = tailwind.plugin;

        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    fontFamily: {
                        sans: ["Inter", ...defaultTheme.fontFamily.sans],
                    },
                },
            },
        };
    </script>

    <!-- Alpine Core -->
    <script
        defer
        src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Alpine x-cloak style (https://alpinejs.dev/directives/cloak) -->
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

</head>

<body>
    <div
        x-data="{ darkMode: false, mobileSidebarOpen: false, activeTab: 'Analytics' }"
        x-bind:class="{ 'dark': darkMode }">
        <!-- Page Container -->
        <div
            id="page-container"
            class="relative mx-auto flex min-h-screen   bg-white dark:bg-slate-900 dark:text-slate-100 lg:ms-16">
            <!-- Page Sidebar -->

            <!-- Page Sidebar -->

            <!-- Page Header -->
            <header
                id="page-header"
                class="fixed end-0 start-0 top-0 z-30 flex h-16 flex-none items-center border-b border-slate-200/75 bg-white backdrop-blur-sm dark:border-slate-700/60 dark:bg-slate-900 lg:start-[4rem]">
                <div
                    class="container mx-auto flex justify-between gap-2 px-4 lg:px-8 xl:max-w-7xl">
                    <!-- Left Section -->
                    <div class="flex items-center gap-2">
                        <!-- Brand -->
                        <a
                            href="javascript:void(0)"
                            class="group flex items-center justify-center text-slate-500 hover:text-slate-700 dark:hover:text-slate-400 lg:hidden">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 49 48"
                                fill="currentColor"
                                class="w-6 -rotate-6 transition group-active:rotate-0">
                                <path
                                    d="M24.5 12.75C24.5 18.963 19.463 24 13.25 24H2V12.75C2 6.537 7.037 1.5 13.25 1.5S24.5 6.537 24.5 12.75ZM24.5 35.25C24.5 29.037 29.537 24 35.75 24H47v11.25c0 6.213-5.037 11.25-11.25 11.25S24.5 41.463 24.5 35.25ZM2 35.25C2 41.463 7.037 46.5 13.25 46.5H24.5V35.25C24.5 29.037 19.463 24 13.25 24S2 29.037 2 35.25ZM47 12.75C47 6.537 41.963 1.5 35.75 1.5H24.5v11.25C24.5 18.963 29.537 24 35.75 24S47 18.963 47 12.75Z" />
                            </svg>
                        </a>
                        <!-- END Brand -->

                        <!-- Search -->
                        <div>
                            <input
                                type="text"
                                id="search"
                                name="search"
                                class="w-full rounded-lg border-slate-200 bg-white text-sm focus:border-slate-400/75 focus:ring focus:ring-slate-300/30 dark:border-slate-700/75 dark:bg-transparent dark:ring-slate-300/15 dark:placeholder:text-slate-400"
                                placeholder="Search.." />
                        </div>
                        <!-- END Search -->
                    </div>
                    <!-- END Left Section -->

                    <!-- Right Section -->
                    <div class="flex items-center gap-2">
                        <!-- Dark Mode Toggle -->
                        <button
                            type="button"
                            class="flex items-center justify-between gap-1.5 rounded-lg bg-slate-100 px-2 py-2 text-sm font-semibold text-slate-500 hover:bg-slate-200/75 hover:text-slate-950 active:bg-slate-100 dark:bg-slate-700/50 dark:text-slate-100 dark:hover:bg-slate-700 dark:hover:text-white dark:active:bg-slate-700/50"
                            x-on:click="darkMode = !darkMode">
                            <svg
                                x-show="darkMode"
                                class="hi-mini hi-sun inline-block h-5 w-5"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                                aria-hidden="true">
                                <path
                                    d="M10 2a.75.75 0 01.75.75v1.5a.75.75 0 01-1.5 0v-1.5A.75.75 0 0110 2zM10 15a.75.75 0 01.75.75v1.5a.75.75 0 01-1.5 0v-1.5A.75.75 0 0110 15zM10 7a3 3 0 100 6 3 3 0 000-6zM15.657 5.404a.75.75 0 10-1.06-1.06l-1.061 1.06a.75.75 0 001.06 1.06l1.06-1.06zM6.464 14.596a.75.75 0 10-1.06-1.06l-1.06 1.06a.75.75 0 001.06 1.06l1.06-1.06zM18 10a.75.75 0 01-.75.75h-1.5a.75.75 0 010-1.5h1.5A.75.75 0 0118 10zM5 10a.75.75 0 01-.75.75h-1.5a.75.75 0 010-1.5h1.5A.75.75 0 015 10zM14.596 15.657a.75.75 0 001.06-1.06l-1.06-1.061a.75.75 0 10-1.06 1.06l1.06 1.06zM5.404 6.464a.75.75 0 001.06-1.06l-1.06-1.06a.75.75 0 10-1.061 1.06l1.06 1.06z" />
                            </svg>
                            <svg
                                x-cloak
                                x-show="!darkMode"
                                class="hi-mini hi-moon inline-block h-5 w-5"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                                aria-hidden="true">
                                <path
                                    fill-rule="evenodd"
                                    d="M7.455 2.004a.75.75 0 01.26.77 7 7 0 009.958 7.967.75.75 0 011.067.853A8.5 8.5 0 116.647 1.921a.75.75 0 01.808.083z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <!-- END Dark Mode Toggle -->



                        <!-- Notifications -->
                        <button
                            type="button"
                            class="relative flex items-center justify-between gap-1.5 rounded-lg bg-slate-100 px-2 py-2 text-sm font-semibold text-slate-500 hover:bg-slate-200/75 hover:text-slate-950 active:bg-slate-100 dark:bg-slate-700/50 dark:text-slate-100 dark:hover:bg-slate-700 dark:hover:text-white dark:active:bg-slate-700/50">
                            <div
                                class="absolute -end-1.5 -top-2.5 inline-flex h-5 min-w-5 items-center justify-center rounded-lg bg-slate-700 px-1 text-xs font-medium text-white dark:bg-slate-300 dark:font-semibold dark:text-slate-900">
                                3
                            </div>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                                class="hi-mini hi-bell-alert inline-block size-5">
                                <path
                                    d="M4.214 3.227a.75.75 0 0 0-1.156-.955 8.97 8.97 0 0 0-1.856 3.825.75.75 0 0 0 1.466.316 7.47 7.47 0 0 1 1.546-3.186ZM16.942 2.272a.75.75 0 0 0-1.157.955 7.47 7.47 0 0 1 1.547 3.186.75.75 0 0 0 1.466-.316 8.971 8.971 0 0 0-1.856-3.825Z" />
                                <path
                                    fill-rule="evenodd"
                                    d="M10 2a6 6 0 0 0-6 6c0 1.887-.454 3.665-1.257 5.234a.75.75 0 0 0 .515 1.076 32.91 32.91 0 0 0 3.256.508 3.5 3.5 0 0 0 6.972 0 32.903 32.903 0 0 0 3.256-.508.75.75 0 0 0 .515-1.076A11.448 11.448 0 0 1 16 8a6 6 0 0 0-6-6Zm0 14.5a2 2 0 0 1-1.95-1.557 33.54 33.54 0 0 0 3.9 0A2 2 0 0 1 10 16.5Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <!-- END Notifications -->

                        <div x-data="{ isOpen: false }" class="relative inline-block ">
                            <!-- Dropdown toggle button -->
                            <button @click="isOpen = !isOpen" class="relative z-10 flex items-center p-2 text-sm text-gray-600 bg-white border border-transparent rounded-md focus:border-blue-500 focus:ring-opacity-40 dark:focus:ring-opacity-40 focus:ring-blue-300 dark:focus:ring-blue-400 focus:ring dark:text-white dark:bg-gray-800 focus:outline-none">
                                <span class="mx-1">username</span>
                                <svg class="w-5 h-5 mx-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 15.713L18.01 9.70299L16.597 8.28799L12 12.888L7.40399 8.28799L5.98999 9.70199L12 15.713Z" fill="currentColor"></path>
                                </svg>
                            </button>

                            <!-- Dropdown menu -->
                            <div x-show="isOpen"
                                @click.away="isOpen = false"
                                x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="opacity-0 scale-90"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-100"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-90"
                                class="absolute right-0 z-20 w-56 py-2 mt-2 overflow-hidden origin-top-right bg-white rounded-md shadow-xl dark:bg-gray-800">
                                <a href="#" class="flex items-center p-3 -mt-2 text-sm text-gray-600 transition-colors duration-300 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                                    <img class="flex-shrink-0 object-cover mx-1 rounded-full w-9 h-9" src="https://images.unsplash.com/photo-1523779917675-b6ed3a42a561?ixid=MnwxMjA3fDB8MHxzZWFyY2h8N3x8d29tYW4lMjBibHVlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=face&w=500&q=200" alt="jane avatar">
                                    <div class="mx-1">
                                        <h1 class="text-sm font-semibold text-gray-700 dark:text-gray-200">username</h1>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">email</p>
                                    </div>
                                </a>

                                <hr class="border-gray-200 dark:border-gray-700 ">

                                <a href="#" class="flex items-center p-3 text-sm text-gray-600 capitalize transition-colors duration-300 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                                    <svg class="w-5 h-5 mx-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7 8C7 5.23858 9.23858 3 12 3C14.7614 3 17 5.23858 17 8C17 10.7614 14.7614 13 12 13C9.23858 13 7 10.7614 7 8ZM12 11C13.6569 11 15 9.65685 15 8C15 6.34315 13.6569 5 12 5C10.3431 5 9 6.34315 9 8C9 9.65685 10.3431 11 12 11Z" fill="currentColor"></path>
                                        <path d="M6.34315 16.3431C4.84285 17.8434 4 19.8783 4 22H6C6 20.4087 6.63214 18.8826 7.75736 17.7574C8.88258 16.6321 10.4087 16 12 16C13.5913 16 15.1174 16.6321 16.2426 17.7574C17.3679 18.8826 18 20.4087 18 22H20C20 19.8783 19.1571 17.8434 17.6569 16.3431C16.1566 14.8429 14.1217 14 12 14C9.87827 14 7.84344 14.8429 6.34315 16.3431Z" fill="currentColor"></path>
                                    </svg>

                                    <span class="mx-1">
                                        view profile
                                    </span>
                                </a>






                                <hr class="border-gray-200 dark:border-gray-700 ">


                                <a href="/logout" class="flex items-center p-3 text-sm text-gray-600 capitalize transition-colors duration-300 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                                    <svg class="w-5 h-5 mx-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19 21H10C8.89543 21 8 20.1046 8 19V15H10V19H19V5H10V9H8V5C8 3.89543 8.89543 3 10 3H19C20.1046 3 21 3.89543 21 5V19C21 20.1046 20.1046 21 19 21ZM12 16V13H3V11H12V8L17 12L12 16Z" fill="currentColor"></path>
                                    </svg>

                                    <span class="mx-1">
                                        Sign Out
                                    </span>
                                </a>
                            </div>
                        </div>

                        <!-- Toggle Sidebar on Mobile -->
                        <button
                            type="button"
                            class="flex items-center justify-between gap-1.5 rounded-lg bg-slate-100 px-2 py-2 text-sm font-semibold text-slate-500 hover:bg-slate-200/75 hover:text-slate-950 active:bg-slate-100 dark:bg-slate-700/50 dark:text-slate-100 dark:hover:bg-slate-700 dark:hover:text-white dark:active:bg-slate-700/50 lg:hidden"
                            x-on:click="mobileSidebarOpen = true">
                            <svg
                                class="hi-solid hi-menu-alt-1 inline-block size-5"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    fill-rule="evenodd"
                                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <!-- END Toggle Sidebar on Mobile -->
                    </div>
                    <!-- END Right Section -->
                </div>
            </header>
            <!-- END Page Header -->

            <!-- Page Content -->
            <main
                id="page-content"
                class="grow bg-slate-100 pt-16 dark:bg-slate-950">
                <div class="container mx-auto px-4 py-4 lg:p-8 xl:max-w-7xl">
                    <div class=" grid grid-cols-1 gap-4 sm:grid-cols-2 md:gap-6 xl:grid-cols-4" id="tagTable">
                        <!-- Popular Pages -->
                        <div
                            class="flex flex-col justify-center overflow-hidden rounded-lg bg-white p-6 ring-1 ring-slate-200/50 dark:bg-slate-900 dark:ring-slate-700/60 xl:col-span-4">
                            <div class="mb-6 flex items-center justify-between gap-4">
                                <h2 class="text-xl font-extrabold">courses</h2>
                                <button
                                    id="showTagForm"
                                    type="button"
                                    class="flex items-center justify-between gap-1.5 rounded-lg bg-slate-100 px-2 py-2 text-sm font-semibold text-slate-500 hover:bg-slate-200/75 hover:text-slate-950 active:bg-slate-100 dark:bg-slate-700/50 dark:text-slate-100 dark:hover:bg-slate-700 dark:hover:text-white dark:active:bg-slate-700/50">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" viewBox="0 0 512 512" width="24"
                                        height="24" fill="currentColor"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                        <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z" />
                                    </svg>
                                </button>
                            </div>
                            <table class="w-full text-sm">
                                <thead>
                                    <tr class="border border-neutral-600">
                                        <th
                                            class="px-4 py-4 text-center font-semibold  text-start  text-slate-500 dark:text-slate-400">
                                            title
                                        </th>
                                        <th
                                            class="px-4 py-4 text-center font-semibold  text-slate-500 dark:text-slate-400">
                                            level
                                        </th>
                                        <th
                                            class="px-4 py-4 text-center font-semibold  text-slate-500 dark:text-slate-400">
                                            status
                                        </th>
                                        <th
                                            class="px-4 py-4 text-center font-semibold  text-slate-500 dark:text-slate-400">
                                            category
                                        </th>
                                        <th
                                            class="px-4 py-4 text-center font-semibold  text-slate-500 dark:text-slate-400">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($cours as $c) : ?>
                                        <tr class="border border-neutral-300 hover:bg-amber-50 dark:hover:bg-amber-900">
                                            <td class="relative p-2 text-center">
                                                <?= $c['title']; ?>
                                            </td>
                                            <td class="relative p-2 text-center">
                                                <?= $c['level'] ?>
                                            </td>
                                            <td class="relative p-2 text-center">
                                                <?= $c['pub'] ?>
                                            </td>
                                            <td class="relative p-2 text-center">
                                                <?= $c['category'] ?>
                                            </td>
                                            <td class="relative p-2 text-center">
                                                <div class="flex items-center justify-center">
                                                    <a href="/editCourse?id=<?= $c['id']; ?>" id="update"
                                                        name="update">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="24"
                                                            height="24" fill="currentColor"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                                            <path d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152L0 424c0 48.6 39.4 88 88 88l272 0c48.6 0 88-39.4 88-88l0-112c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 112c0 22.1-17.9 40-40 40L88 464c-22.1 0-40-17.9-40-40l0-272c0-22.1 17.9-40 40-40l112 0c13.3 0 24-10.7 24-24s-10.7-24-24-24L88 64z" />
                                                        </svg>
                                                    </a>

                                                    <a href="/deleteCourse?id=<?= $c['id']; ?>" id="delete"
                                                        name="delete">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="24"
                                                            height="24" fill="currentColor"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                                            <path d="M170.5 51.6L151.5 80l145 0-19-28.4c-1.5-2.2-4-3.6-6.7-3.6l-93.7 0c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80 368 80l48 0 8 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-8 0 0 304c0 44.2-35.8 80-80 80l-224 0c-44.2 0-80-35.8-80-80l0-304-8 0c-13.3 0-24-10.7-24-24S10.7 80 24 80l8 0 48 0 13.8 0 36.7-55.1C140.9 9.4 158.4 0 177.1 0l93.7 0c18.7 0 36.2 9.4 46.6 24.9zM80 128l0 304c0 17.7 14.3 32 32 32l224 0c17.7 0 32-14.3 32-32l0-304L80 128zm80 64l0 208c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-208c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0l0 208c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-208c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0l0 208c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-208c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>

                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>
                        <!-- END Referrers -->

                    </div>
                </div>
            </main>
            <!-- END Page Content -->

            <!-- Page Footer -->
            <footer
                id="page-footer"
                class="flex grow-0 items-center border-t border-dashed border-slate-200/75 bg-slate-100 dark:border-slate-700/75 dark:bg-slate-950">
                <div
                    class="container mx-auto flex flex-col gap-2 px-4 py-6 text-center text-sm font-medium text-slate-600 dark:text-slate-400 md:flex-row md:justify-between md:gap-0 md:text-start lg:px-8 xl:max-w-7xl">

                </div>
            </footer>
            <!-- END Page Footer -->
        </div>
        <!-- END Page Container -->
    </div>
</body>

</html>