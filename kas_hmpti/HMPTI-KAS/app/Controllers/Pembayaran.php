<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PembayaranModel;

class Pembayaran extends BaseController
{
    protected $PembayaranModel;

    public function __construct()
    {
        $this->PembayaranModel = new PembayaranModel();
    }

    public function aksi_pembayaran()
    {
        if ($this->request->isAJAX()) {
            $id_member = $this->request->getPost('id_member');
            $id_tagihan = $this->request->getPost('id_tagihan');
            $status_pembayaran = $this->request->getPost('status_pembayaran');

            // belum lunas: hapus data pembayaran milik member
            if ($status_pembayaran == 1) {
                $this->PembayaranModel->where('id_tagihan', $id_tagihan)->where('id_member', $id_member)->delete();
                $json = [
                    'success' => 'Status pembayaran berhasil diubah'
                ];
            } elseif ($status_pembayaran == 2) { // lunas: tambah data pembayaran milik member
                $this->PembayaranModel->insert([
                    'id_tagihan' => $id_tagihan,
                    'id_member' => $id_member,
                    'tgl_bayar' => date('Y-m-d')
                ]);
                $json = [
                    'success' => 'Status pembayaran berhasil diubah'
                ];
            } else {
                $json = [
                    'error' => 'Silahkan pilih aksi'
                ];
            }
            echo json_encode($json);
        } else {
            exit("Tidak dapat diproses");
        }
    }

    // menambahkan ke pembayaran kas
    public function check_kas()
    {
        if ($this->request->isAJAX()) {
            $id_member = $this->request->getPost('id_member');
            $id_tagihan = $this->request->getPost('id_tagihan');
            try {
                $this->PembayaranModel->insert([
                    'id_tagihan' => $id_tagihan,
                    'id_member' => $id_member,
                    'tgl_bayar' => date('Y-m-d')
                ]);
                $json = [
                    'success' => 'Pembayaran kas berhasil disimpan'
                ];
            } catch (\Throwable $th) {
                $json = [
                    'error' => 'Pembayaran kas gagal disimpan'
                ];
            }
            echo json_encode($json);
        } else {
            exit("Tidak dapat diproses");
        }
    }

    // menghapus ke pembayaran kas
    public function uncheck_kas()
    {
        if ($this->request->isAJAX()) {
            $id_member = $this->request->getPost('id_member');
            $id_tagihan = $this->request->getPost('id_tagihan');
            try {
                $this->PembayaranModel->where('id_member', $id_member)->where('id_tagihan', $id_tagihan)->delete();
                $json = [
                    'success' => 'Pembayaran kas berhasil dihapus'
                ];
            } catch (\Throwable $th) {
                $json = [
                    'error' => 'Pembayaran kas gagal dihapus'
                ];
            }
            echo json_encode($json);
        } else {
            exit("Tidak dapat diproses");
        }
    }
}
