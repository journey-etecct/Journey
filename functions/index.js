const functions = require('firebase-functions');
const admin = require('firebase-admin');
const emailjs = require('emailjs-com');

const allowCors = fn => async (req, res) => {
  res.setHeader('Access-Control-Allow-Credentials', true)
  res.setHeader('Access-Control-Allow-Origin', '*')
  // another common pattern
  // res.setHeader('Access-Control-Allow-Origin', req.headers.origin);
  res.setHeader('Access-Control-Allow-Methods', 'POST')
  res.setHeader(
    'Access-Control-Allow-Headers',
    'X-CSRF-Token, X-Requested-With, Accept, Accept-Version, Content-Length, Content-MD5, Content-Type, Date, X-Api-Version'
  )
  if (req.method === 'POST') {

    admin.initializeApp();
const db = admin.firestore();

exports.sendEmail = functions.https.onRequest(async (req, res) => {
  if (req.method !== 'POST') {
    return res.status(405).send('Method Not Allowed');
  }

  const formData = req.body;

  if (!formData.nome || !formData.email || !formData.mensagem) {
    return res.status(400).send('Campos obrigatórios não preenchidos');
  }

  try {
    const emailService = emailjs;
    await emailService.send('service_15ur3yc', 'template_877lf6q', formData, 'LSTFzKHBdyB9X8kSN');
    
    await db.collection('mensagens').add({
      nome: formData.nome,
      email: formData.email,
      mensagem: formData.mensagem,
      timestamp: admin.firestore.FieldValue.serverTimestamp(),
    });

    res.status(200).send('E-mail enviado com sucesso');
  } catch (error) {
    console.error('Erro ao enviar e-mail:', error);
    res.status(500).send('Erro ao processar a solicitação');
  }
});


    res.status(200).end()
    return
  }
  return await fn(req, res)
}

const handler = (req, res) => {
  const d = new Date()
  res.end(d.toString())
}

module.exports = allowCors(handler)