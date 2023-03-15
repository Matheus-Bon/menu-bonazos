
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>





<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>


            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.address-user-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



<script>

    $(document).ready(function(){
        $("#zip_code").blur(function(){

            let cep = $(this).val().replace(/\D/g,'');

            if(cep){

                let url = 'https://viacep.com.br/ws/' + cep + '/json/';

                $.getJSON(url, function(data){

                    if(!('erro' in data)){

                        $('#street').val(data.logradouro);
                        $('#district').val(data.bairro);
                        $('#state').val(data.localidade);
                        $('#complement').val(data.complemento);

                    }else{

                        alert('CEP não encontrado');
                    }
                    

                })

            }

        })
    })



</script>