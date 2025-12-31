
<?php
include 'conectarebd.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Consumuri</title>
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
            <div class="text-peste-imagine">CONSUMURI</div>
        </div>

        <br><br><br>
    </div>

    <ul class="sub-meniu">
        <li><a href="motoare_termice.php">MOTOARE TERMICE</a></li>
        <li><a href="specificatii_motoare_termice.php">SPECIFICAȚII MOTOARE TERMICE</a></li>
        <li><a class="active" href="consumuri.php">CONSUMURI</a></li>
        <li><a href="transmisii.php">TRANSMISII</a></li>
        <li><a href="volume_rezervor_combustibil.php">VOLUME REZERVOR COMBUSTIBIL</a></li>
    </ul>

    <br><br>


    <?php
    $sql1 = "SELECT 
                    lm.denumire_marca, 
                    lm.denumire_model,
                    c.consum_oras,
                    c.consum_extern,
                    c.consum_mixt
                    
            FROM 
                    legatura_modele AS lm
            JOIN 
                    motoare_termice AS mt 
            ON lm.id_model = mt.id_model
            JOIN
                consumuri as c
            ON mt.id_motor = c.id_motor";

    if($result = mysqli_query($conn, $sql1)){
        if(mysqli_num_rows($result) > 0){
            echo "<table class='tabela'>";
                echo "<tr>";
                    echo "<th>DENUMIRE MARCĂ</th>";
                    echo "<th>DENUMIRE MODEL</th>";
                    echo "<th>CONSUM ORAȘ</th>";
                    echo "<th>CONSUM EXTERN</th>";
                    echo "<th>CONSUM MIXT</th>";
                echo "</tr>";
            while($row = mysqli_fetch_array($result)){

                $consum_oras = is_null($row['consum_oras']) ? 'necunoscut' : $row['consum_oras'] . " l/100 km";
                $consum_extern = is_null($row['consum_extern']) ? 'necunoscut' : $row['consum_extern'] . " l/100 km";
                $consum_mixt = is_null($row['consum_mixt']) ? 'necunoscut' : $row['consum_mixt'] . " l/100 km";

                echo "<tr>";
                    echo "<td>" . $row['denumire_marca'] . "</td>";
                    echo "<td>" . $row['denumire_model'] . "</td>";
                    echo "<td>$consum_oras</td>";
                    echo "<td>$consum_extern</td>";
                    echo "<td>$consum_mixt</td>";
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