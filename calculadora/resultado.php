<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p> El resultado es
    <?php
    if (isset($_GET['operacion'])) {
        if ($_GET['operacion'] == '+') {
            if (isset($_GET['op1'])) {
                $op1 = trim($_GET['op1']);
                if ((empty($op1)) || !is_numeric($op1)) {
                    echo "<h2> no es correcto 1</h2>";
                }
            }
            if (isset($_GET['op2'])) {
                $op2 = trim($_GET['op2']);
                if ((empty($op2)) || !is_numeric($op2)) {
                    echo "<h2> no es correcto 2</h2>";
                }
            } 
            if (isset($op1, $op2)) {
                $res = $op1 + $op2;
            }
        }
        if ($_GET['operacion'] == '-') {
            if (isset($_GET['op1'])) {
                $op1 = trim($_GET['op1']);
                if ((empty($op1)) || !is_numeric($op1)) {
                    echo "<h2> no es correcto 1</h2>";
                }
            }
            if (isset($_GET['op2'])) {
                $op2 = trim($_GET['op2']);
                if ((empty($op2)) || !is_numeric($op2)) {
                    echo "<h2> no es correcto 2</h2>";
                }
            } 
            if (isset($op1, $op2)) {
                $res = $op1 - $op2;
            }
        }
        if ($_GET['operacion'] == '*') {
            if (isset($_GET['op1'])) {
                $op1 = trim($_GET['op1']);
                if ((empty($op1)) || !is_numeric($op1)) {
                    echo "<h2> no es correcto 1</h2>";
                }
            }
            if (isset($_GET['op2'])) {
                $op2 = trim($_GET['op2']);
                if ((empty($op2)) || !is_numeric($op2)) {
                    echo "<h2> no es correcto 2</h2>";
                }
            } 
            if (isset($op1, $op2)) {
                $res = $op1 * $op2;
            }
        }
        if ($_GET['operacion'] == '/') {
            if (isset($_GET['op1'])) {
                $op1 = trim($_GET['op1']);
                if ((empty($op1)) || !is_numeric($op1)) {
                    echo "<h2> no es correcto 1</h2>";
                }
            }
            if (isset($_GET['op2'])) {
                $op2 = trim($_GET['op2']);
                if ((empty($op2)) || !is_numeric($op2)) {
                    echo "<h2> no es correcto 2</h2>";
                }
            } 
            if (isset($op1, $op2)) {
                $res = $op1 / $op2;
            }
        }
    }
    ?>
    <?=
    $res
    ?>
    <br>
    <a href="calculadora.html"><button>Volver</button></a>
    </p>
</body>
</html>