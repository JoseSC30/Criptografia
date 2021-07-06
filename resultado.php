<?php
error_reporting(0);

function cifra_puro($texto,$clave){
    for($i = 0; $i < strlen($texto) ;$i++){
        $abc = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","ñ","o","p","q","r","s","t","u","v","w","x","y","z");
        if($texto[$i] != " "){
            /*
            $texto[$i]=chr(ord($texto[$i])+$clave);
        
            if(ord($texto[$i]) > 122){
                $texto[$i] = chr(ord($texto[$i]) - 26);
            }else{
                if(ord($texto[$i]) < 97){
                    $texto[$i] = chr(ord($texto[$i]) + 26);
                } 
            }
            */
            $esta = false;
            for($e = 0; $esta == false ; $e++){
                if($texto[$i] == $abc[$e]){
                    $e = $e + $clave;

                    if($e > 26){
                        $e = $e - 27;
                    }else{
                        if($e < 0){
                        $e = $e + 27;
                        } 
                    }
                    $esta = true;
                    $texto[$i] = $abc[$e];
                }
            }
        }
        
    }
    return $texto;
}

if ($_POST["texto"] != ""&&$_POST["cifrado"] != ""&& $_POST["desplazamiento"] != "" ) {

    $_POST["texto"] = strtolower($_POST["texto"]);
    echo "<br>";

    if ($_POST["cifrado"] == "cifrar") {
        echo ("<strong>"."TEXTO CIFRADO"."</strong>");
        echo "<br />";
        $cifrado = cifra_puro($_POST["texto"],$_POST["desplazamiento"]);
    }else{
        if ($_POST["cifrado"] == "descifrar") {
            echo ("<strong>"."TEXTO DESCIFRADO"."</strong>");
            echo "<br />";
            $cifrado = cifra_puro($_POST["texto"],-$_POST["desplazamiento"]);
        }
    }

    echo $cifrado."<br>"."<br>";
    echo ("<strong>"."Texto original"."</strong>")."<br>";
    echo $_POST["texto"]."<br>";
    
    print ('<br /><a href="desplaza_puro.php">Volver</a> ');
}
?>
