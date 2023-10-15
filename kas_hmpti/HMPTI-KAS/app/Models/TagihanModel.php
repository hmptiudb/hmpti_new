<?php

namespace App\Models;

use CodeIgniter\Model;

class TagihanModel extends Model
{
    protected $table            = 'h_tagihan';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['id', 'tgl_tagihan', 'nominal', 'keterangan', 'id_bendahara'];

    public function getTagihan($id = null)
    {
        if ($id !== null) {
            return $this->table($this->table)
                ->select($this->table . '.*, h_member.nama')
                ->join('h_member', 'h_member.nim=' . $this->table . '.id_bendahara')
                ->where($this->table . '.id', $id)
                ->get()->getRowArray();
        }
        return $this->table($this->table)
            ->select($this->table . '.*, h_member.nama')
            ->join('h_member', 'h_member.nim=' . $this->table . '.id_bendahara')
            ->orderBy('tgl_tagihan', 'DESC')
            ->get()->getResultArray();
    }
}
