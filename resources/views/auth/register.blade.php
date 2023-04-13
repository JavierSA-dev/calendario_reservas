<x-guest-layout>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <span id="monthNumber" style="display: none;">{{$monthNumber}}</span>
    <div id="staticModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-lg max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg  p-1.5 ml-auto inline-inline-flex	 items-:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="staticModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-6 lg:px-8 text-xl ">
                    <h3 class="mb-4 text-3xl font-medium text-gray-900 dark:text-white">Elige una hora</h3>
                    <form class="space-y-6 flex flex-wrap justify-center gap-2" action="/calendario" method="post">
                        @csrf
                        <input id="day_month_year" type="hidden" name="fecha" value="">
                        <div class="flex items-center w-full ">
                            <label for="nombre" class="mr-8  font-medium text-gray-900 dark:text-gray-300">Nombre</label>
                            <input id="nombre" required type="text" name="nombre" class="p-3 rounded w-full h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        </div>
                        <div class="flex items-center w-full ">
                            <label for="email" class="mr-11 font-medium text-gray-900 dark:text-gray-300">Correo</label>
                            <input id="email" required type="text" name="email" class="p-3 rounded w-full h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        </div>
                        <div class="flex items-center w-full ">
                            <label for="phone" class="mr-7  font-medium text-gray-900 dark:text-gray-300">Teléfono</label>
                            <input id="phone" required type="tel" name="phone" class="p-3 rounded w-full h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        </div>
                        <div class="inline-flex	 items-center ">
                            <input id="10" type="radio" required name="horas" value="10:00" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="10" class="ml-2  font-medium text-gray-900 dark:text-gray-300">10:00</label>
                        </div>
                        <div class="inline-flex	 items-center ">
                            <input id="12" type="radio" name="horas" value="12:00" class=" w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="12" class="ml-2  font-medium text-gray-900 dark:text-gray-300">12:00</label>
                        </div>
                        <div class="inline-flex	 items-center">
                            <input id="16" type="radio" name="horas" value="16:00" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="16" class="ml-2  font-medium text-gray-900 dark:text-gray-300">16:00</label>
                        </div>
                        <div class="inline-flex	 items-center">
                            <input id="18" type="radio" name="horas" value="18:00" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="18" class="ml-2  font-medium text-gray-900 dark:text-gray-300">18:00</label>
                        </div>

                        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg  px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Confirmar
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    @php
    echo $calendar;
    @endphp

    <form id="prevMonth" action="/calendario/prev" method="post">
        @csrf
        <input type="hidden" name="date" id="date" value="{{ $prevMonth }}">
    </form>
    <form id="nextMonth" action="/calendario/next" method="post">
        @csrf
        <input type="hidden" name="date" id="date" value="{{ $nextMonth }}">
    </form>
    <div class="flex flex-row mx-auto mt-4">
        <button id="prevMonthButtom" type="button" class="bg-gray-800 text-white rounded-l-md border-r border-gray-100 py-2 hover:bg-slate-400  hover:text-white px-3">
            <div class="flex flex-row align-middle">
                <svg class="w-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                </svg>
                <p class="ml-2">Prev</p>
            </div>
        </button>
        <button id="nextMonthButtom" type="button" class="bg-gray-800 text-white rounded-r-md py-2 border-l border-gray-200 hover:bg-slate-400 hover:text-white px-3">
            <div class="flex flex-row align-middle">
                <span class="mr-2">Next</span>
                <svg class="w-5 ml-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </div>
        </button>
    </div>

    @if ($success)
    <div class="absolute bottom-2 left-2 p-3 bg-lime-300 text-green text-center rounded-lg flex flex-wrap align-middle">
        <svg class="w-6 h-6 mx-auto " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
        </svg>
        <p class="text-lg">Cita creada correctamente</p>
    </div>
    @endif
</x-guest-layout>