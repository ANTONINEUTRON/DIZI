<div class="grid  grid-cols-1 lg:grid-cols-2 gap-4">
    {{-- List of produce --}}
    @if (!empty($data))
        @foreach ($data as $item)
            <div class="flex flex-col md:flex-row font-sans bg-green-50">
                <div class="flex-none relative">
                    <img src="{{ url('produces/'.$item->farmer_id.'/'.$item->id.'/image_1.png') }}" alt="Display Pics"
                        class="inset-0 w-80 h-80 object-cover rounded-lg" loading="lazy" />
                </div>
                <div class="flex-auto p-6">
                    <div class="flex flex-wrap">
                        <h1 class="flex-auto font-medium text-slate-900">
                            {{$item->title}}
                        </h1>
                        <div class="w-full flex-none mt-2 order-1 text-lg lg:text-2xl font-bold text-violet-600">
                            NGN {{$item->price}}
                        </div>
                    </div>
                    <p class="text-sm text-slate-500">
                        {{$item->description}}
                    </p>
                    <hr class="my-6 bg-sky-50 "/>
                    <div class="flex space-x-4 mb-5 text-sm font-medium">
                        <div class="flex-auto flex space-x-4">
                            {{-- <button class="h-10 px-6 font-semibold rounded-full border border-slate-200 bg-violet-700 text-white"
                                type="button">
                                Edit
                            </button> --}}
                            @if (auth()->user()->role == "farmer")
                                <form action="{{route('farmer/delete/produce')}}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{$item->id}}" name="id"/>
                                    <input type="hidden" value="produces/{{$item->farmer_id}}/{{$item->id}}" name="path"/>
                                    <button class="h-10 px-6 font-semibold rounded-full bg-red-600 text-white" type="submit">
                                        Delete
                                    </button>
                                </form>
                            @elseif(auth()->user()->role == "buyer")
                                <div class="grid grid-cols-2 gap-4">
                                    <button class=" h-10 px-6 font-semibold rounded-full bg-purple-800 text-white" type="submit">
                                        Contact Seller
                                    </button>
                                    <button class="h-10 px-6 font-semibold rounded-full bg-indigo-600 text-white" type="submit">
                                        Add to Wishlist
                                    </button>
                                    <button class="col-span-2 h-10 px-6 font-semibold rounded-full bg-green-800 text-white" type="submit">
                                        Buy
                                    </button>
                                </div>
                                
                            @endif
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <span class="text-green-800 block text-center text-xl m-8">
            No produce has been listed yet
        </span>
    @endif

    

</div>