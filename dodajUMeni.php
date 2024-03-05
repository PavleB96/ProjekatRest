<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include_once('Assets/php/nav.php');
    ?>
    <section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Dodaj u meni</p>

                <form class="mx-1 mx-md-4" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);  ?>" method="POST">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fa-solid fa-file-signature me-3 fa-lg"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name="nazivJ" id="nazivJ" class="form-control" />
                      <label class="form-label" for="nazivJ">Naziv jela</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fa-solid fa-maximize me-4 fa-lg"></i>
                    <div class="form-outline flex-fill mb-0">
                      <select class="form-control" name="velicina" id="velicina">
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                      </select>
                      <label class="form-label ms-4" for="velicina">Velicina jela</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fa-solid fa-circle-info me-3 fa-lg"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name="opisJ" id="opisJ" class="form-control" />
                      <label class="form-label" for="opisJ">Opis jela</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fa-solid fa-dollar-sign me-4 fa-lg"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name="cena" id="cena" class="form-control" />
                      <label class="form-label" for="cena">Cena jela</label>
                    </div>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <input type="submit" class="btn btn-info btn-lg" name="submit" value="Dodaj u meni">
                  </div>

                </form>

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

$NazivJela = $_POST['nazivJ'];
$OpisJela = $_POST['opisJ'];
$Cena = $_POST['cena'];
$Velicina = $_POST['velicina'];


$upit="INSERT INTO meni (nazivJela,opisJela,cena,velicina) VALUES('$NazivJela','$OpisJela','$Cena','$Velicina')";

$rezultat=mysqli_query($link,$upit);

if(mysqli_affected_rows($link)>0){

    echo "<script>alert('Uspesno dodavanje u meni')  </script>";
    echo "<script type='text/javascript'> window.location.href='adminDashboard.php'</script>";
}else{
    echo "<script>alert('Neuspesno dodavanje u meni')  </script>";
}
}
?>