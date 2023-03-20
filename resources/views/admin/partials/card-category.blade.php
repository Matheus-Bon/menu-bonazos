
@foreach ($categories as $category)
<div class="card">

  <div class="card-title">

    <h5 class="card-header">{{$category->name}}</h5>

    <div class="form-check form-switch pt-2 px-5">

      <input class="form-check-input" style="position: relative; left:15%; bottom:40px;" type="checkbox" role="switch" id="switch-{{$loop->index}}"  name="active" data-id="{{$category->id}}" @if($category->active) checked @endif>
      <label class="form-check-label" for="switch-{{$loop->index}}" style="position: relative; left:15%; bottom:40px;"><i class='bx bx-power-off'></i></label>

    </div>
    
    <a type="button" style="position: relative; left:98%; bottom:55px;"  data-bs-toggle="modal" data-bs-target="#setCategory-{{$category->id}}" ><i class="bi bi-sliders2" style="width: 15%;"></i></a>
  </div>

  <div class="card-body">
    <button class="btn btn-outline-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" id="chosenCategory-{{$category->id}}">
      Criar Produto
    </button>
  </div>
</div>

{{-- Modal update/delete categoria --}}

<div class="modal fade" id="setCategory-{{$category->id}}" tabindex="-1" aria-labelledby="setCategory-{{$category->id}}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="setCategory-{{$category->id}}">Configuração da categoria</h1>
        <p class="lead fs-6">Atualize ou exclua a categoria <b>{{$category->name}}</b></p>
      </div>
      <div class="modal-body">

        <form action="{{route('admin.category.update', $category->id)}}" method="post" id="categoryUpdate-{{$category->id}}">

          @method('put')
          @csrf

          <label for="" class="form-label">Nome</label>
          <input type="text" name="name" id="name" class='form-control' value="{{$category->name}}">


        </form>

        <form action="{{route('admin.category.delete', $category->id)}}" method="post" id="categoryDelete-{{$category->id}}" style="display: none;">
          @method('delete')
          @csrf
        </form>
        
        <button type="submit" class="btn btn-outline-danger mt-5" form="categoryDelete-{{$category->id}}">Deletar categoria</button>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" form="categoryUpdate-{{$category->id}}">Salvar Mudanças</button>
      </div>
    </div>
  </div>
</div>





@endforeach

