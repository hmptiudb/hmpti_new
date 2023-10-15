<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranModel extends Model
{
    protected $table            = 'h_pembayaran';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['id', 'id_tagihan', 'id_member', 'tgl_bayar'];

    public function getTotalKasTahunan($tahun)
    {
        $total = 0;
        $query = $this->table($this->table)
            ->select('h_tagihan.nominal')
            ->join('h_tagihan', $this->table . '.id_tagihan=h_tagihan.id')
            ->where('YEAR(h_tagihan.tgl_tagihan)', $tahun)->get()->getResultArray();
        foreach ($query as $key => $value) {
            $total += $value['nominal'];
        }
        return $total;
    }
}
