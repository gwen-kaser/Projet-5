class Images {
    constructor() {
        let button = document.getElementById("add-file");
        button.addEventListener("click", () => {
            this.addFile();
        });
    }
    
    // Ajouter champs 
    addFile() {
        let file = document.getElementById("file");
        let line = document.createElement("input");
        let div = document.createElement("div");
        let icon = document.createElement("i");
        div.className = "flex-input";
        icon.classList.add("fal");
        icon.classList.add("fa-backspace");
        line.setAttribute("type","file",);
        line.setAttribute("name","image_slider[]");
        // Supprimer input avec l'icon
        icon.addEventListener("click", () => {
            div.remove();
        });
        div.appendChild(line);
        div.appendChild(icon);
        file.appendChild(div);
    }

}



