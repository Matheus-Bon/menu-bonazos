@include('admin.layouts.head')

@include('admin.layouts.left-panel')

<div id="right-panel" class="right-panel">

    <!-- Header-->
    @include('admin.layouts.header')
    <!-- /#header -->

    <!-- Content -->
    <div class="content">
        
        <h2 class="text-center display-5">Categorias</h2>


        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Launch static backdrop modal
        </button>
  
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-header">
                        <h1 class="modal-title fs-3" id="staticBackdropLabel">Nova categoria</h1>
                        <p class="lead fs-6">Informações da categoria</p>
                        
                    </div>

                    <div class="modal-body">
                    ...
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-outline-primary">Continuar</button>
                    </div>

                </div>
            </div>
        </div>
  
  


        @include('admin.layouts.footer')
    </div>
    <!-- /.content -->
    
</div>

