<?php

namespace App\Services;

use App\Models\Event;
use App\Models\User;

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
     * Get event by id.
     * @param $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function getEventById($id)
    {
        return Event::with('user', 'users')->find($id);
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

    /**
     * @param int $id
     * @param int $user_id
     * @return mixed
     */
    public function touchEvent(int $id, int $user_id)
    {
        $event = Event::find($id);
        $event->users()->attach(User::find($user_id));
        return $event;
    }
}
