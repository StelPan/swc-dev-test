<?php

namespace App\Services;

use App\Models\Event;

class EventService
{
    private $model;

    public function __construct(Event $model)
    {
        $this->model = $model;
    }

    /**
     * Get all events.
     * @return Event[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getEvents()
    {
        return $this->model->all();
    }
}
