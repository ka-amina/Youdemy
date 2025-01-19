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
                                <h2 class="text-xl font-extrabold">courses</h2>
                                <button
                                    id="showCourseForm"
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
                    <div id="coursesForm" class="hidden flex flex-col justify-center overflow-hidden rounded-lg bg-white p-6 ring-1 ring-slate-200/50 dark:bg-slate-900 dark:ring-slate-700/60 xl:col-span-4 justify-center ">

                        <div class="flex items-center justify-center min-h-screen bg-gray-100 dark:bg-gray-800 py-8">
                            <div class="w-full max-w-xl bg-white dark:bg-gray-900 rounded-lg shadow-md p-6">

                                <form action="/createCourse" method="POST" enctype="multipart/form-data">

                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">

                                        <div>
                                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                                            <input type="text" id="title" name="title" placeholder="title"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        </div>

                                    </div>
                                    <div class="mb-4">
                                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">description</label>
                                        <textarea id="description" name="description" rows="4"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                                    </div>

                                    <div class="mb-4">
                                        <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">content</label>
                                        <select name="content" id="content">
                                            <option value="">select content</option>
                                            <option value="document">Document</option>
                                            <option value="video">Video</option>
                                        </select>
                                    </div>


                                    <div class="mb-4" id="video">
                                        <label for="content_video" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Content Video</label>
                                        <input type="text" id="content_video" name="content_video" placeholder="contentvideo"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </div>

                                    <div class="mb-4 " id="document">
                                        <label for="content_document" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">content document</label>
                                        <textarea id="content_document" name="content_document" rows="4"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                                    </div>

                                    <div class="mb-4">
                                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                        <select id="category" name="category"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="">Select Category</option>
                                            <?php foreach ($categories as $category) : ?>
                                                <option value="<?= $category['id']; ?>"><?= $category['name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <?php
                                    // var_dump($tags);
                                    foreach ($tags as $tag): ?>
                                        <div class="mb-2">
                                            <input class="form-check-input" type="checkbox"
                                                id="tag_<?php echo $tag['id']; ?>"
                                                name="tags_id[]"
                                                value="<?php echo $tag['id']; ?>"
                                                <?php echo (isset($_POST['tags_id']) && in_array($tag['id'], $_POST['tags_id'])) ? 'checked' : ''; ?>>

                                            <label class="form-check-label" for="tag_<?php echo $tag['id']; ?>">
                                                <?php echo $tag['name']; ?>
                                            </label>
                                        </div>
                                    <?php 
                                    endforeach;
                                     ?>

                                    <select id="level" name="level"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="">Select Level</option>
                                            
                                                <option value="beginner">beginner</option>
                                                <option value="intermediate">intermediate</option>
                                                <option value="advanced">advanced</option>
                                                <option value="expert">expert</option>
                                            
                                        </select>

                                    <button type="submit"
                                        class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">
                                        Add Course
                                    </button>
                                </form>
                            </div>
                        </div>
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

    <script>
        const couseTable = document.getElementById("CourseTable");
        const showForm = document.getElementById("coursesForm");
        const formButton = document.getElementById("showCourseForm");
        formButton.addEventListener("click", (e) => {
            e.preventDefault();
            // console.log("clicked")
            couseTable.classList.add("hidden");
            showForm.classList.remove("hidden")
        })

        document.getElementById('video').classList.add('hidden');
        document.getElementById('document').classList.add('hidden');

        document.getElementById('content').addEventListener('change', function() {
            const videoDiv = document.getElementById('video');
            const documentDiv = document.getElementById('document');

            videoDiv.classList.add('hidden');
            documentDiv.classList.add('hidden');

            switch (this.value) {
                case 'video':
                    videoDiv.classList.remove('hidden');

                    document.getElementById('content_document').value = '';
                    break;
                case 'document':
                    documentDiv.classList.remove('hidden');

                    document.getElementById('content_video').value = '';
                    break;
                default:

                    document.getElementById('content_video').value = '';
                    document.getElementById('content_document').value = '';
                    break;
            }
        });
    </script>
</body>

</html>