<?php 
session_start();
if (!isset($_SESSION["login"]) == true){
    header("location:../login");
    exit;
}else if ($_SESSION['level'] == 'user'){
    header("location:../");
    exit;
}

$conn = mysqli_connect('localhost', 'root','', 'acumalaka');
$id = $_GET["id"];

mysqli_query($conn, "DELETE FROM buku WHERE id='$id'");

if(mysqli_affected_rows($conn)>0){
    echo "<script>
    alert('Data Berhasil Dihapus');
    document.location.href='./buku.php';
</script>" ;
}

?>