<?php

namespace App\Services;
use App\Repositories\INoteRepository;

class GetNoteByPartionalTitleService {
    private INoteRepository $noteRepository;

    public function __construct(INoteRepository $noteRepository) {
        $this->noteRepository = $noteRepository;
    }

    /**
     * $orderBy = 'asc' | 'desc'
     */
    public function execute ($partionalTitle, $orderBy = 'asc') {
        return $this->noteRepository->getAllByPartialTitle($partionalTitle, $orderBy);
    }
}