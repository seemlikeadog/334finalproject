<?php
// Array with names
$a[] = "Amy age : XX  Phone: XXXXXXXXXX Gender: XXXX " ;
$a[] = "Bob age : XX  Phone: XXXXXXXXXX Gender: XXXx";
$a[] = "Cristy age : XX  Phone: XXXXXXXXXX Gender: XXXX";
$a[] = "Diana age : XX  Phone: XXXXXXXXXX Gender: XXXX";
$a[] = "Evan age : XX  Phone: XXXXXXXXXX Gender: XXXX";
$a[] = "Franco age : XX  Phone: XXXXXXXXXX Gender: XXXX";
$a[] = "Gunda age : XX  Phone: XXXXXXXXXX Gender: XXXX";
$a[] = "Hege age : XX  Phone: XXXXXXXXXX Gender: XXXX";
$a[] = "Icey age : XX  Phone: XXXXXXXXXX Gender: XXXX";
$a[] = "Jojo age : XX  Phone: XXXXXXXXXX Gender: XXXX";
$a[] = "Kate age : XX  Phone: XXXXXXXXXX Gender: XXXX";
$a[] = "Linda age : XX  Phone: XXXXXXXXXX Gender: XXXX";
$a[] = "Nico age : XX  Phone: XXXXXXXXXX Gender: XXXX";
$a[] = "Ocastine age : XX  Phone: XXXXXXXXXX Gender: XXXX";
$a[] = "Peter age : XX  Phone: XXXXXXXXXX Gender: XXXX";
$a[] = "Abby age : XX  Phone: XXXXXXXXXX Gender: XXXX";
$a[] = "Russel age : XX  Phone: XXXXXXXXXX Gender: XXXX";
$a[] = "Cindy age : XX  Phone: XXXXXXXXXX Gender: XXXX";
$a[] = "David age : XX  Phone: XXXXXXXXXX Gender: XXXX";
$a[] = "Eva age : XX  Phone: XXXXXXXXXX Gender: XXXX";
$a[] = "Sunnie age : XX  Phone: XXXXXXXXXX Gender: XXXX";
$a[] = "Tove age : XX  Phone: XXXXXXXXXX Gender: XXXX";
$a[] = "Violet age : XX  Phone: XXXXXXXXXX Gender: XXXX";
$a[] = "Liza age : XX  Phone: XXXXXXXXXX Gender: XXXX";
$a[] = "Elizabeth age : XX  Phone: XXXXXXXXXX Gender: XXXX";
$a[] = "Ellen age : XX  Phone: XXXXXXXXXX Gender: XXXX";
$a[] = "Wenche age : XX  Phone: XXXXXXXXXX Gender: XXXX";
$a[] = "Vicky age : XX  Phone: XXXXXXXXXX Gender: XXXX";

// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= ", $name";
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "no suggestion" : $hint;

?>