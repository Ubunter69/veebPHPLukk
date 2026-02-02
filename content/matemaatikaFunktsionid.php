<?php
echo "<h1>Matemaatilised tehted</h1>";
?>

<div class="flex-container">
    <div>
        <h3>Põhilised tehted</h3>
        <?php
        $arv1 = 10;
        $arv2 = 20;
        echo "Esimese arvu väärtus on: ".$arv1;
        echo "<br>";
        echo "Teise arvi väärtus on: ".$arv2;
        echo "<br>";
        echo "+ | Liitmine --> : ".($arv1 + $arv2);
        echo "<br>";
        echo "- | Lahutamine --> : ".($arv1 - $arv2);
        echo "<br>";
        echo "* | Korrutamine --> : ".($arv1 * $arv2);
        echo "<br>";
        echo "/ | Jagamine --> : ".($arv1 / $arv2);
        ?>
    </div>
    
    <div>
        <h3>Matemaatilised funktsioonid</h3>
        <?php
        $arv = 3.456;
        echo "min(arv) | Väiksem arv --> : ".min($arv1, $arv2);
        echo "<br>";
        echo "max(arv) | Suurem arv --> : ".max($arv1, $arv2);
        echo "<br>";
        echo "round(arv) | Arv ümardamine täisarvani --> : ".round($arv);
        echo "<br>";
        echo "round(arv, 2) | Arv ümardamine täisarvani --> : ".round($arv, 2);
        echo "<br>";
        echo "ceil(arv) | Arv ümardamine üles --> : ".ceil($arv);
        echo "<br>";
        echo "floor(arv) | Arv ümardamine alla --> : ".floor($arv);
        echo "<br>";
        echo "rand(1, 10) | Juhuslike arvude genereerimine --> : ".rand(1, 10);
        echo "<br>";
        echo "pow(arv1, 2) | Astendamine --> : ".pow($arv1, 2);
        echo "<br>";
        echo "sqrt(arv1) | Ruutjuur --> : ".sqrt($arv1);
        ?>
    </div>
    
    <div>
        <h3>Omistamise operaatorid</h3>
        <?php
        $x = 10;
        $y = 20;
        $x++; // $x = $x + 1; Suurendamine ühevõrra
        $y--; // $y = $y - 1; Vähendamine ühevõrra
        echo "x = ".$x;
        echo "<br>";
        echo "y = ".$y;
        echo "<br>";
        $x *= $y;
        echo "x *=y: ".$x;
        echo "<br>";
        
        $nimi = "Illia";
        $parenimi = "Blahun";
        echo $nimi;
        echo "<br>";
        printf("Tere %s %s", $nimi, $parenimi);
        ?>
    </div>
</div>