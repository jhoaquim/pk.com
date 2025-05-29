<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="space-y-4">
        <div>
            <label class="block font-semibold">E-mail</label>
            <input type="email" name="email" value="{{ $pessoas->email }}" class="w-full border rounded px-3 py-2" placeholder="e-mail@exemplo.com.br" disabled>
        </div>
        <div>
            <label class="block font-semibold">Endereço</label>
            <input type="text" name="endereco" value="{{ $pessoas->endereco }}" class="w-full border rounded px-3 py-2" placeholder="Rua, Av, etc" disabled>
        </div>
        <div class="flex space-x-2">
            <input type="text" name="bairro" value="{{ $pessoas->bairro }}" class="w-full border rounded px-3 py-2" placeholder="Bairro" disabled>
            <input type="text" name="nr" value="{{ $pessoas->nr }}" class="w-20 border rounded px-3 py-2" placeholder="Nr" disabled>
        </div>
        <div class="flex space-x-2">
            <input type="text" name="complemento" value="{{ $pessoas->complemento }}" class="w-full border rounded px-3 py-2" placeholder="Complemento" disabled>
            <input type="text" name="cep" value="{{ $pessoas->cep }}" class="w-32 border rounded px-3 py-2" placeholder="CEP" disabled>
        </div>
    </div>

    <div class="space-y-4">
        <div>
            <label class="block font-semibold">{{ $pessoas->pessoa_tp === 'F' ? 'Data de Nascimento' : 'Data de Registro' }}</label>
            <input type="text" name="dt_nascimento" value="{{ dateFormatDatabaseScreen($pessoas->dt_nascimento, 'screen') }}" class="w-full border rounded px-3 py-2" disabled>
        </div>
        <div class="flex space-x-2">
            <div class="w-1/2">
                <label class="block font-semibold">Estado</label>
                <select name="estado" class="w-full border rounded px-3 py-2">
                    <option value="{{ $pessoas->esta_ibge }}" >{{ $pessoas->esta_uf }}</option>
                </select>
            </div>
            <div class="w-1/2">
                <label class="block font-semibold">Cidade</label>
                <select name="municipio" class="w-full border rounded px-3 py-2" >
                    <option value="{{ $pessoas->muni_ibge }}" >{{ $pessoas->muni_nm }}</option>
                </select>
            </div>
        </div>
        <div>
            <label class="block font-semibold">Associado</label>
            <select name="associado" class="w-full border rounded px-3 py-2" disabled>
                <option value="0" {{ $pessoas->pessoa === 0 ? 'selected' : '' }}>CLIENTE</option>
                <option value="1" {{ $pessoas->pessoa === 1 ? 'selected' : '' }}>ADVOGADO</option>
                <option value="2" {{ $pessoas->pessoa === 2 ? 'selected' : '' }}>CONVIDADO</option>
            </select>
        </div>
    </div>
</div>
