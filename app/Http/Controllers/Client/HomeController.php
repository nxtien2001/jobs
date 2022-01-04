<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('client.index');
    }

    public function profile()
    {
        return view('client.profile');
    }

    public function signup()
    {
        return view('client.register');
    }

    public function login()
    {
        return view('client.login');
    }

    public function changepass()
    {
        return view('client.doimatkhau');
    }

    public function forgot()
    {
        return view('client.forgot-password');
    }

    public function job()
    {
        return view('client.single-job-page');
    }

    public function company()
    {
        return view('client.single-company-profile');
    }

    public function yeuthich()
    {
        return view('client.yeuthich');
    }

    public function ungtuyen()
    {
        return view('client.ungtuyen');
    }
}
