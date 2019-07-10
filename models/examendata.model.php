<?php
require_once "libs/dao.php";

/*
SELECT `juguetes`.`idjuguetes`,
    `juguetes`.`nombrejuguete`,
    `juguetes`.`precio`,
    `juguetes`.`estadojuguete`
FROM `examen`.`juguetes`;

*/


// Elaborar el algoritmo de los solicitado aquí.
/* @return Array
*/
function obtenerlista()
{
   $sqlstr = "select `juguetes`.`idjuguetes`,
       `juguetes`.`nombrejuguete`,
       `juguetes`.`precio`,
       `juguetes`.`estadojuguete`
   FROM `examen`.`juguetes`";


   $juguete = array();
   $juguete = obtenerRegistros($sqlstr);
   return $juguete;
}


?>
