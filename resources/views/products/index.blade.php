<x-layout>
    @if (session("success"))
        <div class="alert alert-success m-3">
            <p>{{ session("success") }}</p>
        </div>
    @endif

    <x-product-form :product="$new_product" :type="FormType::Create"/>

    
    <div>
        <input type="text" id="search" class="border border-black p-2 rounded-1 m-3" placeholder="search...">
    </div>

    <div class="row list">
        <x-products-list :products="$products"/>
    </div>

    <div class="m-3">
        {{ $products->links() }}
    </div>

    <script>
        let timeout = null;

        const input = document.getElementById("search");

        input.addEventListener('keyup',(e)=>{
            clearTimeout(timeout);

            const listElement =document.querySelector(".list");

            timeout = setTimeout(()=>{
                const query = e.target.value;

                if(!query) {
                    location.reload();
                    return;
                };

                fetch(`/products/search?q=${query}`).then(r=>r.json()).then(r=>listElement.innerHTML=r.html);
            },300);
        });
    </script>
</x-layout>