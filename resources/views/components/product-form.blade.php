<form action="{{ route($type->route("products."), $product->id ?? null) }}" method="post" class="m-3">
    @csrf
    @if($type->spoof())
        @method($type->method())
    @endif

    <div>
        <label for="name" class="form-label">Name:</label>
        <input type="text" class="form-control mb-3 @error('name') border border-danger @enderror" name="name" value="{{ old("name",$product->name ?? "") }}">

        @error("name")
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div>
        <label for="quantity" class="form-label">Quantity:</label>
        <input type="number" class="form-control mb-3 @error('quantity') border border-danger @enderror" name="quantity" value="{{ old("quantity",$product->quantity ?? 0) }}">

        @error("quantity")
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div>
        <label for="value" class="form-label">Value:</label>
        <input type="number" class="form-control mb-3 @error('value') border border-danger @enderror" name="value" step="0.01" placeholder="0.00" value="{{ old("value",$product->value ?? 0.00) }}">
    
        @error("value")
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div>
        <label for="price" class="form-label">Price:</label>
        <input type="number" class="form-control mb-3 @error('price') border border-danger @enderror" name="price" step="0.01" placeholder="0.00" value="{{ old("price",$product->price ?? 0.00) }}">
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
    <a href="{{  route('products.index') }}" class="btn btn-danger">Voltar</a>

</form>