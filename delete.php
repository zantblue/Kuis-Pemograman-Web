<?php
$conn = mysqli_connect("localhost", "root", "", "inventory");
function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM products WHERE id = $id");
    return mysqli_affected_rows($conn);
}
if (!empty($_GET["id"])) {
    if (hapus($_GET["id"]) > 0) {
        echo "
        <script>
        alert('data berhasil dihapus!');
        document.location.href = 'read.php'
        </script>
        ";
    } else {
        echo "
        <script>
        alert('data gagal dihapus!');
        document.location.href = 'read.php'
        </script>
        ";
    }
}