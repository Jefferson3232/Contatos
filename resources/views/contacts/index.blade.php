<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Listar contatos') }}
        </h2>
    </x-slot>
    <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
        <div class="w-full mb-1">
            <div class="sm:flex">
                <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
                    <a href="{{route('contacts.create')}}"
                       class="inline-flex items-center justify-center w-1/2 px-3 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700">
                        <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                  clip-rule="evenodd"></path>
                        </svg>
                        Novo Contato
                    </a>
                </div>
            </div>
        </div>
    </div>
    @if($message = Session::get('success'))
        <div id="alert-3"
             class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
             role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                 viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div class="ms-3 text-sm font-medium">
                {{ $message }}
            </div>
        </div>
    @endif

    <div class="xl:pl-60 pt-14 min-h-screen w-screen transition-position lg:w-auto bg-gray-50 dark:bg-slate-800 dark:text-slate-100">
        <section class="p-6 xl:max-w-6xl xl:mx-auto">
            <div class="rounded-2xl flex-col dark:bg-slate-900/70 bg-white flex mb-6">
                <div class="flex-1">
                    <table class="w-full">
                        <thead>
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nome
                            </th>
                            <th scope="col" class="px-6 py-3">
                                E-mail
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Número
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Ação
                            </th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        @foreach($contacts as $contact)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$contact->name}}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$contact->email}}
                                </td>
                                <td class="cell_phone px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$contact->cell_phone}}
                                </td>
                                <td class=" items-center px-6 py-4">
                                    <x-dropdown>
                                        <x-slot name="trigger">
                                            <button>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400"
                                                     viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"/>
                                                </svg>
                                            </button>
                                        </x-slot>
                                        <x-slot name="content">
                                            <x-dropdown-link :href="route('contacts.edit', $contact->id)">
                                                {{ __('Editar') }}
                                            </x-dropdown-link>
                                            <form method="POST" action="{{ route('contacts.destroy', $contact) }}">
                                                @csrf
                                                @method('delete')
                                                <x-dropdown-link :href="route('contacts.destroy', $contact->id)"
                                                                 onclick="event.preventDefault(); this.closest('form').submit();">
                                                    {{ __('Remover') }}
                                                </x-dropdown-link>
                                            </form>
                                        </x-slot>
                                    </x-dropdown>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>


    <script type="module">
        $(document).ready(function () {
            $('.cell_phone').mask('(00) 00000-0000');
        });
    </script>
</x-app-layout>
