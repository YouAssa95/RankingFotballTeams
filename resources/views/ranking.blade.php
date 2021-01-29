<!doctype html>
<html>
    <head></head>
    <body>
            <table>
                <th><td>N°</td><td>Equipe</td> <td>MJ</td> <td>G</td> <td>N</td> <td>P</td> <td>BP</td> <td>BC</td> <td>DB</td> <td>PTS</td>
                </th>
                @foreach ($ranking as $user)
                <tr>
                    <td>{{ $user['rank'] }}</td>
                    <td><a href="{{route('teams.show',  ['teamId'=>5])}}">{{ $user['name'] }}</a></td>
                    <td>{{ $user['match_played_count'] }}</td>
                    <td>{{ $user['won_match_count'] }}</td>
                    <td>{{ $user['draw_match_count'] }}</td>
                    <td>{{ $user['lost_match_count'] }}</td>
                    <td>{{ $user['goal_for_count'] }}</td>
                    <td>{{ $user['goal_against_count'] }}</td>
                    <td>{{ $user['goal_difference'] }}</td>
                    <td>{{ $user['points'] }}</td>
                </tr>
                @endforeach
            </table>
            
            <table>
                @foreach ($matchesJoues as $row)
                <tr>
                    <td>{{ $row['date'] }}</td>
                    <td>{{ $row['score0'] }}</td>
                    <td>{{ $row['score1'] }}</td>
                </tr>
                @endforeach
            </table>
           
    </body>
</html>