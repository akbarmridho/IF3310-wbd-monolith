<?php

namespace App\Http\Middleware;

use Closure;
use Core\Http\MiddlewareInterface;
use Core\Http\Request;
use Core\Http\Response;
use Core\Session\Session;

class Premium implements MiddlewareInterface
{
    public function handle(Request $request, Closure $next)
    {
        $user = Session::$user;

        if (is_null($user)) {
            redirect('/login');
        } else {
            if (!$user->isPremium()) {
                Response::status(403);
                render('403');
            } else {
                $next();
            }
        }
    }
}