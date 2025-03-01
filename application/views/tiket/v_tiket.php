<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiket Pesawat</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }
        .ticket {
            width: 700px;
            background: white;
            border-radius: 10px;
            display: flex;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            position: relative;
        }
        .ticket-left {
            flex: 2;
            padding: 20px;
            border-right: 2px dashed #ccc;
        }
        .ticket-right {
            flex: 1;
            padding: 20px;
            background: #007bff;
            color: white;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }
        h4 {
            margin-bottom: 10px;
        }
        .ticket-info {
            font-size: 14px;
        }
        @media print {
            body * {
                visibility: hidden;
            }
            .ticket, .ticket * {
                visibility: visible;
            }
            .ticket {
                position: absolute;
                top: 0;
                left: 0;
            }
        }
    </style>
</head>
<body>
    <div class="ticket">
        <div class="ticket-left">
            <h4>Boarding Pass</h4>
            <div class="ticket-info">
                <p><strong>Nama:</strong> <?= $detail['nama_penumpang']; ?></p>
                <p><strong>Tujuan:</strong> <?= $detail['tujuan']; ?></p>
                <p><strong>Keberangkatan:</strong> <?= $detail['tanggal_berangkat']; ?>, <?= $detail['jam_berangkat']; ?></p>
                <p><strong>Gate:</strong> <?= $detail['kode_transportasi']; ?></p>
                <p><strong>Kursi:</strong> <?= $detail['jumlah_kursi']; ?></p>
            </div>
        </div>
        <div class="ticket-right text-center">
            <h5>Kode Pemesanan</h5>
            <h2><?= $detail['kode_pemesanan']; ?></h2>
            <p><strong>Harga:</strong> Rp <?= number_format($detail['total_bayar']); ?></p>
        </div>
    </div>
</body>
</html>
