<?php

$dict = $argv[1] ?? "wordle";
$pattern = $argv[2] ?? ".....";
$in = $argv[3] ?? null;
$out = $argv[4] ?? null;
$command = "cat {$dict}.txt | grep -E \"{$pattern}\"";

$inArray = array_filter(str_split($in));
foreach($inArray as $i) {
    $command .= " | grep $i ";
}

$outArray = array_filter(str_split($out));
foreach($outArray as $o) {
    $command .= " | grep -v $o ";
}


echo `$command`;
echo PHP_EOL . $command;
echo PHP_EOL . trim(`$command | wc -l`) . ' words' . PHP_EOL;