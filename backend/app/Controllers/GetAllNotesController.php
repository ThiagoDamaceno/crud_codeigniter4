<?php

namespace App\Controllers;

use App\Factories\GetAllNotesFactory;
use CodeIgniter\RESTful\ResourceController;

class GetAllNotesController extends ResourceController {
    public function execute () {
        $getAllNotesServices = GetAllNotesFactory::getServiceObject();

        return $this->response->setJSON($getAllNotesServices->execute());
    }
}