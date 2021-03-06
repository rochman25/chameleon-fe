@extends('web.user.app')
@section('section')
    {{-- banner-image --}}
    <div id="carouselExampleIndicators" class="carousel slide relative -z-10" data-bs-ride="carousel">
        <div class="carousel-indicators absolute right-0 bottom-0 left-0 flex justify-center p-0 mb-4">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
        </div>
        <div class="carousel-inner relative w-full overflow-hidden">
            <div class="carousel-item active float-left w-full">
                <img src="{{ asset('images/banner_top_1.jpeg') }}" class="block w-full" alt="Wild Landscape" />
            </div>
        </div>
        <button
            class="carousel-control-prev absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline left-0"
            type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon inline-block bg-no-repeat" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button
            class="carousel-control-next absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline right-0"
            type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon inline-block bg-no-repeat" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    {{-- end-banner-image --}}

    {{-- the-best-seller --}}
    <div class="container max-w-6xl px-4 mx-auto">
        <div class="py-10 text-center">
            <h3 class="text-3xl font-bold">The Best Seller</h3>
            <p class="text-lg">on this year</p>
        </div>
        <div class="py-4 grid grid-cols-1 md:grid-cols-3 grid-flow-row auto-rows-max gap-0">

            @foreach ($bestSeller as $best)
                <div class="mx-2">
                    <a href="{{ route('user.product.show', $best->title) }}">
                        <img class="mx-auto w-full" src="{{ asset('/storage/' . $best->filename) }}">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-0 my-4 px-4">
                            <div class="text-left">
                                <p class="text-gray text-sm">Light Gray</p>
                                <h6 class="text-lg font-bold">{{ $best->title }}</h6>
                                <h6 class="text-lg font-bold">IDR. @currency($best->product->harga_produk) </h6>
                            </div>
                            <div class="text-left md:text-right">
                                <p class="text-gray text-sm mr-1">7 Colors</p>
                                <div class="flex float-right">
                                    <div class="p-2 mr-1 shadow-sm bg-yellow-900 w-2 h-2 rounded-full"></div>
                                    <div class="p-2 mr-1 shadow-sm bg-blue-900 w-2 h-2 rounded-full"></div>
                                    <div class="p-2 mr-1 shadow-sm bg-gray-900 w-2 h-2 rounded-full"></div>
                                    <div class="p-2 mr-1 shadow-sm bg-gray-500 w-2 h-2 rounded-full"></div>
                                    <div class="p-2 mr-1 shadow-sm bg-blue-400 w-2 h-2 rounded-full"></div>
                                    <div class="p-2 mr-1 shadow-sm bg-black w-2 h-2 rounded-full"></div>
                                    <div class="p-2 mr-1 shadow-sm bg-red-900 w-2 h-2 rounded-full"></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
    </div>
    {{-- end-best-seller --}}

    {{-- banner-middle --}}
    <div class="py-4 h-627px">
        <img src="{{ asset('images/bannerr_middle_1.jpg') }}">
    </div>
    {{-- end-banner-middle --}}

    {{-- articles --}}
    <x-article-component />
    {{-- end-articles --}}

    {{-- banner-bottom --}}
    <div class="py-4 h-627px">
        <img src="{{ asset('images/bannerr_bottom_1.jpg') }}">
    </div>
    {{-- end-banner-bottom --}}
@endsection
