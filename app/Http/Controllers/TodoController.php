<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller {
    public function index() {
        // $todos = DB::table('todos')->orderByDesc('created_at')->get();
        $todos = Todo::query()->orderBy('is_completed')
        ->orderByRaw('CASE WHEN is_completed = 0 THEN created_at END ASC')
        ->orderByRaw('CASE WHEN is_completed = 1 THEN created_at END DESC')
        ->get();


        return view('welcome', ['todos' => $todos]); // resources/views/welcome.blade.php
    }
    public function show(Todo $task) {
        // Tagasta vaade ja anna todo kaasa
        return view('show', ['todo' => $task]);

    }

    public function create() {
        // Vormi näitamise meetod
        return view('create');
    }
    public function store(Request $request) {
        // Vormilt info salvestamine andmebaasi
        //Valideerime sisestuse
        $validated = $request->validate([
            'title' => 'required|string|max:255', //ei saa tühi olla, peab olema tekst ja max 255 tähemärki
            'description' => 'nullable|string', // võib olla tühi, peab olema tekst
        ]);

        //Loome uue todo (is_completed vaikimisi false)
        Todo::create($validated);

        // Tagasi nimekirja, koos teatega
        return redirect()->route('welcome')->with('success', 'Ülesanne lisatud!');
    }
    //Funktsioon muutmiseks
    public function edit(Todo $task) {
        return view('edit', ['todo' => $task]);
    }
    public function update(Request $request, Todo $task) {
        //Andmete valideerimine
        $validated = $request->validate([
            'title' => 'required|string|max:255', //ei saa tühi olla, peab olema tekst ja max 255 tähemärki
            'description' => 'nullable|string', // võib olla tühi, peab olema tekst
        ]);

        //Muudame kirjet
        $task->update($validated);

        //Tagasi detail vaatesse
        return redirect()->route('show', $task)->with('success', 'Ülesanne uuendatud!');
    }
    public function toggle(Todo $task) {
        //Muuda väärtus vastupidaiseks, ! on eitus ei läheb jahiks, jah, eiks.
        $task->is_completed = ! $task->is_completed;

        // Iga kord, kui olek muutub, suurenda counterit
        $task->counter += 1;
        //$task->increment('counter); See on laraveli variant

        //Salvesta kirje
        $task->save();

        return redirect()->route('show', $task)->with('success', 'Ülesande olek muudetud!');
    }

    public function destroy(Todo $task) {
        $task->delete(); //Ülesande kustutamine
        return redirect()->route('welcome')->with('success', 'Ülesanne kustutatud!');
    }

}
