<div id='cssmenu'>
<ul>
   <li class='active'><a href='index.php'><span>Inicio</span></a></li>
   

<?php
if (isset($_SESSION['logeado'])) {
  ?>
<li class='has-sub'><a href='#'><span>Archivos</span></a>
      <ul>
      <li><a href='index.php?action=producto'><span>Productos</span></a></li>
         <li class='last'><a href='index.php?action=usuario'><span>Usuarios</span></a></li>
      </ul>
   </li>
   <li><a href='index.php?action=entrada'><span>Ingreso</span></a></li>
   <li><a href='index.php?action=salida'><span>Egreso</span></a></li>
   <li class='has-sub last'><a href='#'><span>Reportes</span></a>
      <ul>
         <li class='has-sub'><a href='#'><span>Ingresos</span></a>
            <ul>
               <li><a href='reportes/compras.semana.php'><span>Ultima Semana</span></a></li>
               <li class='last'><a href='reportes/compras.mes.php'><span>Ultimos 30 días</span></a></li>
            </ul>
         </li>
         <li class='has-sub'><a href='#'><span>Egresos</span></a>
            <ul>
               <li><a href='reportes/ventas.semana.php'><span>Ultima Semana</span></a></li>
               <li class='last'><a href='reportes/ventas.mes.php'><span>Ultimos 30 días</span></a></li>
            </ul>
         </li>
         <li class='has-sub'><a href='reportes/grafico.php'><span>Estadisticos</span></a>
            <ul>
               <li><a href='reportes/grafico.mes.php'><span>Ultimos 30 días</span></a></li>
               <li class='last'><a href='reportes/grafico.ano.php'><span>Ultimo Año</span></a></li>
            </ul>
         </li>
         <li ><a href='reportes/existencia.mes.php'><span>Existencia de productos</span></a>
           
         </li>
         
      </ul>
   </li>

  

<li class='last'><a href='index.php?action=salir'><span>Salir</span></a></li>
<?php  
}

?>

   
</ul>
</div>