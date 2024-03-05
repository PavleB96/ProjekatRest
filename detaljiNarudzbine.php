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

    if(isset($_GET['detailsid']))
    {
        $id = $_GET['detailsid'];

        $upit = "SELECT n.id, n.vremeNarudzbine, n.cenaNarudzbine, n.komentarKupca, u.ime, u.prezime, u.telefon, u.adresa, u.stan, u.email, nm.kolicina, m.nazivJela, m.velicina, m.cena  FROM narudzbina as n 
        INNER JOIN user as u ON n.userID=u.id
        INNER JOIN naruceni_meni as nm ON nm.porudzbinaID = n.id
        INNER JOIN meni as m ON nm.meniID = m.id
        WHERE n.id=$id";


        $rezultat = mysqli_query($link,$upit);

        $brojacElemenataNiza = 0; // brojac koji se kasnije koristi za ispisivanje iz dole navedenih nizova 
        $arrayCena = array(); // za cuvanje pojedinacnih cena narudzbine
        $arrayKolicina = array(); // za cuvanje pojedinacnih kolicina narudzbine
        $arrayNazivaJela = array(); //za cuvanje naziva jela u porudzbini
        $arrayVelicina = array(); //za cuvanje naziva jela u porudzbini
        
            while($Narudzbina = mysqli_fetch_assoc($rezultat))
            {
                $IdNarudzbine = $Narudzbina['id'];
                $VremeNarudzbine = $Narudzbina['vremeNarudzbine'];
                $CenaNarudzbine = $Narudzbina['cenaNarudzbine'];
                $KomentarNarudzbine = $Narudzbina['komentarKupca'];
                $ImeZaNarudzbinu = $Narudzbina['ime'];
                $PrezimeZaNarudzbinu = $Narudzbina['prezime'];
                $TelefonZaNarudzbinu = $Narudzbina['telefon'];
                $AdresaZaNarudzbinu = $Narudzbina['adresa'];
                $StanZaNarudzbinu = $Narudzbina['stan'];
                $EmailZaNarudzbinu = $Narudzbina['email'];
                array_push($arrayKolicina,$Narudzbina['kolicina']);
                array_push($arrayNazivaJela,$Narudzbina['nazivJela']);
                array_push($arrayVelicina,$Narudzbina['velicina']);
                array_push($arrayCena,$Narudzbina['cena']);
                $brojacElemenataNiza++;
            }    
    }
?>
<div class="container-fluid">

<div class="container">
  <!-- Title -->
  <div class="d-flex justify-content-between align-items-center py-3">
    <h2 class="h5 mb-0"> Narudzbina #<?php echo $IdNarudzbine ?></h2>
  </div>

  <!-- Main content -->
  <div class="row">
    <div class="col-lg-8">
      <!-- Details -->
      <div class="card mb-4">
        <div class="card-body">
          <div class="mb-3 d-flex justify-content-between">
            <div>
              <span class="me-3"><?php echo $VremeNarudzbine ?></span>
              <span class="me-3">#<?php echo $IdNarudzbine ?></span>
            </div>
        </div>
          <table class="table table-borderless">
            <tbody>
            <?php

                for($i=0; $i<$brojacElemenataNiza; $i++)
                {
                    echo "<tr>";
                    echo "<td>";
                    echo '<div class="d-flex mb-2">';
                    echo '<div class="flex-shrink-0">';
                    echo "</div>";
                    echo '<div class="flex-lg-grow-1 ms-3">';
                    echo '<h6 class="small mb-0">'. $arrayNazivaJela[$i] .' '. $arrayVelicina[$i].'</h6>';
                    echo "</div>";
                    echo "</div>";
                    echo "</td>";
                    echo '<td>'.$arrayKolicina[$i].'</td>';
                    echo '<td class="text-end">'.$arrayCena[$i].' din</td>';
                    echo "</tr>";
                }

            ?>
            </tbody>
            <tfoot>
              <tr class="fw-bold">
                <td colspan="2">UKUPNA CENA</td>
                <td class="text-end"><?php echo $CenaNarudzbine ." din" ?></td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <!-- Customer Notes -->
      <div class="card mb-4">
        <div class="card-body">
          <h3 class="h6">Komentar kupca</h3>
          <p><?php echo $KomentarNarudzbine ?></p>
        </div>
      </div>
      <div class="card mb-4">
        <!-- Shipping information -->
        <div class="card-body">
          <h3 class="h6">Detalji kupca</h3>
          <strong><?php echo $ImeZaNarudzbinu. " ".$PrezimeZaNarudzbinu."<br>" ?></strong>
          <span>Email: <?php echo $EmailZaNarudzbinu ."<br>"?></span>
          <span>Telefon: <strong><?php echo $TelefonZaNarudzbinu ?></strong></span>
          <hr>
          <h3 class="h6">Adresa</h3>
          <address>
            <strong><?php echo $AdresaZaNarudzbinu ?></strong><br>
            Broj stana: <?php echo $StanZaNarudzbinu ?><br>
            Beograd, 11000<br>
          </address>
        </div>
      </div>
    </div>
  </div>
</div>
  </div>
</body>
</html>