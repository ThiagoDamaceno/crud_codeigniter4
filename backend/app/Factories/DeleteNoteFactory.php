<?php

namespace App\Factories;

use App\Repositories\NoteRepository;
use App\Services\DeleteNoteService;

class DeleteNoteFactory {
    private function __construct() { }

    public static function getServiceObject() {
        return new DeleteNoteService(new NoteRepository());
    }
}