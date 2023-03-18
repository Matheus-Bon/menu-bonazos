
@foreach ($categories as $category)
        

<div class="card">
  <h5 class="card-header">{{$category->name}}</h5>
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-outline-primary">Criar Produto</a>
  </div>
</div>


@endforeach