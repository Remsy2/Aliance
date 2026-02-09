const navbar = document.querySelector(".navbar");
const logo = document.querySelector(".logo-svg use");
const mMenuToggle = document.querySelector(".mobile-menu-toggle");
const menu = document.querySelector(".mobile-menu");
const isFront = document.body.classList.contains("front-page");

const lightModeOn = (event) => {
  navbar.classList.add("navbar-light");
};

const lightModeOff = (event) => {
  navbar.classList.remove("navbar-light");
};

const changeNavHeight = (height) => {
  navbar.style.height = height;
};

const openMenu = (event) => {
  //функция открывания меню
  menu.classList.add("is-open"); //добавляем класс is-open
  mMenuToggle.classList.add("close-menu"); //меняем иконку на крестик
  document.body.classList.add("menu-open"); //добавляем класс menu-open
  document.body.style.overflow = "hidden"; //блокируем прокрутку страницы
  lightModeOn();
};

const closeMenu = (event) => {
  //функция закрывания меню
  menu.classList.remove("is-open"); //удаляем класс is-open
  document.body.classList.remove("menu-open"); //удаляем класс menu-open
  mMenuToggle.classList.remove("close-menu"); //меняем иконку на гамбургер
  document.body.style.overflow = "auto"; //разблокируем прокрутку страницы
  lightModeOff();
};

window.addEventListener("scroll", () => {
  this.scrollY > 1 ? changeNavHeight("4.5rem") : changeNavHeight("5.875rem");
  if (isFront) {
    this.scrollY > 1 ? lightModeOn() : lightModeOff();
  }
});

mMenuToggle.addEventListener("click", (event) => {
  event.preventDefault();
  menu.classList.contains("is-open") ? closeMenu() : openMenu();
});

const swiperSteps = new Swiper(".features-slider", {
  speed: 400,
  slidesPerView: 1,
  navigation: {
    nextEl: ".slider-button-next",
    prevEl: ".slider-button-prev",
  },
  breakpoints: {
    576: {
      slidesPerView: 2,
    },
    768: {
      slidesPerView: 3,
    },
    1024: {
      slidesPerView: 4,
    },
  },
});

const swiper = new Swiper(".steps-slider", {
  speed: 400,
  slidesPerView: 1,
  navigation: {
    nextEl: ".steps-button-next",
    prevEl: ".steps-button-prev",
  },

  breakpoints: {
    576: {
      slidesPerView: 2,
    },
    768: {
      slidesPerView: 3,
    },
    1024: {
      slidesPerView: 4,
    },
    1200: {
      slidesPerView: 5,
    },
  },
});

const blogSwiper = new Swiper(".blog-slider", {
  speed: 400,
  slidesPerView: 2,
  spaceBetween: 30,
  navigation: {
    nextEl: ".blog-button-next",
    prevEl: ".blog-button-prev",
  },
});

let currentModal; //текущее модальное окно
let modalDialog; //окно диалога внутри модального окна
let alertModal = document.querySelector("#alert-modal"); //окно с предупреждением

const modalButtons = document.querySelectorAll("[data-toggle=modal]"); // переключатели модальных окон
modalButtons.forEach((button) => {
  /* клик по переключателю */
  button.addEventListener("click", (event) => {
    event.preventDefault(); /* определяем текущее открытое окно */
    currentModal = document.querySelector(
      button.dataset.target,
    ); /* открываем текущее окно */
    currentModal.classList.toggle("is-open"); /* назначаем диалоговое окно */
    modalDialog =
      currentModal.querySelector(
        ".modal-dialog",
      ); /* отслеживаем клик по окну и пустым областям */
    currentModal.addEventListener("click", (event) => {
      /* если клик в пустую область (не диалог) */
      if (!event.composedPath().includes(modalDialog)) {
        /* закрываем окно */
        currentModal.classList.remove("is-open");
      }
    });
  });
});

/* ловим событие нажатием кнопки  */
document.addEventListener("keyup", (event) => {
  if (event.key == "Escape" && currentModal.classList.contains("is-open")) {
    /* закрываем окно */
    currentModal.classList.toggle("is-open");
  }
});

// document.addEventListener("click", (event) => {
//   if (
//     event.target.dataset.toggle == "modal" ||
//     event.target.parentNode.dataset.toggle == "modal" ||
//     (!event.composedPath().includes(modalDialog) &&
//       modal.classList.contains("is-open"))
//   ) {
//     event.preventDefault();
//     modal.classList.toggle("is-open");
//   }
// });

const forms = document.querySelectorAll("form");
forms.forEach((form) => {
  const validation = new JustValidate(form, {
    errorFieldCssClass: "is-invalid",
  });
  validation

    .addField("[name=username]", [
      {
        rule: "required",
        errorMessage: "Укажите имя",
      },

      {
        rule: "maxLength",
        value: 50,
        errorMessage: "Имя не должно превышать 30 символов",
      },
    ])

    .addField("[name=userphone]", [
      {
        rule: "required",
        errorMessage: "Укажите телефон",
      },
    ])
    .onSuccess((event) => {
      const thisForm = event.target;
      const formData = new FormData(thisForm);
      const ajaxSend = (formData) => {
        fetch(thisForm.getAttribute("action"), {
          method: thisForm.getAttribute("method"),
          body: formData,
        })
          .then((response) => {
            if (response.ok) {
              modal.classList.toggle("is-open");
              thisForm.reset();
              currentModal.classList.remove("is-open");
              alertModal.classList.add("is-open");
              currentModal = alertModal;
              modalDialog =
                currentModal.querySelector(
                  ".modal-dialog",
                ); /* отслеживаем клик по окну и пустым областям */
              currentModal.addEventListener("click", (event) => {
                /* если клик в пустую область (не диалог) */
                if (!event.composedPath().includes(modalDialog)) {
                  /* закрываем окно */
                  currentModal.classList.remove("is-open");
                }
              });
            } else {
              alert("Ошибка отправки формы");
            }
          })
          .catch((error) => {
            console.error("Error:", error);
          });
      };
      ajaxSend(formData);
    });
});

(() => {
  const SELECTOR = ".phone-mask";

  const getDigits = (value) => (value || "").replace(/\D/g, "");

  const normalizeRuDigits = (digits) => {
    if (!digits) return "";
    if (digits[0] === "8") digits = "7" + digits.slice(1);
    if (digits[0] === "9") digits = "7" + digits; // 9xxxxxxxxx -> 79xxx...
    if (digits[0] !== "7") digits = "7" + digits;
    return digits.slice(0, 11);
  };

  const formatRuPhone = (digits11) => {
    if (!digits11) return "";

    const d = digits11;
    let out = "+7";
    if (d.length === 1) return out;

    out += " (";
    out += d.substring(1, Math.min(4, d.length));
    if (d.length >= 4) out += ") ";
    if (d.length <= 4) return out;

    out += d.substring(4, Math.min(7, d.length));
    if (d.length >= 7) out += "-";
    if (d.length <= 7) return out;

    out += d.substring(7, Math.min(9, d.length));
    if (d.length >= 9) out += "-";
    if (d.length <= 9) return out;

    out += d.substring(9, Math.min(11, d.length));
    return out;
  };

  // --- Caret helpers ---
  // Сколько цифр было введено ДО позиции каретки?
  const digitsCountBeforeCaret = (str, caretPos) => {
    let count = 0;
    for (let i = 0; i < Math.min(caretPos, str.length); i++) {
      if (/\d/.test(str[i])) count++;
    }
    return count;
  };

  // Найти позицию каретки в новом отформатированном значении,
  // чтобы она стояла после N-й цифры
  const caretPosAfterNDigits = (formatted, nDigits) => {
    if (nDigits <= 0) return 0;
    let count = 0;
    for (let i = 0; i < formatted.length; i++) {
      if (/\d/.test(formatted[i])) count++;
      if (count >= nDigits) return i + 1;
    }
    return formatted.length;
  };

  const safeSetCaret = (input, pos) => {
    try {
      input.setSelectionRange(pos, pos);
    } catch (_) {}
  };

  // --- Validation UI ---
  const getErrorBox = (input) => {
    // ищем рядом .phone-error (в том же родителе)
    const parent = input.parentElement;
    if (!parent) return null;
    const box = parent.querySelector(".phone-error");
    return box || null;
  };

  const setInvalid = (input, message) => {
    input.classList.add("is-invalid");
    input.setAttribute("aria-invalid", "true");
    input.dataset.error = message;

    const box = getErrorBox(input);
    if (box) {
      box.textContent = message;
      box.classList.add("show");
    }
  };

  const clearInvalid = (input) => {
    input.classList.remove("is-invalid");
    input.removeAttribute("aria-invalid");
    delete input.dataset.error;

    const box = getErrorBox(input);
    if (box) {
      box.textContent = "";
      box.classList.remove("show");
    }
  };

  const validate = (input) => {
    const digits = normalizeRuDigits(getDigits(input.value));
    if (!input.value) {
      clearInvalid(input);
      return true;
    }
    if (digits.length !== 11) {
      setInvalid(input, "Введите номер полностью: 11 цифр");
      return false;
    }
    clearInvalid(input);
    return true;
  };

  // --- Main handlers ---
  const handleFormat = (input) => {
    const oldValue = input.value;
    const oldCaret = input.selectionStart ?? oldValue.length;

    // сколько цифр было до каретки в "старом" значении
    const digitsBefore = digitsCountBeforeCaret(oldValue, oldCaret);

    const rawDigits = getDigits(oldValue);
    const digits = normalizeRuDigits(rawDigits);

    const newValue = formatRuPhone(digits);
    input.value = newValue;

    // ставим каретку после такого же количества цифр
    const newCaret = caretPosAfterNDigits(newValue, digitsBefore);
    safeSetCaret(input, newCaret);
  };

  const onInput = (e) => {
    const input = e.target;
    if (!input.matches(SELECTOR)) return;
    handleFormat(input);
    validate(input);
  };

  const onKeyDown = (e) => {
    const input = e.target;
    if (!input.matches(SELECTOR)) return;

    // Если Backspace на самом начале — не даём ломать "+7"
    if (e.key === "Backspace") {
      const pos = input.selectionStart ?? 0;
      // позиция до "+7" (0..2) или до " (" (0..4) — просто очищаем
      const digits = normalizeRuDigits(getDigits(input.value));
      if (digits.length <= 1) {
        input.value = "";
        clearInvalid(input);
        e.preventDefault();
        return;
      }
      // Если курсор попал на символы "+7 (" — не даём удалять "скобки/пробелы" бесконечно
      // Удаление цифр всё равно сработает корректно через onInput
      if (pos <= 4) {
        // оставляем курсор на позиции 4 (после "+7 (")
        setTimeout(() => safeSetCaret(input, 4), 0);
      }
    }
  };

  const onPaste = (e) => {
    const input = e.target;
    if (!input.matches(SELECTOR)) return;
    // после вставки форматируем
    setTimeout(() => {
      handleFormat(input);
      validate(input);
    }, 0);
  };

  const onFocus = (e) => {
    const input = e.target;
    if (!input.matches(SELECTOR)) return;

    if (!input.value) {
      input.value = "+7 (";
      safeSetCaret(input, input.value.length);
    } else {
      // при фокусе просто провалидируем, без навязчивости
      validate(input);
    }
  };

  const onBlur = (e) => {
    const input = e.target;
    if (!input.matches(SELECTOR)) return;

    // если оставили "+7 (" — очищаем
    const digits = normalizeRuDigits(getDigits(input.value));
    if (digits.length <= 1) {
      input.value = "";
      clearInvalid(input);
      return;
    }

    // финальная валидация при уходе
    validate(input);
  };

  // чтобы можно было валидировать форму перед submit
  const onSubmit = (e) => {
    const form = e.target;
    if (!(form instanceof HTMLFormElement)) return;
    const inputs = form.querySelectorAll(SELECTOR);
    let ok = true;
    inputs.forEach((inp) => {
      if (!validate(inp)) ok = false;
    });
    if (!ok) e.preventDefault();
  };

  document.addEventListener("input", onInput);
  document.addEventListener("keydown", onKeyDown);
  document.addEventListener("paste", onPaste);
  document.addEventListener("focusin", onFocus);
  document.addEventListener("focusout", onBlur);
  document.addEventListener("submit", onSubmit);
})();
