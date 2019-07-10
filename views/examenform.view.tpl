<h1>{{modeDsc}}</h1>
<section class="row">
<form action="index.php?page=examenform" method="post" class="col-8 col-offset-2">
  {{if hasErrors}}
    <section class="row">
      <ul class="error">
        {{foreach errores}}
          <li>{{this}}</li>
        {{endfor errores}}
      </ul>
    </section>
  {{endif hasErrors}}
  <input type="hidden" name="mode" value="{{mode}}"/>
  <input type="hidden" name="xcfrt" value="{{xcfrt}}" />
  <input type="hidden" name="btnConfirmar" value="Confirmar" />
  {{if showIdJuguetes}}
  <fieldset class="row">
    <label class="col-5" for="idjuguetes">Código de Juguete</label>
    <input type="text" name="idjuguetes" id="idjuguetes" readonly value="{{idjuguetes}}" class="col-7" />
  </fieldset>
  {{endif showIdJuguetes}}
  <fieldset class="row">
    <label class="col-5" for="dscjuguete">Nombre</label>
    <input type="text" name="dscjuguete" id="dscjuguete" {{readonly}} value="{{nomjuguete}}" class="col-7" />
  </fieldset>
  <fieldset class="row">
    <label class="col-5" for="precjuguete">Precio de Venta</label>
    <input type="text" name="precjuguete" id="precjuguete" {{readonly}} value="{{preciojuguete}}" class="col-7" />
  </fieldset>

  <fieldset class="row">
    <label class="col-5" for="estjuguete">Estado</label>
    <select name="estjuguete" id="estjuguete" class="col-7" {{selectDisable}} {{readonly}} >
      {{foreach estadoJuguetes}}
        <option value="{{cod}}" {{selected}}>{{dsc}}</option>
      {{endfor estadoJuguetes}}
    </select>
  </fieldset>
  <fieldset class="row">
    <div class="right">
      {{if showBtnConfirmar}}
      <button type="button" id="btnConfirmar" >Confirmar</button>
      &nbsp;
      {{endif showBtnConfirmar}}
      <button type="button" id="btnCancelar">Cancelar</button>
    </div>
  </fieldset>
  <!--
   <td>{{idmoda}}</td>
    <td>{{dscmoda}}</td>
    <td>{{prcmoda}}</td>
    <td>{{ivamoda}}</td>
    <td>{{estmoda}}</td>
   -->
</form>
</section>
<script>
  $().ready(function(){
    $("#btnCancelar").click(function(e){
      e.preventDefault();
      e.stopPropagation();
      location.assign("index.php?page=examenlist");
    });
    $("#btnConfirmar").click(function(e){
      e.preventDefault();
      e.stopPropagation();
      /*Aqui deberia hacer validación de datos*/
      document.forms[0].submit();
    });
  });
</script>
