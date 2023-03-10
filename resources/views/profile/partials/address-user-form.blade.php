<section>
    <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Livro de endereços') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __("Aqui estarão todos os endereços cadastrados") }}
            </p>
    </header>

    <form action="{{ route('profile.address.add') }}" method="post" class="mt-6 space-y-6">
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




</section>