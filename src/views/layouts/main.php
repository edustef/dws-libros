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

<body class="h-screen flex flex-col">
  <header class="w-full bg-gray-800 p-4 flex justify-between items-center">
    <nav class="flex items-center">
      <a class="text-white text-xl mr-2" href="/">Libros</a>
      <div class="text-white text-xs hidden sm:block ml-2">
      </div>
    </nav>
    <div class="w-8 h-8 cursor-pointer">
    </div>
  </header>


  <main class="flex-grow overflow-y-auto flex w-full">
    <aside class="w-80 h-full bg-gray shadow-md w-fulll hidden sm:block">
      <div class="flex flex-col h-full justify-between p-4 bg-gray-800">
        <div class="text-sm">
          <a href="/" class="block bg-gray-700 text-blue-300 hover:bg-gray-700 hover:text-blue-300 p-2 rounded mt-2 cursor-pointer">Prestamos</a>
          <a href="/libros" class="block bg-gray-900 flex justify-between items-center text-white p-2 rounded mt-2 cursor-pointer hover:bg-gray-700 hover:text-blue-300">Libros</a>
          <a href="/clientes" class="block bg-gray-900 text-white p-2 rounded mt-2 cursor-pointer hover:bg-gray-700 hover:text-blue-300">Clientes</a>
        </div>
      </div>
    </aside>

    <section class="overflow-y-auto overflow-x-auto w-full p-4">
      {{content}}
    </section>

  </main>
</body>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    makeCurrentLinkActive();
  });

  function makeCurrentLinkActive() {
    const currLink = location.href;
    const currLinkElems = document.querySelectorAll('aside a');

    for (const currLinkElem of currLinkElems) {
      if (currLinkElem.href == currLink) {
        currLinkElem.classList.remove('text-white');
        currLinkElem.classList.remove('bg-gray-900');
        currLinkElem.classList.add('bg-gray-700');
        currLinkElem.classList.add('text-blue-300');
      } else {
        currLinkElem.classList.add('text-white');
        currLinkElem.classList.add('bg-gray-900');
        currLinkElem.classList.remove('bg-gray-700');
        currLinkElem.classList.remove('text-blue-300');
      }
    }
  }
</script>

</html>