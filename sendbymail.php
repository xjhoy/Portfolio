<?php
if(isset($_POST['email'])) {

// Debes editar las pr�ximas dos l�neas de c�digo de acuerdo con tus preferencias
    $email_to = "admin@xjportfolio.esy.es";
    $email_subject = "Contacto desde el sitio web";
    $email_from = "Contacto";
    $resultado = "hola";

// Aqu� se deber�an validar los datos ingresados por el usuario
    if(!isset($_POST['first_name']) ||
        !isset($_POST['mensaje'])) {
        $resultado = "<p>Error al enviar</p>";
        echo $resultado;
        die();

    }

    $email_message = "Detalles del formulario de contacto:\n\n";
    $email_message .= "Nombre: " . $_POST['first_name'] . "\n";
    $email_message .= "Telefono: " . $_POST['telefono'] . "\n";
    $email_message .= "E-mail: " . $_POST['email'] . "\n\n\n";

    $email_message .= "Mensaje: " . $_POST['mensaje'] . "\n\n";


// Ahora se env�a el e-mail usando la funci�n mail() de PHP
    $headers = 'From: '.$email_from."\r\n".
        'Reply-To: '.$email_from."\r\n" .
        'X-Mailer: PHP/' . phpversion();
    mail($email_to, $email_subject, $email_message, $headers);

    $resultado = "<p>Correo enviado</p>";

    echo $resultado;
}
?>