<div class="card m-3">
    <div class="card-body">
        <h1 class="card-title text-uppercase"><a href="{{ route('orders.show',$order->id) }}">{{ $order->name }}</a></h1>
        <p class="card-text text-primary">{{ $order->andress }}</p>
        <p class="card-text text-success fw-bold">R$ {{ number_format($order->value,2,",",".") }}</p>
        <p class="card-text text-danger">{{ \Illuminate\Support\Carbon::parse($order->come_date)->format("d/M/Y") }}</p>
    </div>
</div>