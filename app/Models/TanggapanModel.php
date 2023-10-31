<?php

namespace App\Models;

use CodeIgniter\Model;

class TanggapanModel extends Model
{
    protected $table      = 'tanggapan';
    protected $useAutoIncrement = true;
    protected $primaryKey = 'id_tanggapan';
    protected $allowedFields = ['id_pengaduan', 'tanggapan', 'id_petugas', 'tanggal_tanggapan', 'status'];

    public function getTanggapan($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_pengaduan' => $id])->first();
    }
}
