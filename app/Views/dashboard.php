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
            <?php include 'layout/sidebar.php'?>
            <!-- Page Sidebar -->

            <!-- Page Header -->
            <?php include 'layout/header.php'?>
            <!-- END Page Header -->

            <!-- Page Content -->
            <main
                id="page-content"
                class="grow bg-slate-100 pt-16 dark:bg-slate-950">
                <div class="container mx-auto px-4 py-4 lg:p-8 xl:max-w-7xl">
                    <div
                        class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:gap-6 xl:grid-cols-4">
                        <a
                            href="javascript:void(0)"
                            class="flex flex-col justify-center overflow-hidden rounded-lg bg-white ring-1 ring-slate-200/50 transition-opacity duration-100 hover:opacity-70 active:opacity-100 dark:bg-slate-900 dark:ring-slate-700/60">
                            <div class="flex items-center justify-between gap-3 p-6">
                                <div class="grow">
                                    <div
                                        class="flex items-center gap-0.5 text-sm font-medium text-emerald-500">
                                        <span>Courses</span>
                                    </div>
                                    <dt class="text-2xl font-extrabold"><?= htmlspecialchars($coursesCount) ?></dt>

                                </div>
                                <div class="relative w-full max-w-28">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                        <path d="M96 96c0-35.3 28.7-64 64-64l288 0c35.3 0 64 28.7 64 64l0 320c0 35.3-28.7 64-64 64L80 480c-44.2 0-80-35.8-80-80L0 128c0-17.7 14.3-32 32-32s32 14.3 32 32l0 272c0 8.8 7.2 16 16 16s16-7.2 16-16L96 96zm64 24l0 80c0 13.3 10.7 24 24 24l112 0c13.3 0 24-10.7 24-24l0-80c0-13.3-10.7-24-24-24L184 96c-13.3 0-24 10.7-24 24zm208-8c0 8.8 7.2 16 16 16l48 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-48 0c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16l48 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-48 0c-8.8 0-16 7.2-16 16zM160 304c0 8.8 7.2 16 16 16l256 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-256 0c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16l256 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-256 0c-8.8 0-16 7.2-16 16z" />
                                    </svg>


                                </div>
                            </div>
                        </a>
                        <a
                            href="javascript:void(0)"
                            class="flex flex-col justify-center overflow-hidden rounded-lg bg-white ring-1 ring-slate-200/50 transition-opacity duration-100 hover:opacity-70 active:opacity-100 dark:bg-slate-900 dark:ring-slate-700/60">
                            <div class="flex items-center justify-between gap-3 p-5">
                                <div class="grow">
                                    <div
                                        class="flex items-center gap-0.5 text-sm font-medium text-emerald-500">
                                        <span>Users</span>

                                    </div>
                                    <dl>
                                        <dt class="text-2xl font-extrabold"><?= htmlspecialchars($usersCount) ?></dt>
                                    </dl>
                                </div>
                                <div class="relative w-full max-w-28">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                        <path d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192l42.7 0c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0L21.3 320C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7l42.7 0C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3l-213.3 0zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352l117.3 0C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7l-330.7 0c-14.7 0-26.7-11.9-26.7-26.7z" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                        <a
                            href="javascript:void(0)"
                            class="flex flex-col justify-center overflow-hidden rounded-lg bg-white ring-1 ring-slate-200/50 transition-opacity duration-100 hover:opacity-70 active:opacity-100 dark:bg-slate-900 dark:ring-slate-700/60">
                            <div class="flex items-center justify-between gap-3 p-5">
                                <div class="grow">
                                    <div
                                        class="flex items-center gap-0.5 text-sm font-medium text-emerald-500">
                                        <span>Tags</span>
                                    </div>
                                    <dl>
                                        <dt class="text-2xl font-extrabold"><?= htmlspecialchars($tagCount) ?></dt>
                                    </dl>
                                </div>
                                <div class="relative w-full max-w-28">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                        <path d="M0 80L0 229.5c0 17 6.7 33.3 18.7 45.3l176 176c25 25 65.5 25 90.5 0L418.7 317.3c25-25 25-65.5 0-90.5l-176-176c-12-12-28.3-18.7-45.3-18.7L48 32C21.5 32 0 53.5 0 80zm112 32a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                        <a
                            href="javascript:void(0)"
                            class="flex flex-col justify-center overflow-hidden rounded-lg bg-white ring-1 ring-slate-200/50 transition-opacity duration-100 hover:opacity-70 active:opacity-100 dark:bg-slate-900 dark:ring-slate-700/60">
                            <div class="flex items-center justify-between gap-3 p-5">
                                <div class="grow">
                                    <div
                                        class="flex items-center gap-0.5 text-sm font-medium text-emerald-500">
                                        <span>Categories</span>
                                    </div>
                                    <dl>
                                        <dt class="text-2xl font-extrabold"><?= htmlspecialchars($categoryCount) ?></dt>
                                    </dl>
                                </div>
                                <div class="relative w-full max-w-28">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="40" height="40" fill="currentColor"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                        <path d="M64 480H448c35.3 0 64-28.7 64-64V160c0-35.3-28.7-64-64-64H288c-10.1 0-19.6-4.7-25.6-12.8L243.2 57.6C231.1 41.5 212.1 32 192 32H64C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64z" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                        <!-- END Mini Stats -->

                       

                        
                        <!-- END Sales -->

                        <!-- Popular Pages -->
                        <div
                            class="flex flex-col justify-center overflow-hidden rounded-lg bg-white p-6 ring-1 ring-slate-200/50 dark:bg-slate-900 dark:ring-slate-700/60 xl:col-span-4">
                            <div class="mb-6 flex items-center justify-between gap-4">
                                <h2 class="text-xl font-extrabold">Top teachers</h2>
                            </div>
                            <table class="w-full text-sm">
                                <thead>
                                <tr class="border border-neutral-600">
                                        <th
                                            class="px-4 py-4 text-center font-semibold  text-start  text-slate-500 dark:text-slate-400">
                                            id
                                        </th>
                                        <th
                                            class="px-4 py-4 text-center font-semibold  text-slate-500 dark:text-slate-400">
                                            author name
                                        </th>
                                        <th
                                            class="px-4 py-4 text-center font-semibold  text-slate-500 dark:text-slate-400">
                                            total courses
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php foreach ($user as $u) : ?>
                                        <tr class="border border-neutral-300 hover:bg-amber-50 dark:hover:bg-amber-900">
                                            <td class="relative p-2 text-center">
                                                <?= $u['id']; ?>
                                            </td>
                                            <td class="relative p-2 text-center">
                                            <?= $u['username']?>
                                            </td>
                                            <td class="relative p-2 text-center">
                                            <?= $u['courses_Count']?>
                                            </td>
                                        </tr>

                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>
                        <div
                            class="flex flex-col justify-center overflow-hidden rounded-lg bg-white p-6 ring-1 ring-slate-200/50 dark:bg-slate-900 dark:ring-slate-700/60 xl:col-span-4">
                            <div class="mb-6 flex items-center justify-between gap-4">
                                <h2 class="text-xl font-extrabold">Top users By Courses</h2>
                                
                            </div>
                            <table class="w-full text-sm">
                                <thead>
                                <tr class="border border-neutral-600">
                                        <th
                                            class="px-4 py-4 text-center font-semibold  text-start  text-slate-500 dark:text-slate-400">
                                            author name
                                        </th>
                                        <th
                                            class="px-4 py-4 text-center font-semibold  text-slate-500 dark:text-slate-400">
                                            total courses
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php foreach ($TopUsersBycourses as $u) : ?>
                                        <tr class="border border-neutral-300 hover:bg-amber-50 dark:hover:bg-amber-900">
                                            <td class="relative p-2 text-center">
                                                <?= $u['teacher']; ?>
                                            </td>
                                            <td class="relative p-2 text-center">
                                            <?= $u['total_courses']?>
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
            <?php include 'layout/footer.php'?>
            <!-- END Page Footer -->
        </div>
        <!-- END Page Container -->
    </div>
</body>

</html>