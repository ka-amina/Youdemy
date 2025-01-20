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

                    <div id="coursesForm" class=" flex flex-col justify-center overflow-hidden rounded-lg bg-white p-6 ring-1 ring-slate-200/50 dark:bg-slate-900 dark:ring-slate-700/60 xl:col-span-4 justify-center ">

                        <div class="flex items-center justify-center min-h-screen bg-gray-100 dark:bg-gray-800 py-8">
                            <div class="w-full max-w-xl bg-white dark:bg-gray-900 rounded-lg shadow-md p-6">

                                <form action="/editCourse" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $coursInfo['course_id'] ?>">


                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">

                                        <div>
                                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                                            <input type="text" id="title" name="title" placeholder="title"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 " value="<?= $coursInfo['title'] ?>">
                                        </div>

                                    </div>
                                    <div class="mb-4">
                                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">description</label>
                                        <textarea id="description" name="description" rows="4"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" ><?= $coursInfo['description'] ?></textarea>
                                    </div>
                                    <div class="mb-4">
                                        <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">content</label>
                                        <select name="content" id="content">
                                            <option value="">select content</option>
                                            <option value="document" <?= ($coursInfo['content'] == 'document') ? 'selected' : ''; ?>>Document</option>
                                            <option value="video" <?= ($coursInfo['content'] == 'video') ? 'selected' : ''; ?>>Video</option>
                                        </select>
                                    </div>
                                    <div class="mb-4" id="video">
                                        <label for="content_video" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Content Video</label>
                                        <input type="text"
                                            id="content_video"
                                            name="content_video"
                                            placeholder="contentvideo"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            value="<?= htmlspecialchars($coursInfo['content_video'] ?? '') ?>">
                                    </div>

                                    <div class="mb-4 " id="document">
                                        <label for="content_document" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">content document</label>
                                        <textarea id="content_document" name="content_document" rows="4"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?= $coursInfo['content_document'] ?></textarea>
                                    </div>

                                    <div class="mb-4">
                                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                        <select id="category" name="category"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="">Select Category</option>
                                            <?php foreach ($categories as $category) :
                                                // Check if the category ID matches the selected category ID
                                                $is_selected = ($category['name'] == $coursInfo['category']) ? 'selected' : '';
                                            ?>
                                                <option value="<?= $category['id']; ?>" <?= $is_selected; ?>><?= $category['name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <?php
                                    // Create an array of just the tag names from $tags_name for easier comparison
                                    $courseTagNames = array_column($tags_name, 'name');

                                    foreach ($tags as $tag):
                                        // Check if the current tag's name exists in the course's tags
                                        $is_checked = in_array($tag['name'], $courseTagNames) ? 'checked' : '';
                                    ?>
                                        <div class="mb-2">
                                            <input class="form-check-input"
                                                type="checkbox"
                                                id="tag_<?= $tag['id']; ?>"
                                                name="tags_id[]"
                                                value="<?= $tag['id']; ?>"
                                                <?= $is_checked ?>>
                                            <label class="form-check-label" for="tag_<?= $tag['id']; ?>">
                                                <?= $tag['name']; ?>
                                            </label>
                                        </div>
                                    <?php endforeach; ?>

                                    <select id="level" name="level" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="">Select Level</option>
                                        <option value="beginner" <?= ($coursInfo['level'] == 'beginner') ? 'selected' : ''; ?>>beginner</option>
                                        <option value="intermediate" <?= ($coursInfo['level'] == 'intermediate') ? 'selected' : ''; ?>>intermediate</option>
                                        <option value="advanced" <?= ($coursInfo['level'] == 'advanced') ? 'selected' : ''; ?>>advanced</option>
                                        <option value="expert" <?= ($coursInfo['level'] == 'expert') ? 'selected' : ''; ?>>expert</option>
                                    </select>

                                    <button type="submit"
                                        class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">
                                        edit Course
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

    <script src="../assets/js/script.js"></script>
    <script>
        // Function to handle visibility and content display
        function updateContentFields() {
            const selectedValue = document.getElementById('content').value;
            const videoDiv = document.getElementById('video');
            const documentDiv = document.getElementById('document');

            // Hide both initially
            videoDiv.classList.add('hidden');
            documentDiv.classList.add('hidden');

            // Show the appropriate field based on selection
            if (selectedValue === 'video' && '<?= $coursInfo['content_video'] ?>') {
                videoDiv.classList.remove('hidden');
                document.getElementById('content_video').value = '<?= $coursInfo['content_video'] ?>';
            } else if (selectedValue === 'document' && '<?= $coursInfo['content_document'] ?>') {
                documentDiv.classList.remove('hidden');
                document.getElementById('content_document').value = '<?= $coursInfo['content_document'] ?>';
            }
        }

        // Run on page load
        updateContentFields();

        // Run on change
        document.getElementById('content').addEventListener('change', function() {
            const videoDiv = document.getElementById('video');
            const documentDiv = document.getElementById('document');

            // Hide both initially
            videoDiv.classList.add('hidden');
            documentDiv.classList.add('hidden');

            // Show the appropriate field based on new selection
            if (this.value === 'video') {
                videoDiv.classList.remove('hidden');
            } else if (this.value === 'document') {
                documentDiv.classList.remove('hidden');
            }
        });
    </script>
</body>

</html>