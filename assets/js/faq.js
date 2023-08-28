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

document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("contactForm");
  const modal = document.getElementById("successModal");
  const closeButton = modal.querySelector(".close");
  
  document.querySelector("#enviar").addEventListener('click', async (e) => {
    e.preventDefault();

    const nome = document.querySelector("#nome").value;
    const email = document.querySelector("#email").value;
    const mensagem = document.querySelector("#mensagem").value;

    const data = { nome, email, mensagem };

    try {
      const response = await fetch('/functions/send-email/', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
      });

      const responseData = await response.json();

      if (responseData.success) {
        modal.style.display = "block";
        alert('Dados enviados com sucesso!');
      } else {
        alert('Ocorreu um erro ao enviar os dados. Por favor, tente novamente.');
      }
    } catch (error) {
      console.error('Erro na chamada da função de servidor:', error);
    }
  });


  closeButton.addEventListener("click", function () {
    modal.style.display = "none";
  });

  function showAlert(message) {
    const alertDiv = document.createElement("div");
    alertDiv.className = "alert";
    alertDiv.textContent = message;
    form.insertBefore(alertDiv, form.firstChild);

    setTimeout(() => {
      alertDiv.remove();
    }, 5000);
  }
});









/*
let infos = {
  nome: '',
  email: '',
  sujeito: '',
  mensagem: ''
}


let nome = document.querySelector("#nome")
let email = document.querySelector("#email")
let mensagem = document.querySelector("#mensagem")
let enviar = document.querySelector("#enviar")
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

    await emailjs.send('service_15ur3yc', 'template_877lf6q', infos, 'LSTFzKHBdyB9X8kSN');
    
    successModal.style.display = "block";
  } catch (err) {
    console.log(err);
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
*/