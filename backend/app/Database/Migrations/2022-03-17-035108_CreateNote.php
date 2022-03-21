<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateNote extends Migration
{
    public function up () {
        $this->forge->addField([
            'id' => [
                'type' => 'UUID'
            ],
            'title' => [
                'type' => 'VARCHAR'
            ],
            'description' => [
                'type' => 'TEXT'
            ],
            'created_at' => [
                'type' => 'VARCHAR'
            ],
            'updated_at' => [
                'type' => 'VARCHAR'
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('note', true);
    }

    public function down () {
        $this->forge->dropTable('note', true);
    }
}
