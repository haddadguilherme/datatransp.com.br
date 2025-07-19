<?php

use App\Models\Empresa;

function empresaAtual(): ?Empresa
{
    $slug = session('empresa_slug');

    if (! $slug) {
        return null;
    }

    return Empresa::where('slug', $slug)->first();
}
