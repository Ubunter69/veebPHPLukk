<?php
echo "<h1>Töö failidega - Pildid</h1>";
?>

<div class="flex-container">
    <div>
        <h3>Pildi valimine ja parameetrid</h3>
        <form method="post" action="">
            <select name="pildid">
                <option value="">Vali pilt</option>
                <?php 
                $kataloog = 'pildid';
                $asukoht = opendir($kataloog);
                while($rida = readdir($asukoht)){
                    if($rida != '.' && $rida != '..'){
                        echo "<option value='$rida'>$rida</option>\n";
                    }
                }
                ?>
            </select>
            <input type="submit" value="Vaata">
        </form>

        <?php
        if(!empty($_POST['pildid'])){
            $pilt = $_POST['pildid'];
            $pildi_aadress = 'pildid/'.$pilt;
            $pildi_andmed = getimagesize($pildi_aadress);
            
            $laius = $pildi_andmed[0];
            $korgus = $pildi_andmed[1];
            $formaat = $pildi_andmed[2];
            $max_laius = 120;
            $max_korgus = 90;
            
            //suhtearvu leidmine
            if($laius <= $max_korgus && $korgus <= $max_korgus){
                $ratio = 1;	
            } elseif($laius > $korgus){
                $ratio = $max_laius/$laius;	
            } else {
                $ratio = $max_korgus/$korgus;	
            }
            
            //uute mõõtmete leidmine
            $pisi_laius = round($laius*$ratio);
            $pisi_korgus = round($korgus*$ratio);
            
            echo '<h3>Originaal pildi andmed</h3>';
            echo "Laius: $laius<br>";
            echo "Kõrgus: $korgus<br>";
            echo "Formaat: $formaat<br>";
            
            echo '<h3>Uue pildi andmed</h3>';
            echo "Arvutamse suhe: $ratio <br>";
            echo "Laius: $pisi_laius<br>";
            echo "Kõrgus: $pisi_korgus<br>";
            echo "<img width='$pisi_laius' src='$pildi_aadress'><br>";
        }
        ?>
    </div>

    <div>
        <h3>Suvaline pilt</h3>
        <form method="post" action="">
            <input type="submit" name="suvaline" value="Näita suvaline pilt">
        </form>

        <?php
        if(isset($_POST['suvaline'])){
            $kataloog = 'pildid';
            $pildid = array();
            
            $asukoht = opendir($kataloog);
            while($rida = readdir($asukoht)){
                if($rida != '.' && $rida != '..'){
                    $pildid[] = $rida;
                }
            }
            
            $suvaline_pilt = $pildid[array_rand($pildid)];
            $pildi_aadress = 'pildid/'.$suvaline_pilt;
            $pildi_andmed = getimagesize($pildi_aadress);
            
            $max_laius = 120;
            $max_korgus = 90;
            $laius = $pildi_andmed[0];
            $korgus = $pildi_andmed[1];
            
            if($laius <= $max_korgus && $korgus <= $max_korgus){
                $ratio = 1;	
            } elseif($laius > $korgus){
                $ratio = $max_laius/$laius;	
            } else {
                $ratio = $max_korgus/$korgus;	
            }
            
            $pisi_laius = round($laius*$ratio);
            $pisi_korgus = round($korgus*$ratio);
            
            echo "<h4>Suvaline pilt: $suvaline_pilt</h4>";
            echo "<img width='$pisi_laius' src='$pildi_aadress'><br>";
        }
        ?>
    </div>
</div>

<div class="flex-container">
    <div style="flex: 1; min-width: 100%;">
        <h3>Pisipildid veergudes</h3>
        <form method="post" action="">
            <label>Veergude arv:</label>
            <select name="veerud">
                <option value="2">2 veergu</option>
                <option value="3" selected>3 veergu</option>
                <option value="4">4 veergu</option>
            </select>
            <input type="submit" name="kuva_galerii" value="Kuva galerii">
        </form>

        <?php
        if(isset($_POST['kuva_galerii'])){
            $veerud = isset($_POST['veerud']) ? (int)$_POST['veerud'] : 3;
            $kataloog = 'pildid';
            $pildid = array();
            
            $asukoht = opendir($kataloog);
            while($rida = readdir($asukoht)){
                if($rida != '.' && $rida != '..'){
                    $pildid[] = $rida;
                }
            }
            
            echo "<table style='width: 100%;'>";
            $counter = 0;
            foreach($pildid as $pilt) {
                if($counter % $veerud == 0) {
                    echo "<tr>";
                }
                
                $pildi_aadress = 'pildid/'.$pilt;
                $pildi_andmed = getimagesize($pildi_aadress);
                
                $max_laius = 120;
                $max_korgus = 90;
                $laius = $pildi_andmed[0];
                $korgus = $pildi_andmed[1];
                
                if($laius <= $max_korgus && $korgus <= $max_korgus){
                    $ratio = 1;	
                } elseif($laius > $korgus){
                    $ratio = $max_laius/$laius;	
                } else {
                    $ratio = $max_korgus/$korgus;	
                }
                
                $pisi_laius = round($laius*$ratio);
                $pisi_korgus = round($korgus*$ratio);
                
                echo "<td style='text-align: center; padding: 10px;'>";
                echo "<a href='$pildi_aadress' target='_blank'>";
                echo "<img width='$pisi_laius' src='$pildi_aadress'>";
                echo "</a>";
                echo "<br>$pilt";
                echo "</td>";
                
                $counter++;
                if($counter % $veerud == 0) {
                    echo "</tr>";
                }
            }
            
            // Закрываем последнюю строку если нужно
            if($counter % $veerud != 0) {
                echo "</tr>";
            }
            echo "</table>";
        }
        ?>
    </div>
</div>