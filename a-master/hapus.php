<?php require_once "koneksi.php"?>

<?php if(isset($_GET['id'])){
    
    if(hapus_data($_GET['id'])){
        header('Location: index.php');

    }
    else echo " gagal menghapus data";
}

?>