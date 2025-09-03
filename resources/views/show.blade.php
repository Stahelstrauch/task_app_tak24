@extends('layouts.app')

@section('title', 'Üks ülesanne')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Ülesande detailid</h1>

    <table class="min-w full border border-gray-300 bg-white rounded shadow">
        <tr>
            <th class="border px-4 py-2 text-left w-40 bg-gray-50">Ülesanne</th>
            <td class="border px-4 py-2">{{$todo->title}}</td>
        </tr>
        <tr>
            <th class="border px-4 py-2 text-left w-40 bg-gray-50">Kirjeldus</th>
            <td class="border px-4 py-2">{{$todo->description}}</td>
        </tr>
        <tr>
            <th class="border px-4 py-2 text-left w-40 bg-gray-50">Tehtud</th>
            <td class="border px-4 py-2 flex items-center gap-4">
                <span>{{$todo->is_completed ? 'Jah' : 'Ei'}}</span>
            
                <form action="" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit" class="px-3 py-1 rounded bg-blue-300 hover:bg-blue-400 text-white">Muuda</button>
            </form>
            </td>
        </tr>
        <tr>
            <th class="border px-4 py-2 text-left w-40 bg-gray-50">Loodud</th>
            <td class="border px-4 py-2">{{$todo->created_at->diffForHumans()}}</td>
        </tr>
        <tr>
            <th class="border px-4 py-2 text-left w-40 bg-gray-50">Muudetud</th>
            <td class="border px-4 py-2">{{$todo->updated_at->format('d.m.Y H:i:s')}}</td>
        </tr>

    </table>

    <div class="mt-6">
        <a href="{{ route('welcome') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Tagasi nimekirja</a>
        <a href="" class="inline-block bg-yellow-400 text-black px-4 py-2 rounded hover:bg-yellow-300">Muuda ülesannet</a>

        {{-- Kustutamine on vorm ja sellel peab olema turvanõue csrf --}}
        <form action="" method="POST" class="inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Kustuta ülesanne</button>
        </form>

    </div>


@endsection