<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Concerns\IsTenant;

class Empresa extends Model
{
    use HasFactory, IsTenant;

    protected $fillable = ['nome', 'slug', 'cnpj'];
}
