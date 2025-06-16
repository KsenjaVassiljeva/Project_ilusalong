document.addEventListener("DOMContentLoaded", () => {
  document.querySelector("form").addEventListener("submit", () => {
    alert("Broneering saadetud!");
  });
});

document.addEventListener("DOMContentLoaded", () => {
  // Плавное появление формы
  const form = document.querySelector(".booking-form");
  setTimeout(() => {
    form.classList.add("show");
  }, 300);

  // Анимация при отправке
  form.addEventListener("submit", (e) => {
    e.preventDefault(); // Отключаем стандартную отправку

    // Добавим "shake" эффект
    form.classList.add("shake");

    setTimeout(() => {
      form.classList.remove("shake");
      alert("Broneering saadetud!");
      form.reset();
    }, 500);
  });
});