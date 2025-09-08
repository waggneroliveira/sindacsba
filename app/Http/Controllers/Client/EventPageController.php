<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Holidays;
use Illuminate\Http\Request;

class EventPageController extends Controller
{
    public function index(Request $request){
        $eventId = $request->query('event_id');
        
        // Consulta base
        $query = Event::active()->sorting();
        
        // Se há um event_id, filtrar por esse evento específico
        if ($eventId) {
            $query->where('id', $eventId);
        }
        
        $events = $query->get(['id', 'date', 'title', 'hours', 'description', 'link'])
            ->map(function ($event) {
                // Certifique-se de que $event->date é um objeto DateTime/Carbon
                $date = $event->date;
                if (is_string($date)) {
                    $date = \Carbon\Carbon::parse($date);
                }
                
                return [
                    'id' => $event->id,
                    'date' => $date->format('Y-m-d'),
                    'title' => $event->title,
                    'hours' => $event->hours,
                    'description' => $event->description,
                    'link' => $event->link
                ];
            });

        $holidays = Holidays::get()->map(function ($holiday) {
            $date = $holiday->date;
            if (is_string($date)) {
                $date = \Carbon\Carbon::parse($date);
            }
            return [
                'date' => $date->format('Y-m-d'),
                'name' => $holiday->name,
            ];
        });

        return view('client.blades.event', compact('events', 'holidays', 'eventId'));
    }
}
