<div class="card m-3">
    <div class="card-body">
        <h5 class="card-title text-uppercase">{{ $item->quantity }}x {{ $item->product->name }}</h5>
        <p class="card-text text-success">R${{ number_format($item->value,2,",",".") }}</p>

        <form action="{{ route('items.delete',$item->id) }}" method="post">
            @csrf
            @method("DELETE")

            <button class="btn btn-danger" type="submit">x</button>
        </form>
    </div>
</div>