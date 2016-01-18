<?php

class Mailer {

    private $client = NULL;

    function __construct($client) {
        $this->client = $client;
        $this->client->setApplicationName('ProyectoEnviarCorreoDesdeGmail');
        $this->client->setClientId('943381952342-f8jp2i67821fjq2djkehkui772uv9gbc.apps.googleusercontent.com');
        $this->client->setClientSecret('2ucTi5wv9Yrf2hKuqnGrv7Pi');
        $this->client->setRedirectUri('https://dmsmanager-developdms.c9users.io/oauth/guardar.php');
        $this->client->setScopes('https://www.googleapis.com/auth/gmail.compose');
        $this->client->setAccessToken(file_get_contents('token.conf'));
    }
    
    function setToken($param) {
        $this->client->setAccessToken(file_get_contents($param));
    }

    function sendMail($origen, $alias, $destino, $asunto, $mensaje) {
        if ($this->client->getAccessToken()) {
            $service = new Google_Service_Gmail($this->client);
            try {
                $mail = new PHPMailer();
                $mail->CharSet = "UTF-8";
                $mail->From = $origen;
                $mail->FromName = $alias;
                $mail->AddAddress($destino);
                $mail->AddReplyTo($origen, $alias);
                $mail->Subject = $asunto;
                $mail->Body = $mensaje;
                $mail->preSend();
                $mime = $mail->getSentMIMEMessage();
                $mime = rtrim(strtr(base64_encode($mime), '+/', '-_'), '=');
                $mensaje = new Google_Service_Gmail_Message();
                $mensaje->setRaw($mime);
                $service->users_messages->send('me', $mensaje);
                return 1;
            } catch (Exception $e) {
                return 0;
            }
        } else {
            return -1;
        } 
    }

}
