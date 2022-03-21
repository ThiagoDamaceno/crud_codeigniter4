<?php

namespace App\Services;
use App\Repositories\INoteRepository;

class GetAllNotesService {
    private INoteRepository $noteRepository;

    public function __construct(INoteRepository $noteRepository) {
        $this->noteRepository = $noteRepository;
    }

    public function execute () {
        return $this->noteRepository->getAll();
    }
}