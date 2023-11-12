<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Listar contatos') }}
        </h2>
    </x-slot>
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
                                Action
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
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$contact->cell_phone}}
                                </td>
                                <td class=" items-center px-6 py-4">
                                    <a href="#"
                                       class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                                    <a href="#"
                                       class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Remover</a>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
    +
</x-app-layout>
