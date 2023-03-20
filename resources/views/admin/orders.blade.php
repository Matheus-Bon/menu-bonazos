
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
            Criar uma categoria
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
                    
                        <form action="{{ route('admin.category.store') }}" method="POST" id="form-category">

                            @csrf
                            
                            <div class="mb-3">
                                <label for="name" class="form-label">Criar nova categoria</label>
                                <input type="text" class="form-control" name="name">

                            </div>
                            
                        </form>


                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-outline-success" form="form-category">Continuar</button>
                    </div>

                </div>
            </div>    
        </div>
        {{-- /Modal --}}

        <br><br><br><br><br>

        @include('admin.partials.card-category')
  
  
        

        @include('admin.layouts.footer')
    </div>
    <!-- /.content -->
    
</div>


<script>
    $(document).ready(function(){
    $('input[id^="switch-"]').change(function(){
  
      let categoryId = $(this).attr('data-id')
      let active = $(this).is(':checked')
      let url = "{{ route('admin.category.active', ':id') }}"
      url = url.replace(':id', categoryId)
  
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
  
      $.ajax({
  
        url: url,
        type: 'put',
        data:{active:active},
        dataType: "json",
        success: function (response) {
          //console.log(response);
        },
        error: function(xhr,status,error){
          //console.log(xhr.responseText);
        }
  
        });
        
    });
  });
</script>