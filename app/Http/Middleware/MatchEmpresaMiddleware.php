<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Multitenancy\Models\Tenant;

class MatchEmpresaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $slugDaRota = $request->route('empresa');

        if (! Auth::check()) {
            return redirect()->route('login');
        }

        // Aqui você pode usar o relacionamento do usuário com a empresa
        $empresaDoUsuario = Auth::user()->empresa->slug ?? null;

        if ($empresaDoUsuario !== $slugDaRota) {
            abort(403, 'Acesso não autorizado à empresa.');
        }

        return $next($request);
    }
}
