@extends('layouts.app')

@section('title', 'Avaleht')

@section('content')

    <h1 class="text-2xl font-bold mb-4">Ülesannete nimekiri</h1>

    {{-- Teated --}}

    {{-- Lisa uus ülesanne (nupp) --}}

    {{-- Nimekiri --}}
    <div class="grid gap-3">
        @forelse ($todos as $todo )
            <div class="p-4 rouded border shadow-sm 
                    {{ $todo->is_completed ? 'bg-green-50 border-green-300' : 'bg-white border-gray-300' }}">
                <div class="flex item-center justify-between">
                    <a href="{{ route('show', ['task' => $todo->id]) }}" class="font-medium {{ $todo->is_completed ? 'line-through text-gray-500' : 'text-gray-800 hover:underline' }}">
                        {{  $todo->title }}
                    </a>
                    <span class="text-sm px-2 py-1 rounded-full {{ $todo->is_completed ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800' }}">
                        
                        {{ $todo->is_completed ? 'Tehtud' : 'Tegemata' }}
                    </span>
                    
                </div>

                {{-- Millal lood --}}
                <div class="mt-2 text-xs text-gray-500">
                    {{ $todo->created_at }}
                </div>

            </div>
        @empty
            <div class="p-4 rounded border bg-yellow-50 text-yellow-800">
                Siin pole ülesandeid
            </div>
        @endforelse
    </div>

@endsection