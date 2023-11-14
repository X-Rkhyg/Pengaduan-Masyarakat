<?php

namespace App\Models;

use CodeIgniter\Model;

class PengaduanModel extends Model
{
    protected $table      = 'pengaduan';
    protected $useAutoIncrement = true;
    protected $primaryKey = 'id_pengaduan';
    protected $useTimestamps = true;
    protected $allowedFields = ['judul','isi_laporan','lokasi', 'foto', 'status', 'tanggal_pengaduan', 'id_masyarakat'];

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

    public function getDataNonDeleted()
    {
        return $this->where('status !=', 'deleted')->findAll();
    }

    public function getDataWithTwoConditions($idmasyarakat, $deleted)
    {
        // Menggunakan metode where untuk menambahkan dua kondisi
        return $this->where('id_masyarakat', $idmasyarakat)
                    ->where('status !=', $deleted)
                    ->findAll();
    }

    public function getDataWithOneConditions($deleted)
    {
        // Menggunakan metode where untuk menambahkan dua kondisi
        return $this->where('status !=', $deleted)
                    ->findAll();
    }
}
