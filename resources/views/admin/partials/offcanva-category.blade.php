
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel" style="width: 50%;">
    <div class="offcanvas-header">
      <h3 class="offcanvas-title" id="offcanvasRightLabel">Adicionar produto</h3>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      
      <form action="">

        <label for="" class="form-label">Categoria</label>

        <select name="" id="" class="form-control">
          <option value="chosenCategory-{{$category->id}}"></option>
          @foreach ($categories as $category)
          <option value="">{{$category->name}}</option>
          @endforeach
        </select>


      </form>

    </div>
</div>

