<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>

<div class="flex flex-col justify-center font-[sans-serif] p-4">
    <div class="max-w-md w-full mx-auto shadow-[0_2px_10px_-2px_rgba(195,169,50,0.5)] p-8 relative mt-12">

      <form action="/login" class="mt-12" method="POST">
        <h3 class="text-xl font-bold text-blue-500 mb-8 text-center">Login</h3>
        <div class="space-y-4">
          <input name="email" type="text" class="bg-gray-100 w-full text-sm text-gray-800 px-4 py-4 focus:bg-transparent outline-blue-300 transition-all" placeholder="Enter email" />
          <input name="password" type="password" class="bg-gray-100 w-full text-sm text-gray-800 px-4 py-4 focus:bg-transparent outline-blue-300 transition-all" placeholder="Enter password" />
        </div>

        <div class="mt-8">
          <button type="submit" class="w-full py-4 px-8 text-sm tracking-wide font-semibold text-white bg-blue-500 hover:bg-blue-600 focus:outline-none">
            sign in
          </button>
        </div>
        <p class="text-sm mt-8 text-center text-gray-800">or<a href="register.php" class="text-blue-500 font-semibold hover:underline ml-1">register</a></p>
      </form>
    </div>
  </div>


</body>

</html>