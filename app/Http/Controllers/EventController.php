<?php

namespace App\Http\Controllers;

use App\Services\EventService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * @var EventService
     */
    private $eventService;

    public function __construct(EventService $eventService)
    {
        $this->eventService = $eventService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $this->eventService->createEvent(array_merge($request->all(), ['user_id' => auth()->user()->id]));
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = $this->eventService->getEventById($id);
        return view('events.show', compact('event'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function keepEvent($id)
    {
        /// TODO: Implement
        $event = $this->eventService->getEventById($id);

        $isInclude = $event->users->first(function ($user) { return $user->id === Auth::user()->id;});
        if ($isInclude) {
            return redirect()
                ->route('events.show', ['event' => $event->id])
                ->with('error', 'Вы уже являетесь участником');
        }

        $this->eventService->touchEvent($id, Auth::user()->id);

        return redirect()->route('events.show', ['event' => $id]);
    }

    /**
     * @param $id
     * @return void
     */
    public function destroy ($id)
    {

    }
}
