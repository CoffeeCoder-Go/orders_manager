<x-layout>
    @if (session("success"))
        <div class="alert alert-success m-3">
            {{ session("success") }}
        </div>
    @endif

    

    <x-order-form :order="$order" :type="FormType::Update"/>

    <button id="btn-delete" class="btn btn-primary m-3" data-id="{{ $order->id }}">Deletar</button>

    <div id="deleteModal" style="display: none;" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Confirmação de exclusão</h2>
                </div>
                <div class="modal-body">
                    <h1>Quer excluir?</h1>

        
                </div>
                <div class="modal-footer">
                    <form id="deleteBtn" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-primary">Confirmar</button>
                        <button type="button" class="btn btn-success" onclick="closeModal()">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const btnDelete = document.getElementById("btn-delete");
        btnDelete.addEventListener("click",(e)=>openModal(btnDelete.dataset.id))


        function openModal(id){
            const modal = document.getElementById("deleteModal");
            const form =document.getElementById("deleteBtn");

            form.action = `/orders/${id}`;
            modal.style.display = "block";
        }

        function closeModal(){
            const modal = document.getElementById("deleteModal");
            modal.style.display = "none";
        }
    </script>
</x-layout>