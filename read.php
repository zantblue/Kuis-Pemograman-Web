<?php
$conn = mysqli_connect("localhost", "root", "", "inventory");
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
$data = query("SELECT * FROM products");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container">
        <h1>Data Server</h1>
        <div class="mb-5"></div>
        <a href="<?= $_SERVER["PHP_SELF"] . "/../create.php" ?>" class="btn btn-success d-flex" style="width: max-content;">
            Tambah Data
        </a>
        <div class="mb-5"></div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Server</h5>
                <div id="data" class="overflow-auto">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th colspan="1" style="width: 1px;white-space: nowrap;">ID</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id='addRow'>
                            <?php
                            if (!empty($data)) {
                                foreach ($data as $j) :
                            ?>
                                    <tr style="vertical-align: middle;">
                                        <td style="width: 1px;white-space: nowrap;">
                                            <?= $j['id'] ?>
                                        </td>
                                        <td>
                                            <?= $j['name'] ?>
                                        </td>
                                        <td>
                                            <?= $j['description'] ?>
                                        </td>
                                        <td>
                                            <?= "Rp. " . number_format($j['price'], 0, ',', '.') ?>
                                        </td>
                                        <td>
                                            <?= $j['quantity'] ?>
                                        </td>
                                        <td style="width: 1px;white-space: nowrap;"><a href="<?= $_SERVER["PHP_SELF"] . '/../delete.php?id=' . $j['id'] ?>" onclick="return confirm('Yakin ?')" class="btn btn-danger p-1 d-flex mb-1" style="width: max-content;">
                                                <span class="material-symbols-rounded">
                                                    delete
                                                </span></a>
                                                <a href="<?= $_SERVER["PHP_SELF"] . '/../update.php?id=' . $j['id'] ?>" class="btn btn-warning p-1 d-flex" style="width: max-content;">
                                                <span class="material-symbols-rounded text-light">
                                                    edit
                                                </span></a>
                                        </td>
                                    </tr>
                                    <?php
                                endforeach;
                            } else {
                                ?>
                                <tr>
                                    <td colspan="6">
                                        <h2 class="text-center">- DATA TIDAK TERSEDIA -</h2>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>