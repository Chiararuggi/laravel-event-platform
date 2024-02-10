<?php

namespace App\Http\Controllers\Admin; 
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use App\Models\Tag;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function validation($data)
    {
        $validated = Validator::make(
            $data,
            [
                "name" => "required|min:5|max:50",
                "date" => "required",
                "available_tickets" => "max:500",

            ],
        )->validate();

        return $validated;
    }


    public function index()
    {
        $events = Event::all();
        $tags = Tag::all();

        return view("admin.events.index", compact("events", "tags"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();
        return view("admin.events.create", compact("tags"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        $data = $request->all();
        $validated_data = $this->validation($data);

        $newEvent = new Event();

        $newEvent->fill($validated_data);
        $newEvent->save();

        if ($request->tags) {
            $newEvent->tags()->attach($request->tags);
        }

        return redirect()->route("admin.events.show", $newEvent->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        $tags = Tag::all();
        return view("admin.events.show", compact("event", "tags"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $tags = Tag::all();
        return view("admin.events.edit", compact("event", "tags"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        $data = $request->validated();
        $event->update($data);
        if ($request->filled("tags")) {
            $data["tags"] = array_filter($data["tags"]) ? $data["tags"] : [];
            $event->tags()->sync($data["tags"]);
        }

        return redirect()->route("admin.events.show", $event->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route("admin.events.index");
    }
}
