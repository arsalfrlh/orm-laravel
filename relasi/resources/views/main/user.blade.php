<!DOCTYPE html>
<html>
<head>
    <title>Statistik Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">📊 Statistik Pembelian per User</h2>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama User</th>
                <th>Jumlah Pembelian Barang</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @forelse($tampil as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->beli_count }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">Belum ada data barang</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</body>
</html>
