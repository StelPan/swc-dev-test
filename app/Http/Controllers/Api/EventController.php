<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\EventService;
use Illuminate\Http\Request;

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

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $event = $this->eventService->getEventById($id);
        return response()->json(['event' => $event]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $event = $this->eventService->createEvent(array_merge($request->all(), ['user_id' => auth()->user()->id]));
        return response()->json(['message' => 'Event create successfully', 'event' => $event]);
    }

    public function destroy($id)
    {
        // TODO: Destroy event
        $event = $this->eventService->getEventById($id);
        if ($event->user->id !== Auth::user()->id) {
            return response()->json(['error' => 'Access denied'], 401);
        }

        $event->users()->detach($event->users->map(function ($user) {
            return $user->id;
        }));

        $event->delete();

        return response()->json(['message' => 'Delete event success'], 200);
    }

    public function join($id)
    {
        $this->eventService->touchEvent($id, Auth::user()->id);
        return response()->json(['success' => true, 'message' => 'Event joined successfully']);
    }
}
                        