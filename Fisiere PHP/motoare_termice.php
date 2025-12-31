
<?php
include 'conectarebd.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Motoare termice</title>
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
            <div class="text-peste-imagine">MOTOARE TERMICE</div>
        </div>

        <br><br><br>
    </div>

    <ul class="sub-meniu">
        <li><a class="active" href="motoare_termice.php">MOTOARE TERMICE</a></li>
        <li><a href="specificatii_motoare_termice.php">SPECIFICAȚII MOTOARE TERMICE</a></li>
        <li><a href="consumuri.php">CONSUMURI</a></li>
        <li><a href="transmisii.php">TRANSMISII</a></li>
        <li><a href="volume_rezervor_combustibil.php">VOLUME REZERVOR COMBUSTIBIL</a></li>
    </ul>

    <br><br>


    <?php
    $sql1 = "SELECT 
                    mt.cod_motor,
                    mt.capacitate_ulei_motor 
                    
            FROM 
                    legatura_modele AS lm
            JOIN 
                    motoare_termice AS mt 
            ON lm.id_model = mt.id_model";

    if($result = mysqli_query($conn, $sql1)){
        if(mysqli_num_rows($result) > 0){
            echo "<table class='tabela'>";
                echo "<tr>";
                    echo "<th>COD MOTOR</th>";
                    echo "<th>CAPACITATE BAIE ULEI</th>";
                echo "</tr>";
            while($row = mysqli_fetch_array($result)){

                $capacitate_ulei_motor = is_null($row['capacitate_ulei_motor']) ? 'necunoscută' : $row['capacitate_ulei_motor'] . " litri";

                echo "<tr>";
                    echo "<td>" . $row['cod_motor'] . "</td>";
                    echo "<td>$capacitate_ulei_motor</td>";
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