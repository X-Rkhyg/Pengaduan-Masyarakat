<?php

namespace App\Models;

use CodeIgniter\Model;

class PetugasModel extends Model
{
    protected $table = "petugas";
    protected $primaryKey = "id_petugas";
    protected $allowedFields = ["nama_petugas", "username", "password", "telepon", "level"];
    protected $useTimestamps = true;
    
}