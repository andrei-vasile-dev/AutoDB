
<?php
include 'conectarebd.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Marci</title>
    <link rel="stylesheet" href="../Fisiere CSS/style-index.css">
    <link rel="stylesheet" href="../Fisiere CSS/style-meniu.css">
</head>
<body>

    <ul class="meniu-navigare">
        <li><a class="active" href="index.php"><b>MĂRCI</b></a></li>
        <li><a href="modele.php"><b>MODELE</b></a></li>
        <li><a href="specificatii.php"><b>SPECIFICAȚII</b></a></li>
        <li><a href="dimensiuni.php"><b>DIMENSIUNI</b></a></li>
        <li><a href="motoare_termice.php"><b>MOTOARE TERMICE</b></a></li>
        <li><a href="motoare_electrice.php"><b>MOTOARE ELECTRICE</b></a></li>
    </ul>

    <br><br>
    <div class="main">
        <br><br><br>

        <div class="imagine-container">
            <img src="../Imagini/masini1.jpg" alt="Imagine masini" class="imagine-larga">
            <div class="text-peste-imagine">INFORMAȚII DESPRE MĂRCI ȘI MODELE DE MAȘINI</div>
        </div>

        <br><br><br>
        <hr>
    </div>

    <br><br>

    <?php
    $sql1 = "SELECT denumire_marca, tara_origine, an_fondare FROM marci";

    if($result = mysqli_query($conn, $sql1)){
        if(mysqli_num_rows($result) > 0){
            echo "<table class='tabela'>";
                echo "<tr>";
                    echo "<th>DENUMIRE MARCĂ</th>";
                    echo "<th>ȚARA DE ORIGINE</th>";
                    echo "<th>ANUL FONDĂRII</th>";
                echo "</tr>";
            while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                    echo "<td>" . $row['denumire_marca'] . "</td>";
                    echo "<td>" . $row['tara_origine'] . "</td>";
                    echo "<td>" . $row['an_fondare'] . "</td>";
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
    
    echo '<br><br>';

    ?>


</body>

</html>