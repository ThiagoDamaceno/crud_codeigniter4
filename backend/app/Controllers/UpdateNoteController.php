<?php

namespace App\Controllers;

use App\Factories\UpdateNoteFactory;
use CodeIgniter\RESTful\ResourceController;

class UpdateNoteController extends ResourceController {
    public function execute () {
        $updateNoteService = UpdateNoteFactory::getServiceObject();

        $requestBody = json_decode($this->request->getBody());

        $id = $requestBody->id;
        $title = $requestBody->title;
        $description = $requestBody->description;

        return $this->response->setJSON($updateNoteService->execute($id, $title, $description));
    }
}