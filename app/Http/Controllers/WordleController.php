<?php

namespace App\Http\Controllers;

use App\Models\Wordle;
use Illuminate\Http\Request;

class WordleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wordles = Wordle::orderByDesc('id')->paginate();
        return inertia('Minigames/Wordle/Index', [
            'wordles' => $wordles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'words.*.word' => 'required|string|min:1',
            'words.*.length' => 'required|integer|min:1',
        ]);

        foreach ($validatedData['words'] as $word) {
            Wordle::firstOrCreate([
                'word' => $word['word'],

            ], [
                'length' => $word['length'],
            ]);
        }



        return back()->with('success', 'Words created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Wordle $wordle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wordle $wordle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wordle $wordle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wordle $wordle)
    {
        //
    }
}
