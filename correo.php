<?php
if (isset($_POST['email'])) {

  // 

  $email_to = "atreosistemas@gmail.com";

  $email_subject = "Contacto desde Web";

  function died($error)
  {

    // mensajes de error

    echo "Lo sentimos, hubo un error en sus datos y el formulario no puede ser enviado en este momento. ";

    echo "Detalle de los errores.<br /><br />";

    echo $error . "<br /><br />";

    echo "Porfavor corrija estos errores e inténtelo de nuevo.<br /><br />";
    die();
  }

  // Se valida que los campos del formulairo estén llenos

  if (
    !isset($_POST['name']) ||



    !isset($_POST['email']) ||

    !isset($_POST['telephone']) ||
    !isset($_POST['comments']) ||
    !isset($_POST['cate']) ||
    !isset($_POST['alcance'])
  ) {

    die('Lo sentimos pero parece haber un problema con los datos enviados. Debe llenar todos los campos');
  }
  //En esta parte el valor "name"  sirve para crear las variables que recolectaran la información de cada campo

  $first_name = $_POST['name']; // requerido


  $email_from = $_POST['email']; // requerido

  $telephone = $_POST['telephone']; // no requerido 
  $message = $_POST['comments'];
  $categoria = $_POST['cate'];
  $redsocial = $_POST['alcance']; // requerido

  $error_message = ""; //Linea numero 52;

  //En esta parte se verifica que la dirección de correo sea válida 

  $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

  if (!preg_match($email_exp, $email_from)) {

    $error_message .= 'La dirección de correo proporcionada no es válida.<br />';
  }

  //En esta parte se validan las cadenas de texto

  $string_exp = "/^[A-Za-z .'-]+$/";

  if (!preg_match($string_exp, $first_name)) {

    $error_message .= 'El formato del nombre no es válido<br />';
  }



  if (strlen($message) < 2) {

    $error_message .= 'Por favor escriba su mensaje.<br />';
  }

  if (strlen($error_message) > 0) {

    die($error_message);
  }

  //Este es el cuerpo del mensaje tal y como llegará al correo

  $email_message = "Contenido del Mensaje.\n\n";



  function clean_string($string)
  {

    $bad = array("content-type", "bcc:", "to:", "cc:", "href");

    return str_replace($bad, "", $string);
  }



  $email_message .= "Nombre: " . clean_string($first_name) . "\n";



  $email_message .= "Email: " . clean_string($email_from) . "\n";

  $email_message .= "Teléfono: " . clean_string($telephone) . "\n";
  $email_message .= "Categoria: " . clean_string($categoria) . "\n";
  $email_message .= "Red Sociald: " . clean_string($redsocial) . "\n";
  $email_message .= "Mensaje: " . clean_string($message) . "\n";


  //Se crean los encabezados del correo

  $headers = 'From: ' . $email_from . "\r\n" .

    'Reply-To: ' . $email_from . "\r\n" .

    'X-Mailer: PHP/' . phpversion();

  @mail($email_to, $email_subject, $email_message, $headers);

?>



  <!-- Mensaje de que fue enviado-->

  <script>
    alert("Gracias por Preferirnos.Su consulta fue enviada con exito. En breve nos comunicaremos con usted. ");
  </script>

<?php

}

?>
<meta http-equiv="refresh" content="0;URL=https://atreosis.com>