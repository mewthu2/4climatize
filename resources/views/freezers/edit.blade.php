<x-app-layout>
    <x-slot name="header">
        <h5 class="text-left font-semibold text-sm text-white leading-tight">
            <i class="fas fa-users"></i> {{ __('Editar Freezer') }}
        </h5>
    </x-slot>
    
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 rounded p-4 mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session()->has('error'))
        <span class="bg-red-100 border border-red-400 text-red-700 rounded p-4 mb-4">{{ session()->get('error') }}</span>
    @endif

    <section class="container mx-auto p-4" style="overflow-y: scroll;">
        <form method="POST" action="{{ route('freezers.update', $freezer->id) }}">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <div>
                    <x-label class="text-white" for="id_equipamento" :value="__('ID do Equipamento *')" />
                    <x-input id="id_equipamento" class="mt-1 w-full" type="text" name="id_equipamento" :value="old('id_equipamento', $freezer->id_equipamento)" required autofocus />
                </div>

                <div>
                    <x-label class="text-white" for="mac_sensor" :value="__('Mac Sensor *')" />
                    <x-input id="mac_sensor" class="mt-1 w-full" type="text" name="mac_sensor" :value="old('mac_sensor', $freezer->mac_sensor)" required />
                </div>

                <div>
                    <x-label class="text-white" for="nome_unidade" :value="__('Nome Unidade *')" />
                    <x-input id="nome_unidade" class="mt-1 w-full" type="text" name="nome_unidade" :value="old('nome_unidade', $freezer->nome_unidade)" required />
                </div>

                <div>
                    <x-label class="text-white" for="referencia" :value="__('Referência *')" />
                    <x-input id="referencia" class="mt-1 w-full" type="text" name="referencia" :value="old('referencia', $freezer->referencia)" required />
                </div>

                <div>
                    <x-label class="text-white" for="detalhe" :value="__('Detalhe *')" />
                    <x-input id="detalhe" class="mt-1 w-full" type="text" name="detalhe" :value="old('detalhe', $freezer->detalhe)" required />
                </div>

                <div>
                    <x-label class="text-white" for="setpoint" :value="__('Setpoint *')" />
                    <x-input id="setpoint" class="mt-1 w-full" type="text" name="setpoint" :value="old('setpoint', $freezer->setpoint)" required />
                </div>

                <div>
                    <x-label class="text-white" for="etiqueta_ident" :value="__('Etiqueta Ident *')" />
                    <x-input id="etiqueta_ident" class="mt-1 w-full" type="text" name="etiqueta_ident" :value="old('etiqueta_ident', $freezer->etiqueta_ident)" required />
                </div>

                <div>
                    <x-label class="text-white" for="limite_neg" :value="__('Limite Neg *')" />
                    <x-input id="limite_neg" class="mt-1 w-full" type="text" name="limite_neg" :value="old('limite_neg', $freezer->limite_neg)" required />
                </div>

                <div>
                    <x-label class="text-white" for="limite_pos" :value="__('Limite Pos *')" />
                    <x-input id="limite_pos" class="mt-1 w-full" type="text" name="limite_pos" :value="old('limite_pos', $freezer->limite_pos)" required />
                </div>

                <div>
                    <x-label class="text-white" for="cad_cliente_id" :value="__('* Cliente:')" />
                    <select id="cad_cliente_id" name="cad_cliente_id" class="mt-1 w-full form-select" required>
                        <option value="">{{ __('Selecione um cliente') }}</option>
                        @foreach($all_clients as $client)
                            <option value="{{ $client->id }}" {{ old('cad_cliente_id', $freezer->cad_cliente_id) == $client->id ? 'selected' : '' }}>
                                {{ $client->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="p-4 bg-gray-500 rounded-lg flex items-center justify-center mt-4">
                <x-primary-button class="ml-4">
                    <i class="fas fa-save"></i>&nbsp;{{ __('Salvar') }}
                </x-primary-button>
                <x-primary-button class="ml-4" href="{{ route('freezers') }}">
                    <i class="fas fa-undo"></i>&nbsp;{{ __('Voltar') }}
                </x-primary-button>
            </div>
        </form>
    </section>
</x-app-layout>