  // шукаю html елемент
const form = document.querySelector('body');
const themeSelector = document.querySelector('.theme');

themeSelector.addEventListener('change', (ev) => {
  // Отримуємо значення обраної опції
  const selectedValue = ev.target.value;
  // Видаляємо попередні класи, якщо вони відповідають значенням опцій
  form.classList.remove('themeGold', 'themePink', 'themeDrops');

  // Додаємо клас, відповідний обраному значенню
  form.classList.add(selectedValue);
});
