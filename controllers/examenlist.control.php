<?php

require_once "models/examendata.model.php";

/**
 * Controla la lista del Patron Trabajar Con
 *
 * @return void
 */
function run()
{
    $viewData = array();
    $viewData["xcfrt"] = md5(microtime());
    $_SESSION["xcfrt"] = $viewData["xcfrt"];
    $viewData["juguetes"] = obtenerListas();
    renderizar("examenlist", $viewData);
}
  run();
?>
