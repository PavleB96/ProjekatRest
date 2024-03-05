<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard.css">
    <title>Document</title>
</head>
<body>
<?php 
   include_once('Assets/php/nav.php');

  //broj korisnika
   $upit="SELECT * FROM user";
   if ($rezultat = mysqli_query($link, $upit)) 
   {
    $brojClanova = mysqli_num_rows( $rezultat );
   }

   //broj narudzbina
   $upit3="SELECT * FROM narudzbina";
   if ($rezultat3 = mysqli_query($link, $upit3)) 
   {
    $brojNarudzbina = mysqli_num_rows( $rezultat3 );
   }

   //zarada
   $upit4="SELECT SUM(cenaNarudzbine) as zarada FROM narudzbina";
   $rezultat4 = mysqli_query($link,$upit4);
   $niz = $rezultat4->fetch_assoc();
   $Zarada = $niz['zarada'];
   ?>
<div class="container">
<div class="cards">
  <div class="card" id="card1">
    <div class="card-content">
      <div class="number"><?php echo $Zarada;  ?></div>
      <div class="card-name">Zarada</div>
    </div>
    <div class="icon-box">
      <i class="fa-solid fa-dollar-sign"></i>
    </div>
  </div>
  <div class="card">
    <div class="card-content">
      <div class="number"><?php echo $brojClanova;  ?></div>
      <div class="card-name">Registrovani clanovi</div>
    </div>
    <div class="icon-box">
      <i class="fa-solid fa-user"></i>
    </div>
  </div>
  <div class="card">
    <div class="card-content">
      <div class="number"><?php echo $brojNarudzbina;  ?></div>
      <div class="card-name">Narudzbina</div>
    </div>
    <div class="icon-box">
      <i class="fa-solid fa-truck"></i>
    </div>
  </div>
</div>
<div class="tables">
   <div class="meni">
    <div class="heading">
      <h2>Meni</h2>
      <a href="dodajUMeni.php" class="btn1">Dodaj u meni</a>
      </div>
      <table class="meniLista">
        <thead>
          <td>Naziv jela</td>
          <td>Opis jela</td>
          <td>Cena</td>
          <td>Izmena</td>
        </thead>
        <tbody>
          <?php
            $upit1="SELECT id,nazivJela,opisJela,cena,velicina FROM meni ORDER BY velicina desc";
            if($rezultat1 = mysqli_query($link,$upit1))
            {
              while($row = $rezultat1->fetch_assoc())
              {
                $id = $row['id'];
                $nazivJ = $row['nazivJela'];
                $opisJ = $row['opisJela'];
                $cena = $row['cena'];
                $velicina = $row['velicina'];

                echo "<tr>";
                echo '<td>'.$nazivJ.' '.$velicina.'</td>';
                echo '<td>'.$opisJ.'</td>';
                echo '<td>'.$cena.'</td>';
                echo '<td>';
                echo '<a href="updateForma.php?updateid='.$id.'" class="btn btn-info me-2">Edit</a>';
                echo '<a href="delete.php?deleteid='.$id.'" class="btn btn-danger">Delete</a>';
                echo '</td>';
                echo '</tr>';
              }
            }
          ?>
        </tbody>
      </table>
   </div>
   <div class="narudzbine">
    <div class="heading">
      <h2>Narudzbine</h2>
      <a href="#" class="btn1">Vidi sve</a>
    </div>
    <table class="narudzbineLista">
      <thead>
        <td>Ime</td>
        <td>Cena</td>
        <td>Vreme</td>
        <td>Detalji</td>
      </thead>
      <tbody>
      <?php
            $upit2="SELECT n.id, n.vremeNarudzbine, n.cenaNarudzbine, u.ime FROM narudzbina as n INNER JOIN user as u ON n.userID=u.id ORDER BY n.vremeNarudzbine DESC";
            if($rezultat2 = mysqli_query($link,$upit2))
            {
              while($row = $rezultat2->fetch_assoc())
              {
                $IdNarudzbine = $row['id'];
                $VremeNarudzbine = $row['vremeNarudzbine'];
                $CenaNarudzbine = $row['cenaNarudzbine'];
                $ImeZaNarudzbinu = $row['ime'];

                echo "<tr>";
                echo '<td>'.$ImeZaNarudzbinu.'</td>';
                echo '<td>'.$CenaNarudzbine.'</td>';
                echo '<td>'.$VremeNarudzbine.'</td>';
                echo '<td>';
                echo '<a href="detaljiNarudzbine.php?detailsid='.$IdNarudzbine.'" class="btn btn-success me-2">View</a>';
                echo '</td>';
                echo '</tr>';
              }
            }
          ?>
      </tbody>
    </table>
   </div>
</div>
</div>
</body>
</html>
