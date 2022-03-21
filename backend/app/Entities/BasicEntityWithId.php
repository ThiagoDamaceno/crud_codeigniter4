<?php

namespace App\Entities;

use App\Utils\Generator;

class BasicEntityWithId extends BasicEntity {
    public $id;

    public function __construct($attributes) {
        parent::__construct($attributes);

        $this->id = $attributes['id'] ?? Generator::uuidv4();
    }
}