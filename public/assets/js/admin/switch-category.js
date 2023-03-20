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