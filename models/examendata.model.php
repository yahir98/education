<?php
require_once "libs/dao.php";

// Elaborar el algoritmo de los solicitado aquí.
/*
SELECT `juguetes`.`idjuguetes`,
    `juguetes`.`nomjuguete`,
    `juguetes`.`preciojuguete`,
    `juguetes`.`estadojuguete`
FROM `examen`.`juguetes`;
*/
/**
 * Obtiene los registro de la tabla de modas
 *
 * @return Array
 */
function obtenerListas()
{
    $sqlstr = "select `juguetes`.`idjuguetes`,
              `juguetes`.`nomjuguete`,
              `juguetes`.`preciojuguete`,
              `juguetes`.`estadojuguete`
          from `examen`.`juguetes`";

    $modas = array();
    $modas = obtenerRegistros($sqlstr);
    return $modas;
}

function obtenerJuguetePorId($id)
{
  $sqlstr="select `juguetes`.`idjuguetes`,
            `juguetes`.`nomjuguete`,
            `juguetes`.`preciojuguete`,
            `juguetes`.`estadojuguete`
        from `examen`.`juguetes` where idjuguetes=%d";
  $juguetes= array();
  $juguetes=obtenerUnRegistro(sprintf($sqlstr, $id));
  return $juguetes;
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

function agregarNuevoJuguete($dscjuguete, $prcjuguete, $estjuguete) {
    $insSql = "INSERT INTO juguetes(nomjuguete, preciojuguete, estadojuguete)
      values ('%s', %f, '%s');";
      if (ejecutarNonQuery(
          sprintf(
              $insSql,
              $dscjuguete,
              $prcjuguete,
              $estjuguetes
          )))
      {
        return getLastInserId();
      } else {
          return false;
      }
}

function modificarJuguete($dscjuguete, $prcjuguete, $estjuguete, $idjuguete)
{
    $updSQL = "UPDATE juguetes set nomjuguete='%s', preciojuguete=%f,
    estadojuguete='%s' where idjuguetes=%d;";

    return ejecutarNonQuery(
        sprintf(
            $updSQL,
            $dscjuguete,
            $prcjuguete,
            $estjuguete,
            $idjuguete
        )
    );
}
function eliminarJuguete($idjuguete)
{
    $delSQL = "DELETE FROM juguetes where idjuguetes=%d;";

    return ejecutarNonQuery(
        sprintf(
            $delSQL,
            $idjuguete
        )
    );
}
?>
