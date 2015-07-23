
<form class="form-horizontal centrar-form" action="index.php" method="POST" role="form">
  <div class="form-group">
    <label for="usuario" class="col-sm-2 control-label">Usuario</label>
    <div class="col-sm-10">
      <input id="usuario"  class="form-control" name="username" type="text" required="required" placeholder="Introduzca Usuario" /><br>

    </div>
  </div>
  <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Contraseña</label>
    <div class="col-sm-10">
     <input type="password" class="form-control" id="password" name="password"placeholder="Introduzca Contraseña">
  </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox"> Recordar
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default" name="submit"><span>Login</span></button>
   <button type="reset" class="btn"><span>Cancelar</span></button>
    </div>
  </div>
</form>