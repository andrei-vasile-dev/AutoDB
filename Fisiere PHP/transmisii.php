
<?php
include 'conectarebd.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Transmisii</title>
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
            <div class="text-peste-imagine">TRANSMISII</div>
        </div>

        <br><br><br>
    </div>

    <ul class="sub-meniu">
        <li><a href="motoare_termice.php">MOTOARE TERMICE</a></li>
        <li><a href="specificatii_motoare_termice.php">SPECIFICAȚII MOTOARE TERMICE</a></li>
        <li><a href="consumuri.php">CONSUMURI</a></li>
        <li><a class="active" href="transmisii.php">TRANSMISII</a></li>
        <li><a href="volume_rezervor_combustibil.php">VOLUME REZERVOR COMBUSTIBIL</a></li>
    </ul>

    <br><br>


    <?php
    $sql1 = "SELECT 
                    t.tractiune,
                    t.tip_cutie_viteze,
                    t.numar_trepte_viteza
                    
            FROM 
                    legatura_modele AS lm
            JOIN 
                    motoare_termice AS mt 
            ON lm.id_model = mt.id_model
            JOIN
                transmisii as t
            ON mt.id_transmisie = t.id_transmisie";

    if($result = mysqli_query($conn, $sql1)){
        if(mysqli_num_rows($result) > 0){
            echo "<table class='tabela'>";
                echo "<tr>";
                    echo "<th>TRACȚIUNE</th>";
                    echo "<th>TIP CUTIE VITEZE</th>";
                    echo "<th>NUMĂR TREPTE VITEZĂ</th>";
                echo "</tr>";
            while($row = mysqli_fetch_array($result)){

                $numar_trepte_viteza = is_null($row['numar_trepte_viteza']) ? 'nu este cazul' : $row['numar_trepte_viteza'];


                echo "<tr>";
                    echo "<td>" . $row['tractiune'] . "</td>";
                    echo "<td>" . $row['tip_cutie_viteze'] . "</td>";
                    echo "<td>$numar_trepte_viteza</td>";
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