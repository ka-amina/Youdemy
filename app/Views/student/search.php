<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youdemy - Online Learning Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-blue-50 font-sans leading-relaxed">

    <!-- Header -->
    <header class="bg-white p-6 shadow-md">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <h1 class="text-indigo-600 text-2xl font-extrabold">Youdemy</h1>

            <!-- Auth Buttons (Visible when no session) -->
            <div class="space-x-4 hidden sm:block">
                <?php if (empty($_SESSION['role'])) { ?>
                    <button class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 focus:ring-2 focus:ring-blue-500 transition ease-in-out"><a href="/login" class=" font-semibold  ml-1">Login</a></button>
                <?php } else { ?>
                    <button class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 focus:ring-2 focus:ring-blue-500 transition ease-in-out"><a href="/studentCourses" class=" font-semibold  ml-1">view your Courses</a></button>
                    <button class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 focus:ring-2 focus:ring-blue-500 transition ease-in-out"><a href="/logout" class=" font-semibold  ml-1">log out</a></button>
                <?php }; ?>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="relative bg-cover bg-center h-[65vh] bg-blue-900">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative z-10 text-center text-white p-12">
            <h2 class="text-4xl font-bold mb-6 sm:text-5xl">Empower Your Future with Quality Education</h2>
            <p class="text-lg mb-10 max-w-2xl mx-auto sm:text-xl">At Youdemy, we offer transformative learning experiences that cater to the needs of students and educators worldwide. Whether you're looking to enhance your skills or teach the next generation, we provide the tools to unlock your full potential. Join a global community of learners and shape the future with us!</p>
            <button class="bg-blue-500 hover:bg-blue-600 text-white px-8 py-3 rounded-lg text-xl  focus:ring-2 focus:ring-orange-500 transition ease-in-out"><a href="/register" class=" font-semibold  ml-1">Start Learning Today</a></button>
        </div>
    </section>

    <!-- Course Listings -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <!-- Search Bar and Button -->
            <div class="flex justify-end mb-12">
                <form action="/search" method="GET" class="flex items-center space-x-3">
                    <input
                        type="text"
                        placeholder="Search Courses..."
                        class="p-3 rounded-lg w-64 border border-indigo-300 focus:ring-2 focus:ring-indigo-500 transition ease-in-out"
                        name="search"
                        required />
                    <button
                        type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg focus:ring-2 focus:ring-orange-500 transition ease-in-out">
                        Search
                    </button>
                </form>
            </div>

            <h3 class="text-3xl font-bold text-center text-gray-800 mb-12">Explore Our Courses</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                <!-- Course Card 1 -->
                <?php foreach ($search as $c) : ?>
                    <div class="bg-white shadow-xl rounded-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300 ease-in-out">

                        <div class="p-6">
                            <h4 class="text-xl font-semibold text-gray-800"><?= $c['title'] ?></h4>
                            <p class="text-sm text-gray-600 mt-2">by <?= $c['teacher'] ?></p>
                            <p class="text-sm text-gray-500 mt-2"><?= $c['description'] ?></p>
                            <?php if (empty($_SESSION['role'])) { ?>
                                <button class="mt-6 w-full py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg  focus:ring-2 focus:ring-orange-500 transition ease-in-out"><a href="/enrollCourse" class="font-semibold  ml-1">Go to Course</a></button>
                            <?php } else { ?>
                                <button class="mt-6 w-full py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg  focus:ring-2 focus:ring-orange-500 transition ease-in-out"><a href="/enrollCourse?id=<?= $c['id'] ?>" class="font-semibold  ml-1">Enroll</a></button>
                            <?php } ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-blue-900 text-white py-6 text-center">
        <p>&copy; 2025 Youdemy. All rights reserved.</p>
    </footer>

    <!-- Script to dynamically display the current year -->
    <script>
        document.getElementById('year').textContent = new Date().getFullYear();
    </script>

</body>

</html>