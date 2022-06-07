<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HasLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $localeConfig = config('locales');
        $locale = $request->input('lang');
        // dd($request->all());

        if (!$locale)
        {
            app()->setLocale($localeConfig['fallback']);
        }


        if (!in_array($locale, $localeConfig['allowed']))
        {
            app()->setLocale($localeConfig['fallback']);
        };

        app()->setLocale($locale);
        return $next($request);
    }
}