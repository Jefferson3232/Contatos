<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cadastrar novo contato') }}
        </h2>
    </x-slot>

    <div class="max-w-2xl mt-5 mx-auto lg:p-8 w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
        <form method="POST" action="{{route('contacts.store')}}">
            @csrf
            <div class="mb-6">
                <label class="block">
                    <span class="text-gray-700">Nome</span>
                    <input type="text" name="name" class="block w-full mt-1 rounded-md" placeholder=""
                           value="{{old('name')}}"/>
                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                </label>
            </div>
            <div class="mb-6">
                <label class="block">
                    <span class="text-gray-700">Email</span>
                    <input type="email" name="email" class="block w-full mt-1 rounded-md" placeholder="mario@gmail.com"
                           value="{{old('email')}}"/>
                    <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                </label>
            </div>
            <div class="mb-6">
                <label class="block">
                    <span class="text-gray-700">Telefone</span>
                    <input type="text" id="cell_phone" name="cell_phone" class="block w-full mt-1 rounded-md"
                           placeholder="(11) 11314-4672"
                           value="{{old('cell_phone')}}"/>
                    <x-input-error :messages="$errors->get('cell_phone')" class="mt-2"/>
                </label>
            </div>

            <x-primary-button
                    class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300
                     font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600
                      dark:hover:bg-green-700 dark:focus:ring-green-800"
            >
                {{ __('Salvar') }}
            </x-primary-button>
            <x-responsive-nav-link
                    class=" text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300
                    font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-gray-600
                    dark:hover:bg-gray-700 dark:focus:ring-gray-800
                   inline-block"
                    :href="route('contacts.index')">
                {{ __('Cancelar') }}
            </x-responsive-nav-link>

        </form>
    </div>
</x-app-layout>

<script type="module">

    $(document).ready(function () {
        $('#cell_phone').mask('(00) 00000-0000');
    });
</script>