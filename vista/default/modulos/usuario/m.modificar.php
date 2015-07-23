  <h3 style="text-align:center;">Usuario</h3>

  <form class="form-horizontal centrar-form" action="index.php?action=usuario" method="POST">
<div class="form-group">
    <label for="usuario" class="col-sm-2 control-label">Usuario</label>
    <div class="col-sm-10">
      <input id="username" disabled class="form-control" value="<?php echo $data['usuario']?>" name="username" type="text" required="required" />
    </div>
</div>

<div class="form-group">
    <label for="usuario" class="col-sm-2 control-label">Contraseña</label>
    <div class="col-sm-10">
    <input id="password" class="form-control" value="<?php echo $data['clave']?>" name="password" type="password" required="required" />
</div>
</div>

  

  	 <button type="submit" class="btn btn-default" name="modificar">
  	<span>Modificar</span>
  </button>

  	 <button type="submit" class="btn btn-default" name="eliminar">
  	 	<span>Eliminar</span>
  	 </button>
  	<button type="submit" class="btn btn-defaults">
      <span>Cancelar</span>
     </button>
</p>
<input id="id" name="id" type="hidden" value="<?php echo $data['id_usuario']?>"/>
</form>