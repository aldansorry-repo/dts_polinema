<?php 

function tambah($nilai1,$nilai2)
{
    return $nilai1+$nilai2;
}

function kurang($nilai1,$nilai2)
{
    return $nilai1-$nilai2;
}

function kali($nilai1,$nilai2)
{
    return $nilai1*$nilai2;
}

function bagi($nilai1,$nilai2)
{
    return $nilai1/$nilai2;
}

echo "ini hasi dari function tambah ".tambah(6,10);
echo "<br>ini hasi dari function kurang ".kurang(6,10);
echo "<br>ini hasi dari function kali ".kali(6,10);
echo "<br>ini hasi dari function bagi ".bagi(6,10);


?>