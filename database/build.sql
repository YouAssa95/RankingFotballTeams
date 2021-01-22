CREATE TABLE teams(
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  name VARCHAR(50) NOT NULL
);

--  ['id' => 1, 'team0' => 7, 'team1' => 19, 'score0' => 2, 'score1' => 5, 'date' => '2048-08-03 00:00:00']

CREATE TABLE matches(
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  team0 INTEGER NOT NULL,
  team1 INTEGER NOT NULL,
  score0 INTEGER NOT NULL,
  score1 INTEGER NOT NULL,
  date DATETIME,
  UNIQUE (team0, team1)
);

-- rank, team_id et les statistiques qui vont de la colonne goal_for_count à la colonne points.
-- 'goal_for_count' => 111, 'goal_against_count' => 92, 'goal_difference' => 19, 'points' =>

CREATE TABLE ranking(

  team_id INTEGER PRIMARY KEY AUTOINCREMENT,
    goalForCount INTEGER NOT NULL,
    goalAgainstCount INTEGER NOT NULL,
    goalDifference INTEGER NOT NULL,
    points INTEGER NOT NULL,
    rank INTEGER NOT NULL,
    UNIQUE(rank),
    FOREIGN KEY (team_id) REFERENCES teams(id)
);
