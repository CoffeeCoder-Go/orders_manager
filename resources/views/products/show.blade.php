<x-layout>
    @if (session("success"))
        <div class="alert alert-success m-3">
            <p>{{ session("success") }}</p>
        </div>
    @endif

    <x-product-component :product="$product"/>
    <x-product-form :product="$product" :type="FormType::Update"/>

    <button class="btn btn-danger m-3" onclick="openModal()">Delete</button>

    <div class="modal" style="display: none;" id="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Deletar {{ $product->name }}</h5>
                </div>
                <div class="modal-body">
                    <p>Você tem certeza que quer deletar {{ $product->name }}?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" onclick="deletar('{{ $product->id }}')">(!) Sim, quero deletar</button>
                    <button class="btn btn-danger" onclick="closeModal()">Não, não quero deletar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openModal(){
            const modal = document.getElementById("modal");

            modal.style.display = "block";
        }

        function closeModal(){
            const modal =document.getElementById("modal");

            modal.style.display = "none";
        }

        function deletar(id){
            fetch(`/products/${id}`,{
                method: 'DELETE'
            }).then(r=>{
                location.href = "/products";
            });
        }
    </script>
</x-layout>