<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Appointment;
use App\Models\Article;
use App\Models\Patient;
use App\Models\Sale;
use App\Models\Service;
use App\Models\Supplier;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
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
        
        $this->call(RoleSeeder::class);

        $this->call(UserSeeder::class);

        $articles = Article::factory(200)->create();
        $sales    = Sale::factory(800)->create();
        $patients = Patient::factory(50)->create();
                    Service::factory(50)->create();
                    Appointment::factory(100)->create();
                    Supplier::factory(20)->create();
        

        foreach ($sales as $sale){
            $sale->saleArticle()->attach([
                rand(1,200)
            ]);
        }

        foreach ($articles as $article){
            $article->articleSupplier()->attach([
                rand(1,10),
                rand(11,20)
            ]);
        }
        
        foreach ($patients as $patient){
            $patient->user()->attach(1);
        }

        foreach ($patients as $patient){
            $patient->patientService()->attach([
                rand(1,50)
            ]);
        }

    }
}
