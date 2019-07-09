<?php

class conecxao {
    private static $conecxaoBanco;
    
    public static function conectar(){
        if (!isset(self::$conecxaoBanco)) {
            self::$conecxaoBanco = mysqli_connect("localhost", "root", "", "ita_estoque");

            mysqli_set_charset(self::$conecxaoBanco, "utf8");

            if(!self::$conecxaoBanco){
                echo "A conexão falhou " . mysqli_connect_error();
            }

            return self::$conecxaoBanco;
        }else{
            return self::$conecxaoBanco;
        }
    } 
    
    
}
