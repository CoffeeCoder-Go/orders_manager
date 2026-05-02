<x-layout>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="carousel slide border-bottom border-black border-5" id="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset("assets/image.png") }}" class="d-block w-100" alt="imagem">
            </div>
            <div class="carousel-item">

                <img src="{{ asset("assets/hands.png") }}" class="d-block w-100" alt="mãos">
            </div>
            <div class="carousel-item">
                <img src="{{ asset("assets/globalization.png") }}" class="d-block w-100" alt="globalização">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon text-black" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon text-black" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!--<div class="row container m-3 rounded">
            <div class="col-2 col-md-1 col-lg-1 text-nowrap">
                <p class="text-start">The perfect site for manager your delivery enterprise!</p>
                <img src="{{ asset("assets/truck.png") }}" alt="Delivery truck" class="w-100">
            </div>
        </div>-->
    <div class="row m-3">
        <div class="card col m-2">
            <img src="{{ asset("assets/easy.png") }}" alt="Easy">
            <div class="card-body">
                <h5 class="card-title">Easy</h5>
                <p class="card-text">This app is so easy to use!</p>
            </div>
        </div>
        <div class="card col m-2">
            <img src="{{ asset("assets/free.png") }}" alt="Easy">
            <div class="card-body">
                <h5 class="card-title">Free</h5>
                <p class="card-text">The basics functions is free!</p>
                
            </div>
        </div>
    </div>

</x-layout>