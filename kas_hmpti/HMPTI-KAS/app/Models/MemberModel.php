<?php

namespace App\Models;

use CodeIgniter\Model;

class MemberModel extends Model
{

    protected $table            = 'h_member';
    protected $primaryKey       = 'nim';
    protected $allowedFields    = ['nim', 'email', 'nama', 'kelas', 'id_jabatan', 'kontak', 'deskripsi', 'image', 'aktif'];

    public function getMemberAktif($id = null)
    {
        if ($id !== null) {
            return $this->table($this->table)
                ->select('h_member.nama, h_member.nim, h_jabatan.nama_jabatan, h_divisi.nama_divisi')
                ->join('h_jabatan', $this->table . '.id_jabatan=h_jabatan.id_jabatan')
                ->join('h_divisi', 'h_jabatan.id_divisi=h_divisi.id_divisi')
                ->where('aktif =', 1)
                ->where('nim', $id)->get()->getRowArray();
        }
        return $this->table($this->table)->where('aktif =', 1)->orderBy('nama', 'ASC')->get()->getResultArray();
    }

    public function getMemberAktifNum()
    {
        return $this->table($this->table)->where('aktif =', 1)->orderBy('nama', 'ASC')->get()->getNumRows();
    }

    public function getBendaharaAktif($email)
    {
        return $this->table($this->table)
            ->select('h_member.nama, h_member.nim, h_jabatan.nama_jabatan, h_divisi.nama_divisi, h_member.kelas, h_member.email')
            ->join('h_jabatan', $this->table . '.id_jabatan=h_jabatan.id_jabatan')
            ->join('h_divisi', 'h_jabatan.id_divisi=h_divisi.id_divisi')
            ->where('aktif =', 1)
            ->where('h_jabatan.nama_jabatan', 'Bendahara')
            ->orWhere('h_jabatan.nama_jabatan', 'Ketua')
            ->orWhere('h_jabatan.nama_jabatan', 'Wakil Ketua')
            ->where('h_member.email', $email)->get()->getRowArray();
    }

    public function getMemberCekTagihan($cek_status, $id_tagihan)
    {
        $query = $this->table($this->table)->where('aktif =', 1)
            ->join('h_pembayaran', $this->table . ".nim=h_pembayaran.id_member")
            ->where('h_pembayaran.id_tagihan', $id_tagihan)
            ->orderBy($this->table . '.nama', 'ASC')
            ->get()->getResultArray();
        // jika sudah iuran
        if ($cek_status == 2) {
            return $query;
        } else if ($cek_status == 1) {  // jika belum iuran
            $sudah_lunas = [""];
            foreach ($query as $q) {
                $sudah_lunas[] = $q['nim'];
            }
            return $this->table($this->table)
                ->where('aktif =', 1)
                ->whereNotIn('nim', $sudah_lunas)
                ->orderBy('nama', 'ASC')->get()->getResultArray();
        }
    }
}
