<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Se chiamato singolarmente inserisce il mio utente e altri 2 utenti casuali
     *
     * @return void
     */
    public function run(Faker $faker, $num_utenti = 2)
    {

        //Controlla se esiste già uno specifico utente, altrimenti lo crea
        if (!User::where("email", "luca.lambia@gmail.com")->first()) {
            $mainUser = new User();
            $mainUser->name = "Luca";
            $mainUser->email = "luca.lambia@gmail.com";
            $mainUser->password = Hash::make('password');
            $mainUser->save();
        }

        for ($i = 0; $i < $num_utenti; $i++) {
            $newUser = new User();

            $newUser->name = $faker->name();
            $newUser->email = $faker->email();
            $newUser->password = Hash::make('password');

            $newUser->save();
        }

        echo "You can login with: [" . User::find(1)->email . "]/[password]";
    }
}
