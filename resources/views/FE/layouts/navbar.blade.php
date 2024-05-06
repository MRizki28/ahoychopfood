<div class="hidden md:block">
    <nav class="bg-transparent mt-3">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="https://flowbite.com/" class="flex items-center  rtl:space-x-reverse">
                <img src="{{ asset('assets/FE/img/logo2.webp') }}" class="h-12" alt="Flowbite Logo" />
            </a>
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <button type="button"
                    class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center ">Kontak</button>
                <button data-collapse-toggle="navbar-cta" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-cta" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
                <ul
                    class="flex flex-col font-medium font-dosisSemiBold p-4 md:p-0 mt-4 border rounded-lg  md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0  ">
                    <li>
                        <a href="#" class="block py-2 px-3 md:p-0 text-gray-600  rounded md:bg-transparen"
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 md:p-0 text-gray-600  rounded  hover:text-red-500">About</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 md:p-0 text-gray-600  rounded  hover:text-red-500">Menu</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 md:p-0 text-gray-600  rounded  hover:text-red-500">Blog</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>


{{-- navbar mobile --}}
<div class="md:hidden">
    <div
        class="fixed z-50 w-full h-16 max-w-lg -translate-x-1/2 bg-white border border-gray-200 rounded-t-3xl bottom-[-3px] left-1/2 dark:bg-white dark:border-gray-600">
        <div class="grid h-full max-w-lg grid-cols-4 mx-auto">
            <a href="#home" data-tooltip-target="tooltip-home"
                class="inline-flex flex-col items-center justify-center px-5 rounded-s-2xl hover:bg-gray-50 dark:hover:bg-red-500 group">
                <i class="fa-solid fa-home fa-lg text-gray-600 dark:text-gray-400  dark:group-hover:text-white"></i>
                <span class="sr-only">Home</span>
            </a>
            <div id="tooltip-home" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Home
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
            <a data-tooltip-target="tooltip-menu"
                class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-red-500 group">
                <i class="fa-solid fa-utensils fa-lg text-gray-600 dark:text-gray-400  dark:group-hover:text-white"></i>
                <span class="sr-only">Menu</span>
            </a>
            <div id="tooltip-menu" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Menu
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
            <a data-tooltip-target="tooltip-map"
                class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-red-500 group">
                <i class="fa-solid fa-map fa-lg text-gray-600 dark:text-gray-400  dark:group-hover:text-white"></i>
                <span class="sr-only">Alamat</span>
            </a>
            <div id="tooltip-map" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Alamat
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
            <a data-tooltip-target="tooltip-kontak"
                class="inline-flex flex-col items-center justify-center px-5 rounded-e-2xl hover:bg-gray-50 dark:hover:bg-red-500 group">
                <i class="fa-solid fa-phone fa-lg  text-gray-600 dark:text-gray-400  dark:group-hover:text-white"></i>
                <span class="sr-only">Kontak</span>
            </a>
            <div id="tooltip-kontak" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Kontak
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
        </div>
    </div>
</div>
