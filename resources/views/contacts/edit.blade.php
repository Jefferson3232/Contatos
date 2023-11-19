<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Contato') }}
        </h2>
    </x-slot>

    <div class="max-w-2xl mt-5 mx-auto lg:p-8 w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
        <form method="POST" action="{{route('contacts.update', ['contato' => $contact->id])}}">
            @csrf
            @method('put')
            <div class="mb-6">
                <label class="block">
                    <span class="text-gray-700">Nome</span>
                    <input type="text" name="name" class="block w-full mt-1 rounded-md" placeholder=""
                           value="{{old('name', $contact->name)}}"/>
                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                </label>
            </div>
            <div class="mb-6">
                <label class="block">
                    <span class="text-gray-700">Email</span>
                    <input type="email" name="email" class="block w-full mt-1 rounded-md" placeholder="mario@gmail.com"
                           value="{{old('email', $contact->email)}}"/>
                    <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                </label>
            </div>
            <div class="mb-6">
                <label class="block">
                    <span class="text-gray-700">Telefone</span>
                    <input type="text" id="cell_phone" name="cell_phone" class="block w-full mt-1 rounded-md"
                           placeholder="(11) 11314-4672"
                           value="{{old('cell_phone', $contact->cell_phone)}}"/>
                    <x-input-error :messages="$errors->get('cell_phone')" class="mt-2"/>
                </label>
            </div>

            <x-primary-button
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300
                     font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600
                      dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            >
                {{ __('Salvar') }}
            </x-primary-button>
        </form>
    </div>
    <script type="module">
        $(document).ready(function () {
            $('#cell_phone').mask('(00) 00000-0000');
        });
    </script>
</x-app-layout>