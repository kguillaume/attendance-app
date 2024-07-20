<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Eglise;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreEgliseRequest;
use App\Http\Requests\UpdateEgliseRequest;

class EgliseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eglises = Eglise::all();
        return response()->json([
            'data'=> ['eglises' => $eglises],
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEgliseRequest $request)
    {
        try {
            $data = $request->validated();
            $eglise = Eglise::create($data);
            return response()->json([
                'data'=> ['eglise' => $eglise, 'user' => Auth::user(), ],
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
    public function show(Eglise $eglise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEgliseRequest $request, Eglise $eglise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Eglise $eglise)
    {
        //
    }
}
