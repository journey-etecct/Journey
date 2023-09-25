const functions = require('firebase-functions');
const admin = require('firebase-admin');
const express = require('express');
const emailjs = require('emailjs-com');
const cors = require('cors')({ origin: true });

admin.initializeApp();
const db = admin.firestore();
const app = express();

app.use(cors);

app.post('/sendEmail', async (req, res) => {
  if (!req.body.nome || !req.body.email || !req.body.mensagem) {
    return res.status(400).send('Campos obrigatórios não preenchidos');
  }

  try {
    const emailService = emailjs;
    await emailService.send('service_15ur3yc', 'template_877lf6q', req.body, 'LSTFzKHBdyB9X8kSN');
    
    await db.collection('mensagens').add({
      nome: req.body.nome,
      email: req.body.email,
      mensagem: req.body.mensagem,
      timestamp: admin.firestore.FieldValue.serverTimestamp(),
    });

    res.status(200).send('E-mail enviado com sucesso');
  } catch (error) {
    console.error('Erro ao enviar e-mail:', error);
    res.status(500).send('Erro ao processar a solicitação');
  }
});

exports.api = functions.https.onRequest(app);
