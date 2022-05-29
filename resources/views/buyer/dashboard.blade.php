<x-app-layout>
    <x-slot name="title">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Buyer - Dashboard</title>
    </x-slot>
    <x-slot name="header">
        <!--Search bar-->
        <form class="flex items-center">
            <label for="voice-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input type="text" name="search" id="search" onkeyup="handleSearchInput(this)" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Type in an Agricultural produce or location" required="" onfocusout="hideSearchBlock()" onfocusin="showSearchBlock()">
                     {{--  --}}
                <button type="button" class="flex absolute inset-y-0 right-0 items-center pr-3">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M7 4a3 3 0 016 0v4a3 3 0 11-6 0V4zm4 10.93A7.001 7.001 0 0017 8a1 1 0 10-2 0A5 5 0 015 8a1 1 0 00-2 0 7.001 7.001 0 006 6.93V17H6a1 1 0 100 2h8a1 1 0 100-2h-3v-2.07z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <button type="submit"
                class="inline-flex items-center py-2.5 px-3 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><svg
                    class="mr-2 -ml-1 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>Search</button>
        </form>    
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2> --}}
        <div id="searchBlock" onfocusout="hideSearchBlock()" style="display: none" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div id="produceSearchResult">
                    </div>
                </div>
            </div>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @include('layouts.produce')
                </div>
            </div>
        </div>
    </div>

    @include('layouts.product_details')
    <script>
        var displayBar = document.getElementById("produceSearchResult");
        var listOfProduce = null;

        window.onload = async()=>{
            listOfProduce = await fetchListOfProduce();
        }

        async function handleSearchInput(e){
            let value = e.value;
            console.log(value);
            displayBar.innerHTML = "";
            //show match
            //break sentence into word
            let listOfWords = value.split(" ");
            //loop through produce - order of relevance, r = n of words, finalscore = words in produce
            listOfProduce.forEach(element => {
                if(element.title.includes(value) || element.description.includes(value)){
                    displayToUser(element);
                }
            });
        }

        async function fetchListOfProduce(){
            //fetch produce from server
            let url = "{{route("fetch.record")}}";
            const config = {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: ""
            }

            let response = await fetch(url, config);
            let data = await response.json();
            console.log("RESPONSE "+JSON.stringify(data,null,4));
            return data;
        }

        function displayToUser(produceInstance){
            displayBar.innerHTML += `<a class='text-green-800' onclick="showProduceDetails('`+produceInstance.id+`')" href='#'><b>`+produceInstance.title+`</b><br>`+produceInstance.description+"<br>NGN "+produceInstance.price+`</a><hr class='my-2'>`;
        }

        function showSearchBlock(){
            document.getElementById("searchBlock").style.display = "block";
        }

        function hideSearchBlock(){
            setTimeout(() => {
                document.getElementById("searchBlock").style.display = "none";
            }, 300);
            
        }

        let modal = document.getElementById("detailsModal");
        let m = new Modal(modal);
        function showProduceDetails(id){
            let produceInstance = listOfProduce.filter((element)=>{
                return element.id == id;
            })[0];
            
            console.log("RESPONSE "+JSON.stringify(produceInstance,null,4));

            //set values on modal
            document.getElementById("productName").innerHTML = produceInstance.title;
            document.getElementById("productPrice").innerHTML = "NGN"+produceInstance.price;
            document.getElementById("productDesc").innerHTML = produceInstance.description;
            //fetch and show images
            showImages(produceInstance);
            //show modal
            m.show();
        }

        function hideDetailsModal(){
            m.hide();
        }

        function showImages(produceInstance){
            var holder = "";
            produceInstance.listOfImages.forEach(item => {
                    holder += `<div>
                                                                        <img src="{{url("/")}}`+item+`" class="m-auto inset-0 w-80 h-80 object-cover rounded-md">
                                                                    </div>`;
            });

            document.getElementById("image_grid").innerHTML = holder;
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/microsoft-cognitiveservices-speech-sdk@latest/distrib/browser/microsoft.cognitiveservices.speech.sdk.bundle-min.js">
    </script>
</x-app-layout>