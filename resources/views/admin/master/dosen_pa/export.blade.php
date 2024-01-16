<!-- resources/views/exports/cashflows.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dosen PA Export</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Dosen PA Export</h2>
    <p>Generated on: {{ now()->format('Y-m-d H:i:s') }}</p><br>

    <table>
        <thead>
            <tr>
                <th style="text-align: center;">ID PA</th>
                <th style="text-align: center;">NIDN / NIK</th>
                <th style="text-align: center;">Nama</th>
                <th style="text-align: center;">Jabatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dosenpas as $item)
                <tr>
                    <td style="text-align: center;">{{ $item->id }}</td>
                    <td style="text-align: center;">{{ $item->nidn }}</td>
                    <td style="text-align: center;">{{ $item->nama }}</td>
                    <td style="text-align: center;">{{ $item->jabatan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
