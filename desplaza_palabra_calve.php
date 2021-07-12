<?php
error_reporting(0);

function cifra_puro($texto,$palabra,$clave,$accion){
    $abc = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","ñ","o","p","q","r","s","t","u","v","w","x","y","z");

        $n_abc[0] = $palabra[0];
        $num = 1;
        
        for($j =0; $j < strlen($palabra);$j++){
            if($palabra[$j] != " "){
                $bool = false;
                for($k = 0; $k < $num;$k++){
                    if ($n_abc[$k]==$palabra[$j]){
                        $bool = true;
                    }
                }
                if($bool == false){
                 $n_abc[$num]=$palabra[$j];
                    $num = $num + 1;
                }
            }
        }

        for($j =0; $j < 27;$j++){
            $bool = false;
            for($k = 0; $k < $num;$k++){
                if ($n_abc[$k] == $abc[$j]){
                    $bool = true;
                }
            }
            if($bool == false){
                $n_abc[$num]=$abc[$j];
                $num = $num + 1;
            }
        }
    if ($accion == 1){
        for($i = 0; $i < strlen($texto) ;$i++){
          if($texto[$i] != " "){
             $esta = false;
                for($e = 0; $esta == false ; $e++){
                    if($texto[$i] == $abc[$e]){
                      $e = $e - $clave;

                        if($e > 26){
                            $e = $e - 27;
                        }else{
                            if($e < 0){
                          $e = $e + 27;
                            } 
                        }
                        $esta = true;
                        $texto[$i] = $n_abc[$e];
                    }
                }
            }    
        }
    }else{
        if($accion == 0){
            for($i = 0; $i < strlen($texto) ;$i++){
              if($texto[$i] != " "){
                 $esta = false;
                    for($e = 0; $esta == false ; $e++){
                        if($texto[$i] == $n_abc[$e]){
                          $e = $e - $clave;

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
        }
    }
    return $texto;
}

if ($_POST["texto"] != ""&&$_POST["cifrado"] != ""&& $_POST["desplazamiento"] != ""&& $_POST["palabra"] != ""  ) {

    $_POST["texto"] = strtolower($_POST["texto"]);
    echo "<br>";

    if ($_POST["cifrado"] == "cifrar") {
        echo ("<strong>"."TEXTO CIFRADO"."</strong>");
        echo "<br />";
        $accion = 1;
        $cifrado = cifra_puro($_POST["texto"],$_POST["palabra"],$_POST["desplazamiento"],$accion);
    }else{
        if ($_POST["cifrado"] == "descifrar") {
            echo ("<strong>"."TEXTO DESCIFRADO"."</strong>");
            echo "<br />";
            $accion = 0;
            $cifrado = cifra_puro($_POST["texto"],$_POST["palabra"],-$_POST["desplazamiento"],$accion);
        }
    }
    echo $cifrado."<br>"."<br>";
    echo ("<strong>"."Texto original"."</strong>")."<br>";
    echo $_POST["texto"]."<br>";
    
    print ('<br /><a href="desplaza_palabra.php">Volver</a> ');
}
?>