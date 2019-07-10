<<?php
  require_once "models/examendata.model.php";
  function run()
  {
      $estadoJuguetes = obtenerEstados();
      $selectedEst = 'PLN';
      $mode = "";
      $errores=array();
      $hasError = false;
      $modeDesc = array(
        "DSP" => "JUGUETE ",
        "INS" => "Creando Nuevo Juguete",
        "UPD" => "Actualizando Juguete ",
        "DEL" => "Eliminando Juguete "
      );
      $viewData = array();
      $viewData["showIdJuguetes"] = true;
      $viewData["showBtnConfirmar"] = true;
      $viewData["readonly"] = '';
      $viewData["selectDisable"] = '';

      if (isset($_POST["xcfrt"]) && isset($_SESSION["xcfrt"]) &&  $_SESSION["xcfrt"] !== $_POST["xcfrt"]) {
          redirectWithMessage(
              "Petición Solicitada no es Válida",
              "index.php?page=examenlist"
          );
          die();
      }
      $viewData["xcfrt"] = $_SESSION["xcfrt"];
      if (isset($_POST["btnDsp"])) {
          $mode = "DSP";
          $moda = obtenerJuguetePorId($_POST["idjuguetes"]);
          $viewData["showBtnConfirmar"] = false;
          $viewData["readonly"] = 'readonly';
          $viewData["selectDisable"] = 'disabled';
          mergeFullArrayTo($moda, $viewData);
          $viewData["modeDsc"] = $modeDesc[$mode] . $viewData["dscjuguete"];
      }
      if (isset($_POST["btnUpd"])) {
          $mode = "UPD";
          //Vamos A Cargar los datos
          $moda = obtenerJuguetePorId($_POST["idjuguetes"]);
          mergeFullArrayTo($moda, $viewData);
          $viewData["modeDsc"] = $modeDesc[$mode] . $viewData["dscjuguete"];
      }
      if (isset($_POST["btnDel"])) {
          $mode = "DEL";
          //Vamos A Cargar los datos
          $moda = obtenerJuguetePorId($_POST["idjuguetes"]);
          $viewData["readonly"] = 'readonly';
          $viewData["selectDisable"] = 'disabled';
          mergeFullArrayTo($moda, $viewData);
          $viewData["modeDsc"] = $modeDesc[$mode] . $viewData["dscjuguete"];
      }
      if (isset($_POST["btnIns"])) {
          $mode = "INS";
          //Vamos A Cargar los datos
          $viewData["modeDsc"] = $modeDesc[$mode];
           $viewData["showIdJuguetes"]  = false;
      }
      // if ($mode == "") {
      //     print_r($_POST);
      //     die();
      // }
      if (isset($_POST["btnConfirmar"])) {
          $mode = $_POST["mode"];
          $selectedEst = $_POST["estjuguete"];
           mergeFullArrayTo($_POST, $viewData);
          switch($mode)
          {
          case 'INS':
              $viewData["showIdJuguetes"] = false;
              $viewData["modeDsc"] = $modeDesc[$mode];
              //validaciones
              if (floatval($viewData["precjuguete"]) <= 0) {
                  $errores[] = "El precio de juguete no puede ser 0";
                  $hasError = true;
              }
              if (!$hasError && agregarNuevoJuguete(
                  $viewData["dscjuguete"],
                  $viewData["precjuguete"],
                  $viewData["estjuguete"]
              )
              ) {
                  redirectWithMessage(
                      "Juguete Guardada Exitosamente",
                      "index.php?page=examenlist"
                  );
                  die();
              }
              break;
          case 'UPD':
              $viewData["modeDsc"] = $modeDesc[$mode] . $viewData["dscjuguete"];
              if (modificarJuguete(
                  $viewData["dscjuguete"],
                  $viewData["precjuguete"],
                  $viewData["estjuguete"],
                  $viewData["idjuguetes"]
              )
              ) {
                  redirectWithMessage(
                      "Juguete Actualizado Exitosamente",
                      "index.php?page=examenlist"
                  );
                  die();
              }
              break;
          case 'DEL':
              $viewData["modeDsc"] = $modeDesc[$mode] . $viewData["dscjuguete"];
              $viewData["readonly"] = 'readonly';
              $viewData["selectDisable"] = 'disabled';
              if (eliminarJuguete(
                  $viewData["idjuguetes"]
              )
              ) {
                  redirectWithMessage(
                      "Juguete Eliminado Exitosamente",
                      "index.php?page=examenlist"
                  );
                  die();
              }
              break;
          }
      }
      $viewData["mode"] = $mode;
      $viewData["estadoJuguetes"] = addSelectedCmbArray($estadoJuguetes, 'cod', $selectedEst);
      $viewData["hasErrors"] = $hasError;
      $viewData["errores"] = $errores;
      renderizar("examenform", $viewData);
  }
  run();
?>
