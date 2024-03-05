

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="roundedCorners.css">
    <title>Restoran</title>
</head>
<body>
   <?php 
   include_once('Assets/php/nav.php');

  $UserID = $_SESSION['login_user']['id'];
  $User_Ime = $_SESSION['login_user']['ime'];
  $User_Prezime = $_SESSION['login_user']['prezime'];
  $User_Telefon = $_SESSION['login_user']['telefon'];
  $User_Adresa = $_SESSION['login_user']['adresa'];
  $User_Stan = $_SESSION['login_user']['stan'];

   ?>

<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Edituj profil</p>

                <form class="mx-1 mx-md-4" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);  ?>" method="POST">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fa-solid fa-user me-3 fa-lg"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name="ime" id="ime" value="<?php echo $User_Ime; ?>" readonly class="form-control" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fa-regular fa-user me-3 fa-lg"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name="prezime" value="<?php echo $User_Prezime; ?>" readonly id="prezime" class="form-control" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fa-solid fa-phone me-3 fa-lg"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name="telefon" id="telefon" value="<?php echo $User_Telefon; ?>"  class="form-control" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fa-solid fa-location-dot me-3 fa-lg"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name="adresa" id="adresa" value="<?php echo $User_Adresa; ?>" class="form-control" />
                    </div>
                  </div>


                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fa-solid fa-location-dot me-3 fa-lg"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name="stan" id="stan" value="<?php echo $User_Stan; ?>" class="form-control" />
                    </div>
                  </div>
                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <input type="submit" class="btn btn-info btn-lg" name="submit" value="Edituj profil">
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="./Photos/RegistracijaSlika.avif"
                  class="img-fluid rounded-corners" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>


<?php
if(isset($_POST["submit"]))
{

$Telefon = $_POST['telefon'];
$Adresa = $_POST['adresa'];
$Stan =$_POST['stan'];

$upit="UPDATE user SET telefon= '$Telefon', adresa= '$Adresa', stan= '$Stan' WHERE id = '$UserID' ";

$rezultat=mysqli_query($link,$upit);

if(mysqli_affected_rows($link)>0){

    echo "<script>alert('Uspesan edit')  </script>";
    echo "<script type='text/javascript'> window.location.href='index.php'</script>";
}else{
    echo "<script>alert('Neuspesan edit')  </script>";
}
}
?>