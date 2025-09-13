
<?php
include 'conectarebd.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Modelele impreuna cu puterea motoarelor acestora</title>
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
            <div class="text-peste-imagine">MODELELE ȘI PUTEREA MOTOARELOR AFERENTE</div>
        </div>

        <br><br><br>
    </div>

    <ul class="sub-meniu">
        <li><a href="modele.php">Modele</a></li>
        <li><a href="ani_productie.php">Anii de producție pentru modele</a></li>
        <li><a href="modele_inca_in_productie.php">Modele în producție</a></li>
        <li><a class="active" href="puterea_motoarelor_folosite_de_modele.php">Modelele și puterea motoarelor aferente</a></li>
        <li><a href="modele_electrice.php">Modele electrice</a></li>
        <li><a href="modele_eficiente_energetic.php">Modele eficiente sau performante</a></li>
        <li><a href="modele_fara_facelift.php">Modele fără facelift</a></li>
    </ul>

    <br><br>

    <!-- REUNIUNE -->
    <?php
    $sql1 = "
    SELECT 
        lm.denumire_marca, 
        im.denumire_model, 
        im.generatie, 
        im.cod_generatie, 
        im.facelift, 
        smt.putere_motor 
    FROM 
        informatii_modele AS im
    JOIN 
        legatura_modele AS lm 
        ON im.denumire_model = lm.denumire_model 
        AND im.generatie = lm.generatie 
        AND im.cod_generatie = lm.cod_generatie 
        AND im.facelift = lm.facelift
    JOIN 
        motoare_termice AS mt 
        ON lm.id_model = mt.id_model
    JOIN 
        specificatii_motoare_termice AS smt 
        ON mt.cod_motor = smt.cod_motor
    
    UNION ALL
    
    SELECT 
        lm.denumire_marca, 
        im.denumire_model, 
        im.generatie, 
        im.cod_generatie, 
        im.facelift, 
        me.putere 
    FROM 
        informatii_modele AS im
    JOIN 
        legatura_modele AS lm 
        ON im.denumire_model = lm.denumire_model 
        AND im.generatie = lm.generatie 
        AND im.cod_generatie = lm.cod_generatie 
        AND im.facelift = lm.facelift
    JOIN 
        motoare_electrice AS me 
        ON lm.id_model = me.id_model
    ";


    if($result = mysqli_query($conn, $sql1)){
        if(mysqli_num_rows($result) > 0){
            echo "<table class='tabela'>";
                echo "<tr>";
                    echo "<th>DENUMIRE MARCĂ</th>";
                    echo "<th>DENUMIRE MODEL</th>";
                    echo "<th>GENERAȚIE</th>";
                    echo "<th>COD GENERATIE</th>";
                    echo "<th>FACELIFT</th>";
                    echo "<th>PUTERE MOTOR</th>";
                echo "</tr>";
            while($row = mysqli_fetch_array($result)){

                $generatie = ($row['generatie'] === 'necunoscuta') ? 'nu este cazul' : $row['generatie'];
                $cod_generatie = ($row['cod_generatie'] === 'necunoscuta') ? 'necunoscut' : $row['cod_generatie'];
                $facelift = ($row['facelift'] == 0) ? 'nu este cazul' : $row['facelift'];
                $putere_motor = is_null($row['putere_motor'] ) ? 'necunoscuta' : $row['putere_motor'] . " cp";


                echo "<tr>";
                    echo "<td>" . $row['denumire_marca'] . "</td>";
                    echo "<td>" . $row['denumire_model'] . "</td>";
                    echo "<td>$generatie</td>";
                    echo "<td>$cod_generatie</td>";
                    echo "<td>$facelift</td>";
                    echo "<td>$putere_motor</td>";
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