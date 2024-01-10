<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class FeedbackModel extends Model
{
    protected $table      = 'feed';
    protected $primaryKey = 'id';

    protected $allowedFields = ['kategori', 'sub_kategori', 'title', 'pilihan_kepuasan', 'keterangan'];
}