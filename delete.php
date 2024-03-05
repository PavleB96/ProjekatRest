<?php
include('db.php');
connect();

if(isset($_GET['deleteid']))
{
    $id = $_GET['deleteid'];

    $upit = "DELETE FROM meni WHERE id=$id";
    if($rezultat = mysqli_query($link,$upit))
    {
        echo "<script>alert('Uspesno brisanje')  </script>";
        echo "<script type='text/javascript'> window.location.href='adminDashboard.php'</script>";
    }else{
        echo "<script>alert('Neuspesno brisanje')  </script>";
        echo "<script type='text/javascript'> window.location.href='adminDashboard.php'</script>";
    }
    
}

?>