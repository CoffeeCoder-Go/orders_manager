<form action="{{ route('items.insert',$order->id) }}" method="post" class="m-3">
    @csrf

    <div class="mb-3">
        <label for="product" class="form-label">Product</label>
        <select name="product" class="form-select" aria-label="Select a product">
            @foreach ($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="quantity" class="form-label">Quantity:</label>
        <input type="number" class="form-control" name="quantity">
    </div>

    <button type="submit" class="btn btn-primary">Salvar!</button>
</form>