<?php 


function get_saldo($saldo_awal,$bulan)
{
    $i = 1;
    while($i <= $bulan){
        $bunga = 0.12;
        $saldo_bunga = $saldo_awal * $bunga;
        $saldo_akhir = $saldo_awal + $saldo_bunga;

        print_saldo($saldo_awal,$bunga,$saldo_bunga,$saldo_akhir,$i);

        $saldo_awal = $saldo_akhir;
        $i++;
    }
}

function print_saldo($saldo_awal,$bunga,$saldo_bunga,$saldo_akhir,$bulan)
{
    echo "pada tahun ke $bulan <br>";
    echo "pokok ".($bulan-1)." Rp. ".number_format($saldo_awal,0,",",".")."<br>";
    echo "bunga tahun ini ".($bunga*100)."% = Rp. ".number_format($saldo_bunga,0,",",".")."<br>";
    echo "pokok $bulan Rp. ".number_format($saldo_akhir,0,",",".")."<br>";
    echo "<hr>";
}

$saldo_awal = 1000000;
get_saldo($saldo_awal,12);


?>