<?php

use Illuminate\Database\Seeder;
use App\Repositories\Repository;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        touch('database/database.sqlite');
        $repository = new Repository(); 
        $repository->createDatabase();

        $repository->insertTeam(['name' => 'Marseille']);
        $repository->insertTeam(['name' => 'Paris']);

        $repository->insertMatch(['team0' =>2, 'team1' =>5, 
        'score0'=>3, 'score1'=>0, 
        'date'=>'2048-01-01 10:00']);
        
       
        
    }

}
