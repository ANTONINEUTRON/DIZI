<button
    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
    type="button" data-modal-toggle="detailsModal">
    Toggle modal
</button>
{{-- 
<div id="detailsModal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">

        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

            <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Terms of Service
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="detailsModal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>

            <div class="p-6 space-y-6">
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    With less than a month to go before the European Union enacts new consumer privacy laws for its
                    citizens, companies around the world are updating their terms of service agreements to comply.
                </p>
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is
                    meant to ensure a common set of data rights in the European Union. It requires organizations to
                    notify users as soon as possible of high-risk data breaches that could personally affect them.

                </p>
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. A iure consequatur praesentium eaque. Minima nam, dolores expedita nostrum assumenda natus magnam molestiae soluta, perspiciatis ducimus tempore, nisi ut veniam ad!
                </p>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsam laudantium alias perferendis tempore error cum sequi ut, harum consectetur voluptate ullam totam quod, soluta earum facilis et beatae id porro.
                </p>
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. A iure consequatur praesentium eaque. Minima nam, dolores expedita nostrum assumenda natus magnam molestiae soluta, perspiciatis ducimus tempore, nisi ut veniam ad!
                </p>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsam laudantium alias perferendis tempore error cum sequi ut, harum consectetur voluptate ullam totam quod, soluta earum facilis et beatae id porro.
                </p>
            </div>

            <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                <button data-modal-toggle="detailsModal" type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                    accept</button>
                <button data-modal-toggle="detailsModal" type="button"
                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
            </div>
        </div>
    </div>
</div> --}}



<div id="detailsModal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-5 right-0 left-0 z-50 w-full md:inset-0 h-modal h-full pt-0 justify-start items-center">
    <div class="relative p-4 w-full max-w-5xl h-full">

        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="py-4 border-b border-gray-200 dark:border-gray-600">
                <h3 id="productName" class="ml-3 text-2xl font-semibold text-green-900 dark:text-white">Product Name</h3>
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    onclick="hideDetailsModal()">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <div class="py-6 px-6 lg:px-8">
                <span>
                    <div id="productPrice" class="mb-4 text-purple-700 text-lg">PRICE</div>
                    <p id="productDesc" class="text-lg">
                        Description of the product 
                    </p>
                </span>
            </div>

            <div id="image_grid" class="grid grid-cols-1 md:grid-cols-3 gap-2 p-4 border-2 border-gray-300">
                <!------>
                
            </div>

            <div class="flex justify-center items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                <button data-modal-toggle="detailsModal" type="button"
                    class="text-white mx-4 bg-purple-900 hover:bg-purple-300 focus:ring-4 focus:outline-none focus:ring-purple-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">
                    Contact Seller</button>
                <button data-modal-toggle="detailsModal" type="button"
                    class="text-white mx-4 bg-green-900 hover:bg-green-300 focus:ring-4 focus:outline-none focus:ring-green-700 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-300 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                Purchase</button>
            </div>
        </div>

    </div>
</div>
<script src="https://unpkg.com/flowbite@1.4.5/dist/flowbite.js"></script>