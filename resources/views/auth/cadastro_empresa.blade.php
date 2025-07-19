<x-guest-layout>
    <form method="POST" action="{{ route('cadastro.empresa.store') }}">
        @csrf

        <!-- Nome da Empresa -->
        <div>
            <x-input-label for="empresa_nome" :value="'Nome da Empresa'" />
            <x-text-input id="empresa_nome" name="empresa_nome" type="text" class="mt-1 block w-full" :value="old('empresa_nome')" required autofocus />
            <x-input-error :messages="$errors->get('empresa_nome')" class="mt-2" />
        </div>

        <!-- Slug -->
        <div class="mt-4">
            <x-input-label for="slug" :value="'Slug da empresa (ex: transp-minas)'" />
            <x-text-input id="slug" name="slug" type="text" class="mt-1 block w-full" :value="old('slug')" required />
            <x-input-error :messages="$errors->get('slug')" class="mt-2" />
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
</x-guest-layout>
