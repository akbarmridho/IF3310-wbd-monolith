<?php

namespace App\Http\Controller;

use App\Model\Subscriber;
use Core\Base\BaseController;
use Core\Http\Request;
use Core\Validator\Validator;

class SubscriberController extends BaseController {
    public function subscribe(Request $request) 
    {
        // todo create Subcriber
    }

    public function renewSubscriber(Request $request) 
    {
        // todo call renew subscriber
    }

    public function getSubscriber(Request $request) {
        // FIXME
        var_dump(Subscriber::findById(4));
    }

    public function view(Request $request)
    {
        // todo view subscription
    }
}