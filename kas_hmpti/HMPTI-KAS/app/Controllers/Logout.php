<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Logout extends BaseController
{
    public function index()
    {
        session()->remove('LoginBendahara');

        session()->setFlashData("msg", 'success#Anda Berhasil Keluar');
        return redirect()->to(site_url('/login'));
    }
}
