<?php
session_start();
include('db.php');
connect();

?>

    <?php
    $total=0;
        $UserID=$_SESSION['login_user']['id'];  
        $Komentar = $_POST['komentarKupca'];
        foreach ($_SESSION["cart"] as $key => $value) 
{
    $total = $total + ($value["item_quantity"] * $value["product_price"]);
}
    $DatumVremeNarudzbine = date('Y-m-d H:i:s');

    $upit="INSERT INTO narudzbina (userID,vremeNarudzbine,cenaNarudzbine,komentarKupca) VALUES('$UserID','$DatumVremeNarudzbine','$total','$Komentar')";
    $rezultat=mysqli_query($link,$upit);

    if($rezultat){
        $upit1 = "SELECT * FROM narudzbina ORDER BY ID DESC LIMIT 1;";
        $rezultat1 = mysqli_query($link,$upit1);

        $Narudzbina = mysqli_fetch_assoc($rezultat1);
        $IdNarudzbine = $Narudzbina['id'];

        foreach ($_SESSION["cart"] as $key => $naruceno) 
        {
            $MeniID = $naruceno['product_id'];
            $Kolicina = $naruceno['item_quantity'];
            $upit2 = "INSERT INTO naruceni_meni (porudzbinaID,meniID,kolicina) VALUES ('$IdNarudzbine', '$MeniID','$Kolicina') ";
            $rezultat2=mysqli_query($link,$upit2);
        }
        



        echo '<script type="text/javascript"> window.location.href="detaljiNarudzbine.php?detailsid='.$IdNarudzbine.'"</script>';
    }else{
        echo "<script>alert('Neuspesna porudzbina')  </script>";
    }
?>
