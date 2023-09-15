function create_calendar(id, data) {

  const myDatepicker = flatpickr(`#${id}`, {
    minDate: "today",
    "locale": "ru",
    dateFormat: "Y-m-d",
    disable: data,
    mode: "range",
    prevArrow: '<i class="fa-solid fa-angle-left"></i>',
    nextArrow: '<i class="fa-solid fa-angle-right"></i>',
    onReady: function (selectedDates, dateStr, instance) {
      const flatpickrDays = document.querySelectorAll(".flatpickr-day");

      // Проход по каждому элементу и добавление стиля notranslate
      flatpickrDays.forEach(dayElement => {
        dayElement.classList.add("notranslate");
      });
      const customContainer = document.createElement("div");
      customContainer.innerHTML = `
        <div class="employment">
          <div class="employment-status">
            <div class="employment-ind white"></div>
            <p>Свободно</p>
          </div>
          <div class="employment-status">
            <div class="employment-ind choosed"></div>
            <p>Выбрано</p>
          </div>
          <div class="employment-status">
            <div class="employment-ind busy"></div>
            <p>Занято</p>
          </div>
        </div>
      `;

      // Добавляем созданный контейнер в контейнер календаря
      instance.calendarContainer.appendChild(customContainer);
    },
    onMonthChange: function () {
      const flatpickrDays = document.querySelectorAll(".flatpickr-day");

      // Проход по каждому элементу и добавление стиля notranslate
      flatpickrDays.forEach(dayElement => {
        dayElement.classList.add("notranslate");
      });
    },
    onChange: function (selectedDates, dateStr, instance) {
      const dateArray = dateStr.split(' — '); // Обратите внимание на использование правильного символа "—"
      var parts = id.split("_");

      if (parts.length >= 2) {
        var idReal = parts[1];
      }
      adults = $('#adultsCounter' + idReal).text();
      child = $('#childCounter' + idReal).text();
      if (dateArray.length === 2) {
        localStorage.setItem('data1', dateArray[0]);
        localStorage.setItem('data2', dateArray[1]);
        localStorage.setItem('adults', adults);
        localStorage.setItem('child', child);
        window.location.href = "room.php?id=" + idReal;
      }
      else if (dateArray.length === 1) {
        localStorage.setItem('data1', dateArray[0]);
        localStorage.setItem('data2', dateArray[0]);
      }
      const flatpickrDays = document.querySelectorAll(".flatpickr-day");

      // Проход по каждому элементу и добавление стиля notranslate
      flatpickrDays.forEach(dayElement => {
        dayElement.classList.add("notranslate");
      });
    }
  });

  // Функция для добавления дополнительного текста к элементам массива
  //   function addAdditionalText(dateLabel) {
  //     let block = document.getElementById(id);
  //     const amount = "1200";
  //     const elements = block.querySelectorAll(
  //       `[aria-label="${dateLabel[0]}"]`
  //     );

  //     if (elements.length > 0) {
  //       const dateElement = elements[0];
  //       const amountElement = document.createElement("span");
  //       amountElement.textContent = amount;
  //       amountElement.style.fontSize = "10px";
  //       dateElement.appendChild(amountElement);
  //     }
  //   };

  // // Массив с датами
  // const dateLabels = data;

  // // Вызов функции для каждого элемента массива
  // dateLabels.forEach((dateLabel) => {
  //   addAdditionalText(dateLabel);
  // });
}

window.onload = function () {
  const prInputs = document.querySelectorAll(".pr-input");

  // Проходимся по каждому элементу и вызываем функцию с его id
  prInputs.forEach((input) => {

    const id = input.id;
    console.log(id);
    const dataAtr = input.getAttribute("data-closed-dates")

    const data = JSON.parse(dataAtr)


    create_calendar(id, data);
  });
  const flatpickrDays = document.querySelectorAll(".flatpickr-day");

  // Проход по каждому элементу и добавление стиля notranslate
  flatpickrDays.forEach(dayElement => {
    dayElement.classList.add("notranslate");
  });
};
