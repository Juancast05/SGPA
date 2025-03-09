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

function confirmarRegistrar() {
    return confirm("¿Estás seguro de que deseas registrar estos datos?");
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
        let input = document.getElementById("searchInput"); 
        let filter = input.value.toUpperCase(); 
        let table = document.getElementById("DepTable"); 
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
    
    