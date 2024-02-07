<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //$svuota_utenti = $this->command->ask("Svuoto la tabella utenti? [Y/N]");
        //Svuota la tabella user prima di popolarla.
        //FATE ATTENZIONE! va usato solo in un if ben congegnato
        // Schema::disableForeignKeyConstraints();
        // User::truncate();
        // Schema::enableForeignKeyConstraints();

        //"Validazione" input
        $num_utenti = $this->command->ask("Quanti utenti? ");
        $num_eventi = $this->command->ask("Quanti eventi?");

        $this->call(UserSeeder::class, false, compact("num_utenti"));
        $this->call(EventSeeder::class, false, compact("num_eventi", "num_utenti"));

        // $this->call([
        //     UserSeeder::class,
        //     EventSeeder::class
        // ]);
    }
}
