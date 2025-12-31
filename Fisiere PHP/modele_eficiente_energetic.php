
<?php
include 'conectarebd.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Modele eficiente sau performante</title>
    <link rel="stylesheet" href="../Fisiere CSS/style-modele.css">
    <link rel="stylesheet" href="../Fisiere CSS/style-meniu3.css">
</head>
<body>

    <ul class="meniu-navigare">
        <li><a href="index.php"><b>MĂRCI</b></a></li>
        <li><a class="active" href="modele.php"><b>MODELE</b></a></li>
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
            <div class="text-peste-imagine">MODELE EFICIENTE SAU PERFORMANTE</div>
        </div>

        <br><br><br>
    </div>

    <ul class="sub-meniu">
        <li><a href="modele.php">Modele</a></li>
        <li><a href="ani_productie.php">Anii de producție pentru modele</a></li>
        <li><a href="modele_inca_in_productie.php">Modele în producție</a></li>
        <li><a href="puterea_motoarelor_folosite_de_modele.php">Modelele și puterea motoarelor aferente</a></li>
        <li><a href="modele_electrice.php">Modele electrice</a></li>
        <li><a class="active" href="modele_eficiente_energetic.php">Modele eficiente sau performante</a></li>
        <li><a href="modele_fara_facelift.php">Modele fără facelift</a></li>
    </ul>

    <br>

    <h3 class="info">
        Nota:<br>Un model de masina este considerat eficient din punct de vedere energetic daca are consumul mediu de carburant mai mic decat 6.<br>
        Un model de masina este considerat performant daca are puterea motorului electric mai mare decat 150 cp.<br>
        In tabela urmatoare se afiseaza atat modelele (care utilizeaza ca si combustibil carburant) eficiente, cat si modelele 
        (care utilizeaza ca si combustibil curentul electric) performante.
    </h3>

    <!-- OPERATIE COMPUSA: SELECTIE, REUNIUNE SI APOI JONCTIUNE (JONCTIUNEA DE LA SFARSIT) -->
    <?php
    $sql1 = "SELECT DISTINCT 
        lm.denumire_marca, 
        lm.denumire_model, 
        lm.generatie, 
        lm.cod_generatie,
        lm.facelift
            FROM (
            SELECT mt.id_model, c.consum_mixt
            FROM consumuri AS c
            JOIN motoare_termice AS mt ON c.id_motor = mt.id_motor
            WHERE c.consum_mixt < 6

            UNION

            SELECT me.id_model, me.putere
            FROM motoare_electrice AS me
            WHERE me.putere > 150
        ) AS eficiente_sau_performante
        JOIN legatura_modele AS lm ON eficiente_sau_performante.id_model = lm.id_model ";

    if($result = mysqli_query($conn, $sql1)){
        if(mysqli_num_rows($result) > 0){
            echo "<table class='tabela'>";
                echo "<tr>";
                    echo "<th>DENUMIRE MARCĂ</th>";
                    echo "<th>DENUMIRE MODEL</th>";
                    echo "<th>GENERAȚIE</th>";
                    echo "<th>COD GENERATIE</th>";
                    echo "<th>FACELIFT</th>";
                echo "</tr>";
            while($row = mysqli_fetch_array($result)){

                $generatie = ($row['generatie'] === 'necunoscuta') ? 'nu este cazul' : $row['generatie'];
                $cod_generatie = ($row['cod_generatie'] === 'necunoscuta') ? 'necunoscut' : $row['cod_generatie'];
                $facelift = ($row['facelift'] == 0) ? 'nu este cazul' : $row['facelift'];


                echo "<tr>";
                    echo "<td>" . $row['denumire_marca'] . "</td>";
                    echo "<td>" . $row['denumire_model'] . "</td>";
                    echo "<td>$generatie</td>";
                    echo "<td>$cod_generatie</td>";
                    echo "<td>$facelift</td>";
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