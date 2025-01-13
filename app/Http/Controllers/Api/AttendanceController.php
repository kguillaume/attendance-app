<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Eglise;
use App\Models\Tribu;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attendances = Attendance::all();
        return response()->json([
            'data'=> ['attendances' => $attendances],
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAttendanceRequest $request)
    {
        $data = $request->validated();
        $attendance = Attendance::create($data);

        return response()->json([
                'data'=> ['presence_membre' => $attendance, 'user' => Auth::user(), ],
                ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        $attendanceShow = Attendance::findOrFail($attendance->id);
        return response()->json([
            'data'=> ['attendance' => $attendanceShow],
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAttendanceRequest $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        //
    }

    public function statistiques(Eglise $eglise, Tribu $tribu, DateTime $dateDebut = null, DateTime $dateFin = null){
        //Statisttiques filtre par eglise et tribu 
    }
}
