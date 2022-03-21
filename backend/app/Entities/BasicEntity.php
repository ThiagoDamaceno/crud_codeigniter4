<?php

namespace App\Entities;

class BasicEntity {
    public $createdAt;
    public $updatedAt;

    public function __construct($attributes) {
        date_default_timezone_set('America/Sao_Paulo');
        
        $this->createdAt = $attributes['createdAt'] ?? date('Y-m-d H:i:s');
        $this->updatedAt = $attributes['updatedAt'] ?? date('Y-m-d H:i:s');
    }

    public function refreshUpdatedAt () {
        $this->updatedAt = date('Y-m-d H:i:s');
    }
}