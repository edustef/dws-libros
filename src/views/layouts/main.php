<?php

use edustef\mvcFrame\Application;

$app = Application::$app;

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <title><?= $this->title ?></title>
</head>

<body>
  <!-- component -->
  <header class="w-full bg-gray-800 p-4 flex justify-between items-center">
    <nav class="flex items-center">
      <a class="text-white text-xl mr-2" href="/">Libros</a>
      <div class="text-white text-xs hidden sm:block ml-2">
      </div>
    </nav>
    <div class="w-8 h-8 cursor-pointer">
      <img class="rounded-full" src="data:image/jpeg;base64,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" />
    </div>
  </header>


  <main class="flex w-full h-screen">
    <aside class="w-80 h-screen bg-gray shadow-md w-fulll hidden sm:block">
      <div class="flex flex-col justify-between h-screen p-4 bg-gray-800">
        <div class="text-sm">
          <div class="bg-gray-900 text-white p-2 rounded mt-2 cursor-pointer hover:bg-gray-700 hover:text-blue-300">Inicio</div>
          <div class="bg-gray-900 text-white hover:bg-gray-700 hover:text-blue-300 p-2 rounded mt-2 cursor-pointer">Prestamos</div>
          <div class="bg-gray-900 flex justify-between items-center text-white p-2 rounded mt-2 cursor-pointer hover:bg-gray-700 hover:text-blue-300">Libros</div>
          <div class="bg-gray-900 text-white p-2 rounded mt-2 cursor-pointer hover:bg-gray-700 hover:text-blue-300">Clientes</div>
        </div>

        <div class="flex p-3 text-white bg-red-500 rounded cursor-pointer text-center text-sm">
          <button class="rounded inline-flex items-center">
            <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
              <path fillRule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clipRule="evenodd" /></svg>
            <span class="font-semibold">Logout</span>
          </button>
        </div>
      </div>
    </aside>

    <section class="w-full p-4">
      <div class="w-full h-64 border-dashed border-4 p-4 text-md">Dashboard</div>
    </section>

  </main>
</body>

</html>