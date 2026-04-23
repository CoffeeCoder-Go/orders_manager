<x-layout>
    <x-product-form :product="$new_product" :type="Status::Create"/>

    <div class="row">
        @foreach ($products as $product)
            <div class="col-12 col-md-6 col-lg-4">
                <x-product-component :product="$product"/>
            </div>
        @endforeach
    </div>
</x-layout>