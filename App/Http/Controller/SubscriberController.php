<?php

namespace App\Http\Controller;

use App\Model\Subscriber;
use Core\Base\BaseController;
use Core\Http\Request;
use Core\Session\Session;
use Core\Validator\Types\IntType;
use Core\Validator\Types\StringType;
use Core\Validator\Validator;

class SubscriberController extends BaseController {
    public function subscribe(Request $request) 
    {
        $validated = Validator::validate($request->getFormData(), [
            'id' => new IntType(required: true, shouldCast: true),
            'email' => new StringType(required: true),
        ]);

        if ($validated->isError()) {
            render('subscribe', ['id' => Session::$user->id]);
        } else {
            $result = Subscriber::createSubscriber($validated->data['id'], $validated->data['email']);

            if ($result === null) {
                render('subscribe', ['id' => Session::$user->id, 'error' => 'Failed to subscribe']);
            } else {
                Session::setMessage('Subscribed');
                redirect('/profile/'.Session::$user->id);
            }
        }
    }

    public function subscribeView(Request $request)
    {
        render('subscribe', [
            'id' => Session::$user->id
        ]);
    }

    public function renewSubscriber(Request $request) 
    {
        $validated = Validator::validate($request->getFormData(), [
            'id' => new IntType(required: true, shouldCast: true),
        ]);

        if ($validated->isError()) {
            render('subrenew', ['id' => Session::$user->id]);
        } else {
            $result = Subscriber::renewSubscriber($validated->data['id']);

            if ($result === null) {
                render('subrenew', ['id' => Session::$user->id, 'error' => 'Failed to renew']);
            } else {
                Session::setMessage('Renewed Subscriber');
                redirect('/profile/'.Session::$user->id);
            }
        }
    }

    public function renewSubscriberView(Request $request)
    {
        render('subrenew', [
            'id' => Session::$user->id,
        ]);
    }
}