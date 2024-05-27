<?php

namespace Database\Seeders;

use App\Models\Train;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TrainSeeder extends Seeder
{

    public function genTwoCities(Faker $faker) {
        $start = $faker->city();
        do {
            $end = $faker->city();
        } while ($start === $end);
        return [$start, $end];
    }

    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        // Array e variabili di supporto
        //$stations = ['Torino Porta Nuova', 'Milano Centrale', 'Genova Brignole', 'Messina Marittina', 'Roma Termini', 'Palermo Centrale', 'Bologna Centrale', 'Napoli Centrale'];
        $agencies = ['trenitalia', 'italo', 'frecciarossa', 'intercity'];        
        
        
        for($i = 0; $i < 100; $i++)
        {   
            // Creo l'istanza del model Train
            $new_train = new Train();
            
            list($start, $end) = $this->genTwoCities($faker);
            $new_train->departure_station = $start;
            $new_train->arrival_station = $end;
            $new_train->agency = $faker->randomElement($agencies);
            $new_train->departure_time = $faker->dateTimeBetween('-1 month', '+1 month');
            $new_train->arrival_time = $faker->dateTimeInInterval($new_train->departure_time, '+1 day');
            $new_train->train_code = $faker->bothify('??-######');
            $new_train->train_carriages = $faker->numberBetween(6, 15);
            
            $new_train->on_time = $faker->randomElement([true, false]);
            if( $new_train->on_time === true)
            {
                $new_train->cancelled = false;
            }else{
                $new_train->cancelled = $faker->randomElement([true, false]);
            };



            // Salvo i dati con il medoto save
            $new_train->save();

            //dump($new_train);
        }

    }
}
