const municipiosPorDepartamento = {
  antioquia: ["Medellín", "Bello", "Envigado", "Itagüí", "Rionegro"],
  cundinamarca: ["Bogotá", "Soacha", "Zipaquirá", "Chía", "Facatativá"],
  "Valle del Cauca": ["Cali", "Buenaventura", "Palmira", "Tuluá", "Yumbo"],
  atlantico: [
    "Barranquilla",
    "Soledad",
    "Malambo",
    "Puerto Colombia",
    "Sabanalarga",
  ],
  santander: [
    "Bucaramanga",
    "Floridablanca",
    "Girón",
    "Piedecuesta",
    "Barrancabermeja",
  ],
  bolivar: [
    "Cartagena",
    "Magangué",
    "Arjona",
    "Turbaco",
    "El Carmen de Bolívar",
  ],
  narino: ["Pasto", "Ipiales", "Tumaco", "Túquerres", "La Unión"],
  boyaca: ["Tunja", "Duitama", "Sogamoso", "Chiquinquirá", "Paipa"],
  cauca: [
    "Popayán",
    "Santander de Quilichao",
    "Puerto Tejada",
    "Patía",
    "Miranda",
  ],
  cordoba: ["Montería", "Cereté", "Lorica", "Sahagún", "Planeta Rica"],
};

// Función para actualizar los municipios según el departamento seleccionado
function actualizarMunicipios() {
  const departamentoSeleccionado =
    document.getElementById("departamento").value;
  const selectMunicipio = document.getElementById("municipio");

  // Limpiar opciones actuales
  selectMunicipio.innerHTML = "";

  console.log("Departamento seleccionado: ", departamentoSeleccionado);
  console.log(
    "Municipios disponibles: ",
    municipiosPorDepartamento[departamentoSeleccionado]
  );

  // Si no hay departamento seleccionado o no hay municipios para este departamento
  if (
    !departamentoSeleccionado ||
    !municipiosPorDepartamento[departamentoSeleccionado]
  ) {
    // Opción por defecto
    const opcionDefault = document.createElement("option");
    opcionDefault.value = "";
    opcionDefault.textContent = "Seleccione primero un departamento";
    selectMunicipio.appendChild(opcionDefault);

    // Deshabilitar el select de municipios
    selectMunicipio.disabled = true;
    return;
  }

  // Habilitar el select de municipios
  selectMunicipio.disabled = false;

  // Añadir municipios del departamento seleccionado
  municipiosPorDepartamento[departamentoSeleccionado].forEach((municipio) => {
    const opcion = document.createElement("option");
    opcion.value = municipio.toLowerCase();
    opcion.textContent = municipio;
    selectMunicipio.appendChild(opcion);
  });
}

// Función para confirmar el registro
function confirmarRegistrar() {
  return confirm("¿Está seguro de registrar este departamento y municipio?");
}

// Inicializar el selector de municipios cuando el DOM esté cargado
document.addEventListener("DOMContentLoaded", function () {
  console.log("DOM cargado completamente");

  // Toggle para el menú en dispositivos móviles
  const toggleBtn = document.getElementById("toggleMenu");
  if (toggleBtn) {
    toggleBtn.addEventListener("click", function () {
      document.querySelector(".nav").classList.toggle("show");
    });
  }

  const departamentoSelect = document.getElementById("departamento");
  if (departamentoSelect) {
    console.log("Selector de departamento encontrado");
    // Agregar evento de cambio al selector de departamento
    departamentoSelect.addEventListener("change", function () {
      console.log("Cambio en selector de departamento detectado");
      actualizarMunicipios();
    });

    // Inicializar municipios con el departamento seleccionado por defecto
    actualizarMunicipios();
  } else {
    console.error("No se encontró el selector de departamento");
  }
});
//---------------------------------------------------------//

const images = document.querySelectorAll(".carousel-images img");
let currentIndex = 0;
const totalImages = images.length;
const imageDuration = 7000;
const fadeDuration = 1000;

function changeImage() {
  images.forEach((image) => {
    image.style.opacity = 0;
  });

  images[currentIndex].style.opacity = 1;

  currentIndex = (currentIndex + 1) % totalImages;
}

setInterval(changeImage, imageDuration);

changeImage();

//---------------------------------|------------------------//

function confirmarEliminar() {
  return confirm("¿Estás seguro de que deseas eliminar estos datos?");
}

function confirmarActualizar() {
  return confirm("¿Estás seguro de que deseas actualizar estos datos?");
}

function confirmarRegistrar() {
  return confirm("¿Estás seguro de que deseas registrar estos datos?");
}

//---------------------------------|------------------------//

const toggleButton = document.getElementById("toggleMenu");
const navMenu = document.querySelector(".nav");

toggleButton.addEventListener("click", () => {
  navMenu.classList.toggle("hidden");
});

let listElementss = document.querySelectorAll(".list_button--click");

listElementss.forEach((listElement) => {
  listElement.addEventListener("click", () => {
    listElement.classList.toggle("arrow");

    let height = 0;
    let menu = listElement.nextElementSibling;

    if (menu.clientHeight === 0) {
      height = menu.scrollHeight;
    }

    menu.style.height = `${height}px`;
  });
});

//---------------------------------|------------------------//

function buscarNombre() {
  let input = document.getElementById("searchInput");
  let filter = input.value.toLowerCase();
  let table = document.getElementById("DepTable");
  let rows = table.getElementsByTagName("tr");

  for (let i = 1; i < rows.length; i++) {
    let cells = rows[i].getElementsByTagName("td");
    let departamento = cells[0].textContent.toLowerCase();

    if (departamento.indexOf(filter) > -1) {
      rows[i].style.display = "";
    } else {
      rows[i].style.display = "none";
    }
  }
}
