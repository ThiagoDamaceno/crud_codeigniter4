<?php

namespace App\Utils;

use Ramsey\Uuid\Uuid;

class Generator {
    private function __construct () { }

    public static function uuidv4 () {
        return Uuid::uuid4()->toString();
    }
}