<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Reserva;
use PhpParser\Node\Stmt\TryCatch;

class CalendarController extends Controller
{
    public function calendar(Request $request, $success = false)
    {
        if (isset($request->date)) {
            $date = Carbon::createFromDate($request->date);
        }else
        {
            $date = Carbon::now();
        }
        $monthNumber = $date->format('m');
        $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $fecha = Carbon::parse($date);
        $mes = $meses[($fecha->format('n')) - 1];
        $startOfCalendar = $date->copy()->firstOfMonth()->startOfWeek(Carbon::MONDAY);
        $endOfCalendar = $date->copy()->lastOfMonth()->endOfWeek(Carbon::SUNDAY);

        $html = '<div class="calendar">';

        $html .= '<div class="month-year w-full">';

        $html .= '<span class="month">' . $mes . '</span>';
        $html .= '<span class="year">' . $date->format('Y') . '</span>';
        $html .= '</div>';

        $html .= '<div class="days">';

        $dayLabels = ['Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab', 'Dom'];
        foreach ($dayLabels as $dayLabel) {
            $html .= '<span class="day-label">' . $dayLabel . '</span>';
        }

        while ($startOfCalendar <= $endOfCalendar) {
            $extraClass = $startOfCalendar->format('m') != $date->format('m') ? ' dull  ' : '';
            $extraClass .= $startOfCalendar->isWeekend() ? ' weekend' : '';
            $extraClass .= $startOfCalendar->isToday() ? ' today' : '';
            $extraClass .= $startOfCalendar->isPast() ? ' past' : ' hover';

            if (str_contains($extraClass, 'weekend') || str_contains($extraClass, 'past') && !str_contains($extraClass, 'today')) {
                $extraClass = str_replace(' hover', '', $extraClass);
                $html .= '<span class="day ' . $extraClass . '"><span class="content">' . $startOfCalendar->format('j') . '</span></span>';
            } else {
                $html .= '<span class="day ' . $extraClass . '" type="button" data-modal-target="staticModal" data-modal-toggle="staticModal""><span class="content">' . $startOfCalendar->format('j') . '</span></span>';
            }
            $startOfCalendar->addDay();
        }

        if (isset($request->date)) {
            $date = Carbon::createFromDate($request->date);
            $nextMonth = $date->copy()->addMonth();
            $prevMonth = $date->copy()->subMonth() < Carbon::now() ? Carbon::now() : $date->copy()->subMonth();
        }else{
            $nextMonth = $date->copy()->addMonth();
            $prevMonth = $date->copy()->subMonth();
        }
        

        $html .= '</div></div>';
        return view('auth.register', [
            'calendar' => $html,
            'monthNumber' => $monthNumber,
            'nextMonth' => $nextMonth,
            'prevMonth' => $prevMonth,
            'success' => $success,
        ]);
    }

    public function reservar(Request $request)
    {
        $fullDate = Carbon::parse($request->horas . ' ' . $request->fecha)->format('Y-m-d H:i:s');
        $reserva = new Reserva();
        $reserva->nombre = $request->nombre;
        $reserva->email = $request->email;
        $reserva->telefono = $request->phone;
        $reserva->fecha = $fullDate;
        $request->validate([
            'nombre' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'fecha' => 'required',
            'horas' => 'required',
        ]);
        
        $reserva->save();
        return $this->calendar(new Request(), true);
    }
}
