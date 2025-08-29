<?php  
header('Content-Type: application/json');

// Verificar que es una petición POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
    exit;
}

// Configuración de email
$admin_email = "c.labbe@lstechpartners.com";
$admin_name = "LS Tech Partners";

// Recibir y sanitizar datos del formulario
$name = isset($_POST['name']) ? strip_tags(trim($_POST['name'])) : '';
$email = isset($_POST['email']) ? filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL) : '';
$company = isset($_POST['company']) ? strip_tags(trim($_POST['company'])) : '';
$phone = isset($_POST['phone']) ? strip_tags(trim($_POST['phone'])) : '';
$subject = isset($_POST['subject']) ? strip_tags(trim($_POST['subject'])) : '';
$message = isset($_POST['message']) ? strip_tags(trim($_POST['message'])) : '';

// Validar campos requeridos
if (empty($name) || empty($email) || empty($subject) || empty($message)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Todos los campos obligatorios deben ser completados.']);
    exit;
}

// Validar email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Email inválido.']);
    exit;
}

// Preparar el contenido del email
$email_subject = "Nuevo mensaje desde LS Tech Partners: " . $subject;

$email_body = "
<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #2563eb; color: white; padding: 20px; text-align: center; }
        .content { background: #f8fafc; padding: 20px; }
        .info-row { margin: 10px 0; padding: 10px; background: white; border-left: 4px solid #2563eb; }
        .footer { text-align: center; padding: 20px; color: #666; font-size: 12px; }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <h2>Nuevo Mensaje de Contacto</h2>
            <p>LS Tech Partners</p>
        </div>
        
        <div class='content'>
            <div class='info-row'>
                <strong>Nombre:</strong> " . htmlspecialchars($name) . "
            </div>
            
            <div class='info-row'>
                <strong>Email:</strong> " . htmlspecialchars($email) . "
            </div>
            
            " . (!empty($company) ? "<div class='info-row'><strong>Empresa:</strong> " . htmlspecialchars($company) . "</div>" : "") . "
            
            " . (!empty($phone) ? "<div class='info-row'><strong>Teléfono:</strong> " . htmlspecialchars($phone) . "</div>" : "") . "
            
            <div class='info-row'>
                <strong>Asunto:</strong> " . htmlspecialchars($subject) . "
            </div>
            
            <div class='info-row'>
                <strong>Mensaje:</strong><br>
                " . nl2br(htmlspecialchars($message)) . "
            </div>
        </div>
        
        <div class='footer'>
            <p>Este mensaje fue enviado desde el formulario de contacto de LS Tech Partners</p>
            <p>Fecha: " . date('d/m/Y H:i:s') . "</p>
        </div>
    </div>
</body>
</html>
";

// Configurar headers del email
$headers = array(
    'MIME-Version: 1.0',
    'Content-type: text/html; charset=UTF-8',
    'From: ' . $admin_name . ' <' . $admin_email . '>',
    'Reply-To: ' . $name . ' <' . $email . '>',
    'X-Mailer: PHP/' . phpversion()
);

// Intentar enviar el email
try {
    $mail_sent = mail($admin_email, $email_subject, $email_body, implode("\r\n", $headers));
    
    if ($mail_sent) {
        // Email de confirmación al remitente
        $confirmation_subject = "Confirmación de mensaje recibido - LS Tech Partners";
        $confirmation_body = "
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset='UTF-8'>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .header { background: #2563eb; color: white; padding: 20px; text-align: center; }
                .content { padding: 20px; }
                .footer { text-align: center; padding: 20px; color: #666; font-size: 12px; }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h2>¡Gracias por contactarnos!</h2>
                    <p>LS Tech Partners</p>
                </div>
                
                <div class='content'>
                    <p>Hola " . htmlspecialchars($name) . ",</p>
                    
                    <p>Hemos recibido tu mensaje y nos pondremos en contacto contigo a la brevedad.</p>
                    
                    <p>Resumen de tu consulta:</p>
                    <ul>
                        <li><strong>Asunto:</strong> " . htmlspecialchars($subject) . "</li>
                        <li><strong>Email de contacto:</strong> " . htmlspecialchars($email) . "</li>
                        " . (!empty($phone) ? "<li><strong>Teléfono:</strong> " . htmlspecialchars($phone) . "</li>" : "") . "
                    </ul>
                    
                    <p>Si tienes alguna consulta urgente, puedes contactarnos directamente:</p>
                    <ul>
                        <li><strong>Teléfono:</strong> +56 9 4445 0035</li>
                        <li><strong>Email:</strong> c.labbe@lstechpartners.com</li>
                    </ul>
                    
                    <p>¡Gracias por confiar en LS Tech Partners!</p>
                </div>
                
                <div class='footer'>
                    <p>LS Tech Partners - Tu socio estratégico en soluciones tecnológicas</p>
                </div>
            </div>
        </body>
        </html>
        ";
        
        $confirmation_headers = array(
            'MIME-Version: 1.0',
            'Content-type: text/html; charset=UTF-8',
            'From: ' . $admin_name . ' <' . $admin_email . '>',
            'X-Mailer: PHP/' . phpversion()
        );
        
        // Enviar confirmación (opcional)
        mail($email, $confirmation_subject, $confirmation_body, implode("\r\n", $confirmation_headers));
        
        echo json_encode([
            'success' => true, 
            'message' => '¡Mensaje enviado exitosamente! Te contactaremos pronto.'
        ]);
    } else {
        throw new Exception('Error al enviar el email');
    }
    
} catch (Exception $e) {
    error_log("Error en formulario de contacto: " . $e->getMessage());
    http_response_code(500);
    echo json_encode([
        'success' => false, 
        'message' => 'Hubo un error al enviar el mensaje. Por favor intenta nuevamente o contáctanos directamente.'
    ]);
}
?>