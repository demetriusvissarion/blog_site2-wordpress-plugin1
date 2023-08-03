/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!***********************!*\
  !*** ./src/js/app.js ***!
  \***********************/
// import "code-prettify";
window.addEventListener("load", function () {
  // PR.prettyPrint();

  // store tabs variables
  var tabs = document.querySelectorAll("ul.nav-tabs > li");
  for (var i = 0; i < tabs.length; i++) {
    tabs[i].addEventListener("click", switchTab);
  }
  function switchTab(event) {
    event.preventDefault();
    document.querySelector("ul.nav-tabs li.active").classList.remove("active");
    document.querySelector(".tab-pane.active").classList.remove("active");
    var clickedTab = event.currentTarget;
    var anchor = event.target;
    var activePaneID = anchor.getAttribute("href");
    clickedTab.classList.add("active");
    document.querySelector(activePaneID).classList.add("active");
  }
});
jQuery(document).ready(function ($) {
  $(document).on("click", ".js-image-upload", function (e) {
    e.preventDefault();
    var $button = $(this);
    var file_frame = wp.media.frames.file_frame = wp.media({
      title: "Select or Upload an Image",
      library: {
        type: "image" // mime type
      },

      button: {
        text: "Select Image"
      },
      multiple: false
    });
    file_frame.on("select", function () {
      var attachment = file_frame.state().get("selection").first().toJSON();
      $button.siblings(".image-upload").val(attachment.url);
    });
    file_frame.open();
  });
});
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!************************!*\
  !*** ./src/js/form.js ***!
  \************************/
document.addEventListener("DOMContentLoaded", function (e) {
  let testimonialForm = document.getElementById("demetrius1-testimonial-form");
  testimonialForm.addEventListener("submit", e => {
    e.preventDefault();

    // reset the form messages
    resetMessages();

    // collect all the data
    let data = {
      name: testimonialForm.querySelector('[name="name"]').value,
      email: testimonialForm.querySelector('[name="email"]').value,
      message: testimonialForm.querySelector('[name="message"]').value
    };

    // validate the email
    if (!validateEmail(data.email)) {
      testimonialForm.querySelector('[data-error="invalidEmail"]').classList.add("show");
      return;
    }
    if (!data.name) {
      testimonialForm.querySelector('[data-error="invalidName"]').classList.add("show");
      return;
    }
    if (!data.message) {
      testimonialForm.querySelector('[data-error="invalidMessage"]').classList.add("show");
      return;
    }

    // ajax http post request
    let url = testimonialForm.dataset.url;
    let params = new URLSearchParams(new FormData(testimonialForm));
    testimonialForm.querySelector(".js-form-submission").classList.add("show");
    fetch(url, {
      method: "POST",
      body: params
    }).then(res => res.json()).catch(error => {
      resetMessages();
      testimonialForm.querySelector(".js-form-error").classList.add("show");
    }).then(response => {
      resetMessages();
      if (response === 0 || response.status === "error") {
        testimonialForm.querySelector(".js-form-error").classList.add("show");
        return;
      }
      testimonialForm.querySelector(".js-form-success").classList.add("show");
      resetForm(testimonialForm);
    });
  });
});
function resetMessages() {
  document.querySelectorAll(".field-msg").forEach(f => f.classList.remove("show"));
}
function validateEmail(email) {
  let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(email).toLowerCase());
}
function resetForm(form) {
  form.querySelector('[name="name"]').value = "";
  form.querySelector('[name="email"]').value = "";
  form.querySelector('[name="message"]').value = "";
}
})();

/******/ })()
;
//# sourceMappingURL=app.js.map