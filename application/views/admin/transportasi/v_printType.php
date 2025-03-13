<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>
                no
            </th>
            <th>
                nama type
            </th>
            <th>
                keterangan
            </th>
        </tr>

        <?php $no = 1; foreach ($type_transportasi as $ttr) : ?>

        <tr>
            <td><?= $no++ ?></td>
            <td><?= $ttr['nama_type'] ?></td>
            <td><?= $ttr['keterangan'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <script type="text/javascript">
       window.print();
    </script>
</body>
</html>