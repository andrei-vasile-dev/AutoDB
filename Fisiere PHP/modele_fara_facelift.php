
<?php
include 'conectarebd.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Modele fara facelift</title>
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
            <div class="text-peste-imagine">MODELE FARĂ FACELIFT</div>
        </div>

        <br><br><br>
    </div>

    <ul class="sub-meniu">
        <li><a href="modele.php">Modele</a></li>
        <li><a href="ani_productie.php">Anii de producție pentru modele</a></li>
        <li><a href="modele_inca_in_productie.php">Modele în producție</a></li>
        <li><a href="puterea_motoarelor_folosite_de_modele.php">Modelele și puterea motoarelor aferente</a></li>
        <li><a href="modele_electrice.php">Modele electrice</a></li>
        <li><a href="modele_eficiente_energetic.php">Modele eficiente sau performante</a></li>
        <li><a class="active" href="modele_fara_facelift.php">Modele fără facelift</a></li>
    </ul>

    <br>
    
    <h3 class="info">
        Nota:<br>In tabela de mai jos sunt afisate modelele de masini care nu au primit nicio versiune imbunatatita dupa ce au fost
        scoase pe piata. Pentru fiecare model in parte se poate vedea si tipul cutiei de viteze si numarul vitezelor.
    </h3>

     <!-- OPERATIE COMPUSA: DIFERENTA (WHERE NOT EXIST), PROIECTIE(SELECT DISTINCT...), ULTERIOR DOUA JONCTIUNI -->
    <?php
    $sql1 = "SELECT DISTINCT
        nofacelift.denumire_model, 
        nofacelift.generatie,
        nofacelift.cod_generatie,
        t.tip_cutie_viteze, 
        t.numar_trepte_viteza
            FROM (
        SELECT DISTINCT lm.id_model, lm.denumire_model, lm.generatie, lm.cod_generatie, lm.facelift
            FROM legatura_modele lm
        WHERE NOT EXISTS (
            SELECT * 
        FROM legatura_modele lm2 
            WHERE lm2.denumire_model = lm.denumire_model
                AND lm2.generatie = lm.generatie
                AND lm2.cod_generatie = lm.cod_generatie
                AND lm2.facelift > 0
                )
        ) AS nofacelift
        JOIN modele_transmisii mt ON nofacelift.id_model = mt.id_model
        JOIN transmisii t ON mt.id_transmisie = t.id_transmisie";

    if($result = mysqli_query($conn, $sql1)){
        if(mysqli_num_rows($result) > 0){
            echo "<table class='tabela'>";
                echo "<tr>";
                    echo "<th>DENUMIRE MODEL</th>";
                    echo "<th>GENERAȚIE</th>";
                    echo "<th>COD GENERATIE</th>";
                    echo "<th>TIP CUTIE VITEZE</th>";
                    echo "<th>NUMĂR TREPTE VITEZĂ</th>";
                echo "</tr>";
            while($row = mysqli_fetch_array($result)){

                $generatie = ($row['generatie'] === 'necunoscuta') ? 'nu este cazul' : $row['generatie'];
                $cod_generatie = ($row['cod_generatie'] === 'necunoscuta') ? 'necunoscut' : $row['cod_generatie'];
                $numar_trepte_viteza = is_null($row['numar_trepte_viteza'] ) ? 'nu este cazul' : $row['numar_trepte_viteza'];

                echo "<tr>";
                    echo "<td>" . $row['denumire_model'] . "</td>";
                    echo "<td>$generatie</td>";
                    echo "<td>$cod_generatie</td>";
                    echo "<td>" . $row['tip_cutie_viteze'] . "</td>";
                    echo "<td>$numar_trepte_viteza</td>";
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

