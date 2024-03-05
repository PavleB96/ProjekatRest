<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="orderHistory.css">
    <title>Document</title>
</head>
<body>
<?php
    include_once('Assets/php/nav.php');
    $UserID = $_SESSION['login_user']['id'];
?>

</table>
   </div>
   <div class="narudzbine">
    <div class="heading">
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
            $upit2="SELECT n.id, n.vremeNarudzbine, n.cenaNarudzbine, u.ime FROM narudzbina as n INNER JOIN user as u ON n.userID=u.id WHERE u.id = $UserID ORDER BY n.vremeNarudzbine DESC";
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

</body>
</html>