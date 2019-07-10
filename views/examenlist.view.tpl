<section>
  <header>
    <h1>SEXUAL TOYS</h1>
  </header>
  <main>
    <table class="full-width">
      <thead>
        <tr>
          <th>Cod</th>
          <th>Juguete</th>
          <th>Precio</th>
          <th>Estado</th>
          <th class="right">
            <form action="index.php?page=examenform" method="post">
            <input type="hidden" name="idjuguetes" value="" />
            <input type="hidden" name="xcfrt" value="{{~xcfrt}}" />
            <button type="submit" name="btnIns">Agregar</button>
          </form>
          </th>
        </tr>
      </thead>
      <tbody class="zebra">
        {{foreach juguetes}}
        <tr>
          <td>{{idjuguetes}}</td>
          <td>{{nomjuguete}}</td>
          <td>{{preciojuguete}}</td>
          <td>{{estadojuguete}}</td>
          <td class="right">
            <form action="index.php?page=examenform" method="post">
              <input type="hidden" name="idjuguetes" value="{{idjuguetes}}"/>
              <input type="hidden" name="xcfrt" value="{{~xcfrt}}" />
              <button type="submit" name="btnDsp">Ver</button>
              <button type="submit" name="btnUpd">Editar</button>
              <button type="submit" name="btnDel">Eliminar</button>
            </form>
          </td>
        </tr>
        {{endfor juguetes}}
      </tbody>
      <tfoot>
        <tr>
          <td colspan="6"> Paginación</td>
        </tr>
      </tfoot>
    </table>
  </main>
</section>
