<?php

namespace App\Http\Controllers;

use App\Services\EventService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @var EventService
     */
    private $eventService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(EventService $eventService)
    {
        $this->eventService = $eventService;

        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        $events = $this->eventService->getEvents();
        return view('home', compact('events', 'user'));
    }
}
