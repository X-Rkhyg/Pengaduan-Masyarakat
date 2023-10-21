<?php

namespace App\Models;

use CodeIgniter\Model;

class PengaduanModel extends Model
{
    protected $table      = 'pengaduan';
    protected $useAutoIncrement = true;
    protected $primaryKey = 'id_pengaduan';
    protected $useTimestamps = true;
    protected $allowedFields = ['nik', 'isi_laporan', 'foto', 'status'];

    public function getPengaduan($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_pengaduan' => $id])->first();
    }
    public function getFileData($id)
{
    return $this->db->table('pengaduan')->select('foto')->where('id_pengaduan', $id)->get()->getRowArray();
}
}