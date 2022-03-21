<?php

namespace App\Factories;

use App\Repositories\NoteRepository;
use App\Services\GetNoteByPartionalTitleService;

class GetNotePartionalTitleFactory {
    private function __construct() { }

    public static function getServiceObject() {
        return new GetNoteByPartionalTitleService(new NoteRepository());
    }
}