<?php

namespace App\Http\Middleware;

use App\Models\Region;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Torann\GeoIP\Facades\GeoIP;

class GeoIPMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Verificamos que la session del usuario no tenga la region guardada
        if (!$request->session()->has('user_region')) {
            // Obtener la información de GeoIP
            $location = GeoIP::getLocation();
            
            // Comprobamos si la region obtenida existe en la tabla regions
            $region = Region::where('name', 'like', '%' . $location->state_name . '%')->first();
            
            // Asignamos a la session el valor de la region, o null si no se encuentra
            $request->session()->put('user_region', $region ? $region : null);
        }
        
        return $next($request);
    }
}
