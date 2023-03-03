<?php
session_start();
require('Classes.php');

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>



    <?php




    ?>
    <main>
<!--  if(!isset($_SESSION['paires'])):?> -->
        <form method="GET" action="">
            <select name="paires">
                <option value="6">3</option>
                <option value="8">4</option>
                <option value="10">5</option>
            </select>
            <button type="submit" name="submit">Choisir</button>
        </form>
        <!-- afficher le nombre de cartes en fonction du nombre de paires choisies -->
        
            <?php $_SESSION['paires']=$_GET['paires'];
            var_dump($_SESSION);
            ?>
<?php if(isset($_SESSION['paires'])): ?>
            <div class="container">
                <table class="tab">


                    <tr>
                        <?php

                        $paires = $_SESSION['paires'];
                        for ($i = 1; $i <= $paires; $i++) :
                            $card[$i] = new Card();
                            $card[$i]->setId($i);
                            $card[$i]->setImage($i . ".png");
                            $card[$i]->setState("hide");
                        ?>
                            <td>
                                <div class="cards">
                                    <form action="" method="GET">
                                        <div class="box">
                                           

                                            <div class="box-inner">

                                                <div class="box-front">
                                                    <button type="submit" name="tourne"><img src="assets\img\front.jpg" alt=""></button>

                                                </div>

                                                <div class="box-back">
                                                    <img src="assets\img\<?= $i ?>.jpg" alt="">
                                                </div>


                                            </div>


                                        </div>

                                    </form>
                                </div>
                            </td>

                        <?php
var_dump($_GET);
                        endfor ?>
                    </tr>
                </table>
            </div>
        <?php endif ?>
        <input name="reset" type="reset" value="">
       <?php  var_dump($_GET);?>
    </main>


    <!-- <table>
    <tr>
        <td>hello</td>
        <td>hello</td>
        <td>hello</td>
        <td>hello</td>
    </tr>
    <tr>
        <td>hello</td>
        <td>hello</td>
        <td>hello</td>
        <td>hello</td>
    </tr>

</table> -->


</body>

</html>