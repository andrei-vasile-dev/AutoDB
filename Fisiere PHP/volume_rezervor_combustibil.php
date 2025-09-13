
<?php
include 'conectarebd.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Volume rezervor combustibil</title>
    <link rel="stylesheet" href="../Fisiere CSS/style-index.css">
    <link rel="stylesheet" href="../Fisiere CSS/style-meniu2.css">
</head>
<body>

    <ul class="meniu-navigare">
        <li><a href="index.php"><b>MĂRCI</b></a></li>
        <li><a href="modele.php"><b>MODELE</b></a></li>
        <li><a href="specificatii.php"><b>SPECIFICAȚII</b></a></li>
        <li><a href="dimensiuni.php"><b>DIMENSIUNI</b></a></li>
        <li><a class="active" href="motoare_termice.php"><b>MOTOARE TERMICE</b></a></li>
        <li><a href="motoare_electrice.php"><b>MOTOARE ELECTRICE</b></a></li>
    </ul>

    <br><br>
    <div class="main">
        <br><br><br>

        <div class="imagine-container">
            <img src="../Imagini/masini1.jpg" alt="Imagine masini" class="imagine-larga">
            <div class="text-peste-imagine">VOLUMELE REZERVOARELOR DE COMBUSTIBIL</div>
        </div>

        <br><br><br>
    </div>

    <ul class="sub-meniu">
        <li><a href="motoare_termice.php">MOTOARE TERMICE</a></li>
        <li><a href="specificatii_motoare_termice.php">SPECIFICAȚII MOTOARE TERMICE</a></li>
        <li><a href="consumuri.php">CONSUMURI</a></li>
        <li><a href="transmisii.php">TRANSMISII</a></li>
        <li><a class="active" href="volume_rezervor_combustibil.php">VOLUME REZERVOR COMBUSTIBIL</a></li>
    </ul>

    <br><br>


    <?php
    $sql1 = "SELECT 
                    lm.denumire_marca,
                    lm.denumire_model,
                    lm.generatie,
                    lm.cod_generatie,
                    lm.facelift,
                    vrc.volum
                    
            FROM 
                    legatura_modele AS lm
            JOIN 
                    motoare_termice AS mt 
            ON lm.id_model = mt.id_model
            JOIN
                volume_rezervor_combustibil as vrc
            ON mt.id_volum_rezervor_combustibil = vrc.id_volum";

    if($result = mysqli_query($conn, $sql1)){
        if(mysqli_num_rows($result) > 0){
            echo "<table class='tabela'>";
                echo "<tr>";
                    echo "<th>DENUMIRE MARCĂ</th>";
                    echo "<th>DENUMIRE MODEL</th>";
                    echo "<th>GENERAȚIE</th>";
                    echo "<th>COD GENERATIE</th>";
                    echo "<th>FACELIFT</th>";
                    echo "<th>VOL. REZERVOR DE COMBUSTIBIL</th>";
                echo "</tr>";
            while($row = mysqli_fetch_array($result)){

                $generatie = ($row['generatie'] === 'necunoscuta') ? 'nu este cazul' : $row['generatie'];
                $cod_generatie = ($row['cod_generatie'] === 'necunoscuta') ? 'necunoscut' : $row['cod_generatie'];
                $facelift = ($row['facelift'] == 0) ? 'nu este cazul' : $row['facelift'];
                $volum = is_null($row['volum']) ? 'necunoscut' : $row['volum'] . " litri";


                echo "<tr>";
                    echo "<td>" . $row['denumire_marca'] . "</td>";
                    echo "<td>" . $row['denumire_model'] . "</td>";
                    echo "<td>$generatie</td>";
                    echo "<td>$cod_generatie</td>";
                    echo "<td>$facelift</td>";
                    echo "<td>$volum</td>";
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