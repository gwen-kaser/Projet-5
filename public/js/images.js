class Images {
    constructor() {
        let button = document.getElementById("add-file");
        button.addEventListener("click", () => {
            this.addFile();
        });

        this.deleteImageHome();
        this.deleteImageSlider();
    }
    
    // Ajouter champ image - Page addDestination + editDestination
    addFile() {
        let file = document.getElementById("file");
        let line = document.createElement("input");
        let div = document.createElement("div");
        let icon = document.createElement("i");
        div.className = "flex-input";
        icon.classList.add("fa-solid");
        icon.classList.add("fa-xmark");
        line.setAttribute("type","file",);
        line.setAttribute("name","image_slider[]");
        // Supprimer champ avec l'icon
        icon.addEventListener("click", () => {
            div.remove();
        });
        div.appendChild(line);
        div.appendChild(icon);
        file.appendChild(div);
    }

    // Suprimer image home - Page editDestination
    deleteImageHome() {
        document.getElementById("delete-img-home").addEventListener("click", () => {
        document.getElementById("img-home").remove();
        });
    }

    // Supprimer image slider - Page editDestination
    deleteImageSlider() {
        let icons = [...document.getElementsByClassName("delete-img-slider")];
        icons.forEach(icon => {
            icon.addEventListener("click", (e) => {
                let numero = e.target.getAttribute("data-numero-image");
                document.querySelector('div[data-numero-image="'+ numero +'"]').remove();
                document.getElementById("delete-img").value = document.getElementById("delete-img").value + ';' + numero;
            });
        });
    }
}



