<?php

namespace App\Factories;

use App\Repositories\NoteRepository;
use App\Services\UpdateNoteService;

class UpdateNoteFactory {
    private function __construct() { }

    public static function getServiceObject() {
        return new UpdateNoteService(new NoteRepository());
    }
}