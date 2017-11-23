<?php
function getFilestate($file){
    $pro = stat($file);
    print_r(array_slice($pro,13));

}

getFilestate('sam.php');