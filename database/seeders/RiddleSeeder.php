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
            'lat' => 48.2105419,
            'lng' => 16.4031041,
            'title' => 'Hoch hinaus',
            'copy' => 'Konstantins Hügel wurde erklommen, doch hoch ist man nicht. Etwas viel höheres kann man von hier erspähen, doch wie viele Meter hoch müsste man noch steigen um diesen höchsten Punkt zu erreichen?',
            'solution' => '107',
            'reward' => 'T'
        ]);
        Riddle::create([
            'lat' => 48.2110104,
            'lng' => 16.4044404,
            'title' => 'Affen im Gehege',
            'copy' => 'Eine Sensation: In einem Zoo gibt es ein Gehege mit 100 goldenen, sprechenden Affen. Allerdings lügt ein Teil der Affen immer, ein anderer sagt immer die Wahrheit. Ein Wärter fragt die Affen wie viele von ihnen lügen. Der erste sagt “Ein Affe lügt.”, der zweite sagt “Zwei Affen lügen”, und so weiter bis zum letzten der sagt “Hundert Affen lügen.” Wie viele Affen Lügen wirklich?',
            'solution' => '99',
            'reward' => 'G'
        ]);
        Riddle::create([
            'lat' => 48.2103417,
            'lng' => 16.4061582,
            'title' => 'Spielende Affen',
            'copy' => 'Wenn die Affen mit dem Spielen fertig sind, reisen sie nach Süden in ihr altes großes Haus, das an einer Seite keine Fassade mehr hat. Welche Hausnummer hat die Affensesidenz?',
            'solution' => '7073',
            'reward' => 'E'
        ]);
        Riddle::create([
            'lat' => 48.2146456,
            'lng' => 16.4000034,
            'title' => 'Boxen',
            'copy' => 'Rocky Balboa nahm stattdessen Schweinehälften. Wie viele des weniger blutigen Pendants könnt ihr hier, gestreift in den Farben des Wappens dieser Stadt, finden?',
            'solution' => '9',
            'reward' => 'R'
        ]);
        Riddle::create([
            'lat' => 48.2158673,
            'lng' => 16.4009394,
            'title' => 'Totenschädel',
            'copy' => 'Vor euch erhebt sich das Portal ein eine Welt des Schreckens. Kommt nur näher und zählt wie viele weiße Totenschädel ihr finden könnt. (Tipp: Aufgemahlte und Schädel auf den Wägen zählen nicht.)',
            'solution' => '15',
            'reward' => 'E'
        ]);
        Riddle::create([
            'lat' => 48.2154467,
            'lng' => 16.4002211,
            'title' => 'Wer sitzt wo?',
            'copy' => '4 Leute wollen mit einem Auto fahren, das vier Plätze hat. In wie vielen unterschiedlichen Sitzkombinationen könne sie Sitzen wenn nur einer den Führerschein hat?',
            'solution' => '6',
            'reward' => 'S'
        ]);
        Riddle::create([
            'lat' => 48.2139737,
            'lng' => 16.3975454,
            'title' => 'Die schnell alternde Tochter',
            'copy' => 'Carl Micheal Zieher soll über seine Tochter gesagt haben: 
            Meine Tochter altert wie im Fluge: Vorgestern war sie noch 15 - nächstes Jahr wird sie schon 18. Wann hatte sie Geburtstag? (Tipp: Gebt das Datum in der Form DD.MM. an)',
            'solution' => '31.12.',
            'reward' => 'N'
        ]);
        Riddle::create([
            'lat' => 48.2141534,
            'lng' => 16.3968582,
            'title' => 'Einrichtungsfragen',
            'copy' => 'Auf diesem Baum will sich Nadine in Zukunft die Hände waschen. Welche Nummer trägt er?',
            'solution' => '231',
            'reward' => 'E'
        ]);
        Riddle::create([
            'lat' => 48.2152361,
            'lng' => 16.3964246,
            'title' => 'Usichtbar?',
            'copy' => 'Was könnt ihr hier hören, aber nicht sehen?',
            'solution' => 'glocke',
            'reward' => 'I'
        ]);
    }
}
