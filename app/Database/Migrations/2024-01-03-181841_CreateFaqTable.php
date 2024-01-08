<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFaqTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_faq' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'kategori' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'pertanyaan' => [
                'type' => 'TEXT',
            ],
            'jawaban' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id_faq');
        $this->forge->createTable('faq');
    }

    public function down()
    {
        $this->forge->dropTable('faq');
    }
}
