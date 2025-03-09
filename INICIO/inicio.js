// ----------------------------

const carousel = document.querySelector(".carousel-images");
const navLinks = document.querySelectorAll(".nav-menu a");

navLinks.forEach((link) => {
  link.addEventListener("click", (event) => {
    const dataSlide = link.getAttribute("data-slide");

    if (dataSlide !== null) {
      event.preventDefault();

      const index = parseInt(dataSlide);
      showSlide(index);
    }
  });
});

function showSlide(index) {
  const offset = -index * 100;
  carousel.style.transform = `translateX(${offset}%)`;
}

function confirmarCerrarSesion() {
  if (confirm("¿Estás seguro de que quieres cerrar la sesión?")) {
    window.location.href = "logout.php";
  }
}

sessionStorage.setItem("userLoggedIn", "true");

sessionStorage.removeItem("userLoggedIn");

// ----------------------------

document.addEventListener("DOMContentLoaded", function () {
  // Verificar si ya se ha mostrado el mensaje
  const session = new URLSearchParams(window.location.search).get("session");

  // Verificar si el parámetro 'session' es igual a 'success' y si el mensaje ya se ha mostrado en esta sesión
  if (session === "success" && !sessionStorage.getItem("messageShown")) {
    var notification = document.getElementById("notification");
    notification.style.display = "block";

    // Marcar que el mensaje ya ha sido mostrado en esta sesión
    sessionStorage.setItem("messageShown", "true");

    setTimeout(function () {
      notification.classList.add("hide");
    }, 4000);

    setTimeout(function () {
      notification.style.display = "none";
    }, 5000);
  }
});

document.addEventListener("DOMContentLoaded", function () {
  const session = new URLSearchParams(window.location.search).get("session");

  if (session === "success" && !sessionStorage.getItem("messageShown")) {
    var notification = document.getElementById("notification");
    notification.style.display = "block";

    sessionStorage.setItem("messageShown", "true");

    setTimeout(function () {
      notification.classList.add("hide");
    }, 4000);

    setTimeout(function () {
      notification.style.display = "none";
    }, 5000);
  }
});
