<?php

namespace App\Factories;

use App\Repositories\NoteRepository;
use App\Services\CreateNoteService;

class CreateNoteFactory {
    private function __construct() { }

    public static function getServiceObject() {
        return new CreateNoteService(new NoteRepository());
    }
}