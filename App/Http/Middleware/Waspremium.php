<?php

namespace App\Http\Middleware;

use App\Model\Subscriber;
use Closure;
use Core\Http\MiddlewareInterface;
use Core\Http\Request;
use Core\Http\Response;
use Core\Session\Session;

class Waspremium implements MiddlewareInterface
{
    public function handle(Request $request, Closure $next)
    {
        $user = Session::$user;

        if (is_null($user)) {
            redirect('/login');
        } else {
            if (Subscriber::findById($user->id) === null) {
                Response::status(403);
                render('403');
            } else {
                $next();
            }
        }
    }
}