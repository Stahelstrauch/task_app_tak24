@extends('layouts.app')

@section('title', 'Muuda ülesannet')

@section('content')
    <h1 class="text-2xl font-bold mb-4">
        Muuda ülesannet
    </h1>

    {{--  Veateated --}}
    @if ($errors->any())
        <div class="mb-4 p-3 bg-re-100 text-red-700 rounded">
            <ul class='list-disc list-inside'>
                @foreach ($errors->all() as $error )
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        
    @endif

    <form action="{{ route('update', $todo->id) }}" method="post" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label for="title" class="block font-medium">Pealkiri</label>
                <input type="text" name="title" id="title" value="{{ old('title', $todo->title)}}" class="w-full border rounded px-3 py-2" required>
        </div>
        <div>
            <label for="description" class="block font-medium">Kirjeldus</label>
            <textarea name="description" id="description" rows="4" class="w-full border rounded px-3 py-2">{{ old('description', $todo->description) }}</textarea>
        </div>
        <div>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Uuenda ülesannet</button>
            <a href="{{ route('show', $todo->id) }}" class="ml-2 text-blue-600 hover:underline">Katkesta</a>
        </div>


    </form>

@endsection