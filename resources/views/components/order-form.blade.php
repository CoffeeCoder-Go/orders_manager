<form action="{{ route($type->route("orders."),$order-> id ?? null) }}" method="post" class="m-3">
    @csrf
    @if ($type->spoof())
        @method($type->method())
    @endif
    <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" name="name" value="{{ old("name",$order->name ?? '') }}" class="form-control">
    </div>
    <div class="mb-3">
        <label for="andress" class="form-label">Andress:</label>
        <input type="text" name="andress" value="{{ old("andress",$order->andress ?? '') }}" class="form-control">
    </div>
    <div class="mb-3">
        <label for="come_date" class="form-label">Delivery date:</label>
        <input type="text" placeholder="xx/xx/xxxx" name="come_date" value="{{ old("come_date",$order->come_date ?? '') }}" class="form-control">
    </div>

    @if ($errors->any())
        <div class="alert alert-danger m-3">
            <ul>
                @foreach ($errors->all() as $error)
                    
                    <li>{{$error}}</li>
                    
                @endforeach
            </ul>
        </div>
    @endif

    <button class="btn btn-success" type="submit">Save</button>
    <a href="{{ route('orders.index') }}" class="btn btn-danger">Voltar</a>
</form>