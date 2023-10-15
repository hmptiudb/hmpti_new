<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MemberModel;
use App\Models\TagihanModel;

class Kasmember extends BaseController
{
    protected $MemberModel;
    protected $TagihanModel;

    public function __construct()
    {
        $this->MemberModel = new MemberModel();
        $this->TagihanModel = new TagihanModel();
    }

    public function index()
    {
        if ($this->request->getGet('tahun')) {
            $tahun = $this->request->getGet('tahun');
            $data_tagihan = $this->TagihanModel->where('YEAR(tgl_tagihan)', $this->request->getGet('tahun'))
                ->orderBy('tgl_tagihan', 'ASC')->get()->getResultArray();
        } else {
            $tahun = date('Y');
            $data_tagihan = $this->TagihanModel->orderBy('tgl_tagihan', 'ASC')->get()->getResultArray();
        }
        // dd($data_tagihan);
        return view('kas_member/v_index', [
            'title' => 'Daftar Kas Member',
            'subtitle' => "",
            'db' => \Config\Database::connect(),
            'member' => $this->MemberModel->getMemberAktif(),
            'tagihan' => $data_tagihan,
            'tahun' => $tahun
        ]);
    }

    public function cetak_laporan($tahun = null)
    {
        if ($tahun !== null) {
            $data_tagihan = $this->TagihanModel->where('YEAR(tgl_tagihan)', $tahun)
                ->orderBy('tgl_tagihan', 'ASC')->get()->getResultArray();
            $data = [
                'title' => 'Cetak Laporan',
                'member' => $this->MemberModel->getMemberAktif(),
                'tagihan' => $data_tagihan,
                'tahun' => $tahun,
                'db' => \Config\Database::connect(),
            ];
            return view('kas_member/cetak_laporan', $data);
        } else {
            session()->setFlashdata('msg', 'error#Anda jangan main - main !');
            return redirect()->to(base_url('/kasmember'));
        }
    }

    public function detail_kas()
    {
        if ($this->request->isAJAX()) {
            $id_member = $this->request->getPost('id_member');
            $data_member = $this->MemberModel->getMemberAktif($id_member);
            $data_tagihan = $this->TagihanModel->orderBy('tgl_tagihan', 'DESC')->get()->getResultArray();
            $json = [
                'data' => view('kas_member/detail_kas', [
                    'member' => $data_member,
                    'data_tagihan' => $data_tagihan,
                    'db' => \Config\Database::connect()
                ])
            ];
            echo json_encode($json);
        } else {
            exit("Tidak dapat diproses !");
        }
    }
}
