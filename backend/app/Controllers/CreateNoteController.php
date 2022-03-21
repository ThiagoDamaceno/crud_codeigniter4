<?php

namespace App\Controllers;

use App\Factories\CreateNoteFactory;
use CodeIgniter\RESTful\ResourceController;

class CreateNoteController extends ResourceController {
    public function execute () {
        
        $createNoteService = CreateNoteFactory::getServiceObject();

        $requestBody = json_decode($this->request->getBody());

        $title = $requestBody->title;
        $description = $requestBody->description;

        return $this->response->setJSON($createNoteService->execute($title, $description));
    }
}