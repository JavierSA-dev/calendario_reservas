<x-guest-layout>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <span id="monthNumber" style="display: none;">{{$monthNumber}}</span>
    <div id="staticModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-inline-flex	 items-:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="staticModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Elige una hora</h3>
                    <form class="space-y-6" action="" method="post">
                        @csrf
                        <input id="day_month_year" type="hidden" name="fecha" value="">
                        <div class="flex items-center ">
                            <label for="nombre" class="mr-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nombre</label>
                            <input id="nombre" required type="text" name="nombre" class="w-full h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        </div>
                        <div class="flex items-center ">
                            <label for="email" class="mr-6 text-sm font-medium text-gray-900 dark:text-gray-300">Email</label>
                            <input id="email" required type="mail" name="email" class="w-full h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        </div>
                        <div class="flex items-center ">
                            <label for="phone" class="mr-1 text-sm font-medium text-gray-900 dark:text-gray-300">Teléfono</label>
                            <input id="phone" required type="tel" name="phone" class="w-full h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        </div>
                        <div class="inline-flex	 items-center ">
                            <input id="10" type="radio" required name="horas" value="10:00" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="10" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">10:00</label>
                        </div>
                        <div class="inline-flex	 items-center ">
                            <input id="12" type="radio" name="horas" value="12:00" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="12" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">12:00</label>
                        </div>
                        <div class="inline-flex	 items-center">
                            <input id="14" type="radio" name="horas" value="14:00" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="14" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">14:00</label>
                        </div>
                        <div class="inline-flex	 items-center">
                            <input id="16" type="radio" name="horas" value="16:00" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="16" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">16:00</label>
                        </div>
                        <div class="inline-flex	 items-center">
                            <input id="18" type="radio" name="horas" value="18:00" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="18" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">18:00</label>
                        </div>

                        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
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

    <div class="container mx-auto flex justify-center gap-2 mt-4">
            <svg class="w-6 bg-slate-400" fill="none" stroke="white" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"></path>
            </svg>
             <svg class="w-6 bg-slate-400 " fill="none" stroke="white" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"></path>
            </svg>


    </div>
</x-guest-layout>