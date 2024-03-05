<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="index.css">
    <title>Restoran</title>
</head>
<body>
   <?php 
   include_once('Assets/php/nav.php');
   ?>
<div class="parallax" data-parallax="scroll" data-speed="0.8"></div>
<div class="sig" id="specijalitet">
		<div class="sig_content_container">
			<div class="container">
				<div class="row">
					<div class="col-lg-7">
						<div class="sig_content">
							<div class="sig_subtitle page_subtitle">Izdvajamo</div>
							<div class="sig_title"><h1>Specijalitet kuće</h1></div>
							<div class="sig_name_container d-flex flex-row align-items-start justify-content-start">
								<div class="sig_name">Margarita S/M/L</div>
								<div class="sig_price ml-auto">380/810/1230 Din</div>
							</div>
							<div class="sig_content_list">
								<ul class="d-flex flex-row align-items-center justify-content-start">
									<li>pelat, mozzarela, maslinovo ulje, bosiljak</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="sig_image_container">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 offset-lg-5">
						<div class="sig_image">
							<img src="Photos/margarita.jpg" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
    <div class="menu" id="menu">
        <div class="container">
            <div class="row">
                <div class="col">
                <div class="menu_title_bar_container">
						<div class="menu_stars text-center page_subtitle">Picerija Trougao</div>
						<div class="themenu_rating text-center">
						</div>
						<div class="menu_title_bar d-flex flex-column align-items-center justify-content-center">
							<div class="menu_title">Meni</div>
						</div>
					</div>
                </div>
            </div>
            <div class="row menu_row">
                <!-- Male pice-->
            <div class="col-lg-4 menu_column">
					<div class="menu_col">
						<div class="menu_col_title">MALE PICE</div>
						<div class="dish_list">
							
						<?php
                           $upit="SELECT * FROM meni WHERE velicina = 'S'";
                           if($rezultat = mysqli_query($link,$upit))
                           {
                             while($MalePice = $rezultat->fetch_assoc())
                             {
                                $NazivMalePice = $MalePice['nazivJela'];
                                $OpisMalePice = $MalePice['opisJela'];
                                $CenaMalePice = $MalePice['cena'];

                                echo '<div class="dish">';
                                echo '<div class="dish_title_container d-flex flex-xl-row flex-column align-items-start justify-content-start">';
                                echo '<div class="dish_title">'.$NazivMalePice.' S</div>';
                                echo '<div class="dish_price">'.$CenaMalePice.' Din</div>';
                                echo '</div>';
                                echo '<div class="dish_contents">';
                                echo '<ul class="d-flex flex-row align-items-start justify-content-start flex-wrap">';
                                echo '<li>'.$OpisMalePice.'</li>';
                                echo '</ul>';
                                echo '</div>';
                                echo '</div>';
                             }
                            }

                        ?>
						</div>
					</div>
				</div>
                <!-- Srednje pice-->
                <div class="col-lg-4 menu_column">
					<div class="menu_col">
						<div class="menu_col_title">SREDNJE PICE</div>
						<div class="dish_list">

                        <?php
                           $upit1="SELECT * FROM meni WHERE velicina = 'M'";
                           if($rezultat1 = mysqli_query($link,$upit1))
                           {
                             while($SrednjePice = $rezultat1->fetch_assoc())
                             {
                                $NazivSrednjePice = $SrednjePice['nazivJela'];
                                $OpisSrednjePice = $SrednjePice['opisJela'];
                                $CenaSrednjePice = $SrednjePice['cena'];

                                echo '<div class="dish">';
                                echo '<div class="dish_title_container d-flex flex-xl-row flex-column align-items-start justify-content-start">';
                                echo '<div class="dish_title">'.$NazivSrednjePice.' M</div>';
                                echo '<div class="dish_price">'.$CenaSrednjePice.' Din</div>';
                                echo '</div>';
                                echo '<div class="dish_contents">';
                                echo '<ul class="d-flex flex-row align-items-start justify-content-start flex-wrap">';
                                echo '<li>'.$OpisSrednjePice.'</li>';
                                echo '</ul>';
                                echo '</div>';
                                echo '</div>';
                             }
                            }

                        ?>
						</div>
					</div>
				</div>
                <!-- Velike pice-->
                <div class="col-lg-4 menu_column">
					<div class="menu_col">
						<div class="menu_col_title">VELIKE PICE</div>
						<div class="dish_list">
							
                        <?php
                           $upit2="SELECT * FROM meni WHERE velicina = 'L'";
                           if($rezultat2 = mysqli_query($link,$upit2))
                           {
                             while($VelikePice = $rezultat2->fetch_assoc())
                             {
                                $NazivVelikePice = $VelikePice['nazivJela'];
                                $OpisVelikePice = $VelikePice['opisJela'];
                                $CenaVelikePice = $VelikePice['cena'];

                                echo '<div class="dish">';
                                echo '<div class="dish_title_container d-flex flex-xl-row flex-column align-items-start justify-content-start">';
                                echo '<div class="dish_title">'.$NazivVelikePice.' L</div>';
                                echo '<div class="dish_price">'.$CenaVelikePice.' Din</div>';
                                echo '</div>';
                                echo '<div class="dish_contents">';
                                echo '<ul class="d-flex flex-row align-items-start justify-content-start flex-wrap">';
                                echo '<li>'.$OpisVelikePice.'</li>';
                                echo '</ul>';
                                echo '</div>';
                                echo '</div>';
                             }
                            }

                        ?> 
						</div>
					</div>
				</div>
            </div>
            </div>
            </div>
        </div>
    </div>
</body>
</html>