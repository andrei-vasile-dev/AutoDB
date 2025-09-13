
<?php
include 'conectarebd.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Specificatii</title>
    <link rel="stylesheet" href="../Fisiere CSS/style-modele.css">
    <link rel="stylesheet" href="../Fisiere CSS/style-meniu.css">
</head>
<body>
    <ul class="meniu-navigare">
        <li><a href="index.php"><b>MĂRCI</b></a></li>
        <li><a href="modele.php"><b>MODELE</b></a></li>
        <li><a class="active" href="specificatii.php"><b>SPECIFICAȚII</b></a></li>
        <li><a href="dimensiuni.php"><b>DIMENSIUNI</b></a></li>
        <li><a href="motoare_termice.php"><b>MOTOARE TERMICE</b></a></li>
        <li><a href="motoare_electrice.php"><b>MOTOARE ELECTRICE</b></a></li>
    </ul>

    <br><br>
    <div class="main">
        <br><br><br>

        <div class="imagine-container">
            <img src="../Imagini/masini1.jpg" alt="Imagine masini" class="imagine-larga">
            <div class="text-peste-imagine">SPECIFICAȚII</div>
        </div>

        <br><br><br>
        <hr>
    </div>

    <br><br>

    <?php
    $sql1 = "SELECT 
                    lm.denumire_marca, 
                    lm.denumire_model, 
                    s.nr_scaune, 
                    tc.nume_tip, 
                    s.greutate_redusa, 
                    s.greutate_maxima, 
                    s.viteza_maxima, 
                    s.tip_servodirectie, 
                    s.vol_min_portbagaj, 
                    s.vol_max_portbagaj
            FROM 
                    legatura_modele AS lm
            JOIN 
                    specificatii AS s 
            ON lm.id_model = s.id_model 
            JOIN
                specificatii_tip_combustibil as stc
            ON 
                s.id_model = stc.id_specificatie
            JOIN
                tipuri_combustibil as tc
            ON stc.id_tip = tc.id_tip";

    if($result = mysqli_query($conn, $sql1)){
        if(mysqli_num_rows($result) > 0){
            echo "<table class='tabela'>";
                echo "<tr>";
                    echo "<th>DENUMIRE MARCĂ</th>";
                    echo "<th>DENUMIRE MODEL</th>";
                    echo "<th>NR SCAUNE</th>";
                    echo "<th>TIP COMBUSTIBIL</th>";
                    echo "<th>GREUTATE MIN</th>";
                    echo "<th>GREUTATE MAX</th>";
                    echo "<th>VITEZĂ MAX</th>";
                    echo "<th>SERVODIRECȚIE</th>";
                    echo "<th>VOLUM MIN PORTBAGAJ</th>";
                    echo "<th>VOLUM MAX PORTBAGAJ</th>";
                echo "</tr>";
            while($row = mysqli_fetch_array($result)){

                $greutate_redusa = is_null($row['greutate_redusa']) ? 'necunoscută' : $row['greutate_redusa']." kg";
                $greutate_maxima = is_null($row['greutate_maxima']) ? 'necunoscută' : $row['greutate_maxima']." kg";
                $viteza_maxima = is_null($row['viteza_maxima']) ? 'necunoscută' : $row['viteza_maxima']." km/h";
                $tip_servodirectie = is_null($row['tip_servodirectie']) ? 'necunoscuta' : $row['tip_servodirectie'];
                $vol_min_portbagaj = is_null($row['vol_min_portbagaj']) ? 'necunoscut' : $row['vol_min_portbagaj'];
                $vol_max_portbagaj = is_null($row['vol_max_portbagaj']) ? 'necunoscut' : $row['vol_max_portbagaj'];


                echo "<tr>";
                    echo "<td>" . $row['denumire_marca'] . "</td>";
                    echo "<td>" . $row['denumire_model'] . "</td>";
                    echo "<td>" . $row['nr_scaune'] . "</td>";
                    echo "<td>" . $row['nume_tip'] . "</td>";
                    echo "<td>$greutate_redusa</td>";
                    echo "<td>$greutate_maxima</td>";
                    echo "<td>$viteza_maxima</td>";
                    echo "<td>$tip_servodirectie</td>";
                    echo "<td>$vol_min_portbagaj</td>";
                    echo "<td>$vol_max_portbagaj</td>";
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