document.addEventListener("DOMContentLoaded", function (e) {
  const showAuthBtn = document.getElementById("demetrius1-show-auth-form"),
    authContainer = document.getElementById("demetrius1-auth-container"),
    close = document.getElementById("demetrius1-auth-close");

  showAuthBtn.addEventListener("click", () => {
    authContainer.classList.add("show");
    showAuthBtn.parentElement.classList.add("hide");
  });

  close.addEventListener("click", () => {
    authContainer.classList.remove("show");
    showAuthBtn.parentElement.classList.remove("hide");
  });
});
