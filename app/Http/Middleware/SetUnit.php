<?php

namespace App\Http\Middleware;

use App\Models\Unit;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class SetUnit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::guard('web')->user();
        $unit = $request->route('unit');

        if (!$unit instanceof Unit) {
            $unit = Unit::where('slug', $unit)->firstOrFail(); 
        }

        URL::defaults(['unit' => $unit->slug]);

        if ($user?->getRoleNames()->contains('manager')) {
            
            $users_unit = $user->unit;
            
            if ($unit->isNot($users_unit) and !($user->getRoleNames()->contains('admin'))) {
                return back();
            }
        }

        return $next($request);
    }
    
    
}
