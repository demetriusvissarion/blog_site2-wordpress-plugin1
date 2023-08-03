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
    console.log("Prevent form to submit");

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

    // ajax http post request
    let url = testimonialForm.dataset.url;
    console.log(url);
  });
});
function resetMessages() {
  document.querySelectorAll(".field-msg").forEach(f => f.classList.remove("show"));
}
function validateEmail(email) {
  let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(email).toLowerCase());
}
})();

/******/ })()
;
//# sourceMappingURL=app.js.map