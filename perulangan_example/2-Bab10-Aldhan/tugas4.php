<?php 


function get_saldo($saldo_awal,$bulan)
{
    $i = 1;
    while($i <= $bulan){
        $bunga = ($saldo_awal < 1100000 ? 0.03 : 0.04);
        $saldo_bunga = $saldo_awal * $bunga;
        $admin = 9000;
        $saldo_akhir = $saldo_awal + $saldo_bunga - $admin;

        print_saldo($saldo_awal,$bunga,$saldo_bunga,$admin,$saldo_akhir,$i);

        $saldo_awal = $saldo_akhir;
        $i++;
    }
}

function print_saldo($saldo_awal,$bunga,$saldo_bunga,$admin,$saldo_akhir,$bulan)
{
    echo "pada bulan ke $bulan <br>";
    echo "saldo sebelum Rp. ".number_format($saldo_awal,0,",",".")."<br>";
    echo "bunga bulan ini ".($bunga*100)."% = Rp. ".number_format($saldo_bunga,0,",",".")."<br>";
    echo "biaya admin Rp. ".number_format($admin,0,",",".")."<br>";
    echo "saldo akhir Rp. ".number_format($saldo_akhir,0,",",".")."<br>";
    echo "<hr>";
}

$saldo_awal = 1000000;
get_saldo($saldo_awal,12);


?>