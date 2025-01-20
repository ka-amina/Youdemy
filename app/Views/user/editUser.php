
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

                    <div id="categoryForm" class=" flex flex-col justify-center overflow-hidden rounded-lg bg-white p-6 ring-1 ring-slate-200/50 dark:bg-slate-900 dark:ring-slate-700/60 xl:col-span-4 justify-center ">

                        <div class="flex items-center justify-center min-h-screen bg-gray-100 dark:bg-gray-800 py-8">
                            <div class="w-full max-w-xl bg-white dark:bg-gray-900 rounded-lg shadow-md p-6">

                                <form action="/updateUser?id=<?= $_GET['id']; ?>" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
                                    <input type="hidden" name="old_image" value="<?= $articleInfo['profile_picture_url']; ?>">
                                    <input type="hidden" name="old_password" value="<?= $articleInfo['password_hash']; ?>">
                                    <div class="mb-4">
                                        <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload Image</label>
                                        <input type="file" id="image" name="image"
                                            class="block w-full text-sm text-gray-900 dark:text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 dark:file:bg-gray-700 dark:file:text-gray-200 dark:hover:file:bg-gray-600">
                                    </div>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">

                                        <div>
                                            <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                                            <input type="text" id="username" name="username" placeholder="username"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?= $userInfo['username']?>">
                                        </div>
                                        <div>
                                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug</label>
                                            <input type="email" id="email" name="email" placeholder="email"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?= $userInfo['email']?>">
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Excerpt</label>
                                        <input type="password" id="password" name="password" placeholder="password"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </div>

                                    <div class="mb-4">
                                        <label for="bio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Content</label>
                                        <textarea id="bio" name="bio" rows="4"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" ><?= $userInfo['bio']?></textarea>
                                    </div>

                                    <div class="mb-4">
                                        <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">role</label>
                                        <input type="text" id="role" name="role" placeholder="role"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?= $userInfo['role']?>">
                                    </div>

                                    <button type="submit"
                                        class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">
                                        update User
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
        const categoryTable = document.getElementById("categoryTable");
        const categoryForm = document.getElementById("categoryForm");
        const showCategoryForm = document.getElementById("showCategoryForm");
        showCategoryForm.addEventListener("click", (e) => {
            e.preventDefault();
            // console.log("clicked")
            categoryTable.classList.add("hidden");
            categoryForm.classList.remove("hidden")
        })
    </script>
</body>

</html>