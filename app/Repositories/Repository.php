<?php

namespace App\Repositories;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Repositories\Data;
use App\Repositories\Ranking;

class Repository
{
    function createDatabase(): void 
    {
        DB::unprepared(file_get_contents('database/build.sql'));
    }
    function insertTeam(array $team): int
    {
        
       $id = DB::table('teams') -> insertGetId(['id'=> $team['id'],'name' => $team['name']]);
       echo $id;
       return $id;
    }

    function insertMatch(array $match): int
    {
        $id= DB::table('matches')-> insertGetId(['id'=>$match['id'] ,'team0' => $match['team0'],
        'team1' => $match['team1'],'score0' => $match['score0'],'score1'=> $match['score1'],
        'date'=> $match['date']]);
        echo $id;
        return $id;
   
    }

    function teams(): array
    {
        return DB::table('teams')->get()->toArray();
    }

    function matches(): array
    {
        return DB::table('matches')->get()->toArray();
    }

    // function deleteTeam(array $match): int
    // {
    //     return DB::table('matches')-> insertGetId(['team0' => $match['team0'],'team1' => $match['team1'],'score0' =>$match['score0'],'score1'=>$match['score1'],'date'=> $match['date']]);
    // }


}
