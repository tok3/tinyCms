<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Erstelle 10 Menüpunkte
        \App\Models\MenuItem::factory()->count(10)->create();

      /*  DB::table('menu_items')->insert([
            [
                'name' => 'Home',
                'type' => 'header',
                'domain' => null,
                'parent_id' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Über uns',
                'type' => 'header',
                'domain' => null,
                'parent_id' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Dienstleistungen',
                'type' => 'header',
                'domain' => null,
                'parent_id' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Füge weitere Menüpunkte nach Bedarf hinzu
        ]);*/
    }
}
