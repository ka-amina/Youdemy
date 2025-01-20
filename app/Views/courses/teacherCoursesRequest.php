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
            <?php include __DIR__ . '/../layout/sidebar.php'; ?>

            <!-- Page Sidebar -->

            <!-- Page Header -->
            <?php include __DIR__ . '/../layout/header.php'; ?>

            <!-- END Page Header -->

            <!-- Page Content -->
            <main
                id="page-content"
                class="grow bg-slate-100 pt-16 dark:bg-slate-950">
                <div class="container mx-auto px-4 py-4 lg:p-8 xl:max-w-7xl">
                    <div class=" grid grid-cols-1 gap-4 sm:grid-cols-2 md:gap-6 xl:grid-cols-4" id="CourseTable">
                        <!-- Popular Pages -->
                        <div
                            class="flex flex-col justify-center overflow-hidden rounded-lg bg-white p-6 ring-1 ring-slate-200/50 dark:bg-slate-900 dark:ring-slate-700/60 xl:col-span-4">
                            <div class="mb-6 flex items-center justify-between gap-4">
                                <h2 class="text-xl font-extrabold">Courses request</h2>
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
                                            description
                                        </th>
                                        <th
                                            class="px-4 py-4 text-center font-semibold  text-slate-500 dark:text-slate-400">
                                            content
                                        </th>
                                        <th
                                            class="px-4 py-4 text-center font-semibold  text-slate-500 dark:text-slate-400">
                                            level
                                        </th>
                                        <th
                                            class="px-4 py-4 text-center font-semibold  text-slate-500 dark:text-slate-400">
                                            actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($request as $student) : ?>
                                        <tr class="border border-neutral-300 hover:bg-amber-50 dark:hover:bg-amber-900">
                                            <td class="relative p-2 text-center">
                                                <?= $student['title']; ?>
                                            </td>
                                            <td class="relative p-2 text-center">
                                                <?= $student['description'] ?>
                                            </td>
                                            <td class="relative p-2 text-center">
                                                <?= $student['content'] ?>
                                            </td>
                                            <td class="relative p-2 text-center">
                                                <?= $student['level'] ?>
                                            </td>
                                            <td class="relative p-2 text-center">
                                                <div class="flex items-center justify-center">
                                                    <a href="/accept?id=<?= $student['id']; ?>">

                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="24"
                                                            height="24" fill="currentColor"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                                            <path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                                                        </svg>
                                                    </a>
                                                    <a class="ml-3"href="/refuse?id=<?= $student['id']; ?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="24"
                                                            height="24" fill="currentColor"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                                            <path d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z" />
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
            <?php include __DIR__ . '/../layout/footer.php'; ?>

            <!-- END Page Footer -->
        </div>
        <!-- END Page Container -->
    </div>

</body>

</html>