<h1 class="text-5xl">Prestamos</h1>
<form method="POST" class="mt-8 flex justify-between space-x-16">
  <div class="flex space-x-2 items-center">
    <label for="date-start" class="text-sm font-medium text-gray-700">INICIO</label>
    <input type="date" name="date-start" id="date-start" class="border border-gray-300 px-2 py-1 focus:ring-indigo-500 focus:border-indigo-500  rounded-md" placeholder="0.00">
  </div>

  <div class="flex space-x-2 items-center">
    <label for="date-end" class="text-sm font-medium text-gray-700">FIN</label>
    <input type="date" name="date-end" id="date-end" class="border border-gray-300 px-2 py-1 focus:ring-indigo-500 focus:border-indigo-500  rounded-md" placeholder="0.00">
  </div>

  <button class="flex-grow text-white font-semibold px-2 py-1 rounded-md bg-blue-500 hover:bg-blue-600">
    Procesar
  </button>
</form>
<table class="overflow-x-scroll mt-8 min-w-full divide-y divide-gray-200">
  <thead class="bg-gray-100">
    <tr>
      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        Ejemplar
      </th>
      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        Libro
      </th>
      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        Cliente
      </th>
      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        Inicio
      </th>
      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        Inicio
      </th>
      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        Fin
      </th>
      <th scope="col" class="px-6 py-3">
      </th>
      <th scope="col" class="px-6 py-3">
      </th>
    </tr>
  </thead>
  <tbody class="bg-white divide-y divide-gray-200">

  </tbody>
</table>

<template id="prestamo-template">
  <tr class="hover:bg-gray-50">
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
      001
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
      Book name
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
      Jane Cooper
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
      2020-02-03
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
      2020-02-08
    </td>
    <td class="text-sm h-full whitespace-nowrap">
      <button class="text-white mr-4 py-1 px-2 bg-green-500 hover:bg-green-600 rounded-md">Finalizar</button>
    </td>
    <td class="text-sm h-full whitespace-nowrap">
      <button class="text-red-600 hover:text-red-900">Delete</button>
    </td>
  </tr>
</template>

<script>
  // LISTENERS
  document.addEventListener('DOMContentLoaded', async () => {
    let prestamos = await fetchPrestamos();
    generatePrestamos(prestamos);
  });

  async function fetchPrestamos() {
    return [{
      isbn: '001',
      titulo: 'libro 1',
      fechaIni: '2020-03-02',
      fechaIni: '2020-03-08',
    }];
  }

  // GENERATE AND UPDATE HTML
  function generatePrestamos(prestamos) {
    const tableBody = document.querySelector('tbody');

    for (prestamo of prestamos) {
      const createdPrestamo = generatePrestamo(prestamo);
      tableBody.appendChild(createdPrestamo);
    }
  }

  function generatePrestamo(prestamo) {
    const template = document.getElementById('prestamo-template');
    let clone = template.content.firstElementChild.cloneNode(true);
    let td = clone.querySelectorAll("td");

    td[0].textContent = prestamo.isbn;
    td[1].textContent = prestamo.titulo;
    td[2].textContent = prestamo.fechaIni;
    td[3].textContent = prestamo.fechaFin;

    clone.id = prestamo.isbn;

    return clone;
  }

  async function createPrestamo() {
    const fd = new FormData();
    fd.append('action', 'new-prestamo');

    fetch('/prestamos', {
      method: "POST",
      body: fd
    });
  }
</script>