<?php

namespace App\Repositories;

use App\Entities\NoteEntity;
use Config\Database;

class NoteRepository implements INoteRepository {
    private function getUserEntitiesByRows ($rows) {
        $notes = [];

        foreach ($rows as $row) {
            $notes[] = new NoteEntity($row->title, $row->description, [
                'id'=>$row->id,
                'createdAt'=>$row->created_at,
                'updatedAt'=>$row->updated_at
            ]);
        }
        return $notes;
    }

    public function create (NoteEntity $noteEntity) {
        $db = Database::connect();

        $db->table('note')->insert([
            'id'=>$noteEntity->id,
            'title'=>$noteEntity->title,
            'description'=>$noteEntity->description,
            'created_at'=>$noteEntity->createdAt,
            'updated_at'=>$noteEntity->updatedAt
        ]);

        $db->close();

        return $noteEntity;
    }
    public function getAll () {
        $db = Database::connect();

        $result = $db->table('note')->get();

        $db->close();

        return $this->getUserEntitiesByRows($result->getResult());
    }
    public function getById ($id) {
        $db = Database::connect();

        $result = $db->table('note')
        ->where('id', $id)
        ->get(1)->getResult()[0];

        $db->close();

        $note = $this->getUserEntitiesByRows($result->getResult())[0];

        return $note;
    }

    public function getAllByPartialTitle ($partialTitle, $orderBy = 'asc') {
        $db = Database::connect();

        $result = $db->table('note')
            ->like('title', '%' . $partialTitle . '%')
            ->orderBy('title', $orderBy)
            ->get();

        $db->close();

        return $this->getUserEntitiesByRows($result->getResult());
    }

    public function deleteById ($id) {
        $db = Database::connect();

        $result = $db->table('note')
            ->where('id', $id)
            ->delete();

        $db->close();

        return $result;
    }

    public function update ($noteEntity) {
        $noteEntity->refreshUpdatedAt();

        $db = Database::connect();

        $query = $db->table('note')
            ->where('id', $noteEntity->id)
            ->update([
                'updated_at'=>$noteEntity->updatedAt,
                'title'=>$noteEntity->title,
                'description'=>$noteEntity->description
            ]);
        

        return $query;
    }
}