<?php
$oppilaat = luoOppilaat();
arvoEtunimet($oppilaat);
arvoSukunimet($oppilaat);
tulosta($oppilaat);

function tulosta($taulukko) {
    foreach($taulukko as $oppilas) {
        if(preg_match("/[BCD][a-z]/", $oppilas[1]) && preg_match("/[KLMN][a-z]/", $oppilas[2])) {
            echo $oppilas[0] . " oppilaan nimi on " . $oppilas[1] . " " . $oppilas[2] .". Kuulostaa vaikuttavalta!<br>";
        }
        if(preg_match("/[BCD][a-z]/", $oppilas[1]) && preg_match("/[AEIOU][a-z]/", $oppilas[2])) {
            echo $oppilas[0] . " oppilaan nimi on " . $oppilas[1] . " " . $oppilas[2] .". Onpas harvinainen nimi!<br>";
        }
        if(preg_match("/[AEIOU][a-z]/", $oppilas[1]) && preg_match("/[AEIOU][a-z]/", $oppilas[2])) {
            echo $oppilas[0] . " oppilaan nimi on " . $oppilas[1] . " " . $oppilas[2] .". Miten kaunis nimi!<br>";
        }
        if(preg_match("/[AEIOU][a-z]/", $oppilas[1]) && preg_match("/[KLMN][a-z]/", $oppilas[2])) {
            echo $oppilas[0] . " oppilaan nimi on " . $oppilas[1] . " " . $oppilas[2] .". Hienon kuuloinen nimi!<br>";
        }
    }
}

function arvoSukunimet(&$oppilaat) {
    foreach($oppilaat as $key => $oppilas) {
        $nimi = chr(rand(75,79));
        switch ($nimi) {
            case "K":
                $nimi .= "arjalainen";
                break;
            case "L":
                $nimi .= "aine";
                break;
            case "M":
                $nimi .= "anninen";
                break;
            case "N":
                $nimi .= "ieminen";
                break;
            case "O":
                $nimi .= "ikarinen";
                break;
            default:
                echo "Virhe!";
        }
        $oppilaat[$key][] = $nimi;
    }
}

function arvoEtunimet(&$oppilaat) {
    foreach($oppilaat as $key => $oppilas) {
        $nimi = chr(rand(65,69));
        switch ($nimi) {
            case "A":
                $nimi .= "nniina";
                break;
            case "B":
                $nimi .= "ettina";
                break;
            case "C":
                $nimi .= "ecilia";
                break;
            case "D":
                $nimi .= "onna";
                break;
            case "E":
                $nimi .= "velina";
                break;
            default:
                echo "Virhe!";
        }
        $oppilaat[$key][] = $nimi;
    }
}

function luoOppilaat() {
    $taulukko = array();
    for ($i = 0; $i < rand(1, 10); $i++) {
        $taulukko[] = array($i);
    }
    return $taulukko;
}