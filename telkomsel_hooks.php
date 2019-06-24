<?php
include "telkomsel_functions.php";
echo "Ambil Nomor Secara Otomatis\n";
$msisdn = GetMsisdn();
echo "MSISDN \t\t\t\t : ".$msisdn."\n";
sleep(4);
Echo "\n\nTrying Get Your Token \n";
$token = json_decode(AutoToken($msisdn),true);
$tokens = $token['idToken'];
echo "Your Token : $tokens\n";
echo "\nMemulai PATCHING NEW TOKEN untuk Hooks\n";
$NEWTOKEN = GetPatchToken($msisdn,$tokens);
echo "Result $NEWTOKEN";
echo "\nMemulai HOOKS PULL API untuk Hooks\n";
$Hooks = GenerateHooks($msisdn,$NEWTOKEN);
echo "ID HOOKS :\t $Hooks\n";
echo "Silahkan Login dengan AKUN dan masukkan HOOKS ID pada menu PULL API REQUEST";
//AutoToken(GetMsisdn())
