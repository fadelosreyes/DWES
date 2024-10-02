<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $str1 = trim($_GET['str1']);
    $str2 = trim($_GET['str2']);

    function comprobar_longitud($str1, $str2) { 
        $str1l = strlen($str1);
        $str2l = strlen($str2);
        if ($str1l != $str2l) { 
            echo "Las cadenas no miden lo mismo";
            return false;
        }
        return true;
    } 

    function comprobar_cadenas($str1, $str2) {
        if (comprobar_longitud($str1, $str2)) {
            $acc = 0; 
            for ($i=0; $i < strlen($str1); $i++) { 
                if($str1[$i] !== $str2[$i]) {
                    $acc++;
                }
            }
            if ($acc == 0) {
                echo "Las cadenas son iguales";
                return;
            }
            echo "La distancia hamming es ";
            return $acc;
        }
    }
    ?>
    <?=
    comprobar_cadenas($str1, $str2);
    ?>
</body>
</html>