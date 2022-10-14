document.addEventListener("keyup", e=>{
    if(e.target.matches("#busqueda")){

        if(e.key === "Escape")e.target.value = ""

        document.querySelectorAll("#buscar").forEach(cosas=>{
            cosas.textContent.toLocaleLowerCase().includes(e.target.value.toLocaleLowerCase())
            ?cosas.classList.remove("filtro")
            :cosas.classList.add("filtro")
        })
    }
})