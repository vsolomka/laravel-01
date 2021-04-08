<html>
<head>
    <link rel="stylesheet" type="text/css" href="/css/common.css" />
</head>
<body>
@if ($header) <h3>{{ $header }}</h3> @endif

@if ($data)
<table class="dbtable">
    <tr>
        @foreach ($data[0] as $field => $value)
        <th>{{ $field }}</th>
        @endforeach
    </tr>
    @foreach ($data as $row)
        <tr>
            @foreach ($row as $col)
            <td>{{ $col }}</td>
            @endforeach
        </tr>
    @endforeach
</table>
@endif
</body>
</html>
