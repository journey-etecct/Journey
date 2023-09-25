/**
 * Import function triggers from their respective submodules:
 *
 * const {onCall} = require("firebase-functions/v2/https");
 * const {onDocumentWritten} = require("firebase-functions/v2/firestore");
 *
 * See a full list of supported triggers at https://firebase.google.com/docs/functions
 */

const {onRequest} = require("firebase-functions/v2/https");
const logger = require("firebase-functions/logger");

// Create and deploy your first functions
// https://firebase.google.com/docs/functions/get-started

// exports.helloWorld = onRequest((request, response) => {
//   logger.info("Hello logs!", {structuredData: true});
//   response.send("Hello from Firebase!");
// });

const emailjs = require('emailjs-com');

emailjs.init('LSTFzKHBdyB9X8kSN');

exports.sendEmail = functions.https.onRequest(async (request, response) => {
  const { nome, email, mensagem } = request.body;

  try {
    const result = await emailjs.send('service_15ur3yc', 'template_877lf6q', {
      to: 'journeycompany2023@gmail.com',
      from_name: nome,
      message: mensagem,
    });

    console.log('E-mail enviado com sucesso:', result);

    response.status(200).send('E-mail enviado com sucesso');
  } catch (error) {
    console.error('Erro ao enviar e-mail:', error);
    response.status(500).send('Erro ao enviar e-mail');
  }
});
