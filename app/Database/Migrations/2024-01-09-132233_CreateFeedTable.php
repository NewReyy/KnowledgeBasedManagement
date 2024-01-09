<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFeedbackTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'kategori' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'sub_kategori' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'pilihan_kepuasan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'keterangan' => [
                'type' => 'TEXT',
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('feed', true);
    }

    public function down()
    {
        $this->forge->dropTable('feed', true);
    }
}