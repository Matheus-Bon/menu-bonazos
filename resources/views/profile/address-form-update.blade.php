
{{--------------------------
    
Esse template é gerado quando o usuário quer atualizar dados ou modificar 
    
---------------------------}}



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

                    <header>
                        <h1 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Atualize o endereço') }}
                        </h1>
                    </header>

                    <form action="{{ route('profile.address.update', $code) }}" method="post" class="mt-6 space-y-6" id="form-address">
                        @csrf
                        @method('patch')
            
                        
                        <div>
                            <x-input-label for="local_name" :value="__('Apelido')" />
                            <x-text-input id="local_name" name="local_name" type="text" class="mt-1 block w-full" :value="old('local_name', $address->local_name)" required autofocus autocomplete="local_name" />
                            
                        </div>

                        <div>
                            <x-input-label for="zip_code" :value="__('CEP')" />
                            <x-text-input id="zip_code" name="zip_code" type="text" class="mt-1 block w-full" :value="old('zip_code', $address->zip_code)" required autofocus autocomplete="zip_code" />    
                        </div>


                        <div>
                            <x-input-label for="street" :value="__('Logradouro/Rua')" />
                            <x-text-input id="street" name="street" type="text" class="mt-1 block w-full" :value="old('street', $address->street)" required autofocus autocomplete="street" />
                            
                        </div>

                        <div>
                            <x-input-label for="district" :value="__('Bairro')" />
                            <x-text-input id="district" name="district" type="text" class="mt-1 block w-full" :value="old('district', $address->district)" required autofocus autocomplete="district" />
                            
                        </div>

                        <div>
                            <x-input-label for="state" :value="__('Estado')" />
                            <x-text-input id="state" name="state" type="text" class="mt-1 block w-full" :value="old('state', $address->state)" required autofocus autocomplete="state" readonly/>
                            
                        </div>

                        <div>
                            <x-input-label for="complement" :value="__('Complemento')" />
                            <x-text-input id="complement" name="complement" type="text" class="mt-1 block w-full" :value="old('complement', $address->complement)" required autofocus autocomplete="complement" />
                            
                        </div>

            
                        <div>
                        <x-primary-button>{{ __('Atualizar') }}</x-primary-button>
                        </div>
                        
            
                    </form>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>