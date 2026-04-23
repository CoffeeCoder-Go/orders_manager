<x-layout>
    @if(session("success"))
        <div class="alert alert-success m-3">
            {{ session("success") }}
        </div>
    @endif

    <x-order-form :order="$new_order" :type="\App\Enums\FormType::Create"/>

    <form action="{{ route('orders.index') }}" method="get" class="container p-4">
        <div class="d-flex">
            <input type="search" name="name" id="name" placeholder="pesquisar" class="form-control">
            <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
        </div>
    </form>

    <div class="row">
        @foreach ($orders as $order)
            <div class="col-12 col-md-6 col-lg-4">
                <x-order-component :order="$order"/>
            </div>
        @endforeach
    </div>

    <div class="m-3">
        {{ $orders->links() }}
    </div>
</x-layout>