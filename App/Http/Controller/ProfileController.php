<?php

namespace App\Http\Controller;

use App\Model\Subscriber;
use App\Model\User;
use Core\Base\BaseController;
use Core\Http\Request;
use Core\Session\Session;
use Core\Validator\Rules\Enum;
use Core\Validator\Rules\Min;
use Core\Validator\Types\IntType;
use Core\Validator\Types\StringType;
use Core\Validator\Validator;

class ProfileController extends BaseController
{
    public function view(Request $request)
    {
        render('profile', [
            'user' => User::findById($request->getRouteParam('id')),
            'stats' => User::getStatistics($request->getRouteParam('id')),
            'subscription' => Subscriber::findById($request->getRouteParam('id'))
        ]);
    }

    public function updateView(Request $request)
    {
        render('editprofile');
    }

    public function update(Request $request)
    {
        $validated = Validator::validate($request->getFormData(), [
            'name' => new StringType(required: true, rules: [new Min(6)]),
            'bio' => new StringType(required: false, nullable: true)
        ]);

        if ($validated->isError()) {
            render('editprofile', ['errors' => $validated->errorMessages]);
            return;
        }

        User::update(Session::$user->id, $validated->data);
        Session::setMessage('Profile updated');
        redirect('profile/' . Session::$user->id);
    }

    public function passwordView(Request $request)
    {
        render('editpassword');
    }

    public function password(Request $request)
    {
        $validated = Validator::validate($request->getFormData(), [
            "oldPassword" => new StringType(true, rules: [new Min(6)]),
            "password" => new StringType(true, rules: [new Min(6)]),
            "passwordVerify" => new StringType(true, rules: [new Min(6)]),
        ]);

        if (!$validated->isError()) {
            if ($validated->data['password'] !== $validated->data['passwordVerify']) {
                $validated->errorMessages['password'] = ['Password confirmation does not same'];
            }

            if (!password_verify($validated->data['oldPassword'], Session::$user->password)) {
                $validated->errorMessages['oldPassword'] = ['Old password does not same'];
            }
        }

        if ($validated->isError()) {
            render('editpassword', [
                'errors' => $validated->errorMessages,
            ]);
        } else {
            $password = password_hash($validated->data['password'], PASSWORD_BCRYPT);

            User::update(Session::$user->id, [
                'password' => $password,
            ]);

            Session::setMessage('Password changed');
            redirect('profile/' . Session::$user->id);
        }
    }

    public function delete(Request $request)
    {
        Session::logout();
        User::remove(Session::$user->id);
        Session::setMessage('Account deleted successfully');
    }
}
