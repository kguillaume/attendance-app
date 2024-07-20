<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Culte;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCulteRequest;
use App\Http\Requests\UpdateCulteRequest;

class CulteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cultes = Culte::all();
        return response()->json([
            'data'=> ['cultes' => $cultes],
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCulteRequest $request)
    {
        //
        $data = $request->validated();
        $culte = Culte::create($data);

        return response()->json([
                'data'=> ['culte' => $culte, 'user' => Auth::user(), ],
                ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Culte $culte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCulteRequest $request, Culte $culte)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Culte $culte)
    {
        //
    }
}
