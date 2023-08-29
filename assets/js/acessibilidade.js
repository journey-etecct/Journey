// Alto Constraste

const toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');
const currentTheme = localStorage.getItem('theme');

if (currentTheme) {
  document.documentElement.setAttribute('data-theme', currentTheme);

  if (currentTheme === 'contrast') {
    toggleSwitch.checked = true;
  }
}

function switchTheme(e) {
  if (e.target.checked) {
    document.documentElement.setAttribute('data-theme', 'contrast');
    localStorage.setItem('theme', 'contrast');
  }
  else {
    document.documentElement.setAttribute('data-theme', 'dark');
    localStorage.setItem('theme', 'dark');
  }
}

toggleSwitch.addEventListener('change', switchTheme, false);


// Tamanho das Fontes

function changeFontSize(value) {
  const elementsToAdjustFontSize = document.querySelectorAll('[data-adjust-font-size]');
  elementsToAdjustFontSize.forEach((element) => {
    const currentFontSize = parseFloat(window.getComputedStyle(element).fontSize);
    const newFontSize = currentFontSize + value;

    const minFontSize = 10;
    const maxFontSize = 22;

    if (newFontSize >= minFontSize && newFontSize <= maxFontSize) {
      element.style.fontSize = `${newFontSize}px`;
      element.style.lineHeight = `${newFontSize + 8}px`;
    }
  });

  localStorage.setItem('fontSize', elementsToAdjustFontSize[0].style.fontSize);
}

const increaseButton = document.getElementById('increase-font');
increaseButton.addEventListener('click', () => changeFontSize(2));

const decreaseButton = document.getElementById('decrease-font');
decreaseButton.addEventListener('click', () => changeFontSize(-2));

const storedFontSize = localStorage.getItem('fontSize');
if (storedFontSize) {
  const elementsToAdjustFontSize = document.querySelectorAll('[data-adjust-font-size]');
  elementsToAdjustFontSize.forEach((element) => {
    element.style.fontSize = storedFontSize;
    element.style.lineHeight = `${parseFloat(storedFontSize) + 8}px`;
  });
}
