<?php

namespace App\Http\Middleware;

use Closure;
use Detection\MobileDetect;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckDevice
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $detect = new MobileDetect();
        if ($detect->isMobile() || $detect->isTablet()) {
            $deviceType = $detect->isMobile() ? 'Mobile Device' : 'Tablet';
            abort(404, 'your ' . $deviceType . ' is not supported. Please access via computer');
        }
        return $next($request);
    }
}
