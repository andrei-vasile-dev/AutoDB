
<?php
include 'conectarebd.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Ani productie modele</title>
    <link rel="stylesheet" href="../Fisiere CSS/style-modele.css">
    <link rel="stylesheet" href="../Fisiere CSS/style-meniu3.css">
</head>
<body>

    <ul class="meniu-navigare">
        <li><a href="index.php"><b>MĂRCI</b></a></li>
        <li><a class="active" href="modele.php"><b>MODELE</b></a></li>
        <li><a href="specificatii.php"><b>SPECIFICAȚII</b></a></li>
        <li><a href="dimensiuni.php"><b>DIMENSIUNI</b></a></li>
        <li><a href="motoare_termice.php"><b>MOTOARE TERMICE</b></a></li>
        <li><a href="motoare_electrice.php"><b>MOTOARE ELECTRICE</b></a></li>
    </ul>

    <br><br>
    <div class="main">
        <br><br><br>

        <div class="imagine-container">
            <img src="../Imagini/masini1.jpg" alt="Imagine masini" class="imagine-larga">
            <div class="text-peste-imagine">MODELELE ÎMPREUNĂ CU ANII LOR DE PRODUCȚIE</div>
        </div>

        <br><br><br>
    </div>

    <ul class="sub-meniu">
        <li><a href="modele.php">Modele</a></li>
        <li><a class="active" href="ani_productie.php">Anii de producție pentru modele</a></li>
        <li><a href="modele_inca_in_productie.php">Modele în producție</a></li>
        <li><a href="puterea_motoarelor_folosite_de_modele.php">Modelele și puterea motoarelor aferente</a></li>
        <li><a href="modele_electrice.php">Modele electrice</a></li>
        <li><a href="modele_eficiente_energetic.php">Modele eficiente sau performante</a></li>
        <li><a href="modele_fara_facelift.php">Modele fără facelift</a></li>
    </ul>

    <br><br>

    <!--PROIECTIE-->
    <?php
    $sql1 = "SELECT 
                    denumire_model, 
                    generatie, 
                    an_incepere_prod, 
                    an_sfarsit_prod
            FROM 
                    informatii_modele";

    if($result = mysqli_query($conn, $sql1)){
        if(mysqli_num_rows($result) > 0){
            echo "<table class='tabela'>";
                echo "<tr>";
                    echo "<th>DENUMIRE MODEL</th>";
                    echo "<th>GENERAȚIE</th>";
                    echo "<th>ANUL DE ÎNCEPERE AL PRODUCȚIEI</th>";
                    echo "<th>ANUL DE SFÂRȘIT AL PRODUCȚIEI</th>";
                echo "</tr>";
            while($row = mysqli_fetch_array($result)){

                $generatie = ($row['generatie'] === 'necunoscuta') ? 'nu este cazul' : $row['generatie'];
                /*$cod_generatie = ($row['cod_generatie'] === 'necunoscuta') ? 'necunoscut' : $row['cod_generatie'];*/
                /*$facelift = ($row['facelift'] == 0) ? 'nu este cazul' : $row['facelift'];*/
                $an_sfarsit_prod = is_null($row['an_sfarsit_prod'] ) ? 'in productie' : $row['an_sfarsit_prod'];


                echo "<tr>";
                    echo "<td>" . $row['denumire_model'] . "</td>";
                    echo "<td>$generatie</td>";
                    echo "<td>" . $row['an_incepere_prod'] . "</td>";
                    echo "<td>$an_sfarsit_prod</td>";
                echo "</tr>";
            }
            echo "</table>";
            mysqli_free_result($result);
        } else{
            echo "Nu au fost gasite rezultate.";
        }
    } else{
        echo "ERROR: Nu s-a putut executa $sql. " . mysqli_error($link);
    }
    
    echo '<br><br><br><br><br><br><br>';

    ?>


</body>

</html>
