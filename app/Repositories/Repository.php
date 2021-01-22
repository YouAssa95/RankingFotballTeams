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
        
        return DB::table('teams') -> insertGetId(['id'=> $team['id'],'name' => $team['name']]);
       
       
    }

    function insertMatch(array $match): int
    {
        return DB::table('matches')-> insertGetId(['id'=>$match['id'] ,'team0' => $match['team0'],
        'team1' => $match['team1'],'score0' => $match['score0'],'score1'=> $match['score1'],
        'date'=> $match['date']]);
        
   
    }

    function teams(): array
    {
        return DB::table('teams')->orderBy('id', 'asc')->get()->toArray();
    }

    function matches(): array
    {
    
        return DB::table('matches')->orderBy('id', 'asc')->get()->toArray();
    }

    function fillDatabase(): void 
    {
        $this->data = new Data();
        $teams = $this->data->teams();
        $matches = $this->data->matches();

        foreach ($matches as $match) {
            $this->insertMatch($match);
        }
        foreach ($teams as $team) {
            $this-> insertTeam($team);
        }
    }

    function team($teamId) : array 
    {
        
// Exceptions 
        try {
            
            $row= DB::table('teams')->where('id', $teamId)->get()->toArray();
            return ['id'=> $row[0]['id'],'name' => $row[0]['name']]; 
            
          } catch (Exception $exception) {
            throw new Exception('Équipe inconnue');
            // $message = $exception->getMessage();
          }
       
        
    }


    

    function updateRanking(): void 
    {
            
        
        DB::table('ranking')->delete();
        $teams = $this->teams();
        $matches = $this->matches();

        $ranking = new Ranking();

        $sortedRanking = $ranking -> sortedRanking( $teams , $matches);
        
        foreach ($sortedRanking as $row) {
            DB::table('ranking')-> insert(['team_id'=>$row['team_id'] ,'goalForCount' => $row['goal_for_count'] 
            ,'goalAgainstCount' => $row['goal_against_count'] ,
           'goalDifference'=> $row['goal_difference'] ,'points' => $row['points'], 'rank'=>$row['rank']]);
        }

    }






}
