
<?php
include 'conectarebd.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Motoare electrice</title>
    <link rel="stylesheet" href="../Fisiere CSS/style-index.css">
    <link rel="stylesheet" href="../Fisiere CSS/style-meniu.css">
</head>
<body>

    <ul class="meniu-navigare">
        <li><a href="index.php"><b>MĂRCI</b></a></li>
        <li><a href="modele.php"><b>MODELE</b></a></li>
        <li><a href="specificatii.php"><b>SPECIFICAȚII</b></a></li>
        <li><a href="dimensiuni.php"><b>DIMENSIUNI</b></a></li>
        <li><a href="motoare_termice.php"><b>MOTOARE TERMICE</b></a></li>
        <li><a class="active" href="motoare_electrice.php"><b>MOTOARE ELECTRICE</b></a></li>
    </ul>

    <br><br>
    <div class="main">
        <br><br><br>

        <div class="imagine-container">
            <img src="../Imagini/masini1.jpg" alt="Imagine masini" class="imagine-larga">
            <div class="text-peste-imagine">MOTOARE ELECTRICE</div>
        </div>

        <br><br><br>
    </div>

    <ul class="sub-meniu">
        <li><a class="active" href="motoare_electrice.php">MOTOARE ELECTRICE</a></li>
        <li><a href="baterii.php">BATERII</a></li>
    </ul>

    <br><br>


    <?php
    $sql1 = "SELECT 
                    cuplu_motor,
                    putere,
                    locatie_motor,
                    tip_motor
                    
            FROM 
                    motoare_electrice";

    if($result = mysqli_query($conn, $sql1)){
        if(mysqli_num_rows($result) > 0){
            echo "<table class='tabela'>";
                echo "<tr>";
                    echo "<th>CUPLU MOTOR</th>";
                    echo "<th>PUTERE</th>";
                    echo "<th>LOCAȚIE MOTOR</th>";
                    echo "<th>TIP MOTOR</th>";
                echo "</tr>";
            while($row = mysqli_fetch_array($result)){

                $cuplu_motor = is_null($row['cuplu_motor']) ? 'necunoscut' : $row['cuplu_motor'];
                $putere = is_null($row['putere']) ? 'necunoscuta' : $row['putere'] . " cp";
                $tip_motor = is_null($row['tip_motor']) ? 'necunoscut' : $row['tip_motor'];



                echo "<tr>";
                    echo "<td>$cuplu_motor</td>";
                    echo "<td>$putere</td>";
                    echo "<td>" . $row['locatie_motor'] . "</td>";
                    echo "<td>$tip_motor</td>";
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