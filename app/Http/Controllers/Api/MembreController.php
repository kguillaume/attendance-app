<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Membre;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreMembreRequest;
use App\Http\Requests\UpdateMembreRequest;

class MembreController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Membre::all();
        return response()->json([
            'data'=> ['members' => $members],
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMembreRequest $request)
    {
        //
        try {
            $data = $request->validated();
            $member = Membre::create($data);

            return response()->json([
                'data'=> ['member' => $member, 'user' => Auth::user(), ],
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
    public function show(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMembreRequest $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        //
    }
}
