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
                </label>
            </div>
            <div class="mb-6">
                <label class="block">
                    <span class="text-gray-700">Email</span>
                    <input type="email" name="email" class="block w-full mt-1 rounded-md" placeholder="mario@gmail.com"
                           value="{{old('email')}}"/>
                </label>
            </div>
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900" for="genders">
                    <span class="text-gray-700">Gênero</span>
                    <select id="genders"
                            name="gender"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="masculino">Masculino</option>
                        <option value="feminino">Feminino</option>
                        <option value="outro">Outro</option>
                    </select>
                </label>
            </div>
            <div class="mb-6">
                <label class="block">
                    <span class="text-gray-700">Data Nascimento</span>
                    <input type="text" id="birth_date" name="birth_date" class="block w-full mt-1 rounded-md"
                           placeholder="05/10/1990"
                           value="{{old('birth_date')}}"/>
                </label>
            </div>
            <div class="mb-6">
                <label class="block">
                    <span class="text-gray-700">Telefone</span>
                    <input type="text" id="cell_phone" name="cell_phone" class="block w-full mt-1 rounded-md"
                           placeholder="(11) 11314-4672"
                           value="{{old('cell_phone')}}"/>
                </label>
            </div>
            <div class="mb-6">
                <label class="block">
                    <span class="text-gray-700">Nacionalidade</span>
                    <input type="text" name="nationality" class="block w-full mt-1 rounded-md" placeholder=""
                           value="{{old('nationality')}}"/>
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
</x-app-layout>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script>
    $(document).ready(function () {
        $('#birth_date').mask('00/00/0000');
        $('#cell_phone').mask('(00) 00000-0000');
    });
</script>