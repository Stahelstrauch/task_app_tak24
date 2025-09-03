<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $todos = [
            ['title' => 'Osta piim', 'description' => 'Käia poes ja osta liiter piima.'],
            ['title' => 'Maksa arved', 'description' => 'Elektri- ja üüriarved vajavad maksmist.'],
            ['title' => 'Helista emale', 'description' => 'Uuri kuidas tal läheb ja kas ta on terve.'],
            ['title' => 'Korista tuba', 'description' => 'Kasuta tolmuimejat töö tegemiseks.'],
            ['title' => 'Tee kodutöid', 'description' => 'Valmista ette järgmise päeva koolitööd.'],
            ['title' => 'Jookse 5 km', 'description' => 'Mine parki ja lõõgastu.'],
            ['title' => 'Loe raamatut', 'description' => 'Jätka mõne raamatu lugemist või alusta uuega.'],
            ['title' => 'Kirjuta rakenduse koodi', 'description' => 'Kirjuta Laraveli koodi.'],
            ['title' => 'Tee süüa', 'description' => 'Valmista endale lemmik õhtusöök-'],
            ['title' => 'Kirjuta päevikusse', 'description' => 'Märgi üles tänase päeva tegevused.'],
        ]; //Listi loomine, todos on muutuja
        
        foreach($todos as $todo) {
            DB::table('todos')->insert([
                'title' => $todo['title'],
                'description' => $todo['description'],
                'is_completed' => fake()->boolean(30), //Ligikaudu 30% on true, 70% false
                //'is_completed' => false,  //kõik on valed
                'created_at' => now(),
                'updated_at' => now(),

            ]);

        }
    }
}
