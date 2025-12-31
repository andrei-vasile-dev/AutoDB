
<?php
include 'conectarebd.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Pneuri</title>
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
            <div class="text-peste-imagine">PNEURI</div>
        </div>

        <br><br><br>
    </div>

    <ul class="sub-meniu">
        <li><a href="dimensiuni.php">DIMENSIUNI</a></li>
        <li><a class="active" href="pneuri.php">PNEURI</a></li>
        <li><a href="jante">JANTE</a></li>
    </ul>

    <br><br>


    <?php
    $sql1 = "SELECT 
                    lm.denumire_marca, 
                    lm.denumire_model, 
                    p.latime_mm, 
                    p.raport_inaltime,
                    p.tip_constructie
            FROM 
                    legatura_modele AS lm
            JOIN 
                    specificatii AS s 
            ON lm.id_model = s.id_model
            JOIN
                    dimensiuni as d
            ON
                    s.id_model = d.id_model 
            JOIN
                dimensiuni_pneuri as dp 
            ON 
                d.id_model = dp.id_dimensiune
            JOIN
                pneuri as p
            ON
                dp.id_pneu = p.id_pneu";

    if($result = mysqli_query($conn, $sql1)){
        if(mysqli_num_rows($result) > 0){
            echo "<table class='tabela'>";
                echo "<tr>";
                    echo "<th>DENUMIRE MARCĂ</th>";
                    echo "<th>DENUMIRE MODEL</th>";
                    echo "<th>LĂȚIME PNEU</th>";
                    echo "<th>RAPORT ÎNĂLȚIME</th>";
                    echo "<th>TIP CONSTRUCȚIE</th>";
                echo "</tr>";
            while($row = mysqli_fetch_array($result)){

                $latime = is_null($row['latime_mm']) ? 'necunoscută' : $row['latime_mm']." mm";

                echo "<tr>";
                    echo "<td>" . $row['denumire_marca'] . "</td>";
                    echo "<td>" . $row['denumire_model'] . "</td>";
                    echo "<td>$latime</td>";
                    echo "<td>" . $row['raport_inaltime'] . "</td>";
                    echo "<td>" . $row['tip_constructie'] . "</td>";
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