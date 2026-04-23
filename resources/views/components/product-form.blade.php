<form action="{{ route($type->route("products."), $product->id ?? null) }}" method="post" class="m-3">
    @csrf
    @if($type->spoof())
        @method($type->method())
    @endif

    <div>
        <label for="name" class="form-label">Name:</label>
        <input type="text" class="form-control mb-3" name="name" value="{{ old("name",$product->name ?? "") }}">
    </div>

    <div>
        <label for="quantity" class="form-label">Quantity:</label>
        <input type="number" class="form-control mb-3" name="quantity" value="{{ old("quantity",$product->quantity ?? 0) }}">
    </div>

    <div>
        <label for="value" class="form-label">Value:</label>
        <input type="number" class="form-control mb-3" name="value" step="0.01" placeholder="0.00" value="{{ old("value",$product->value ?? 0.00) }}">
    </div>

    <div>
        <label for="price" class="form-label">Price:</label>
        <input type="number" class="form-control mb-3" name="price" step="0.01" placeholder="0.00" value="{{ old("price",$product->price ?? 0.00) }}">
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
    <a href="{{  route('products.index') }}" class="btn btn-danger">Voltar</a>

</form>