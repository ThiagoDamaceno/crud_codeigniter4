<?php

namespace App\Controllers;

use App\Factories\GetNotePartionalTitleFactory;
use CodeIgniter\RESTful\ResourceController;

class GetNotePartionalTitleController extends ResourceController {
    public function execute ($partionalTitle = null, $orderBy = 'asc') {
        $getNoteByPartionalTitleService = GetNotePartionalTitleFactory::getServiceObject();

        return $this->response->setJSON($getNoteByPartionalTitleService->execute($partionalTitle, $orderBy));
    }
}