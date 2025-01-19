


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Title - Youdemy</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <!-- Header/Navbar -->
    <header class="bg-white p-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <h1 class="text-black text-xl font-bold">Youdemy</h1>
            <div class="flex items-center space-x-4">
            
            <div class="space-x-4 hidden sm:block">
                <button class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 focus:ring-2 focus:ring-blue-500 transition ease-in-out"><a href="/logout" class=" font-semibold  ml-1">log out</a></button>
            </div>
            </div>
        </div>
    </header>

    <!-- Course Single Page Content -->
    <div class="max-w-7xl mx-auto px-4 py-12">

        <!-- Back Button -->
        <div class="mb-4">
            <a href="/studentCourses" class="text-blue-600 flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 text-blue-600">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                <span>Back to Courses</span>
            </a>
        </div>

        <!-- Course Information -->
        <div class=" mb-12">
            <h2 class="text-center text-3xl font-semibold text-gray-800 mb-4"><?= $coursInfo['title']?></h2>
            <!-- Course Description Text (if not video-based) -->
             <?php if($coursInfo['content_video']):?>
            <div class="mb-6 flex justify-center">
                <iframe width="80%" height="400" src=<?= $coursInfo['content_video'] ?> title="YouTube video" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <?php endif;?>
            <!-- Tags and Category -->
            <div class="flex justify-center  items-center space-x-4 mb-4">
                <span>Category</span>
                <span class="px-4 py-2 bg-blue-600 text-white rounded-full"><?= $coursInfo['category']?></span>
               
               
            </div>
            <div class="text-center">
            <?php foreach($tags as $tag):?>
                <span class="px-4 py-2 bg-gray-600 text-white rounded-full"><?=$tag['name']?></span>
                <?php endforeach;?>
            </div>

            <!-- Horizontal Alignment for Course Information -->
            <div class="mt-5 flex justify-center space-x-12 text-gray-600 mb-6">
                <p><strong>Teacher:</strong><?= $coursInfo['teacher']?></p>
                <p><strong>Published on:</strong><?= $coursInfo['created']?></p>
            </div>
            <div class="ml-28 mt-5  space-x-12 text-gray-600 mb-6">
                <p><?= $coursInfo['description']?></p>
            </div>
            <?php if($coursInfo['content_document']):?>
            <div class="ml-28 mb-6 flex justify-center">
                <iframe width="80%" height="400" src=<?= $coursInfo['content_document'] ?> title="YouTube video" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <?php endif;?>

        </div>
        
        <div class="flex justify-center w-full">
        <button class="mb-5 text-white bg-green-500 hover:bg-green-600 px-6 py-3 text-lg rounded-md shadow-md z-10">complete</button>
        </div>
        <!-- Right Section: Video (iframe) or Course Text -->
        <div class="relative text-center mb-12">
            
            <!-- Enroll Button at Top Right (Fixed) -->
            
            
            <!-- Video Section (iframe) -->
            
           
        </div>

    </div>


</body>

</html>