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

function obtenerEstados()
{
    return array(
        array("cod"=>"ACT", "dsc"=>"Activo"),
        array("cod"=>"INA", "dsc"=>"Inactivo"),
        array("cod"=>"PLN", "dsc"=>"En Planificación"),
        array("cod"=>"RET", "dsc"=>"Retirado"),
        array("cod"=>"SUS", "dsc"=>"Suspendido"),
        array("cod"=>"DES", "dsc"=>"Descontinuado")
    );
}


function obtenerjuguetePorId($id)
{
    $sqlstr = "select `juguetes`.`idjuguetes`,
        `juguetes`.`nombrejuguete`,
        `juguetes`.`precio`,
        `juguetes`.`estadojuguete`
    FROM `examen`.`juguetes` where idjuguetes=%d";

    $juguetes = array();
    $juguetes = obtenerUnRegistro(sprintf($sqlstr, $id));
    return $juguetes;
}


function agregarNuevojuguete($dscjuguete, $prcjuguete,$estadojuguetes) {
   $insSql = "INSERT INTO juguetes(nombrejuguete, precio,estadojuguete)
     values ('%s', %f, '%s');";
     if (ejecutarNonQuery(
         sprintf(
             $insSql,
             $dscjuguete,
             $prcjuguete,
             $estadojuguetes
         )))
     {
       return getLastInserId();
     } else {
         return false;
     }
}

function modificarjuguete($dscjuguete, $prcjuguete,$estadojuguetes,$idjuguetes)
{
   $updSQL = "UPDATE juguetes set nombrejuguete='%s', precio=%f,
   estadojuguete='%s' where idjuguetes=%d;";

   return ejecutarNonQuery(
       sprintf(
           $updSQL,
           $dscjuguete,
           $prcjuguete,
           $estadojuguetes,
           $idjuguetes
       )
   );
}
function eliminarjuguete($idjuguetes)
{
   $delSQL = "DELETE FROM juguetes where $idjuguetes=%d;";

   return ejecutarNonQuery(
       sprintf(
           $delSQL,
           $idjuguetes
       )
   );
}


?>
