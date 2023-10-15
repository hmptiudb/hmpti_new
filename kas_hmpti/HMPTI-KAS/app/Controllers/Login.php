<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MemberModel;

class Login extends BaseController
{
    // public function __construct()
    // {
    //     session()->start();
    // }
    public function index()
    {
        return view('login', [
            'title' => 'Login',
        ]);
    }

    public function cek_login()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'email' => [
                'label' => 'Email',
                'rules' => 'required|trim|valid_email',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'valid_email' => '{field} tidak valid'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
        ]);

        // menghilangkan spasi menggunakan trim
        $input = [];
        foreach ($this->request->getPost() as $key => $value) {
            $input[$key] = trim($value);
        }
        $email = $input['email'];
        $password = $input['password'];

        if (!$validation->run($input)) {
            return redirect()->to(base_url('/login'))->withInput();
        }

        $MemberModel = new MemberModel();
        $cek_bendahara = $MemberModel->getBendaharaAktif($email);
        if (!$cek_bendahara) {
            session()->setFlashdata('msg', 'error#Email ' . $email . ' tidak terdaftar di sistem !');
            return redirect()->to(base_url('/login'));
        }
        $password_bendahara = $cek_bendahara['nim'] . "-" . strtolower($cek_bendahara['kelas']);
        if ($password === $password_bendahara) {
            $session = [
                'id_bendahara' => $cek_bendahara['nim'],
                'time' => date('Y-m-d H:i:s'),
                'email' => $cek_bendahara['email'],
                'nama' => $cek_bendahara['nama'],
                'jabatan' => $cek_bendahara['nama_jabatan']
            ];
            session()->set('LoginBendahara', $session);
            session()->setFlashdata('msg', 'success#Selamat datang ' . $email);
            return redirect()->to(base_url('/dashboard'));
        } else {
            session()->setFlashdata('msg', 'error#Password salah !');
            return redirect()->to(base_url('/login'))->withInput();
        }
    }
}
