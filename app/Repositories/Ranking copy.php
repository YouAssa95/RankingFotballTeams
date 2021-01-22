<?php


namespace App\Repositories;
class Ranking 
{ 
    function goalDifference(int $goalFor, int $goalAgainst): int 
    {
       return $goalFor - $goalAgainst;
    }

    function points(int $wonMatchCount, int $drawMatchCount): int
    {
            return 3*$wonMatchCount+$drawMatchCount;
    }

    function teamWinsMatch(int $teamId, array $match): bool
    {   if ($match['team0']==$teamId) {
                return ($match['score0']>$match['score1']);
        }
        else if($match['team1']==$teamId) {
                return  ($match['score1']>$match['score0']);
        }else {
            return 0;
        }
        // return ($match['team0']==$teamId) ? ($match['score0']>$match['score1']) :   ($match['score1']>$match['score0']);
    }

    function teamLosesMatch(int $teamId, array $match): bool
    {
        return ($match['team0']==$teamId) ? ($match['score0']<$match['score1']) :   ($match['score1']<$match['score0']);
    }

    function teamMakesADraw(int $teamId, array $match): bool
    {   
        
        return ($match['team0']==$teamId || $match['team1']==$teamId ) ? ($match['score0']==$match['score1']) :   false;
    }

    function goalForCountDuringAMatch(int $teamId, array $match): int 
    {
        
        return ($match['team0']==$teamId) ? ($match['score0']) : (($match['team1']==$teamId) ? $match['score1'] :  0) ;
        
    }

    function goalAgainstCountDuringAMatch(int $teamId, array $match): int 
    {
        
        return ($match['team0']==$teamId) ? ($match['score1']) : (($match['team1']==$teamId) ? $match['score0'] :  0) ;
        
    }

    function goalForCount(int $teamId, array $matches): int
    {
        $sum = 0;
        foreach ($matches as $mach) {
          $sum += goalForCountDuringAMatch( $teamId, $mach);     
        }
        return $sum;
    }

    function goalAgainstCount(int $teamId, array $matches): int
    {
        $sum = 0;
        foreach ($matches as $mach) {
          $sum += goalAgainstCountDuringAMatch( $teamId, $mach);     
        }
        return $sum;
    }

    function wonMatchCount(int $teamId, array $matches): int
    {
        $NbreMachsGagnes = 0;
        foreach ($matches as $mach) {
            $NbreMachsGagnes = (goalForCountDuringAMatch( $teamId, $mach)-goalAgainstCountDuringAMatch( $teamId, $mach)>0) ? ($NbreMachsGagnes++) : $NbreMachsGagnes;     
        }
        return $NbreMachsGagnes;   
    }

    function lostMatchCount(int $teamId, array $matches): int
    {
        $NbreMachsPerdus = 0;
        foreach ($matches as $mach) {
            $NbreMachsPerdus = (goalForCountDuringAMatch( $teamId, $mach)-goalAgainstCountDuringAMatch( $teamId, $mach)<0) ? ($NbreMachsPerdus++) : $NbreMachsPerdus;     
        }
        return $NbreMachsPerdus;  
    }

    function drawMatchCount(int $teamId, array $matches): int
    {
        $nbre = 0;
        foreach ($matches as $mach) {
            $nbre = (goalForCountDuringAMatch( $teamId, $mach)==goalAgainstCountDuringAMatch( $teamId, $mach)) ? ($nbre++) : $nbre;     
        }
        return $nbre;  
    }




}