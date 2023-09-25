const functions = require('firebase-functions');
const express = require('express');
const cors = require('cors');
const axios = require('axios');
const emailjs = require('emailjs-com');

const app = express();

app.use(cors());

emailjs.init('LSTFzKHBdyB9X8kSN');

app.post('/sendEmail', async (req, res) => {
  try {
    const { nome, email, mensagem } = req.body;

    if (!nome || !email || !mensagem) {
      return res.status(400).json({ error: 'Por favor, preencha todos os campos obrigatórios.' });
    }

    const emailData = {
      service_id: 'service_15ur3yc',
      template_id: 'template_877lf6q',
      user_id: 'LSTFzKHBdyB9X8kSN',
      template_params: {
        to_email: 'journeycompany2023@gmail.com',
        from_name: nome,
        message: mensagem,
      },
    };

    const response = await axios.post('https://api.emailjs.com/api/v1.0/email/send', emailData);

    console.log('E-mail enviado com sucesso:', response);

    res.status(200).json({ message: 'E-mail enviado com sucesso' });
  } catch (error) {
    console.error('Erro ao enviar e-mail:', error);
    res.status(500).json({ error: 'Erro ao enviar e-mail' });
  }
});

exports.api = functions.https.onRequest(app);
