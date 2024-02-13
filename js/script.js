/**************Menu**************/
((d)=>{
  const $btnMenu=d.querySelector(".menu-btn"),
  $menu=d.querySelector(".nav-principal")

  $btnMenu.addEventListener("click",(e)=>{
    $btnMenu.firstElementChild.classList.toggle("none");
     $btnMenu.lastElementChild.classList.toggle("none");
     $menu.classList.toggle("is-active");
  });
  d.addEventListener("click", e=>{
    if(!e.target.matches(".nav-principal a"))return false;
    $btnMenu.firstElementChild.classList.remove("none");
     $btnMenu.lastElementChild.classList.add("none");
     $menu.classList.remove("is-active");

  })
})(document);

/**************sidebar catalogo**************/
((d)=>{
  const $btnAside=d.querySelector(".look-btn"),
  $menuAside=d.querySelector(".nav-catalogo")

  $btnAside.addEventListener("click",(e)=>{
    $btnAside.firstElementChild.classList.toggle("none");
     $btnAside.lastElementChild.classList.toggle("none");
     $menuAside.classList.toggle("is-active");
  });
  d.addEventListener("click", e=>{
    if(!e.target.matches(".nav-catalogo a"))return false;
    $btnAside.firstElementChild.classList.remove("none");
     $btnAside.lastElementChild.classList.add("none");
     $menuAside.classList.remove("is-active");

  })
})(document);

/**********ContactForm*************/
((d)=>{
  const $form=d.querySelector(".contact-form"),
  $loader=d.querySelector(".contact-form-loader"),
  $response=d.querySelector(".contact-form-response");

  $form.addEventListener("submit",(e)=>{
    e.preventDefault();
    $loader.classList.remove("none");
    fetch("https://formsubmit.co/ajax/atreosistemas@gmail.com", {
      method: "POST",
      body: new FormData(e.target),
    })
     .then((res) => (res.ok ? res.json() : Promise.reject(res)))
      .then((json) => {
        console.log(json);
       
        location.hash = "#gracias";
        $form.reset();
      })
      .catch((err) => {
        console.log(err);
        let message =
          err.statusText || "Ocurrió un error al enviar, intenta nuevamente";
        $response.querySelector(
          "h3"
        ).innerHTML = `Error ${err.status}: ${message}`;
       
      })
      .finally(() => {
        $loader.classList.add("none");
        setTimeout(() => {
          location.hash = "#close";
        }, 3000);
      });

  })
})(document);