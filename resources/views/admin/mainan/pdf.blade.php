<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Mainan Anak</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .text-right {
            text-align: right;
        }
    </style>
</head>
<body>

    <h2>Laporan Data Mainan Anak</h2>

    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="25%">Nama Mainan</th>
                <th width="20%">Usia Rekomendasi</th>
                <th width="20%">Bahan</th>
                <th width="30%">Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mainans as $key => $mainan)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $mainan->nama_mainan }}</td>
                <td>{{ $mainan->usia_rekomendasi }}</td>
                <td>{{ $mainan->bahan }}</td>
                <td class="text-right">Rp {{ number_format($mainan->harga, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
