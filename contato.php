<?php
require './assets/lib/vendor/autoload.php';

use SendGrid\Mail\Mail;
use SendGrid\Mail\From;

$response = ["success" => false];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $mensagem = $_POST["mensagem"];

    $sendgridApiKey = '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';

    $emailObj = new Mail();
    $from = new From('joaopinto9179@gmail.com', 'Journey');
    $emailObj->setFrom($from);
    $emailObj->setSubject('Journey - Seção Contato');
    $emailObj->addTo('joaopinto9179@gmail.com', 'Journey');
    $emailObj->addContent("text/plain", "Uma nova mensagem foi recebida da seção contato\n\nNome: $nome\nEmail: $email\nMensagem:\n$mensagem");

    $sendgrid = new \SendGrid($sendgridApiKey);

    try {
        $sendgrid->send($emailObj);
        $response["success"] = true;
    } catch (Exception $e) {
        error_log("SendGrid Exception: " . $e->getMessage());
        $response["error"] = "Ocorreu um erro ao enviar a mensagem. Por favor, tente novamente mais tarde.";
    }
}
header("Content-Type: application/json");
echo json_encode($response);
?>