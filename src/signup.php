<?php
  include('../config/database.php');

  // Get data from the form
  $f_name  = $_POST['fname'];
  $l_name  = $_POST['lname'];
  $e_mail  = $_POST['email'];
  $m_phone = $_POST['mphone'];
  $p_sswd  = $_POST['passwd'];
  $passwd_confirm = $_POST['passwd_confirm'];

  // Validate if passwords match
  if ($p_sswd !== $passwd_confirm) {
    die('Las contraseñas no coinciden.');
  }

  // Hash the password securely using bcrypt
  $enc_pass = password_hash($p_sswd, PASSWORD_BCRYPT);

  // Start a transaction to ensure atomicity
  pg_query("BEGIN");

  try {
    // Check if the email already exists
    $email_check_query = "SELECT * FROM users WHERE email = '$e_mail'";
    $email_check_result = pg_query($email_check_query);

    if (pg_num_rows($email_check_result) > 0) {
        throw new Exception("El correo electrónico ya está registrado.");
    }

    // Check if the mobile phone already exists
    $phone_check_query = "SELECT * FROM users WHERE mobile_phone = '$m_phone'";
    $phone_check_result = pg_query($phone_check_query);

    if (pg_num_rows($phone_check_result) > 0) {
        throw new Exception("El número de teléfono móvil ya está registrado.");
    }

    // Insert new user into the database
    $sql = "INSERT INTO users (firstname, lastname, email, mobile_phone, password) 
            VALUES('$f_name', '$l_name', '$e_mail', '$m_phone', '$enc_pass')";
    
    // Execute the query
    pg_query($sql);

    // Commit the transaction
    pg_query("COMMIT");

    echo "Registro exitoso.";
  } catch (Exception $e) {
    // Rollback the transaction if there was an error
    pg_query("ROLLBACK");

    // Display error message
    echo "Error: " . $e->getMessage();
  }
?>