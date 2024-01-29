 
 window.onload = function() {
  let loader = document.querySelector(".loaderdpage");
  loader.style.display = "none";
};

document.querySelectorAll(".toggle-password").forEach(function(button) {
  button.addEventListener("click", function() {
    button.classList.toggle("fa-eye");
    button.classList.toggle("fa-eye-slash");
    let inputs = document.querySelectorAll(
      "#pass1, #spass, #scpass"
    );
    inputs.forEach(function(input) {
      if (input.type === "password") {
        input.type = "text";
      } else {
        input.type = "password";
      }
    });
  });
});

