<?php
$conn = mysqli_connect("localhost", "root", "", "inventory");
function tambah($data)
{
    global $conn;
    $id = ($data["id"]);
    $nama = ($data["nama"]);
    $desk = ($data["desk"]);
    $harga = ($data["harga"]);
    $stok = ($data["stok"]);
    $query = "INSERT INTO products VALUES('$id','$nama','$desk','$harga','$stok')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'read.php'
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal ditambahkan!');
                document.location.href = 'read.php'
            </script>
        ";
    }
};

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
    <div class="modal d-block" id="modalId" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="judul" class="modal-title" id="modalTitleId">Buat data baru</h5>
                </div>

                <div class="modal-body">
                    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <input type="hidden" name="id" id="id" value="">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" name="nama" id="nama" required />
                        </div>
                        <div class="mb-3">
                            <label for="desc" class="form-label">Deskripsi Produk</label>
                            <textarea class="form-control" name="desk" id="desk" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" class="form-control" name="harga" id="harga"  required />
                        </div>
                        <div class="mb-3">
                            <label for="stok" class="form-label">Jumlah</label>
                            <input type="number" class="form-control" name="stok" id="stok" required />
                        </div>
                        
                        <div class="modal-footer">
                            <button id="submit" type="submit" name="submit" class="btn btn-primary" data-bs-dismiss="modal">
                                Tambahkan data baru
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>