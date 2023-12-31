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
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getEventById($id)
    {
        return Event::with('user', 'users')->findOrFail($id);
    }

    /**
     * @param $user_id
     * @return mixed
     */
    public function getEventsByUserId($user_id)
    {
        return Event::where('user_id', '=', $user_id)->get();
    }

    /**
     * @param $user_id
     * @return mixed
     */
    public function getFirstEventByUserId($user_id)
    {
        return Event::where('user_id', '=', $user_id)->first();
    }

    /**
     * @param $event_id
     * @return \Illuminate\Database\Eloquent\HigherOrderBuilderProxy|\Illuminate\Support\HigherOrderCollectionProxy|mixed
     */
    public function getUsersByEventId($event_id)
    {
        $event = Event::with('users')->findOrFail($event_id);
        return $event->users;
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
        $event = Event::findOrFail($id);
        $event->users()->attach(User::find($user_id));
        return $event;
    }
}
