<?php

namespace App\Services;

use App\Entities\NoteEntity;
use App\Repositories\INoteRepository;

class UpdateNoteService {
    private INoteRepository $noteRepository;

    public function __construct(INoteRepository $noteRepository) {
        $this->noteRepository = $noteRepository;
    }

    public function execute (string $id, string $title, string $description) {
        $noteEntity = new NoteEntity($title, $description, [
            'id'=>$id
        ]);

        return $this->noteRepository->update($noteEntity);
    }
}