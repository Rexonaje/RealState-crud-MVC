 document.addEventListener('DOMContentLoaded',function(){
    eventListeners();
    darkMode();
 });
 

 function darkMode(){
    const prefersDarkMode=window.matchMedia('(prefers-color-scheme:dark)');
    if(prefersDarkMode.matches){
        document.body.classList.add("dark-mode");
    }
    else{
        document.body.classList.remove("dark-mode"); 

    }
    prefersDarkMode.addEventListener('change',()=>{
        if(prefersDarkMode.matches){
            document.body.classList.add("dark-mode");
        }
        else{
            document.body.classList.remove("dark-mode");
    
        } 
    });
    const darkMode=document.querySelector('.dark-mode-btn');
    darkMode.addEventListener("click",function(){
        document.body.classList.toggle("dark-mode");
    });

  
};
 function eventListeners(){
    const mobileMenu=document.querySelector(".mobile-menu")

    mobileMenu.addEventListener("click",navegacionResponsive); 
    
    //muestra formulario con condicionales
    $metodoContacto=document.querySelectorAll('input[name="contacto[contacto]"]');
    $metodoContacto.forEach(input => input.addEventListener('click',mostrarMetodosContacto));
};
function navegacionResponsive(){
    //console.log("desde navres")
    const nav=document.querySelector(".navegacion");
        nav.classList.toggle('mostrar');
     
};
function mostrarMetodosContacto(e){
//console.log('seleccionado');
 const $contactoDiv=document.getElementById('contacto');
  if(e.target.value==='telefono'){
    $contactoDiv.innerHTML=`
    <label for="Telefono">Telefono</label>
    <input type="tel" placeholder="Tu Telefono" id="Telefono" name="contacto[telefono]" require>

    <p> elija la fecha y la hora</p>           
    <label for="Fecha">Fecha</label>
    <input type="date"  id="Fecha"name="contacto[fecha]">

    <label for="Hora">Hora</label>
    <input type="time" id="Hora" min="09:00" max="18:00" name="contacto[hora]">    
    `;
  }else{
    $contactoDiv.innerHTML=` 
    <label for="email">Email</label>
    <input type="email" placeholder="Tu email" id="email" name="contacto[email]" require>
                
    `;
  }
}