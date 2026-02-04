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
  document.body.style.overflow = "hidden"; //блокируем прокрутку страницы
  lightModeOn();
};

const closeMenu = (event) => {
  //функция закрывания меню
  menu.classList.remove("is-open"); //удаляем класс is-open
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
    event.preventDefault(); 
    
    /* определяем текущее открытое окно */
    currentModal = document.querySelector(button.dataset.target);
    
    if (!currentModal) return; // защита от отсутствия модального окна
    
    /* открываем текущее окно */
    currentModal.classList.toggle("is-open"); 
    
    /* назначаем диалоговое окно */
    modalDialog = currentModal.querySelector(".modal-dialog");
    
    if (!modalDialog) return; // защита от отсутствия диалога
    
    /* отслеживаем клик по окну и пустым областям */
    const modalClickHandler = (event) => {
      /* если клик в пустую область (не диалог) */
      if (!event.composedPath().includes(modalDialog)) {
        /* закрываем окно */
        currentModal.classList.remove("is-open");
        currentModal.removeEventListener("click", modalClickHandler);
      }
    };
    
    currentModal.addEventListener("click", modalClickHandler);
  });
});

/* ловим событие нажатием кнопки  */
document.addEventListener("keyup", (event) => {
  if (event.key == "Escape" && currentModal && currentModal.classList.contains("is-open")) {
    /* закрываем окно */
    currentModal.classList.remove("is-open");
  }
});

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
        rule: "minLength",
        value: 2,
        errorMessage: "Имя должно содержать минимум 2 символа",
      },
      {
        rule: "maxLength",
        value: 100,
        errorMessage: "Имя не должно превышать 100 символов",
      },
    ])
    .addField("[name=userphone]", [
      {
        rule: "required",
        errorMessage: "Укажите телефон",
      },
      {
        rule: "function",
        validator: function(name, value) {
          const digits = value.replace(/\D/g, '');
          return digits.length >= 10 && digits.length <= 15;
        },
        errorMessage: "Введите корректный номер телефона",
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
            if (!response.ok) {
              throw new Error('Network response was not ok');
            }
            return response.json();
          })
          .then((data) => {
            // Успешная отправка
            thisForm.reset();
            
            // Закрываем текущее модальное окно, если оно открыто
            if (currentModal && currentModal.classList.contains("is-open")) {
              currentModal.classList.remove("is-open");
            }
            
            // Открываем окно с благодарностью
            if (alertModal) {
              alertModal.classList.add("is-open");
              currentModal = alertModal;
              modalDialog = currentModal.querySelector(".modal-dialog");
              
              /* отслеживаем клик по окну и пустым областям */
              const alertClickHandler = (event) => {
                if (!event.composedPath().includes(modalDialog)) {
                  currentModal.classList.remove("is-open");
                  currentModal.removeEventListener("click", alertClickHandler);
                }
              };
              
              currentModal.addEventListener("click", alertClickHandler);
            }
          })
          .catch((error) => {
            console.error("Error:", error);
            alert("Произошла ошибка при отправке формы. Пожалуйста, попробуйте позже.");
          });
      };
      
      ajaxSend(formData);
    });
});

// Маска для телефона
(() => {
  const SELECTOR = ".phone-mask";

  const getDigits = (value) => (value || "").replace(/\D/g, "");

  const normalizeRuDigits = (digits) => {
    if (!digits) return "";
    if (digits[0] === "8") digits = "7" + digits.slice(1);
    if (digits[0] === "9") digits = "7" + digits;
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

  const digitsCountBeforeCaret = (str, caretPos) => {
    let count = 0;
    for (let i = 0; i < Math.min(caretPos, str.length); i++) {
      if (/\d/.test(str[i])) count++;
    }
    return count;
  };

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

  const getErrorBox = (input) => {
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

  const handleFormat = (input) => {
    const oldValue = input.value;
    const oldCaret = input.selectionStart ?? oldValue.length;

    const digitsBefore = digitsCountBeforeCaret(oldValue, oldCaret);

    const rawDigits = getDigits(oldValue);
    const digits = normalizeRuDigits(rawDigits);

    const newValue = formatRuPhone(digits);
    input.value = newValue;

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

    if (e.key === "Backspace") {
      const pos = input.selectionStart ?? 0;
      const digits = normalizeRuDigits(getDigits(input.value));
      if (digits.length <= 1) {
        input.value = "";
        clearInvalid(input);
        e.preventDefault();
        return;
      }
      if (pos <= 4) {
        setTimeout(() => safeSetCaret(input, 4), 0);
      }
    }
  };

  const onPaste = (e) => {
    const input = e.target;
    if (!input.matches(SELECTOR)) return;
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
      validate(input);
    }
  };

  const onBlur = (e) => {
    const input = e.target;
    if (!input.matches(SELECTOR)) return;

    const digits = normalizeRuDigits(getDigits(input.value));
    if (digits.length <= 1) {
      input.value = "";
      clearInvalid(input);
      return;
    }

    validate(input);
  };

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
