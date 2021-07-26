<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function Login (Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required',
            ]);

            $validator->setAttributeNames([
                'email' => trans('E-mail address'),
                'password' => trans('Password'),
            ]);

            if ($validator->fails()) {
                return redirect(route('admin_login'))->withErrors($validator)->withInput();
            }

            if (!Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password'), 'is_active' => 1, 'is_admin' => 1])) {
                $validator->errors()->add('email', trans('E-mail address or password is not valid!'));
                return redirect(route('admin_login'))->withErrors($validator)->withInput();
            }

            return redirect(route('admin_dashboard'));
        }

        return view('admin.login');
    }

    public function Logout ()
    {
        Auth::logout();
        return redirect(route('admin_login'));
    }

    public function Dashboard ()
    {
        return view('admin.dashboard', [
            'site_title' => trans('Dashboard'),
            'site_subtitle' => 'Version 3.0',
            'breadcrumb' => [
                ['title' => trans('Admin'), 'url' => route('admin_dashboard'), 'icon' => 'fa-dashboard'],
                ['title' => trans('Dashboard')],
            ]
        ]);
    }
}
