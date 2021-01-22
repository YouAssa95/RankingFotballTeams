<?php

namespace Tests\Unit;

use PDO;
use Exception;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use App\Repositories\Data;
use App\Repositories\Ranking;
use App\Repositories\Repository;

class RepositoryTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();
        $this->ranking = new Ranking();
        $this->data = new Data();
        $this->repository = new Repository();
        $this->repository->createDatabase();
    }

    function testTeamsAndInsertTeam(): void
    {
        $teams = $this->data->teams();
        $this->assertEquals($this->repository->insertTeam($teams[4]), 5);
        $this->assertEquals($this->repository->teams(), [$teams[4]]);
    }

    function testMatchesAndInsertMatch(): void
    {
        $teams = $this->data->teams();
        $matches = $this->data->matches();
        // TODO : tester la méthode insertMatch
        $this->assertEquals($this->repository->insertMatch($matches[4]), 5);
        $this->assertEquals($this->repository->matches(), [$matches[4]]);
    }
     
}