<?php
include('db.php');
connect();

$id = $_GET['updateid'];

if(isset($_POST["submit"]))
{

$NazivJela = $_POST['nazivJ'];
$OpisJela = $_POST['opisJ'];
$Cena = $_POST['cena'];
$Velicina = $_POST['velicina'];


$upit1="UPDATE meni SET id=$id, nazivJela='$NazivJela', opisJela='$OpisJela', cena='$Cena', velicina='$Velicina' WHERE id=$id";

$rezultat1=mysqli_query($link,$upit1);

if($rezultat1){

    echo "<script>alert('Uspesna izmena')  </script>";
    echo "<script type='text/javascript'> window.location.href='adminDashboard.php'</script>";
}else{
    echo "<script>alert('Neuspesna izmena')  </script>";
}
}
?>