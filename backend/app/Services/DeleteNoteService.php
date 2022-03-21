<?php

namespace App\Services;

use App\Repositories\INoteRepository;

class DeleteNoteService {
    private INoteRepository $noteRepository;

    public function __construct(INoteRepository $noteRepository) {
        $this->noteRepository = $noteRepository;
    }

    public function execute (string $id) {
        return $this->noteRepository->deleteById($id);
    }
}