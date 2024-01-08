<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class feedback extends Model
{
    protected $table      = 'feed';
    protected $primaryKey = 'id_feed';

    protected $allowedFields = ['id_feed', 'kategori', 'sub_kategori', 'title', 'pilihan_kepuasan', 'keterangan'];
}