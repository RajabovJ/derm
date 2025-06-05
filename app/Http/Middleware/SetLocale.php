<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\App;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
{
    $locale = $request->route('locale');

    $availableLocales = ['uz', 'ru', 'en'];

    if (!in_array($locale, $availableLocales)) {
        $locale = config('app.fallback_locale');
    }

    app()->setLocale($locale);

    return $next($request);
}

}
