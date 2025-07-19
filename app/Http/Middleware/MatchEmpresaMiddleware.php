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

        $user = Auth::user();

        // Garante que os dados estejam carregados
        $empresaSlugs = $user->empresas->pluck('slug')->toArray();

        if (!in_array($slugDaRota, $empresaSlugs)) {
            logger("Acesso negado: {$slugDaRota}");
            logger("Empresas do usuário: " . json_encode($empresaSlugs));
            abort(403, 'Acesso não autorizado à empresa.');
        }

        return $next($request);
    }
}
