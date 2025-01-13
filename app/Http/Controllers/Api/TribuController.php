<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tribu;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreTribuRequest;
use App\Http\Requests\UpdateTribuRequest;

class TribuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tribus = Tribu::all();
        return response()->json([
            'data'=> ['tribus' => $tribus],
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTribuRequest $request)
    {
        try {
            $data = $request->validated();
            $tribu = Tribu::create($data);
            return response()->json([
                'data'=> ['tribu' => $tribu, ],
                ]);
        } catch (\Throwable $th) {
            //throw $th;
            report($th);
 
            return false;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Tribu $tribu)
    {
        $tribuShow = Tribu::findOrFail($tribu->id);
        return response()->json([
            'data'=> ['tribu' => $tribuShow],
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTribuRequest $request, Tribu $tribu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tribu $tribu)
    {
        //
    }
}
