<!DOCTYPE html>
<html lang="en">
<head>
    <script>
    
        function togglePopup() {
            var popup = document.getElementById("popup");
            var profilInfo = document.getElementById("profil-info");
        
            <?php
            session_start();
            if(isset($_SESSION['user_email'])) {
            ?>
                // If user is logged in, show profile information
                profilInfo.style.display = "block";
            <?php
            } else {
            ?>
                // If user is not logged in, show the regular popup
                if (popup.style.display === "none" || popup.style.display === "") {
                    popup.style.display = "block";
                } else {
                    popup.style.display = "none";
                }
            <?php
            }
            ?>
        }
        function closeProfilePopup() {
            var profilInfoPopup = document.getElementById("profil-info");
            profilInfoPopup.style.display = "none";
        }
        
        
        function openLoginPopup() {
            var popup = document.getElementById("popup");
            var loginPopup = document.getElementById("loginPopup");
            var profilInfo = document.getElementById("profil-info");
            if (loginPopup.style.display === "none" || loginPopup.style.display === "") {
            popup.style.display = "none";
            loginPopup.style.display = "block";
            profilInfo.style.display = "none"; 
        } else {
                loginPopup.style.display = "none";
            }
        }
        
        
        </script>
        
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AutoWorld</title>
<link rel="stylesheet" href="AutoWorld.css">
<script src="AutoWorld.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-9nIvBvFov0C6ZU4ZpFrPF3JslBPbFd3fkw/JQ0l1qd+Tz+w3KGcflzZmTV2Jez6K/kCdsEZ/tKGQtuzcfCY5Kw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header class="navbar">
        <div class="logo">
            <img src="images/logo.png" alt="Car Express logo">
        </div>
        <div class="box">
            <form>
                <input type="search" id="searchInput" name="" placeholder="Rechercher...">
                <button type="submit"  id="searchButton"><i class="fas fa-search"></i></button>
            </form>
        </div>
          
        <nav>
            <ul>
                <li><a href="AutoWorld.php"><span >Accueil</span></a></li>
                <li><a href="model.php"><i class="fas fa-car" style="color:bisque;"></i><span id="model">Modèles</span></a></li>
                <li><a href="material.php"><i class="fas fa-tools"></i></a></li>
                <li><a href="#" onclick="togglePopup()"><i class="fas fa-user" ></i></a></li>
                <li><a href="aboutus.php">A propos</a></li> 
            </ul>
        </nav>
    </header>
        <!-- Popup -->
        <div class="popup-container" id="popup">
        <div class="popup">
            <span class="close" onclick="togglePopup()">&times;</span>
            <h3>Connectez-vous avec votre AutoWorld ID me.</h3><br>
            <div class="buttons">
                <button onclick="openLoginPopup()">Se connecter</button>
                <button onclick="location.href='loginCreerCompte.php'">S'inscrire</button>
            </div>
        </div>
    </div>
    <div id="loginPopup">
        <form id="loginForm" method='POST' action='connect.php'>
            <span class="close" onclick="openLoginPopup()">&times;</span>
            <h2>Connexion</h2>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required><br>
    
            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password" required><br>
    
            <a href="#" style="color: #82857d;">Mot de passe oublié ?</a><br>
    
            <input type="submit" value="Se connecter">
        </form>
        <p class="center">Vous n'avez pas de compte ? <a  style="color: #82857d;" href="loginCreerCompte.php">S'inscrire</a></p>
    </div>
    
<!-- Profil informations -->
<div class="profil-container" id="profil-info" style='display: none;'>
    <div class="profil-header">
        <div class="logo">AutoWorld</div>
        <span class="close" onclick="closeProfilePopup()">&times;</span>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Messages</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="logout.php">Logout</a></li> <!-- Link to logout page -->
            </ul>
        </nav>
    </div>

    <div class="container">
        <section class="profile-section">
            <h2>Profile Information</h2>
            <div class="profile-picture">
                <!-- Profile Picture will be displayed here -->
            </div>

            <!-- Display user's name and email here -->
            <?php
            if (isset($_SESSION['user_email'])) {
                // If user is logged in, get name and email from session
                $username = $_SESSION['username'];
                $user_email = $_SESSION['user_email'];
                ?>
                <div class="username"><?php echo $username; ?></div>
                <div class="email-address"><?php echo $user_email; ?></div>
            <?php
            } else {
                // If user is not logged in, show default text or nothing
                ?>
                <div class="username">Guest</div>
                <div class="email-address">guest@example.com</div>
            <?php
            }
            ?>
            <button class="edit-profile">Edit Profile</button>
            <!-- Display other user information here -->
        </section>

        <!-- Other sections like Personal Details, Account Information, Activity History, Preferences, and Saved Items -->

        <!-- Shop Icon for Cars -->
        <a href="cars.php" class="shop-icon"><img src="images/shop-icon.jpg" alt="Shop Cars" style="width: 60px; height: 60px;"></a>
    </div>
</div>


<h2>Nos modèles</h2>
    <div class="grid-container-model" id="model-container">
        <div class="item-model">
            <img src="images/best-1.png" alt="BMW blanc">
            <h3>BMW blanc</h3>
            <div class="rating">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star-half-o" aria-hidden="true"></i>
                <i class="fa fa-star-o"></i>
            </div>
            <p>10400DT</p>
            <form action="acheter.php" method="post">
                <input type="hidden" name="modele" value="BMW blanc">
                <input type="hidden" name="prix" value="10400">
                <button type="submit" class="buy-button">Acheter</button>
            </form>
        </div>
        <div class="item-model">
            <img src="images/mercedes suv.png" alt="Mercedes SUV">
            <h3>Mercedes SUV</h3>
            <div class="rating">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star-half-o" aria-hidden="true"></i>
                <i class="fa fa-star-o"></i>
            </div>
            <p>200000DT</p>
            <form action="acheter.php" method="post">
                <input type="hidden" name="modele" value="Mercedes SUV">
                <input type="hidden" name="prix" value="200000">
                <button type="submit" class="buy-button">Acheter</button>
            </form>
        </div>
        <div class="item-model">
            <img src="images/mercedes amg.png" alt="Mercedes AMG">
            <h3>Mercedes AMG</h3>
            <div class="rating">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star-half-o" aria-hidden="true"></i>
                <i class="fa fa-star-o"></i>
            </div>
            <p>250000DT</p>
            <form action="acheter.php" method="post">
                <input type="hidden" name="modele" value="Mercedes AMG">
                <input type="hidden" name="prix" value="250000">
                <button type="submit" class="buy-button">Acheter</button>
            </form>
        </div>
        <div class="item-model">
            <img src="images/mercedes sedans.png" alt="Mercedes Sedans">
            <h3>Mercedes Sedans</h3>
            <div class="rating">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star-half-o" aria-hidden="true"></i>
                <i class="fa fa-star-o"></i>
            </div>
            <p>99000DT</p>
            <form action="acheter.php" method="post">
                <input type="hidden" name="modele" value="Mercedes Sedans">
                <input type="hidden" name="prix" value="99000">
                <button type="submit" class="buy-button">Acheter</button>
            </form>
        </div>
        <div class="item-model">
            <img src="images/toyota corolla.png" alt="Toyota Corolla">
            <h3>Toyota Corolla</h3>
            <div class="rating">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star-half-o" aria-hidden="true"></i>
                <i class="fa fa-star-o"></i>
            </div>
            <p>98000DT</p>
            <form action="acheter.php" method="post">
                <input type="hidden" name="modele" value="Toyota Corolla">
                <input type="hidden" name="prix" value="98000">
                <button type="submit" class="buy-button">Acheter</button>
            </form>
        </div>
        <div class="item-model">
            <img src="images/toyota camry.png" alt="Toyota Camry">
            <h3>Toyota Camry</h3>
            <div class="rating">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star-half-o" aria-hidden="true"></i>
                <i class="fa fa-star-o"></i>
            </div>
            <p>322000DT</p>
            <form action="acheter.php" method="post">
                <input type="hidden" name="modele" value="Toyota Camry">
                <input type="hidden" name="prix" value="322000">
                <button type="submit" class="buy-button">Acheter</button>
            </form>
        </div>
        <div class="item-model">
            <img src="images/toyota 4runner.png" alt="Toyota 4Runner">
            <h3>Toyota 4Runner</h3>
            <div class="rating">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star-half-o" aria-hidden="true"></i>
                <i class="fa fa-star-o"></i>
            </div>
            <p>100000DT</p>
            <form action="acheter.php" method="post">
                <input type="hidden" name="modele" value="Toyota 4Runner">
                <input type="hidden" name="prix" value="100000">
                <button type="submit" class="buy-button">Acheter</button>
            </form>
        </div>
    <div class="item-model">
        <img src="images/best-1.png" alt="best1">
        <h3>BMW blanc</h3>
        <div class="rating">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star"aria-hidden="true"></i>
            <i class="fa fa-star-half-o" aria-hidden="true"></i>
            <i class="fa fa-star-o"></i>
        </div>
        <p>10400DT</p>
        <button class="buy-button">Acheter</button>
    </div>
    <div class="item-model">
        <img src="images/mercedes suv.png" alt="best1">
        <h3>Mercedes SUV</h3>
        <div class="rating">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star"aria-hidden="true"></i>
            <i class="fa fa-star-half-o" aria-hidden="true"></i>
            <i class="fa fa-star-o"></i>
        </div>
        <p>200000DT</p>
        <button class="buy-button">Acheter</button>
    </div>
    <div class="item-model">
        <img src="images/mercedes amg.png" alt="best1">
        <h3>Mercedes AMG</h3>
        <div class="rating">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star"aria-hidden="true"></i>
            <i class="fa fa-star-half-o" aria-hidden="true"></i>
            <i class="fa fa-star-o"></i>
        </div>
        <p>250000DT</p>
        <button class="buy-button">Acheter</button>
    </div>
    <div class="item-model">
        <img src="images/mercedes sedans.png" alt="best1">
        <h3>Mercedes Sedans</h3>
        <div class="rating">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star"aria-hidden="true"></i>
            <i class="fa fa-star-half-o" aria-hidden="true"></i>
            <i class="fa fa-star-o"></i>
        </div>
        <p>99000DT</p>
        <button class="buy-button">Acheter</button>
    </div>
    <div class="item-model">
        <img src="images/best-1.png" alt="best1">
        <h3>BMW blanc</h3>
        <div class="rating">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star"aria-hidden="true"></i>
            <i class="fa fa-star-half-o" aria-hidden="true"></i>
            <i class="fa fa-star-o"></i>
        </div>
        <p>10400DT</p>
        <button class="buy-button">Acheter</button>
    </div>
    <div class="item-model">
        <img src="images/mercedes suv.png" alt="best1">
        <h3>Mercedes SUV</h3>
        <div class="rating">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star"aria-hidden="true"></i>
            <i class="fa fa-star-half-o" aria-hidden="true"></i>
            <i class="fa fa-star-o"></i>
        </div>
        <p>200000DT</p>
        <button class="buy-button">Acheter</button>
    </div>
    <div class="item-model">
        <img src="images/mercedes amg.png" alt="best1">
        <h3>Mercedes AMG</h3>
        <div class="rating">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star"aria-hidden="true"></i>
            <i class="fa fa-star-half-o" aria-hidden="true"></i>
            <i class="fa fa-star-o"></i>
        </div>
        <p>250000DT</p>
        <button class="buy-button">Acheter</button>
    </div>
    <div class="item-model">
        <img src="images/mercedes sedans.png" alt="best1">
        <h3>Mercedes Sedans</h3>
        <div class="rating">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star"aria-hidden="true"></i>
            <i class="fa fa-star-half-o" aria-hidden="true"></i>
            <i class="fa fa-star-o"></i>
        </div>
        <p>99000DT</p>
        <button class="buy-button">Acheter</button>
    </div>
    <div class="item-model">
        <img src="images/best-1.png" alt="best1">
        <h3>BMW blanc</h3>
        <div class="rating">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star"aria-hidden="true"></i>
            <i class="fa fa-star-half-o" aria-hidden="true"></i>
            <i class="fa fa-star-o"></i>
        </div>
        <p>10400DT</p>
        <button class="buy-button">Acheter</button>
    </div>
    <div class="item-model">
        <img src="images/mercedes suv.png" alt="best1">
        <h3>Mercedes SUV</h3>
        <div class="rating">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star"aria-hidden="true"></i>
            <i class="fa fa-star-half-o" aria-hidden="true"></i>
            <i class="fa fa-star-o"></i>
        </div>
        <p>200000DT</p>
        <button class="buy-button">Acheter</button>
    </div>
    <div class="item-model">
        <img src="images/mercedes amg.png" alt="best1">
        <h3>Mercedes AMG</h3>
        <div class="rating">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star"aria-hidden="true"></i>
            <i class="fa fa-star-half-o" aria-hidden="true"></i>
            <i class="fa fa-star-o"></i>
        </div>
        <p>250000DT</p>
        <button class="buy-button">Acheter</button>
    </div>
    <div class="item-model">
        <img src="images/mercedes sedans.png" alt="best1">
        <h3>Mercedes Sedans</h3>
        <div class="rating">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star"aria-hidden="true"></i>
            <i class="fa fa-star-half-o" aria-hidden="true"></i>
            <i class="fa fa-star-o"></i>
        </div>
        <p>99000DT</p>
        <button class="buy-button">Acheter</button>
    </div>
    <div class="item-model">
        <img src="images/best-1.png" alt="best1">
        <h3>BMW blanc</h3>
        <div class="rating">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star"aria-hidden="true"></i>
            <i class="fa fa-star-half-o" aria-hidden="true"></i>
            <i class="fa fa-star-o"></i>
        </div>
        <p>10400DT</p>
        <button class="buy-button">Acheter</button>
    </div>
    <div class="item-model">
        <img src="images/mercedes suv.png" alt="best1">
        <h3>Mercedes SUV</h3>
        <div class="rating">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star"aria-hidden="true"></i>
            <i class="fa fa-star-half-o" aria-hidden="true"></i>
            <i class="fa fa-star-o"></i>
        </div>
        <p>200000DT</p>
        <button class="buy-button">Acheter</button>
    </div>
    <div class="item-model">
        <img src="images/mercedes amg.png" alt="best1">
        <h3>Mercedes AMG</h3>
        <div class="rating">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star"aria-hidden="true"></i>
            <i class="fa fa-star-half-o" aria-hidden="true"></i>
            <i class="fa fa-star-o"></i>
        </div>
        <p>250000DT</p>
        <button class="buy-button">Acheter</button>
    </div>
    <div class="item-model">
        <img src="images/mercedes sedans.png" alt="best1">
        <h3>Mercedes Sedans</h3>
        <div class="rating">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star"aria-hidden="true"></i>
            <i class="fa fa-star-half-o" aria-hidden="true"></i>
            <i class="fa fa-star-o"></i>
        </div>
        <p>99000DT</p>
        <button class="buy-button">Acheter</button>
    </div>
    <div class="item-model">
        <img src="images/best-1.png" alt="best1">
        <h3>BMW blanc</h3>
        <div class="rating">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star"aria-hidden="true"></i>
            <i class="fa fa-star-half-o" aria-hidden="true"></i>
            <i class="fa fa-star-o"></i>
        </div>
        <p>10400DT</p>
        <button class="buy-button">Acheter</button>
    </div>
    <div class="item-model">
        <img src="images/mercedes suv.png" alt="best1">
        <h3>Mercedes SUV</h3>
        <div class="rating">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star"aria-hidden="true"></i>
            <i class="fa fa-star-half-o" aria-hidden="true"></i>
            <i class="fa fa-star-o"></i>
        </div>
        <p>200000DT</p>
        <button class="buy-button">Acheter</button>
    </div>
    <div class="item-model">
        <img src="images/mercedes amg.png" alt="best1">
        <h3>Mercedes AMG</h3>
        <div class="rating">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star"aria-hidden="true"></i>
            <i class="fa fa-star-half-o" aria-hidden="true"></i>
            <i class="fa fa-star-o"></i>
        </div>
        <p>250000DT</p>
        <button class="buy-button">Acheter</button>
    </div>
    <div class="item-model">
        <img src="images/mercedes sedans.png" alt="best1">
        <h3>Mercedes Sedans</h3>
        <div class="rating">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star"aria-hidden="true"></i>
            <i class="fa fa-star-half-o" aria-hidden="true"></i>
            <i class="fa fa-star-o"></i>
        </div>
        <p>99000DT</p>
        <button class="buy-button">Acheter</button>
    </div>
    <div class="item-model">
        <img src="images/best-1.png" alt="best1">
        <h3>BMW blanc</h3>
        <div class="rating">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star"aria-hidden="true"></i>
            <i class="fa fa-star-half-o" aria-hidden="true"></i>
            <i class="fa fa-star-o"></i>
        </div>
        <p>10400DT</p>
        <button class="buy-button">Acheter</button>
    </div>
    <div class="item-model">
        <img src="images/mercedes suv.png" alt="best1">
        <h3>Mercedes SUV</h3>
        <div class="rating">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star"aria-hidden="true"></i>
            <i class="fa fa-star-half-o" aria-hidden="true"></i>
            <i class="fa fa-star-o"></i>
        </div>
        <p>200000DT</p>
        <button class="buy-button">Acheter</button>
    </div>
    <div class="item-model">
        <img src="images/mercedes amg.png" alt="best1">
        <h3>Mercedes AMG</h3>
        <div class="rating">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star"aria-hidden="true"></i>
            <i class="fa fa-star-half-o" aria-hidden="true"></i>
            <i class="fa fa-star-o"></i>
        </div>
        <p>250000DT</p>
        <button class="buy-button">Acheter</button>
    </div>
    <div class="item-model">
        <img src="images/mercedes sedans.png" alt="best1">
        <h3>Mercedes Sedans</h3>
        <div class="rating">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star"aria-hidden="true"></i>
            <i class="fa fa-star-half-o" aria-hidden="true"></i>
            <i class="fa fa-star-o"></i>
        </div>
        <p>99000DT</p>
        <button class="buy-button">Acheter</button>
    </div>


    <div class="item-model">
        <img src="images/best-1.png" alt="best1">
        <h3>BMW blanc</h3>
        <div class="rating">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star"aria-hidden="true"></i>
            <i class="fa fa-star-half-o" aria-hidden="true"></i>
            <i class="fa fa-star-o"></i>
        </div>
        <p>100000DT</p>
        <button class="buy-button">Acheter</button>
    </div>
    <div class="item-model">
        <img src="images/best-1.png" alt="best1">
        <h3>BMW blanc</h3>
        <div class="rating">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star"aria-hidden="true"></i>
            <i class="fa fa-star-half-o" aria-hidden="true"></i>
            <i class="fa fa-star-o"></i>
        </div>
        <p>100000DT</p>
        <button class="buy-button">Acheter</button>
    </div>
    <div class="item-model">
        <img src="images/best-1.png" alt="best1">
        <h3>BMW blanc</h3>
        <div class="rating">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star"aria-hidden="true"></i>
            <i class="fa fa-star-half-o" aria-hidden="true"></i>
            <i class="fa fa-star-o"></i>
        </div>
        <p>100000DT</p>
        <button class="buy-button">Acheter</button>
    </div>
    <div class="item-model">
        <img src="images/best-1.png" alt="best1">
        <h3>BMW blanc</h3>
        <div class="rating">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star"aria-hidden="true"></i>
            <i class="fa fa-star-half-o" aria-hidden="true"></i>
            <i class="fa fa-star-o"></i>
        </div>
        <p>100000DT</p>
        <button class="buy-button">Acheter</button>
    </div>

    <div class="item-model">
        <img src="images/best-1.png" alt="best1">
        <h3>BMW blanc</h3>
        <div class="rating">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star"aria-hidden="true"></i>
            <i class="fa fa-star-half-o" aria-hidden="true"></i>
            <i class="fa fa-star-o"></i>
        </div>
        <p>100000DT</p>
        <button class="buy-button">Acheter</button>
    </div>
    <div class="item-model">
        <img src="images/mercedes suv.png" alt="best1">
        <h3>Mercedes SUV</h3>
        <div class="rating">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star"aria-hidden="true"></i>
            <i class="fa fa-star-half-o" aria-hidden="true"></i>
            <i class="fa fa-star-o"></i>
        </div>
        <p>100000DT</p>
        <button class="buy-button">Acheter</button>
    </div>
    <div class="item-model">
        <img src="images/mercedes amg.png" alt="best1">
        <h3>Mercedes AMG</h3>
        <div class="rating">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star"aria-hidden="true"></i>
            <i class="fa fa-star-half-o" aria-hidden="true"></i>
            <i class="fa fa-star-o"></i>
        </div>
        <p>100000DT</p>
        <button class="buy-button">Acheter</button>
    </div>
    <div class="item-model">
        <img src="images/mercedes sedans.png" alt="best1">
        <h3>Mercedes Sedans</h3>
        <div class="rating">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star"aria-hidden="true"></i>
            <i class="fa fa-star-half-o" aria-hidden="true"></i>
            <i class="fa fa-star-o"></i>
        </div>
        <p>100000DT</p>
        <button class="buy-button">Acheter</button>
    </div>


    
    <div class="item-model">
        <img src="images/best-1.png" alt="best1">
        <h3>BMW blanc</h3>
        <div class="rating">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star"aria-hidden="true"></i>
            <i class="fa fa-star-half-o" aria-hidden="true"></i>
            <i class="fa fa-star-o"></i>
        </div>
        <p>100000DT</p>
        <button class="buy-button">Acheter</button>
    </div>
    <div class="item-model">
        <img src="images/best-1.png" alt="best1">
        <h3>BMW blanc</h3>
        <div class="rating">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star"aria-hidden="true"></i>
            <i class="fa fa-star-half-o" aria-hidden="true"></i>
            <i class="fa fa-star-o"></i>
        </div>
        <p>100000DT</p>
        <button class="buy-button">Acheter</button>
    </div>
    <div class="item-model">
        <img src="images/best-1.png" alt="best1">
        <h3>BMW blanc</h3>
        <div class="rating">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star"aria-hidden="true"></i>
            <i class="fa fa-star-half-o" aria-hidden="true"></i>
            <i class="fa fa-star-o"></i>
        </div>
        <p>100000DT</p>
        <button class="buy-button">Acheter</button>
    </div>
    <div class="item-model">
        <img src="images/best-1.png" alt="best1">
        <h3>BMW blanc</h3>
        <div class="rating">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star"aria-hidden="true"></i>
            <i class="fa fa-star-half-o" aria-hidden="true"></i>
            <i class="fa fa-star-o"></i>
        </div>
        <p>100000DT</p>
        <button class="buy-button">Acheter</button>
    </div>
    <!-- End of repeated items -->
</div>
<div class="pagination" id="pagination-container">
    <!-- Pagination buttons will be dynamically added here -->
</div>
<footer>
    <div class="container">
        <div class="footer-grid">
            <div class="footer-section">
               <h3>Nous Contacter</h3>
               <p><strong>Téléphone :</strong> +216 51816764</p>
              <p><strong>Email :</strong> info@autoworld.com</p>
              <p><strong>Adresse :</strong> ENSI,Manouba,Tunisie</p>
            </div>
            <div class="footer-section">
              <h3>Restez Connecté</h3>
              <ul class="social-icons">
                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
              </ul>
              <p>Inscrivez-vous à notre newsletter pour recevoir les dernières actualités et offres exclusives :</p>
              <form class="newsletter-form" action="inscription.php" method="post">
                <input type="email" name="email" placeholder="Votre Email" required>
                <button type="submit">S'inscrire</button>
              </form>
            </div>
        </div>
        <div class="copyright">
            <p>&copy; 2024 AutoWorld. Tous droits réservés.</p>
        </div>
    </div>
</footer>
</body>
</html>




