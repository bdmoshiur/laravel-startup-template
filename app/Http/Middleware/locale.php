<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $avilableLocale = ['en','bn'];
        $locale = session('APP_LOCALE');

        $locale = in_array($locale, $avilableLocale ) ? $locale : config('app.locale');
        app()->setlocale($locale);
        return $next($request);
    }
}
