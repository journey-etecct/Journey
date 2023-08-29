const functions = require('firebase-functions');
const admin = require('firebase-admin');
const sgMail = require('@sendgrid/mail');

admin.initializeApp();
sgMail.setApiKey(functions.config().sendgrid.key);

exports.enviarEmail = functions.https.onRequest((request, response) => {
    if (request.method !== 'POST') {
        return response.status(400).send('Método não permitido');
    }

    const nome = request.body.nome;
    const email = request.body.email;
    const mensagem = request.body.mensagem;

    const msg = {
        to: 'joaopinto9179@gmail.com',
        from: 'joaopinto9179@gmail.com',
        subject: 'Journey - Seção Contato',
        text: `Uma nova mensagem foi recebida da seção contato\n\nNome: ${nome}\nEmail: ${email}\nMensagem:\n${mensagem}`,
    };

    sgMail.send(msg)
        .then(() => {
            response.json({ success: true });
        })
        .catch(error => {
            console.error("SendGrid Error:", error);
            response.json({ success: false, error: "Ocorreu um erro ao enviar a mensagem. Por favor, tente novamente mais tarde." });
        });
});
