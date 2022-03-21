<?php

namespace App\Factories;

use App\Repositories\NoteRepository;
use App\Services\GetAllNotesService;

class GetAllNotesFactory {
    private function __construct() { }

    public static function getServiceObject() {
        return new GetAllNotesService(new NoteRepository());
    }
}