<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modificar cuenta
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('cuentas.update', $cuenta) }}" class="max-w-sm mx-auto">
                @csrf
                @method('PUT')
                <div class="mb-5">
                    <x-input-label for="numero" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Nº de cuenta
                    </x-input-label>
                    <x-text-input name="numero" type="text" id="numero" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        :value="old('numero', $cuenta->numero)" />
                    <x-input-error :messages="$errors->get('numero')" class="mt-2" />
                </div>
                <div class="mb-5">
                    <x-input-label for="cliente_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        DNI del titular
                    </x-input-label>
                    <select name="cliente_id" type="text" id="cliente_id" :value="old('cliente_id', $cuenta->cliente_id)" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                        @foreach ( $clientes as $cliente)
                            <option value="{{$cliente->id}}">{{$cliente->dni}}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('cliente_id')" class="mt-2" />
                </div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Guardar
                </button>
            </form>
        </div>
    </div>
</x-app-layout>