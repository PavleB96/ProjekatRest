<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="poruci.css">
    <title>Document</title>
</head>
<body>
<?php 
   include_once('Assets/php/nav.php');
?>
<br>
<?php

    if (isset($_POST["add"])){
        if (isset($_SESSION["cart"])){
            $item_array_id = array_column($_SESSION["cart"],"product_id");
            if (!in_array($_GET["id"],$item_array_id)){
                $count = count($_SESSION["cart"]);
                $item_array = array(
                    'product_id' => $_GET["id"],
                    'item_name' => $_POST["hidden_name"],
                    'product_price' => $_POST["hidden_price"],
                    'item_quantity' => $_POST["quantity"],
                );
                $_SESSION["cart"][$count] = $item_array;
                echo '<script>window.location="poruci.php"</script>';
            }else{
                echo '<script>alert("Product is already Added to Cart")</script>';
                echo '<script>window.location="poruci.php"</script>';
            }
        }else{
            $item_array = array(
                'product_id' => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'product_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"],
            );
            $_SESSION["cart"][0] = $item_array;
        }
    }

    if (isset($_GET["action"])){
        if ($_GET["action"] == "delete"){
            foreach ($_SESSION["cart"] as $keys => $value){
                if ($value["product_id"] == $_GET["id"]){
                    unset($_SESSION["cart"][$keys]);
                    echo '<script>alert("Product has been Removed...!")</script>';
                    echo '<script>window.location="poruci.php"</script>';
                }
            }
        }
    }
?>

<div class="container" style="width: 65%">
<div class="title_bar_container">
        <div class="title_bar d-flex flex-column align-items-center justify-content-center">
							<h2 class="title2">Meni</h2>
		</div>
</div>
        <div class="grid-container">
        <?php
            $query = "SELECT * FROM meni ORDER BY velicina DESC ";
            $result = mysqli_query($link,$query);
            if(mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) {

                    ?>
                    <div class="col">

                        <form method="post" action="poruci.php?action=add&id=<?php echo $row["id"]; ?>">

                            <div class="card" style="width: 18rem;">
                                <div class="card-body d-flex flex-column ">
                                <h5 class="card-title" style="color: #8B0000;"><?php echo $row["nazivJela"].' '.$row["velicina"]; ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted"><?php echo $row["opisJela"]; ?></h6>                          
                                <h5 class="text-text"><strong><?php echo $row["cena"]; ?> Din</strong></h5>
                                <input type="text" style="width: 15%;" name="quantity" class="form-control" value="1">
                                <input type="hidden" name="hidden_name" value="<?php echo $row["nazivJela"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["cena"]; ?>">
                                <input type="submit" name="add" style="margin-top: 5px; width: 100%" class="btn btn-primary "
                                       value="Add to Cart">
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php
                }
            }
        ?>
        </div>
        <div style="clear: both"></div>
        <div class="title_bar_container">
        <div class="title_bar d-flex flex-column align-items-center justify-content-center">
							<h2 class="title2">Korpa</h2>
		</div>
</div>
        <div class="table-responsive">
            <table class="table table-bordered">
            <tr>
                <th width="30%">Naziv jela</th>
                <th width="10%">Kolicina</th>
                <th width="13%">Cena</th>
                <th width="10%">Ukupna cena</th>
                <th width="17%">Izbrisi</th>
            </tr>

            <?php
                if(!empty($_SESSION["cart"])){
                    $total = 0;
                    foreach ($_SESSION["cart"] as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo $value["item_name"]; ?></td>
                            <td><?php echo $value["item_quantity"]; ?></td>
                            <td><?php echo $value["product_price"]; ?> Din</td>
                            <td>
                                <?php echo number_format($value["item_quantity"] * $value["product_price"], 2); ?> Din</td>
                            <td><a href="poruci.php?action=delete&id=<?php echo $value["product_id"]; ?> " ><span
                                        class="text-danger">Izbrisi iz korpe</span></a></td>

                        </tr>
                        <?php
                        $total = $total + ($value["item_quantity"] * $value["product_price"]);
                    }
                        ?>
                        <tr>
                            <td colspan="3" align="right">Ukupna cena</td>
                            <th align="right"> <?php echo number_format($total, 2); ?> Din</th>
                            <td></td>
                        </tr>
                        <?php
                    }
                ?>
                <form action="naruci.php" method="POST" >
                <tr>
                   <td>Komentar za porudzbinu</td>
                   <td colspan="4"><textarea name="komentarKupca" id="komentarKupca" cols="90" rows="3"></textarea></td> 
                </tr>
                    <tr>
                        <td ><input type="submit" value="Poruci" id="buton" ></td>
                    </tr>
                </form>
            </table>
        </div>

    </div>
</body>
</html>