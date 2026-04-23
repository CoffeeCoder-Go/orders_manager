<div class="card m-3">
    <div class="card-body">
        <h1 class="card-title text-uppercase"><a href="{{  route('products.show',$product->id) }}">{{ $product->name }}</a></h1>
        <p class="card-text">{{ $product->quantity }} unidades</p>
        <p class="card-text">R${{ number_format($product,2,",",".") }}</p>
        <p class="card-text">R${{ number_format($product,2,",",".") }}</p>
    </div>
</div>