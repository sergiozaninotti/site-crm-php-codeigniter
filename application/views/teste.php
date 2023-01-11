<?php

$credito = 50000;
$taxa = 19;
$fr = 3;
$taxa_total = $taxa + $fr;

$credito_taxa = $credito * $taxa_total /100 +($credito);

echo $credito_taxa;

?>