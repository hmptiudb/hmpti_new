<?php

namespace App\Controllers;

use App\Models\MemberModel;
use App\Models\PembayaranModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $PembayaranModel = new PembayaranModel();
        $MemberModel = new MemberModel();
        return view('index', [
            'title' => "Dashboard",
            'subtitle' => "",
            'total_kas_tahunan' => $PembayaranModel->getTotalKasTahunan(date('Y')),
            'total_member_aktif' => $MemberModel->getMemberAktifNum()
        ]);
    }
}
