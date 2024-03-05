<?php
ob_start();
include('db.php');
connect();
session_start();
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css"
  rel="stylesheet"/>
<!-- MDB -->
<script 
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"></script>

  <script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {
  var myDropdown = document.getElementById("myDropdown");
    if (myDropdown.classList.contains('show')) {
      myDropdown.classList.remove('show');
    }
  }
}
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

.dropdown {
  display: inline-block;
  position: relative;
  z-index:10;
}

button{
  border: 0px;
  border-radius:5px;
  margin-right: 5px;
  padding:5px 15px;
  font-size:18px;
  cursor:pointer;
  background-color: #000000;
  color:#D4403A;
  
}

.dropdown-options {
  display: none;
  position: absolute;
  overflow: auto;
  background-color:#fff;
  border-radius:5px;
  box-shadow: 0px 10px 10px 0px rgba(0,0,0,0.4);
  z-index:10;
}

.dropdown:hover .dropdown-options {
  display: block;
}

.dropdown-options a {
  display: block;
  color: #000000;
  padding: 5px;
  text-decoration: none;
  padding:10px 20px;
}

.dropdown-options a:hover {
  color: #0a0a23;
  background-color: #ddd;
  border-radius:5px;
}
</style>
<nav class="navbar navbar-expand navbar-dark navbar-fixed-top " style="background-color: #000000;" aria-label="Second navbar example">
    <div class="container-fluid">
      <a class="fa-solid fa-pizza-slice fa-rotate-270 fa-2xl me-3" style="color: #8B0000;" href="./index.php"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample02">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link" style="color: white;" aria-current="page" href="index.php#specijalitet">Specijalitet</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="color: white;" href="index.php#menu">Meni</a>
          </li>
          <?php
            if(isset($_SESSION['login_user']) && $_SESSION['login_user']['userType'] == 'Admin'){
              echo '<li class="nav-item">
              <a class="nav-link" style="color: white;" href="./adminDashboard.php">Admin Dashboard</a>
              </li>';
            }
          ?>
          <?php
          if(isset($_SESSION['login_user']))
          {
            echo '<li class="nav-item">
              <a class="nav-link" style="color: #8B0000;"" href="./poruci.php">Poruci</a>
              </li>';
          }
          ?>
        </ul>
        <?php 
        if(!isset($_SESSION['login_user']))
        {
          $server = htmlspecialchars($_SERVER['PHP_SELF']);

          echo '<form action="'. $server .'" method="post" class="d-flex " >
          <input class="form-control me-2" type="text" name="email" placeholder="Email" style="width: 40%;"  autocomplete="on" aria-label="Email">
          <input class="form-control me-2" type="password" name="password" placeholder="Password" style="width: 40%;"  aria-label="Password">
          <input type="submit" name="Login" class="btn btn-outline-success" value="Login">
          </form>"';
          echo '<form action="register.php" method="post" class="d-flex me-2">
          <input type="submit" class="btn btn-outline-danger" value="Register" >
          </form>';
        }else{
         /* echo "<p style='color:white;' class='me-3 mb-0'>Dobrodosli, ". $_SESSION['login_user']['ime']."</p>";*/
          echo "<p style='color:white;' class='me-1 mb-0'>Dobrodosli,";
          echo " <div class='dropdown'>";
          echo "<button> ". $_SESSION['login_user']['ime']."</button>";
          echo "<div class='dropdown-options'>";
          echo "<a href='OrderHistory.php'>Order history</a>";
          echo " <a href='EditProfile.php'>Edit profile</a>";
          echo "</div>";
          echo "</div>";
            //
          echo '<form action="logout.php" method="post" class="d-flex me-2"> 
                <input type="submit" value="Logout" class="btn btn-outline-danger"> 
                </form> '; 
        }
        ?>
      </div>
    </div>
  </nav>
<?php
if(isset($_POST["Login"]))
{
    $Email = $_POST['email'];
    $Password = $_POST['password'];

    $upit = "SELECT * FROM user WHERE email = '$Email'";
    
  if (!$rezultat = $link->query($upit)) {

    echo "<script>alert('Greska kod upita')  </script>";
    die();
  }

  if (!($user = $rezultat->fetch_assoc())) {

    print("nema takvog korisnika");
  } else {

    if(password_verify($Password,$user['passwordHash']))
    {
      echo "<script>alert('Uspesan login')  </script>";
      $_SESSION['login_user'] = $user;
      header("Location: index.php");
    }else{
      echo "<script>alert('Pogresan password')  </script>";
      session_destroy();
      
    }
}
}
?>