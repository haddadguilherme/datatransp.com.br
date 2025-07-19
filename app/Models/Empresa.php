<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Multitenancy\Models\Tenant;

class Empresa extends Tenant
{
    use HasFactory;

    protected $fillable = ['nome', 'slug', 'cnpj'];

    public function usuarios()
    {
        return $this->belongsToMany(User::class);
    }
}
