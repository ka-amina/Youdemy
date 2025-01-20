<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youdemy - Online Learning Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans leading-relaxed">

    <!-- Header -->
    <header class="bg-white p-6 shadow-md">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <h1 class="text-indigo-600 text-2xl font-extrabold">Youdemy</h1>

            <!-- Auth Buttons (Visible when no session) -->
            <div class="space-x-4 hidden sm:block">
                <button class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 focus:ring-2 focus:ring-blue-500 transition ease-in-out"><a href="/logout" class=" font-semibold  ml-1">log out</a></button>
            </div>
        </div>
    </header>


    <!-- Course Listings -->
    <section class="py-20 bg-gray-100">
        <div class="max-w-7xl mx-auto px-6">
            
        <div class="mb-4">
            <a href="/home" class="text-blue-600 flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 text-blue-600">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                <span>Back to Courses</span>
            </a>
        </div>

            <h3 class="text-3xl font-bold text-start text-gray-800 mb-12">uncompleted Courses</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                <!-- Course Card 1 -->
                <?php foreach ($cours as $c) : ?>
                    <div class="bg-white shadow-xl rounded-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300 ease-in-out">
                        <div class="p-6">
                            <h4 class="text-xl font-semibold text-gray-800"><?= $c['title'] ?></h4>
                            <p class="text-sm text-gray-600 mt-2">by <?= $c['teacher'] ?></p>
                            <button class="mt-6 w-full py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg  focus:ring-2 focus:ring-orange-500 transition ease-in-out"><a href="/coursePage?id=<?= $c['id'] ?>" class="font-semibold  ml-1">Go to Course</a></button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <section class="py-20 bg-gray-100">
        <div class="max-w-7xl mx-auto px-6">

            <h3 class="text-3xl font-bold text-start text-gray-800 mb-12">Completed Courses</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                <!-- Course Card 1 -->
                <?php foreach ($completedCourses as $c) : ?>
                    <div class="bg-white shadow-xl rounded-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300 ease-in-out">
                        <?php if ($c['content_video']) : ?>

                            <iframe width="300" height="200" src=<?= $c['content_video'] ?> title="YouTube video" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <?php elseif ($c['content_document']) : ?>

                            <div class="w-full h-48 bg-gray-200">

                                <div><?= $c['content_document'] ?></div>
                            </div>
                        <?php endif; ?>
                        <div class="p-6">
                            <h4 class="text-xl font-semibold text-gray-800"><?= $c['title'] ?></h4>
                            <p class="text-sm text-gray-600 mt-2">by <?= $c['teacher'] ?></p>
                            <button class="mt-6 w-full py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg  focus:ring-2 focus:ring-orange-500 transition ease-in-out"><a href="/coursePage?id=<?= $c['id'] ?>" class="font-semibold  ml-1">Go to Course</a></button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

</body>

</html>