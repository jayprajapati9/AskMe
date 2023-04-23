const username_regex = /^(?=[a-zA-Z_\d]*[a-zA-Z])[a-zA-Z_\d]{0,16}$/;
const email_regex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

function toastMsg(type, msg) {
  let txtcolor;
  let symbol;
  let bordercolor;
  document.getElementById("toastmsg-symbol").classList.remove("bxs-check-circle", "bxs-error", "bxs-error-circle");
  if (type == "success") {
    txtcolor = "text-green-500";
    symbol = "bxs-check-circle";
    bordercolor = "border-t-green-500";
  } else if (type == "error") {
    txtcolor = "text-red-500";
    symbol = "bxs-error";
    bordercolor = "border-t-red-500";
  } else if (type == "info") {
    txtcolor = "text-yellow-500";
    symbol = "bxs-error-circle";
    bordercolor = "border-t-yellow-500";
  }
  document.getElementById("toast-msg").innerText = msg;
  document.getElementById("toastmsg-symbol").classList.add(symbol);
  document.getElementById("alert-toast").classList.add(txtcolor, bordercolor);
  document.getElementById("alert-toast").classList.toggle("hidden");
  setTimeout(() => {
    document.getElementById("alert-toast").classList.toggle("hidden");
  }, 5000);
}

function usernameRegex(params) {
  return username_regex.test(params);
}

function emailRegex(params) {
  return email_regex.test(params);
}

// Toggle password function
const togglePassword = document.getElementById("toggle-password");
const password = document.getElementById("password-field");

togglePassword.addEventListener("click", function () {
  // toggle the type attribute
  const type = password.getAttribute("type") === "password" ? "text" : "password";
  password.setAttribute("type", type);
  // toggle the icon
  this.classList.toggle("bi-eye");
});
