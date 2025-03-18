const ubicaciones = {
  Colombia: {
    Antioquia: ["Medellín", "Bello", "Envigado", "Itagüí", "Rionegro"],
    Cundinamarca: ["Bogotá", "Soacha", "Zipaquirá", "Chía", "Facatativá"],
    "Valle del Cauca": ["Cali", "Buenaventura", "Palmira", "Tuluá", "Yumbo"],
    Atlántico: [
      "Barranquilla",
      "Soledad",
      "Malambo",
      "Puerto Colombia",
      "Sabanalarga",
    ],
    Santander: [
      "Bucaramanga",
      "Floridablanca",
      "Girón",
      "Piedecuesta",
      "Barrancabermeja",
    ],
    Bolívar: [
      "Cartagena",
      "Magangué",
      "Arjona",
      "Turbaco",
      "El Carmen de Bolívar",
    ],
    Nariño: ["Pasto", "Ipiales", "Tumaco", "Túquerres", "La Unión"],
    Boyacá: ["Tunja", "Duitama", "Sogamoso", "Chiquinquirá", "Paipa"],
    Cauca: [
      "Popayán",
      "Santander de Quilichao",
      "Puerto Tejada",
      "Patía",
      "Miranda",
    ],
    Córdoba: ["Montería", "Cereté", "Lorica", "Sahagún", "Planeta Rica"],
  },
  Venezuela: {
    "Distrito Capital": ["Caracas"],
    Zulia: ["Maracaibo", "Cabimas", "Ciudad Ojeda", "Machiques"],
    Miranda: ["Los Teques", "Petare", "Guarenas", "Guatire"],
    Carabobo: ["Valencia", "Puerto Cabello", "Guacara", "Los Guayos"],
  },
  Ecuador: {
    Pichincha: ["Quito", "Cayambe", "Sangolquí", "Machachi"],
    Guayas: ["Guayaquil", "Durán", "Milagro", "Daule"],
    Azuay: ["Cuenca", "Gualaceo", "Paute", "Chordeleg"],
  },
  Perú: {
    Lima: ["Lima", "Callao", "Huacho", "Barranca"],
    Arequipa: ["Arequipa", "Camaná", "Mollendo", "Majes"],
    "La Libertad": ["Trujillo", "Huamachuco", "Pacasmayo", "Guadalupe"],
  },
  Brasil: {
    "São Paulo": ["São Paulo", "Campinas", "Santos", "Guarulhos"],
    "Río de Janeiro": [
      "Río de Janeiro",
      "Niterói",
      "Duque de Caxias",
      "Nova Iguaçu",
    ],
  },
  Panamá: {
    Panamá: ["Ciudad de Panamá", "San Miguelito", "Tocumen", "David"],
  },
  México: {
    "Ciudad de México": [
      "Ciudad de México",
      "Coyoacán",
      "Tlalpan",
      "Xochimilco",
    ],
    Jalisco: ["Guadalajara", "Zapopan", "Tlaquepaque", "Puerto Vallarta"],
  },
  Argentina: {
    "Buenos Aires": ["Buenos Aires", "La Plata", "Mar del Plata", "Quilmes"],
    Córdoba: ["Córdoba", "Río Cuarto", "Villa María", "Carlos Paz"],
  },
  Chile: {
    "Región Metropolitana": ["Santiago", "Maipú", "Puente Alto", "La Florida"],
    Valparaíso: ["Valparaíso", "Viña del Mar", "Quilpué", "Concón"],
  },
  "Estados Unidos": {
    California: ["Los Ángeles", "San Francisco", "San Diego", "Sacramento"],
    Florida: ["Miami", "Orlando", "Tampa", "Jacksonville"],
    "Nueva York": ["Nueva York", "Buffalo", "Rochester", "Syracuse"],
  },
  España: {
    Madrid: ["Madrid", "Alcalá de Henares", "Móstoles", "Leganés"],
    Cataluña: ["Barcelona", "Tarragona", "Girona", "Lleida"],
    Andalucía: ["Sevilla", "Málaga", "Granada", "Córdoba"],
  },
  Otro: {
    Otro: ["Otra ciudad"],
  },
};

function cargarDepartamentos() {
  const selectPais = document.getElementById("Pais_Nacimiento");
  if (!selectPais) return;

  const paisSeleccionado = selectPais.value;
  const selectDepartamentos = document.getElementById(
    "Departamento_Nacimiento"
  );
  const selectCiudades = document.getElementById("Ciudad_Nacimiento");

  if (!selectDepartamentos || !selectCiudades) return;

  selectDepartamentos.innerHTML =
    '<option value="">Seleccione un departamento</option>';
  selectCiudades.innerHTML =
    '<option value="">Seleccione primero un departamento</option>';

  if (paisSeleccionado && ubicaciones[paisSeleccionado]) {
    Object.keys(ubicaciones[paisSeleccionado]).forEach((departamento) => {
      const option = document.createElement("option");
      option.value = departamento;
      option.textContent = departamento;
      selectDepartamentos.appendChild(option);
    });
  } else if (paisSeleccionado && !ubicaciones[paisSeleccionado]) {
    const option = document.createElement("option");
    option.value = "Otro";
    option.textContent = "Otro";
    selectDepartamentos.appendChild(option);
  }
}

function cargarCiudades() {
  const selectPais = document.getElementById("Pais_Nacimiento");
  const selectDepartamento = document.getElementById("Departamento_Nacimiento");
  const selectCiudades = document.getElementById("Ciudad_Nacimiento");

  if (!selectPais || !selectDepartamento || !selectCiudades) return;

  const paisSeleccionado = selectPais.value;
  const departamentoSeleccionado = selectDepartamento.value;

  selectCiudades.innerHTML = '<option value="">Seleccione una ciudad</option>';

  if (
    paisSeleccionado &&
    departamentoSeleccionado &&
    ubicaciones[paisSeleccionado] &&
    ubicaciones[paisSeleccionado][departamentoSeleccionado]
  ) {
    ubicaciones[paisSeleccionado][departamentoSeleccionado].forEach(
      (ciudad) => {
        const option = document.createElement("option");
        option.value = ciudad;
        option.textContent = ciudad;
        selectCiudades.appendChild(option);
      }
    );
  } else if (departamentoSeleccionado === "Otro") {
    const option = document.createElement("option");
    option.value = "Otra";
    option.textContent = "Otra";
    selectCiudades.appendChild(option);
  }
}

document.addEventListener("DOMContentLoaded", function () {
  console.log("DOM completamente cargado");

  const selectPais = document.getElementById("Pais_Nacimiento");
  if (selectPais) {
    console.log("Configurando eventos para selectores de ubicación");

    selectPais.addEventListener("change", cargarDepartamentos);

    const selectDepartamento = document.getElementById(
      "Departamento_Nacimiento"
    );
    if (selectDepartamento) {
      selectDepartamento.addEventListener("change", cargarCiudades);
    }

    if (selectPais.value) {
      cargarDepartamentos();

      if (selectDepartamento && selectDepartamento.value) {
        cargarCiudades();
      }
    }
  }
});

let listElements = document.querySelectorAll(".list_button--click");

listElements.forEach((listElement) => {
  listElement.addEventListener("click", () => {
    listElement.classList.toggle("arrow");

    let height = 0;
    let menu = listElement.nextElementSibling;
    console.log();
    if (menu.clientHeight == "0") {
      height = menu.scrollHeight;
    }

    menu.style.height = `${height}px`;
  });
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
  return confirm("¿Estás seguro de que deseas eliminar este practicante?");
}

function confirmarActualizar() {
  return confirm("¿Estás seguro de que deseas actualizar este practicante?");
}

function confirmarRegistrar() {
  return confirm("¿Estás seguro de que deseas registrar este practicante?");
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
  let filter = input.value.toUpperCase();
  let table = document.getElementById("practicanteTable");
  let tr = table.getElementsByTagName("tr");

  for (let i = 1; i < tr.length; i++) {
    let td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      let txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

// Función para mostrar los detalles del practicante en un modal
function mostrarDetalles(practicante, nombrePrograma) {
  const modal = document.getElementById("detallesModal");
  const detallesTable = document.getElementById("detallesTable");

  // Crear la tabla de detalles
  let detallesHTML = `
        <tr><td>Nombres</td><td>${practicante.Nombre_Practicante}</td></tr>
        <tr><td>Apellidos</td><td>${practicante.Apellido_Practicante}</td></tr>
        <tr><td>Tipo de Identificación</td><td>${practicante.Tipo_Identificacion}</td></tr>
        <tr><td>Identificación</td><td>${practicante.Identificacion}</td></tr>
        <tr><td>Fecha de Nacimiento</td><td>${practicante.Fecha_Nacimiento}</td></tr>
        <tr><td>País de Nacimiento</td><td>${practicante.Pais_Nacimiento}</td></tr>
        <tr><td>Departamento de Nacimiento</td><td>${practicante.Departamento_Nacimiento}</td></tr>
        <tr><td>Ciudad de Nacimiento</td><td>${practicante.Ciudad_Nacimiento}</td></tr>
        <tr><td>Correo Personal</td><td>${practicante.Correo_Personal}</td></tr>
        <tr><td>Correo Sena</td><td>${practicante.Correo_Sena}</td></tr>
        <tr><td>Teléfono</td><td>${practicante.Telefono}</td></tr>
        <tr><td>ID Práctica</td><td>${practicante.ID_Practica}</td></tr>
        <tr><td>Programa</td><td>${nombrePrograma}</td></tr>
      `;

  detallesTable.innerHTML = detallesHTML;

  // Mostrar el modal con una animación
  modal.style.display = "block";

  // Configurar los eventos de cierre del modal
  configurarCierreModal();
}

// Configurar los eventos para cerrar el modal
function configurarCierreModal() {
  const modal = document.getElementById("detallesModal");
  const closeButton = document.querySelector(".close-modal");
  const cerrarBtn = document.getElementById("cerrarModal");

  // Función para cerrar el modal con animación
  function cerrarModal() {
    modal.classList.add("fade-out");
    setTimeout(() => {
      modal.style.display = "none";
      modal.classList.remove("fade-out");
    }, 300); // 300ms es la duración de la animación
  }

  // Asignar eventos de cierre
  closeButton.onclick = cerrarModal;
  cerrarBtn.onclick = cerrarModal;

  // Cerrar al hacer clic fuera del modal
  window.onclick = function (event) {
    if (event.target == modal) {
      cerrarModal();
    }
  };

  // Cerrar con tecla ESC
  document.addEventListener("keydown", function (event) {
    if (event.key === "Escape" && modal.style.display === "block") {
      cerrarModal();
    }
  });
}

// Ejecutar cuando el DOM esté completamente cargado
document.addEventListener("DOMContentLoaded", function () {
  // El código existente del DOMContentLoaded se mantiene...

  // Añadir configuración para el modal
  configurarCierreModal();
});
