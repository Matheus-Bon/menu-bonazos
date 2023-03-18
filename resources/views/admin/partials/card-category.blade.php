
@foreach ($categories as $category)
<div class="card">

  <div class="card-title">

    <h5 class="card-header">{{$category->name}}</h5>

    <div class="form-check form-switch pt-2 px-5">
      <input class="form-check-input" type="checkbox" role="switch" id="switch-{{$loop->index}}"  name="active" data-id="{{$category->id}}" @if($category->active) checked @endif>


      <label class="form-check-label" for="switch-{{$loop->index}}">Ativar</label>


    </div>
    
    <a type="button" style="position: relative; left:98%; bottom:55px;" ><i class="bi bi-sliders2" style="width: 15%;"></i></a>
  </div>

  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-outline-primary">Criar Produto</a>
  </div>
</div>



@endforeach