const faqItems = document.querySelectorAll('.w3l-faq li');

faqItems.forEach((item) => {
  const input = item.querySelector('input[type="checkbox"]');

  input.addEventListener('change', () => {
    if (input.checked) {
      faqItems.forEach((otherItem) => {
        if (otherItem !== item) {
          otherItem.classList.remove('active');
          const otherInput = otherItem.querySelector('input[type="checkbox"]');
          otherInput.checked = false;
        }
      });
      item.classList.add('active');
    } else {
      item.classList.remove('active');
    }
  });
});

let infos = {
  nome: '',
  email: '',
  sujeito: '',
  mensagem: ''
}

let nome = document.querySelector("#nome")
let email = document.querySelector("#email")
let sujeito = document.querySelector("#sujeito")
let mensagem = document.querySelector("#mensagem")
let enviar = document.querySelector("#enviar")


enviar.addEventListener('click', async (e) => {
  e.preventDefault()
  try {
    infos.nome = nome.value
    infos.email = email.value
    infos.sujeito = sujeito.value
    infos.mensagem = mensagem.value

    await emailjs.send('service_15ur3yc', 'template_877lf6q', infos, 'LSTFzKHBdyB9X8kSN');
    alert('Dados enviados com sucesso!')
  } catch (err) {
    console.log(err)
  }
})
