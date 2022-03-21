<?php

namespace App\Repositories;

use App\Entities\NoteEntity;

interface INoteRepository {
    public function create (NoteEntity $noteEntity);
    public function getAll ();
    public function getById ($id);
    public function getAllByPartialTitle ($partialTitle);
    public function deleteById ($id);
    public function update ($noteEntity);
}