<?php

namespace App\Http\Controllers;

use App\Models\Sesion;
use App\Models\Activities;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Activity;

class SesionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $sesions = Sesion::all();
        $sesions = Sesion::paginate(5);

        return view('sesions.index', ['sesions' => $sesions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $activities = Activity::all();
        return view('sesions.createAll', ['activities' => $activities]);
    }
    public function createAll()
    {
        return view('sesions.createAll');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fecha = Carbon::createFromFormat('Y-m-d', $request->fecha);
        $horaInicio = Carbon::createFromTimeString($request->inicio, 'Europe/London');
        $horaFin = Carbon::createFromTimeString($request->fin, 'Europe/London');

        for ($i = 1; $i < $fecha->daysInMonth + 1; ++$i) {

            $horaInicio = Carbon::create($fecha->year, $fecha->month, $i, $horaInicio->hour, $horaInicio->minute, $horaInicio->second);
            $horaFin = Carbon::create($fecha->year, $fecha->month, $i, $horaFin->hour, $horaFin->minute, $horaFin->second);

            if (in_array($horaInicio->englishDayOfWeek, $request->dias)) {

                $sesion = new Sesion;
                $sesion->inicio = $horaInicio->format('Y-m-d H:i:s');
                $sesion->fin = $horaFin->format('Y-m-d H:i:s');
                $sesion->activity_id = $request['activity'];
                $sesion->save();

                // $sesions[] = $sesion;
                // echo $dia->englishDayOfWeek;
            }

            // $dates[] = Carbon::createFromDate($fecha->year, $fecha->month, $i, $fecha->hour, $fecha->minute,$fecha->second )->format('Y-m-d h:i:s');
        }

        return redirect(('/sesions'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sesion  $sesion
     * @return \Illuminate\Http\Response
     */
    public function show(Sesion $sesion)
    {
        return view('sesions.show', ['sesion' => $sesion]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sesion  $sesion
     * @return \Illuminate\Http\Response
     */
    public function edit(Sesion $sesion)
    {
        return view('sesions.edit', ['sesion' => $sesion]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sesion  $sesion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sesion $sesion)
    {
        $sesion->fill($request->all());

        $sesion->save();
        return redirect('/sesions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sesion  $sesion
     * @return \Illuminate\Http\Response
     */
    public function sign(Request $request)
    {
        $user = Auth::user();

        $id = $request->id;
        $sesion = Sesion::find($id);
        $sesion->addUser($user);
        $activities = Activity::all();
        // $users = User::all();
        // return view('user.index' , ['users'=> $users]);
        return view('reservas.reservas', ['activities' => $activities]);

    }
    public function signDias(Request $request)
    {
        $user = Auth::user();

        $id = $request->id;
        $sesion = Sesion::find($id);
        $sesion->addUser($user);
        $activities = Activity::all();
        // $users = User::all();
        // return view('user.index' , ['users'=> $users]);
        return view('reservas.reservasDia', ['activities' => $activities]);

    }
    public function search()
    {
        $activities = Activity::all();
        return view('sesions.searchSesion', ['activities' => $activities]);
    }


    public function solicitarReservas()
    {
        //$activities = Activity::with('sesion.monitor')->get();
        $activities = Activity::all();
        return view('reservas.reservas', ['activities' => $activities]);
    }
    public function reservasDia()
    {
        //$activities = Activity::with('sesion.monitor')->get();
        $activities = Activity::all();
        return view('reservas.reservasDia', ['activities' => $activities]);
    }
    public function filter(Request $request)
    {
        //$activities = Activity::with('sesion.monitor')->get();
        $id = $request->id;
        $mes = $request->mes;
        $activity = Activity::find($id);
        //$sesions = Sesion::where("activity_id‟,{{$activity->id}})->orderBy("inicio‟,‟asc‟)->get();
        $sesions = $activity->sesionesMes($mes);

        //$sesions = $activity->sesions;
        return $sesions;
    }
    public function filter2(Request $request)
    {
        //$activities = Activity::with('sesion.monitor')->get();
        $fecha = $request->fecha;
        //$activity = Activity::find($id);
       // Activity::with('sesion.monitor')->get();
        $sesions = Sesion::where('inicio', 'LIKE', "%$fecha%")->get();

        //$sesions = $activity->sesions;
        return $sesions;
    }
    public function inscribir(Request $request)
    {
        $user = Auth::user();
        $id = $request->id;
        $sesion = Sesion::find($id);
        sign($user,$sesion);
        //$activities = Activity::with('sesion.monitor')->get();

        //$sesions = $activity->sesions;
    }
    public function destroy(Sesion $sesion)
    {
        //
    }
}
