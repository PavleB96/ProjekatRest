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

    if(isset($_GET['updateid']))
    {
        $id = $_GET['updateid'];

        $upit = "SELECT * FROM meni WHERE id=$id";
        $rezultat = mysqli_query($link,$upit);
        
            $jeloZaMenjanje = mysqli_fetch_assoc($rezultat);
            $NazivJelaZaMenjaje = $jeloZaMenjanje['nazivJela'];
            $OpisJelaZaMenjaje = $jeloZaMenjanje['opisJela'];
            $CenaJelaZaMenjaje = $jeloZaMenjanje['cena'];
            $VelicinaJelaZaMenjane = $jeloZaMenjanje['velicina'];
        

    }
    
    ?>
    <section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Edituj jelo</p>

                <form class="mx-1 mx-md-4" action="update.php?updateid='<?php echo $id; ?>'" method="POST">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fa-solid fa-file-signature me-3 fa-lg"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name="nazivJ" id="nazivJ" class="form-control" value="<?php echo $NazivJelaZaMenjaje; ?>" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fa-solid fa-maximize me-4 fa-lg"></i>
                    <div class="form-outline flex-fill mb-0">
                      <select class="form-control" name="velicina" id="velicina">
                        <option value="S" <?php if($VelicinaJelaZaMenjane == 'S'){ echo "selected";} ?> >S</option>
                        <option value="M" <?php if($VelicinaJelaZaMenjane == 'M'){ echo "selected";} ?> >M</option>
                        <option value="L" <?php if($VelicinaJelaZaMenjane == 'L'){ echo "selected";} ?> >L</option>
                      </select>
                      <label class="form-label ms-4" for="velicina">Velicina jela</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fa-solid fa-circle-info me-3 fa-lg"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name="opisJ" id="opisJ" class="form-control" value="<?php echo $OpisJelaZaMenjaje; ?>" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fa-solid fa-dollar-sign me-4 fa-lg"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name="cena" id="cena" class="form-control" value="<?php echo $CenaJelaZaMenjaje; ?>" />
                    </div>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <input type="submit" class="btn btn-info btn-lg" name="submit" value="Edituj jelo">
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
