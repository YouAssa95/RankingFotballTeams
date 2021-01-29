<!doctype html>
<html>
    <head></head>
    <body>
    <table>
        @foreach ($matchesJoues as $row)
            <tr>
                <td>{{ $row['date']  }}</td> 
                <td>{{ $row['name0'] }} - </td>
                <td>{{ $row['score0'] }} - </td>
                <td>{{ $row['score1'] }}</td>
                <td>{{ $row['name1'] }} - </td>
                </tr>
        @endforeach
    </table>
           
    </body>
</html>