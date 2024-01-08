<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class FaqModel extends Model
{
    protected $table      = 'faq';
    protected $primaryKey = 'id_faq';

    protected $allowedFields = ['id_faq', 'kategori', 'pertanyaan', 'jawaban'];
}