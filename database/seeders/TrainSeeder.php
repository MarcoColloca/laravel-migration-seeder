<?php

namespace Database\Seeders;

use App\Models\Train;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TrainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        // Array e variabili di supporto
        $stations = ['Torino Porta Nuova', 'Milano Centrale', 'Genova Brignole', 'Messina Marittina', 'Roma Termini', 'Palermo Centrale', 'Bologna Centrale', 'Napoli Centrale'];
        $agencies = ['trenitalia', 'italo', 'frecciarossa', 'intercity'];        
        
        
        
        
        for($i = 0; $i < 11; $i++)
        {   
            // Creo l'istanza del model Train
            $new_train = new Train();
            
            $support_departure_station = $faker->randomElement($stations);
            $support_arrival_station = $faker->randomElement($stations) /*!= $support_departure_station ? $support_arrival_station : $faker->randomElement($stations)*/;


            // Codice che popola la nostra istanza
            $new_train->agency = $faker->randomElement($agencies);
            $new_train->departure_station = $faker->randomElement($stations);
            $new_train->arrival_station = $faker->randomElement($stations) != $new_train->departure_station ? $new_train->arrival_station : $faker->randomElement($stations) ;
            $new_train->departure_time = $faker->dateTime()->format('d-m-Y H:i:s');
            $new_train->arrival_time = $faker->dateTimeInInterval($new_train->departure_time, '+1 day')->format('d-m-Y H:i:s');
            $new_train->train_code = $faker->bothify('??-######');
            $new_train->train_carriages = $faker->numberBetween(6, 15) ;
            $new_train->on_time = $faker->randomElement([true, false]) ;
            $new_train->cancelled = $faker->optional()->randomElement([true, false]) ;



            // Salvo i dati con il medoto save
            //$new_train->save();

            dump($new_train);
        }

    }
}
