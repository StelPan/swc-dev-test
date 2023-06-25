<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\EventService;
use Illuminate\Http\Request;

class EventUserController extends Controller
{
    /**
     * @var EventService
     */
    private $service;

    /**
     * @param EventService $service
     */
    public function __construct(EventService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($event_id)
    {
        $users = $this->service->getUsersByEventId($event_id);
        return response()->json(['users' => $users]);
    }
}
