<?php
if(!empty($_SESSION['alerta'])&&$_SESSION['alerta']!=''){
echo '<div id="alerta" class="btn-danger">';
echo $_SESSION['alerta'];
echo "</div>";
$_SESSION['alerta']='';
}

?>