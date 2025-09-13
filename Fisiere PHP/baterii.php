
<?php
include 'conectarebd.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Baterii</title>
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
            <div class="text-peste-imagine">BATERII</div>
        </div>

        <br><br><br>
    </div>

    <ul class="sub-meniu">
        <li><a href="motoare_electrice.php">MOTOARE ELECTRICE</a></li>
        <li><a class="active" href="baterii.php">BATERII</a></li>
    </ul>

    <br><br>


    <?php
    $sql1 = "SELECT 
                    tehnologie_stocare,
                    capacitate_bruta,
                    autonomie_electrica,
                    locatie_baterie
                    
            FROM 
                    baterii";

    if($result = mysqli_query($conn, $sql1)){
        if(mysqli_num_rows($result) > 0){
            echo "<table class='tabela'>";
                echo "<tr>";
                    echo "<th>TEHNOLOGIE STOCARE</th>";
                    echo "<th>CAPACITATE BRUTĂ</th>";
                    echo "<th>AUTONOMIE ELECTRICĂ</th>";
                    echo "<th>LOCAȚIE BATERIE</th>";
                echo "</tr>";
            while($row = mysqli_fetch_array($result)){

                $capacitate_bruta = is_null($row['capacitate_bruta']) ? 'necunoscuta' : $row['capacitate_bruta'] . " kWh";
                $autonomie_electrica = is_null($row['autonomie_electrica']) ? 'necunoscuta' : $row['autonomie_electrica'] . " km";

                echo "<tr>";
                echo "<td>" . $row['tehnologie_stocare'] . "</td>";
                    echo "<td>$capacitate_bruta</td>";
                    echo "<td>$autonomie_electrica</td>";
                    echo "<td>" . $row['locatie_baterie'] . "</td>";
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