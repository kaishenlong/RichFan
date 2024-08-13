<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class CheckAdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // if(Auth::check()){
        //     if(Auth::user()->role == '1'){
        //         return $next($request);
        //     }else{
        //         return redirect()->route('login')
        //         ->with('error', 'Bạn không có quyền đăng nhập');
        //     }
            
        // }
        // return redirect()->route('login')
        // ->with('error', 'Bạn phải đăng nhập trước');

        if (Auth::check()) {
            if (Auth::user()->role == '1') {
                return $next($request); // Cho phép truy cập admin
            } elseif (Auth::user()->role == '2') {
                return redirect()->route('client.home'); // Chuyển hướng đến khu vực client
            } else {
                return redirect()->route('login')
                    ->with('error', 'Bạn không có quyền truy cập.');
            }
        } else {
            return redirect()->route('login')
                ->with('error', 'Bạn phải đăng nhập trước.');
        }
        

    }
}
