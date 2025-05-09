<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function appointmentJson()
    {

        $data = Appointment::with(['client'])->get();

        $events = [];
        if ($data == null) {
            $events[] = [];
        }else{
            foreach ($data as $appointment) {
                $events[] = [
                    'id' => $appointment->id,
                    'title' => $appointment->title,
                    'start' => $appointment->start,
                    'end' => $appointment->end,
                    'className' => 'fc-'.$appointment->event_color,
                    'description' => $appointment->description,
                    'client_id' => $appointment->client->id
                ];
            }
        }
        return $events;

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
        return view('calendario.index', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeAjax(Request $request)
    {
        $clients = Client::find($request->client_id);
        $description = '<strong>Cliente:</strong> '.$clients->firstname. ' '.$clients->lastname.' '.$clients->second_surname. '<br>'
            . '<strong>Descripción:</strong> '.$request->description;

        $event = Appointment::create([
            'client_id' => $request->client_id,
            'start' => $request->start,
            'end' => $request->end,
            'title' => $request->title,
            'event_color' => 'event-primary',
            'description' => $description,
        ]);

        return response()->json($event);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Appointment::find($id);
        $data->delete();

        return response()->json($data);
    }

    public function typeEvent($event)
    {
        switch ($event) {
            case 'Consulta':
                $color = 'event-primary';
                break;
            case 'Limpieza':
                $color = 'event-success';
                break;
            case 'Empaste':
                $color = 'event-info';
                break;
            case 'Extracción':
                $color = 'event-warning';
                break;
            case 'Endodoncia':
                $color = 'event-danger';
                break;
            case 'Corona':
                $color = 'event-pink';
                break;
            case 'Otro':
                $color = 'event-primary-dim';
                break;
            default:
                $color = 'event-primary';
                break;
        }
        return $color;
    }
}
