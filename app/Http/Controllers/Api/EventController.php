<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\EventService;

class EventController extends Controller
{
    /**
     * @var EventService
     */
    private $eventService;

    /**
     * @param EventService $eventService
     */
    public function __construct(EventService $eventService)
    {
        $this->eventService = $eventService;
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $events = $this->eventService->getEvents();
        return response()->json(['events' => $events]);
    }
}
