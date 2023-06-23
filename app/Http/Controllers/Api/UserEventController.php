<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\EventService;
use Illuminate\Http\Request;

class UserEventController extends Controller
{
    private $eventService;

    public function __construct(EventService $eventService)
    {
        $this->eventService = $eventService;
    }

    /**
     * @param $user_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($user_id)
    {
        $events = $this->eventService->getEventsByUserId($user_id);
        return response()->json(['events' => $events]);
    }
}
