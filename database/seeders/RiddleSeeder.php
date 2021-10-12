<?php

namespace Database\Seeders;

use App\Models\Riddle;
use Illuminate\Database\Seeder;

class RiddleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Riddle::create([
            'lat' => 48.2118077,
            'lng' => 16.4003608,
            'copy' => 'Basis',
            'solution' => 'ipsum',
            'reward' => ''
        ]);
        Riddle::create([
            'lat' => 48.2105419,
            'lng' => 16.4031041,
            'copy' => 'Turm',
            'solution' => 'ipsum',
            'reward' => 'T'
        ]);
        Riddle::create([
            'lat' => 48.2110104,
            'lng' => 16.4044404,
            'copy' => 'Affe',
            'solution' => 'ipsum',
            'reward' => 'G'
        ]);
        Riddle::create([
            'lat' => 48.2103417,
            'lng' => 16.4061582,
            'copy' => 'Affenspielplatz',
            'solution' => 'ipsum',
            'reward' => 'E'
        ]);
        Riddle::create([
            'lat' => 48.2146456,
            'lng' => 16.4000034,
            'copy' => 'Sandsäcke',
            'solution' => 'ipsum',
            'reward' => 'R'
        ]);
        Riddle::create([
            'lat' => 48.2158673,
            'lng' => 16.4009394,
            'copy' => 'Totenschädel',
            'solution' => 'ipsum',
            'reward' => 'E'
        ]);
        Riddle::create([
            'lat' => 48.2154467,
            'lng' => 16.4002211,
            'copy' => 'Geldscheisser',
            'solution' => 'ipsum',
            'reward' => 'S'
        ]);
        Riddle::create([
            'lat' => 48.2139737,
            'lng' => 16.3975454,
            'copy' => 'Schnurbartmann',
            'solution' => 'ipsum',
            'reward' => 'N'
        ]);
        Riddle::create([
            'lat' => 48.2141534,
            'lng' => 16.3968582,
            'copy' => 'Platane',
            'solution' => 'ipsum',
            'reward' => 'E'
        ]);
        Riddle::create([
            'lat' => 48.2152361,
            'lng' => 16.3964246,
            'copy' => 'Platane',
            'solution' => 'ipsum',
            'reward' => 'I'
        ]);
    }
}
