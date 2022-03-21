<?php

namespace App\Services;

use App\Entities\NoteEntity;
use App\Repositories\INoteRepository;

class CreateNoteService {
    private INoteRepository $noteRepository;

    public function __construct(INoteRepository $noteRepository) {
        $this->noteRepository = $noteRepository;
    }

    public function execute (string $title, string $description) {
        $noteEntity = new NoteEntity($title, $description);

        return $this->noteRepository->create($noteEntity);
    }
}