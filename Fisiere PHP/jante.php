
<?php
include 'conectarebd.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Jante</title>
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
            <div class="text-peste-imagine">JANTE</div>
        </div>

        <br><br><br>
    </div>

    <ul class="sub-meniu">
        <li><a href="dimensiuni.php">DIMENSIUNI</a></li>
        <li><a href="pneuri.php">PNEURI</a></li>
        <li><a class="active" href="jante.php">JANTE</a></li>
    </ul>

    <br><br>


    <?php
    $sql1 = "SELECT 
                    lm.denumire_marca, 
                    lm.denumire_model, 
                    j.latime_janta_inch,
                    j.profil_buza,
                    j.diametru_janta_inch 
                    
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
                dimensiuni_jante as dj 
            ON 
                d.id_model = dj.id_dimensiune
            JOIN
                jante as j
            ON
                dj.id_janta = j.id_janta";

    if($result = mysqli_query($conn, $sql1)){
        if(mysqli_num_rows($result) > 0){
            echo "<table class='tabela'>";
                echo "<tr>";
                    echo "<th>DENUMIRE MARCĂ</th>";
                    echo "<th>DENUMIRE MODEL</th>";
                    echo "<th>LĂȚIME JANTĂ</th>";
                    echo "<th>PROFIL BUZĂ</th>";
                    echo "<th>DIAMETRU JANTĂ</th>";
                echo "</tr>";
            while($row = mysqli_fetch_array($result)){

                $latime_janta_inch = is_null($row['latime_janta_inch']) ? 'necunoscută' : $row['latime_janta_inch']." inch";
                $profil_buza = is_null($row['profil_buza']) ? 'necunoscut' : $row['profil_buza'];
                $diametru_janta_inch = is_null($row['diametru_janta_inch']) ? 'necunoscut' : $row['diametru_janta_inch']." inch";

                echo "<tr>";
                    echo "<td>" . $row['denumire_marca'] . "</td>";
                    echo "<td>" . $row['denumire_model'] . "</td>";
                    echo "<td>$latime_janta_inch</td>";
                    echo "<td>$profil_buza</td>";
                    echo "<td>$diametru_janta_inch</td>";
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