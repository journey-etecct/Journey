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

// Contato e Modal

let infos = {
  nome: '',
  email: '',
  mensagem: ''
};

let nome = document.querySelector("#nome");
let email = document.querySelector("#email");
let mensagem = document.querySelector("#mensagem");
let enviar = document.querySelector("#enviar");
let successModal = document.getElementById("successModal");
let closeModal = document.querySelector(".close");

enviar.addEventListener('click', async (e) => {
  e.preventDefault();
  try {
    infos.nome = nome.value;
    infos.email = email.value;
    infos.mensagem = mensagem.value;

    if (!infos.nome || !infos.email || !infos.mensagem) {
      alert("Por favor, preencha todos os campos obrigatórios.");
      return;
    }

    const response = await axios.post("https://us-central1-journey-etecct.cloudfunctions.net/sendEmail", infos);

    const responseData = response.data;

    if (responseData === 'E-mail enviado com sucesso') {
      successModal.style.display = "block";
    } else {
      console.log("Erro ao enviar e-mail:", responseData);
    }
  } catch (err) {
    console.error("Erro ao enviar e-mail:", err);
  }
});

closeModal.addEventListener('click', () => {
  successModal.style.display = "none";
});

window.addEventListener('click', (event) => {
  if (event.target === successModal) {
    successModal.style.display = "none";
  }
});
