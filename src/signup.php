<?php
  include('../config/database.php');
  //Get data
  $f_name  = $_POST['fname'];
  $l_name  = $_POST['lname'];
  $e_mail  = $_POST['email'];
  $m_phone = $_POST['mphone'];
  $p_sswd  = $_POST['passwd'];
  $enc_pass = md5($p_sswd);
if ($res_local) {
    // --- PASO B: Si funcionó el anterior, guardar en la nube (Supabase) ---
    $res_supa = pg_query($supa_conn, $sql);

    if ($res_supa) {
        echo "¡Listo! Guardado en ambos lados.";
    } else {
        echo "Error: Se guardó en local pero no en la nube.";
    }
} else {
    echo "Error: No se pudo guardar ni en local.";
}
  //Query to insert into SQL.
$sql = "INSERT INTO users (firstname,lastname,email,mobile_phone,password) 
       VALUES('$f_name','$l_name','$e_mail','$m_phone','$enc_pass')";
  //Excecute query
  pg_query($sql);
  ?>