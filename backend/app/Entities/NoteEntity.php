<?php

namespace App\Entities;

class NoteEntity extends BasicEntityWithId {
    public $title;
    public $description;

    /**
     * $attibutes = [ 'id'=>string, 'createdAt'=>date, 'updatedAt'=>date ]
     */
    public function __construct($title, $description, $attributes = []) {
        parent::__construct($attributes);

        $this->title = $title;
        $this->description = $description;
    }
}