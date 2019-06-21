<?php

class Calendario {

    public $dia;
    public $mes;
    public $ano;
    public $tstamp;
    public $dtmanip;
    public $dsprimdia;
    public $linhafechada;

    public function Calendario($pmes, $pano) {
        $this->linhafechada = true;
        $this->dia = 1;
        $this->mes = $pmes;
        $this->ano = $pano;
        $this->calcula_tstamp();
        $this->data_manipulavel();
        $this->primeiro_dia_mes();
    }

    public function calcula_tstamp() {
        $this->tstamp = mktime(0, 0, 0, $this->mes, $this->dia, $this->ano);
    }

    public function data_manipulavel() {
        $this->dtmanip = getdate($this->tstamp);
    }

    public function primeiro_dia_mes() {
        $this->dsprimdia = $this->dtmanip["wday"];
    }

    public function proximo_dia() {
        $this->dia++;
        $this->calcula_tstamp();
    }

    public function exibe_calendario() {
        $larg = 100.0 / 7.0;
        echo "<table border='1' width='100%' cellpadding='0' cellspacing='0' align='center' bordercolor='#333333'>\n";
        echo "<tr class='titulotabela'>\n";
        echo "<td align='center' width='" . $larg . "%'>Dom</td>\n";
        echo "<td align='center' width='" . $larg . "%'>Seg</td>\n";
        echo "<td align='center' width='" . $larg . "%'>Ter</td>\n";
        echo "<td align='center' width='" . $larg . "%'>Qua</td>\n";
        echo "<td align='center' width='" . $larg . "%'>Qui</td>\n";
        echo "<td align='center' width='" . $larg . "%'>Sex</td>\n";
        echo "<td align='center' width='" . $larg . "%'>Sab</td>\n";
        echo "</tr>\n";

        $ccol = 0;
        $casa = 0;
        while (checkdate($this->mes, $this->dia, $this->ano)) {
            if ($this->linhafechada) {
                echo "<tr>\n";
                $this->linhafechada = false;
            }
            if ($casa < $this->dsprimdia) {
                echo "<td> </td>\n";
            } else {
                echo "<td align='center'>\n";
                echo $this->dia . "\n";
                echo "</td>\n";
                $this->proximo_dia();
            }
            $ccol++;
            $ccol = $ccol % 7;
            $casa++;
            if (( $casa % 7 ) == 0) {
                echo "</tr>\n";
                $this->linhafecha = true;
            }
        }
        while ($ccol != 0) {
            $ccol++;
            $ccol = $ccol % 7;
            echo "<td> </td>\n";
        }
        echo "</tr>\n";

        echo "</table>\n";
    }

}

$mes = 6;
$ano = 2019;
$calend = new Calendario( $mes, $ano );
$calend->exibe_calendario()

?>