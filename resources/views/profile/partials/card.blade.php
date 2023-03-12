<div class="card">
    <div class="card-header">
        <h4 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Seus endereços') }}
        </h4>

        <br><br>
    </div>
    <div class="card-body">
        @foreach($addresses as $address)
        <div class="card">
            <div class="card-body">
                <b class="card-text" style="color: rebeccapurple">{{ $address->local_name }}</b>
                <p class="card-text">{{ $address->street }}</p>
                <p class="card-text">{{ $address->distric }}</p>
                <p class="card-text">{{ $address->state }}</p>
                <p class="card-text">{{ $address->complement }}</p>
                <p class="card-text">{{ $address->zip_code }}</p>

                <br>

                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" style="padding-right: 10px;" href="{{ route('profile.address.update') }}">
                    {{ __('Alterar') }}
                </a>
                

                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" onclick="event.preventDefault(); document.getElementById('form-delete-address-{{$loop->index}}').submit(); console.log('ola')" href="">
                    {{ __('Excluir') }}
                </a>

                


                <form id="form-delete-address-{{$loop->index}}" action="{{ route('profile.address.destroy', $address->code) }}" method="post" style="display: none;">
                    @csrf
                    @method('delete')
                </form>

                <br><br><hr><br>
            </div>
        </div>
        @endforeach
    </div>
</div>
