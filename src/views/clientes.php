<h1 class="text-5xl">Clientes</h1>
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
      </th <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
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