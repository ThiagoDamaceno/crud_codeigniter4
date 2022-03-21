<?php

namespace App\Controllers;

use App\Factories\DeleteNoteFactory;
use CodeIgniter\RESTful\ResourceController;

class DeleteNoteController extends ResourceController {
    public function execute ($id = '') {
        $deleteNoteService = DeleteNoteFactory::getServiceObject();

        return $this->response->setJSON($deleteNoteService->execute($id));
    }
}