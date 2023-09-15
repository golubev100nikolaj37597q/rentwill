const ps_1 = document.getElementById("ps-1").value;
const ps_3 = document.getElementById("ps-3").value;
const ps_7 = document.getElementById("ps-7").value;
const transfer_value = document.getElementById("transfer-value-1").innerText;
let selectedDateObjects = [];
function collectFormData() {
  const collectedData = {};

  collectedData.way = document.querySelector('select[name="way"]').value;
  collectedData.name = document.querySelector('input[name="name"]').value;
  collectedData.phone = document.querySelector('input[name="phone"]').value;
  collectedData.email = document.querySelector('input[name="email"]').value;
  collectedData.time = document.querySelector('input[name="time"]').value;
  collectedData.document_input = document.querySelector(
    'input[name="document_input"]'
  ).value;
  collectedData.comment = document.querySelector(
    'textarea[name="comment"]'
  ).value;
  collectedData.subject = document.querySelector(
    'select[name="subject"]'
  ).value;
  collectedData.transfer = document.querySelector(
    'input[name="transfer"]'
  ).checked;

  const radioElements = document.getElementsByName("radio");
  for (const radio of radioElements) {
    if (radio.checked) {
      collectedData.radio = radio.value;
      break;
    }
  }

  return collectedData;
}
var transferCheckbox = document.querySelector('input[name="transfer"]');
transferCheckbox.addEventListener('change', function () {
  calculateTotalCost(selectedDateObjects);
});

var subjectSelect = document.querySelector('select[name="subject"]');
subjectSelect.addEventListener('change', function () {
  calculateTotalCost(selectedDateObjects);
});

var fullCostInput = document.querySelector('#full_cost');
fullCostInput.addEventListener('change', function () {
  calculateTotalCost(selectedDateObjects);
});

var payFirstInput = document.querySelector('#pay_first_days');
payFirstInput.addEventListener('change', function () {
  calculateTotalCost(selectedDateObjects);
});

var payCheckInInput = document.querySelector('#pay_checkIN');
payCheckInInput.addEventListener('change', function () {
  calculateTotalCost(selectedDateObjects);
});
function parseDate(dateString) {
  const [month, day, year] = dateString.split(" ");
  const monthIndex = new Date(`${month} 1, ${year}`).getMonth();
  return new Date(year, monthIndex, parseInt(day));
}
function show_totalCost(cost) {
  const p_cost = document.getElementById("p-cost");
  if (cost === 0) {
    p_cost.innerText = `Выберите даты`;
  } else {
    p_cost.innerHTML = `К оплате <b>${cost} lei</b>`;
  }
}
function declensionByNumber(number, one, few, many) {
  const mod10 = number % 10;
  const mod100 = number % 100;

  if (mod10 === 1 && mod100 !== 11) {
    return one;
  } else if ([2, 3, 4].includes(mod10) && ![12, 13, 14].includes(mod100)) {
    return few;
  } else {
    return many;
  }
}
function show_selectedDate(selectedDateObjects, type = '') {
  if (type == 'confirm_pay') {
    var selectedDatesEl = document.getElementById("confirm_pay_date");
  }
  else {
    var selectedDatesEl = document.getElementById("data_selected");
  }
  var inputSelectedDate = document.getElementById('selectedDateInput');
  const minDate = new Date(Math.min(...selectedDateObjects));
  const maxDate = new Date(Math.max(...selectedDateObjects));
  const totalDates = selectedDateObjects.length;
  inputSelectedDate.value = minDate.toLocaleDateString() + ' - ' + maxDate.toLocaleDateString();
  if (totalDates != 0) {

    selectedDatesEl.innerHTML = `<span class="notranslate">
    ${minDate.toLocaleDateString()} - ${maxDate.toLocaleDateString()}</span>  (${totalDates + " " + declensionByNumber(totalDates, "день", "дня", "дней")
      })`;
  } else {
    selectedDatesEl.innerText = "Выберите дату";
  }
}
function get_priceDate() {
  const data_pick = document.getElementById('data-picker')
  const dataAtr = data_pick.getAttribute("data-price-dates")

  const inputJson = JSON.parse(dataAtr);
  const outputArray = [];

  for (const date in inputJson) {
    outputArray.push([date, parseInt(inputJson[date])]);
  }

  return outputArray;


}
function add_cost(cost) {
  totalCost += parseInt(cost);
  show_totalCost(totalCost);
  totalCost -= parseInt(cost);
}
function calculateTotalCost(selectedDateObjects) {
  console.log(selectedDateObjects)
  let data = get_priceDate();
  let data_forms = collectFormData();
  var totalCost = 0;

  if (selectedDateObjects != "none") {
    for (const dateObject of selectedDateObjects) {
      const formattedDate = dateObject.toLocaleDateString("en-US", {
        month: "long",
        day: "numeric",
        year: "numeric",
      });
      const dataEntry = data.find(
        (entry) => parseDate(entry[0]).getTime() === dateObject.getTime()
      );

      if (dataEntry) {
        totalCost += dataEntry[1];
      }

    }
  }
  console.log('dsfdf')
  totalCost += parseInt(data_forms.subject);

  totalCost += data_forms.transfer ? parseInt(transfer_value) : 0;

  if (data_forms.radio == "full_cost") {
    totalCost -= (totalCost * 5) / 100;
  } else if (data_forms.radio == "pay_checkIN") {
    totalCost += (totalCost * 5) / 100;
  }
  // Получаем параметры URL текущей страницы
  const urlSearchParams = new URLSearchParams(window.location.search);
  const id = urlSearchParams.get('id');
  if (selectedDateObjects.length >= 14) {
    $.ajax({
      url: '/php/get_discount.php',
      type: 'POST',
      data: {
        id: id,
      },
      success: function (data) {
        if (data) {
          var discount = parseFloat(data);
          console.log(discount)
          console.log(data)
          totalCost1 = totalCost - (totalCost * discount / 100);
          show_totalCost(parseInt(totalCost1));
          return totalCost1;
        }
        else {
          return totalCost;
        }
      },
      error: function (error) {

      }
    });
  }
  show_totalCost(parseInt(totalCost));
  return totalCost;
}
function get_closed_date() {
  const data_pick = document.getElementById('data-picker')
  const dataAtr = data_pick.getAttribute("data-closed-dates")

  const data = JSON.parse(dataAtr)
  return data;
}

function create_calendar() {
  const data = get_priceDate();
  const data1 = get_closed_date();
  const data1FromLocalStorage = localStorage.getItem('data1');
  const data2FromLocalStorage = localStorage.getItem('data2');

  const defaultDate = [];

  if (data1FromLocalStorage) {
    defaultDate.push(data1FromLocalStorage);
  }

  if (data2FromLocalStorage) {
    defaultDate.push(data2FromLocalStorage);
  }
  
  const myDatepicker = flatpickr(`.pr-input1`, {
    dateFormat: "Y-m-d",
    minDate: "today",
   defaultDate: defaultDate.length > 0 ? defaultDate : null,
    disable: data1,
    inline: true,
    mode: "range",
    prevArrow: '<i class="fa-solid fa-angle-left"></i>',
    nextArrow: '<i class="fa-solid fa-angle-right"></i>',

    onReady: function (selectedDates, dateStr, instance) {

    },

    onChange: function (selectedDates, dateStr) {
      const startDate = selectedDates[0];
      const endDate = selectedDates[selectedDates.length - 1];

      const selectedDateObjects1 = [];
      const currentDate = new Date(startDate);

      while (currentDate <= endDate) {
        const newDate = new Date(currentDate);
        newDate.setHours(0, 0, 0, 0);
        selectedDateObjects1.push(newDate);
        currentDate.setDate(currentDate.getDate() + 1);
      }
      selectedDateObjects = selectedDateObjects1;

      data.forEach((dateLabel) => {
        addAdditionalText(dateLabel);
      });

      show_selectedDate(selectedDateObjects);

      calculateTotalCost(selectedDateObjects);
      const flatpickrDays = document.querySelectorAll(".flatpickr-day");

      // Проход по каждому элементу и добавление стиля notranslate
      flatpickrDays.forEach(dayElement => {
        dayElement.classList.add("notranslate");
      });
    },
    onMonthChange: function (selectedDates, dateStr, instance) {
      selectedDateObjects = selectedDates.map((date) => new Date(date));

      data.forEach((dateLabel) => {
        addAdditionalText(dateLabel);
      });

      show_selectedDate(selectedDateObjects);

      calculateTotalCost(selectedDateObjects);
      const flatpickrDays = document.querySelectorAll(".flatpickr-day");

      // Проход по каждому элементу и добавление стиля notranslate
      flatpickrDays.forEach(dayElement => {
        dayElement.classList.add("notranslate");
      });
    }
  });

  async function addAdditionalText(dateLabel) {
    const amount = dateLabel[1];
    const elements = document.querySelectorAll(`[aria-label="${dateLabel[0]}"]`);

    if (elements.length > 0) {
      const dateElement = elements[0];

      // Проверяем, есть ли уже элемент с дополнительным текстом
      const existingAmountElement = dateElement.querySelector('.additional-amount');

      if (!existingAmountElement) {
        const amountElement = document.createElement("span");
        amountElement.textContent = amount;
        amountElement.style.fontSize = "10px";
        amountElement.classList.add('additional-amount'); // Добавляем класс для идентификации

        dateElement.appendChild(amountElement);
      }
    }
  }


  // // Вызов функции для каждого элемента массива
  data.forEach((dateLabel) => {
    addAdditionalText(dateLabel);
  });
}

window.onload = function () {
  console.log('dsfdf')
  create_calendar();
  if (localStorage.getItem('data1') && localStorage.getItem('data2')) {
    const startDate = new Date(localStorage.getItem('data1'));
    const endDate = new Date(localStorage.getItem('data2'));
    const currentDate = new Date(startDate);
    const selectedDateObjects1 = [];
    while (currentDate <= endDate) {
      const newDate = new Date(currentDate); // Создаем копию текущей даты
      newDate.setHours(0, 0, 0, 0); // Устанавливаем время на полночь
      selectedDateObjects1.push(newDate);
      currentDate.setDate(currentDate.getDate() + 1);
    }
    selectedDateObjects = selectedDateObjects1;
    show_selectedDate(selectedDateObjects);
    calculateTotalCost(selectedDateObjects);
  }
  const flatpickrDays = document.querySelectorAll(".flatpickr-day");

  // Проход по каждому элементу и добавление стиля notranslate
  flatpickrDays.forEach(dayElement => {
    dayElement.classList.add("notranslate");
  });
};

const data_main = document.getElementById("data-main");
const data_check = document.getElementById("data_check");
const data_pay = document.getElementById("data_pay");
const confirm_pay = document.getElementById("confirm_pay");
function next(param) {
  if (param == "check_data") {
    data_check.classList.add("d-none");
    data_pay.classList.remove("d-none");
  }
  if (param == "data-main") {
    const requiredFields = document.querySelectorAll("#data-main [required]");

    let isValid = true;

    requiredFields.forEach((field) => {
      if (field.value.trim() === "") {
        field.style.border = "1px solid red";
        isValid = false;
      } else {
        field.style.border = "1px solid #ced4da";
      }
    });
    var timeValue = requiredFields[3].value;

    var timeParts = timeValue.split(":");

    var hours = parseInt(timeParts[0], 10);
    var minutes = parseInt(timeParts[1], 10);


    if (hours >= 14 && hours <= 23 && minutes >= 0 && minutes <= 59) {

    } else {
      requiredFields[3].style.border = "1px solid red";
      isValid = false;
    }
    if (selectedDateObjects.length == 0) {
      isValid = false;
      let text_not_selected = document.getElementById('not_selected_date')
      text_not_selected.classList.remove('d-none');
    }
    if (!isValid) {
      return;
    } else {
      data_main.classList.add("d-none");
      data_check.classList.remove("d-none");
    }
    //Собери данные с форм и помести в переменные, используя collectFormData
    const data_forms = collectFormData();
    const wayValue = data_forms.way;
    const nameValue = data_forms.name;
    const phoneValue = data_forms.phone;
    const emailValue = data_forms.email;
    const timeValue1 = data_forms.time;
    const commentValue = data_forms.comment ? data_forms.comment : 'Нет';
    const subjectValue = data_forms.subject;

    var transferValue = data_forms.transfer;
    var psValue = '';
    if (subjectValue) {
      if (subjectValue == ps_1) {
        psValue = '1 день'
      }
      else if (subjectValue == ps_3) {
        psValue = '3 дня'
      }
      else {
        psValue = '7 Дней'
      }
    }
    else {
      psValue = 'Не требуется'
    };

    //Найди ошибки в коде ниже и исправь их
    document.getElementById('nameValue').innerHTML = nameValue;
    document.getElementById('numberValue').innerHTML = phoneValue;
    document.getElementById('emailValue').innerHTML = emailValue;
    document.getElementById('timeValue').innerHTML = timeValue1;
    document.getElementById('commentValue').innerHTML = commentValue;
    document.getElementById('transferValue').innerHTML = transferValue ? 'Нужно' : 'Не требуется';
    document.getElementById('wayValue').innerHTML = wayValue == 'standard' ? 'Обычное заселение' : 'Бесконтактное заселение';
    document.getElementById('checkPS').innerHTML = psValue;
  }
}

function back(param) {
  if (param == "check_data") {
    data_check.classList.add("d-none");
    data_main.classList.remove("d-none");
    confirm_pay.classList.add("d-none");
    document.getElementById('data_selected').classList.remove('d-none');
    document.getElementById('p-cost').classList.remove('d-none');
  }
  if (param == "data_pay") {
    data_pay.classList.add("d-none");
    data_check.classList.remove("d-none");
    confirm_pay.classList.add("d-none");
    document.getElementById('data_selected').classList.remove('d-none');
    document.getElementById('p-cost').classList.remove('d-none');
  }
  if (param == 'confirm_pay') {
    data_pay.classList.add("d-none");
    confirm_pay.classList.remove("d-none");
    document.getElementById('data_selected').classList.add('d-none');
    document.getElementById('p-cost').classList.add('d-none');
    show_selectedDate(selectedDateObjects, 'confirm_pay');
    localStorage.removeItem('data2');
    localStorage.removeItem('data1');
  }
}
function formatDateToYMD(date) {
  const year = date.getFullYear();
  const month = String(date.getMonth() + 1).padStart(2, "0");
  const day = String(date.getDate()).padStart(2, "0");
  return `${year}-${month}-${day}`;
}

var form = document.getElementById("main-form");
form.addEventListener("submit", function (e) {
  e.preventDefault();

  var formData = new FormData(form);
  var fileInputs = form.querySelectorAll('input[type="file"]');
  fileInputs.forEach(function (input) {
    var files = input.files;
    for (var i = 0; i < files.length; i++) {
      formData.append("images[]", files[i]);
    }
  });
  formData.append("document_input", form.elements.document_input.value);
  var wayValue = form.elements.way.value;
  var nameValue = form.elements.name.value;
  var phoneValue = form.elements.phone.value;
  var emailValue = form.elements.email.value;
  var timeValue = form.elements.time.value;

  var documentInputValue = form.elements.document_input.value;
  var commentValue = form.elements.comment.value;
  var subjectValue = form.elements.subject.value;
  var transferValue = form.elements.transfer.checked;
  var totalCost = calculateTotalCost(selectedDateObjects);
  var formattedDate = selectedDateObjects.map(formatDateToYMD);
  var radio = form.elements.radio.value;
  const urlParams = new URLSearchParams(window.location.search);
  const idValue = Number(urlParams.get('id'));
  formData.append("totalCost", totalCost);
  formData.append("selectedDates", JSON.stringify(formattedDate));
  formData.append("way", wayValue);
  formData.append("name", nameValue);
  formData.append("phone", phoneValue);
  formData.append("email", emailValue);
  formData.append("time", timeValue);
  formData.append("document_input", documentInputValue);
  formData.append("comment", commentValue);
  formData.append("subject", subjectValue);
  formData.append("transfer", transferValue);
  formData.append("total_cost", totalCost);
  formData.append("radio", radio);
  formData.append("id_flat", idValue);



  $.ajax({
    type: "POST",
    url: "/php/create_order.php",
    data: formData, // Отправляем объект formData напрямую
    processData: false, // Важно! Отключаем обработку данных перед отправкой, чтобы передать FormData объект
    contentType: false, // Важно! Отключаем установку Content-Type заголовка, чтобы браузер установил правильный тип данных

    success: function (data) {
      console.log(data)
      if (radio == 'pay_checkIN') {
        back('confirm_pay');
      }
      else {
        var nameAppartaments = document.getElementById("appartaments-name").innerText;
        localStorage.setItem('name_appartaments', nameAppartaments);
        localStorage.setItem('first_date', selectedDateObjects[0]);
        localStorage.setItem('last_date', selectedDateObjects[selectedDateObjects.length - 1]);
        window.location.href = data;
      }
    },
    error: function (xhr, textStatus, errorThrown) {
      console.error("Ошибка при выполнении AJAX-запроса:", errorThrown);
    },
  });

  var transferTaxi = document.getElementById("transfer_taxi");
  var typeZasel = document.getElementById("type_checkIN");
  var checkPS = document.getElementById("checkPS");
  var userData = document.getElementById("user_data");

  typeZasel.innerText =
    wayValue === "standard" ? "Обычное заселение" : "Бесконтактное заселение";
  transferTaxi.innerText = transferValue ? "Нужно" : "Не нужно";
  checkPS.innerText = subjectValue !== "0" ? "Нужно" : "Не нужно";
  userData.innerText = `${nameValue}, заселение в ${timeValue} `;
});










