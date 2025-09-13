
<?php
include 'conectarebd.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dimensiuni</title>
    <link rel="stylesheet" href="../Fisiere CSS/style-index.css">
    <link rel="stylesheet" href="../Fisiere CSS/style-meniu.css">
</head>
<body>

    <ul class="meniu-navigare">
        <li><a href="index.php"><b>MĂRCI</b></a></li>
        <li><a href="modele.php"><b>MODELE</b></a></li>
        <li><a href="specificatii.php"><b>SPECIFICAȚII</b></a></li>
        <li><a class="active" href="dimensiuni.php"><b>DIMENSIUNI</b></a></li>
        <li><a href="motoare_termice.php"><b>MOTOARE TERMICE</b></a></li>
        <li><a href="motoare_electrice.php"><b>MOTOARE ELECTRICE</b></a></li>
    </ul>

    <br><br>
    <div class="main">
        <br><br><br>

        <div class="imagine-container">
            <img src="../Imagini/masini1.jpg" alt="Imagine masini" class="imagine-larga">
            <div class="text-peste-imagine">DIMENSIUNI</div>
        </div>

        <br><br><br>
    </div>

    <ul class="sub-meniu">
        <li><a class="active" href="dimensiuni.php">DIMENSIUNI</a></li>
        <li><a href="pneuri.php">PNEURI</a></li>
        <li><a href="jante.php">JANTE</a></li>
    </ul>

    <br><br>


    <!-- JONCTIUNE -->
    <?php
    $sql1 = "SELECT 
                    lm.denumire_marca, 
                    lm.denumire_model, 
                    d.lungime, 
                    d.latime, 
                    d.ampatament, 
                    d.garda_sol
            FROM 
                    legatura_modele AS lm
            JOIN 
                    specificatii AS s 
            ON lm.id_model = s.id_model
            JOIN
                    dimensiuni as d
            ON
                    s.id_model = d.id_model";

    if($result = mysqli_query($conn, $sql1)){
        if(mysqli_num_rows($result) > 0){
            echo "<table class='tabela'>";
                echo "<tr>";
                    echo "<th>DENUMIRE MARCĂ</th>";
                    echo "<th>DENUMIRE MODEL</th>";
                    echo "<th>LUNGIME</th>";
                    echo "<th>LĂȚIME</th>";
                    echo "<th>AMPATAMENT</th>";
                    echo "<th>GARDĂ SOL</th>";
                echo "</tr>";
            while($row = mysqli_fetch_array($result)){

                $lungime = is_null($row['lungime']) ? 'necunoscută' : $row['lungime']." mm";
                $latime = is_null($row['latime']) ? 'necunoscută' : $row['latime']." mm";
                $ampatament = is_null($row['ampatament']) ? 'necunoscut' : $row['ampatament']." mm";
                $garda_sol = is_null($row['garda_sol']) ? 'necunoscuta' : $row['garda_sol']." mm";

                echo "<tr>";
                    echo "<td>" . $row['denumire_marca'] . "</td>";
                    echo "<td>" . $row['denumire_model'] . "</td>";
                    echo "<td>$lungime</td>";
                    echo "<td>$latime</td>";
                    echo "<td>$ampatament</td>";
                    echo "<td>$garda_sol</td>";
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