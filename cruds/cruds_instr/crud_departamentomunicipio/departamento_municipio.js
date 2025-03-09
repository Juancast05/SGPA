let listElements = document.querySelectorAll('.list_button--click');

listElements.forEach(listElement =>{
    listElement.addEventListener('click', ()=>{
        
        listElement.classList.toggle('arrow');

        let height = 0;
        let menu = listElement.nextElementSibling;
        console.log()
        if (menu.clientHeight == "0") {
            height = menu.scrollHeight;
        }

        menu.style.height = `${height}px`;

    })
}); 

   //---------------------------------------------------------//

const images = document.querySelectorAll('.carousel-images img');
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

     //---------------------------------|------------------------//

const toggleButton = document.getElementById('toggleMenu');
const navMenu = document.querySelector('.nav');

toggleButton.addEventListener('click', () => {
    navMenu.classList.toggle('hidden'); 
});

let listElementss = document.querySelectorAll('.list_button--click');

listElementss.forEach(listElement => {
    listElement.addEventListener('click', () => {
        listElement.classList.toggle('arrow');

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
        let input = document.getElementById('searchInput');
        let filter = input.value.toLowerCase();
        let table = document.getElementById('DepTable');
        let rows = table.getElementsByTagName('tr');
    
       
        for (let i = 1; i < rows.length; i++) {
            let cells = rows[i].getElementsByTagName('td');
            let departamento = cells[0].textContent.toLowerCase(); 
    
           
            if (departamento.indexOf(filter) > -1) {
                rows[i].style.display = ''; 
            } else {
                rows[i].style.display = 'none'; 
            }
        }
    }
    

    //--------------------------------------------------------------------------//

    document.getElementById('departamento').addEventListener('change', function() {
        let departamento = this.value;
        let municipioSelect = document.getElementById('municipio');
    
        
        municipioSelect.innerHTML = '';
    
        let municipios = {};
    
        municipios['antioquia'] = [
            "Abriaquí", "Acacías", "Anzá", "Arboletes", "Argelia", "Apartadó", "Barbosa", "Bello", "Berrío", "Betania",
            "Cáceres", "Caldas", "Campamento", "Caramanta", "Carolina del Príncipe", "Caucasia", "Chigorodó", "Cisneros", 
            "Concepción", "Concordia", "Dabeiba", "Donmatías", "Ebéjico", "El Bagre", "El Carmen de Viboral", "El Retiro", 
            "Envigado", "Fredonia", "Giraldo", "Marinilla", "Rionegro", "Sonson", "Alejandría", "Guarne", "San Vicente Ferrer"
        ];
    
        municipios['bogotá'] = [
            "Usaquén", "Chapinero", "Santa Fé", "San Cristóbal", "Rafael Uribe Uribe", "Los Mártires", "Antonio Nariño", 
            "Teusaquillo", "Fontibón", "La Candelaria", "Bosa", "Kennedy", "Cota", "Suba", "Tunjuelito", "Puente Aranda", 
            "Sumapaz"
        ];
    
     
        municipios[departamento].forEach(function(municipio) {
            let option = document.createElement('option');
            option.value = municipio.toLowerCase().replace(/ /g, '_');
            option.textContent = municipio;
            municipioSelect.appendChild(option);
        });
    });
    
   
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('departamento').value = 'antioquia';
        document.getElementById('departamento').dispatchEvent(new Event('change'));
    });
    
