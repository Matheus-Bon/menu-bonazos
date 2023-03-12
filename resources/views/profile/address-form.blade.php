
{{--------------------------
    
Esse template é gerado quando o usuário já possuí endereços, porém ele quer adicionar mais um    
    
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
                            {{ __('Cadastre seu novo endereço') }}
                        </h1>
                    </header>

                    <form action="{{ route('profile.address.post') }}" method="post" class="mt-6 space-y-6" id="form-address">
                        @csrf
            
                        
                        <div>
                            <x-input-label for="local_name" :value="__('Apelido do Endereço')" />
                            <x-text-input id="local_name" name="local_name" type="text" class="mt-1 block w-full" required autofocus  />
                        </div>
            
                        <div>
                            <x-input-label for="street" :value="__('Logradouro/Rua')" />
                            <x-text-input id="street" name="street" type="text" class="mt-1 block w-full" required autofocus  />
                        </div>
            
                        <div>
                            <x-input-label for="district" :value="__('Bairro')" />
                            <x-text-input id="district" name="district" type="text" class="mt-1 block w-full" required autofocus  />
                        </div>
            
                        <div>
                            <x-input-label for="state" :value="__('Estado - UF')" />
                            <x-text-input id="state" name="state" type="text" class="mt-1 block w-full" required autofocus  />
                        </div>
            
                        <div>
                            <x-input-label for="complement" :value="__('Complemento')" />
                            <x-text-input id="complement" name="complement" type="text" class="mt-1 block w-full" required autofocus  />
                        </div>
            
                        <div>
                            <x-input-label for="zip_code" :value="__('CEP')" />
                            <x-text-input id="zip_code" name="zip_code" type="number" class="mt-1 block w-full" required autofocus  />
                        </div>
            
                        <div>
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                        
            
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>