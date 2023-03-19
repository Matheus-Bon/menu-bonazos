<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>


<!--  Chart js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

<!--Chartist Chart-->
<script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
<script src="assets/js/init/weather-init.js"></script>

<script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
<script src="assets/js/init/fullcalendar-init.js"></script>


{{-- Script referente ao template card-category --}}
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

    console.log(active);


    if(active == false){
      $(this).removeAttr('checked');

      $.ajax({

        url: url,
        type: 'put',
        data:{active:active},
        dataType: "json",
        success: function (response) {
          console.log(response);
        },
        error: function(xhr,status,error){
          console.log(xhr.responseText);
        }

      });
    }else{

      $(this).prop('checked');
      $.ajax({

        url: url,
        type: 'put',
        data:{active:active},
        dataType: "json",
        success: function (response) {
          console.log(response);
        },
        error: function(xhr,status,error){
          console.log(xhr.responseText);
        }

      });

    }
    

    
    
   
  });
});

</script>
{{-- /script card-category --}}

