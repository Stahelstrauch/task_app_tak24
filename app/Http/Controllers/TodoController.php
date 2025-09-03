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

}
