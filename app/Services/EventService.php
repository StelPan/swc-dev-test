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
        return Event::with('user')->get();
    }

    /**
     * Create a new event
     * @param array $data
     * @return mixed
     */
    public function createEvent(array $data)
    {
        return $this->model->create($data);
    }
}
