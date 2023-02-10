<?php
$tab1 = [(bool)rand(0,1), (bool)rand(0,1), (bool)rand(0,1), (bool)rand(0,1),
        (bool)rand(0,1), (bool)rand(0,1), (bool)rand(0,1), (bool)rand(0,1),
        (bool)rand(0,1), (bool)rand(0,1)];

// var_dump($tab1);

$tab = [];
foreach($tab1 as $case) {
        array_push($tab, $case == 1? "o":"x");
}

function play($tab) {
        $tabChain = [];
        for($i = 0; $i < count($tab); ++$i) {
                switch($i) {
                        case 0:
                                array_push($tabChain,($tab[count($tab)-1] == "o" && $tab[$i+1] == "x") || ($tab[count($tab)-1] == "x" && $tab[$i+1] == "o")? "o": "x");
                        break;
                        case count($tab)-1:
                                array_push($tabChain,($tab[$i-1] == "o" && $tab[0] == "x") || ($tab[$i-1] == "x" && $tab[0] == "o")? "o":"x");
                        break;
                        default:
                                array_push($tabChain,($tab[$i-1] == "o" && $tab[$i+1] == "x") || ($tab[$i-1] == "x" && $tab[$i+1] == "o")? "o":"x");
                        break;
                }
        }
        return $tabChain;
}

function toString($tab) {
        $chain = "";
        foreach($tab as $cell) {
                $chain .= $cell;
        }
        $chain .= "</br>";
        return $chain;
}

echo toString($tab);

$x = 0;
$cell = play($tab);
while($x < 5) {
  echo toString($cell);
   $cell = play($cell);
   ++$x;      
}

?>