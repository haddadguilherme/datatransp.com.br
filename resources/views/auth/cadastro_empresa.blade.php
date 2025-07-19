<x-guest-layout>
    <form method="POST" action="{{ route('cadastro.empresa.store') }}">
        @csrf

        <!-- Nome da Empresa -->
        <div>
            <x-input-label for="empresa_nome" :value="'Nome da Empresa'" />
            <x-text-input id="empresa_nome" name="empresa_nome" type="text" class="mt-1 block w-full" :value="old('empresa_nome')" required autofocus />
            <x-input-error :messages="$errors->get('empresa_nome')" class="mt-2" />
        </div>

        <!-- Slug (gerado automaticamente) -->
        <div class="mt-4">
            <x-input-label for="slug" :value="'Slug da empresa'" />
            <x-text-input id="slug" name="slug" type="text" class="mt-1 block w-full bg-gray-100" readonly />
            <x-input-error :messages="$errors->get('slug')" class="mt-2" />
            <small class="text-gray-500">Gerado automaticamente a partir do nome da empresa</small>
        </div>

        <!-- CNPJ -->
        <div class="mt-4">
            <x-input-label for="cnpj" :value="'CNPJ da Empresa'" />
            <x-text-input id="cnpj" name="cnpj" type="text" class="mt-1 block w-full" :value="old('cnpj')" required />
            <x-input-error :messages="$errors->get('cnpj')" class="mt-2" />
        </div>

        <!-- Nome do usuário -->
        <div class="mt-4">
            <x-input-label for="nome" :value="'Seu nome'" />
            <x-text-input id="nome" name="nome" type="text" class="mt-1 block w-full" :value="old('nome')" required />
            <x-input-error :messages="$errors->get('nome')" class="mt-2" />
        </div>

        <!-- E-mail -->
        <div class="mt-4">
            <x-input-label for="email" :value="'E-mail'" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Senha -->
        <div class="mt-4">
            <x-input-label for="password" :value="'Senha'" />
            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" required />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirmar senha -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="'Confirmar Senha'" />
            <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" required />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Botão -->
        <div class="flex items-center justify-end mt-6">
            <x-primary-button>
                Criar empresa e entrar
            </x-primary-button>
        </div>
    </form>

    <div class="mt-4 text-center">
        <a href="{{ route('login') }}"
           class="underline text-sm text-gray-600 hover:text-gray-900">
            Já tem uma conta? Entrar
        </a>
    </div>
    @push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const nomeInput = document.getElementById('empresa_nome');
            const slugInput = document.getElementById('slug');

            if (!nomeInput || !slugInput) return;

            nomeInput.addEventListener('input', function () {
                let texto = nomeInput.value.toLowerCase()
                    .normalize('NFD').replace(/[\u0300-\u036f]/g, '') // remove acentos
                    .replace(/[^a-z0-9\s]/g, '') // remove caracteres especiais
                    .trim()
                    .replace(/\s+/g, '-'); // espaços viram hífen

                slugInput.value = texto;
            });
        });
    </script>
    @endpush

</x-guest-layout>


