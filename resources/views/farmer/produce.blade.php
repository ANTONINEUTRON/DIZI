<x-app-layout>
    <x-slot name="title">
        <title>Farmer - Produce</title>
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listed Produce') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-button type="button" class="m-5 bg-green-700 font-semibold text-white" data-modal-toggle="authentication-modal">
                        {{ __('Add New Produce') }}
                    </x-button>

                    @if (!empty(session()->get('actionResponse')))
                        <span class="text-green-800 block text-center text-xl m-8">
                            {{session()->get('actionResponse')}}
                        </span>
                    @endif

                    @include('layouts.produce')
                    
                </div>
            </div>
        </div>
    </div>

    <div id="authentication-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-5 right-0 left-0 z-50 w-full md:inset-0 h-modal h-full pt-0 md:pt-55 justify-center items-center">
    {{-- sm:h-full justify-center items-center  flex --}}
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">

            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    data-modal-toggle="authentication-modal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <div class="py-6 px-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add New Produce</h3>
                    <form class="space-y-6" action="{{route('farmer/add/produce')}}" method="post" 
                        enctype="multipart/form-data">
                        @csrf

                        <div>
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                Title</label>
                            <input type="text" name="title" id="title"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Enter the Name of the Farm produce" required="">
                        </div>
                        <div>
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                Description</label>
                            <textarea name="description" id="description"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Description - provide information like the quantity, units, specie, harvest date e.t.c" rows="3" required=""></textarea>
                        </div>
                        <div>
                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                Price(NGN)</label>
                            <input type="number" name="price" id="price"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Price of the produce" required="">
                        </div>
                       
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="big_banner">Upload Image </label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            aria-describedby="images" id="images" name="images[]" type="file" accept="image/*" required multiple>
                        <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="images_help">You can upload multiple image</div>

                        <button type="submit"
                            class="w-full text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/flowbite@1.4.5/dist/flowbite.js"></script>
</x-app-layout>
