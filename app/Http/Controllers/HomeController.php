<?php

namespace App\Http\Controllers;

use App\Services\EventService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        $event = $this->eventService->getFirstEventByUserId(Auth::user()->id);
        if ($event) {
            return redirect()->route('events.show', ['event' => $event->id])->with('event', $event);
        }

        return view('home');
    }
}
