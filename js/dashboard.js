// MUESTRA CREAR POST
document.querySelector(".create-post-btn").addEventListener("click", function () {
    document.getElementById("create-post-form").style.display = "block";
    document.getElementById("overlay").style.display = "block";
});

// BTN CANCELAR
document.getElementById("cancel-post").addEventListener("click", function () {
    document.getElementById("create-post-form").style.display = "none";
    document.getElementById("overlay").style.display = "none";
});

// OCULTA CREAR POST
document.getElementById("overlay").addEventListener("click", function (event) {
    if (event.target === document.getElementById("overlay")) {
        document.getElementById("create-post-form").style.display = "none";
        document.getElementById("overlay").style.display = "none";
    }
});

// PREVISUALIZACION DE IMAGE
document.getElementById("post-image-upload").addEventListener("change", function (event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById("post-preview").src = e.target.result;
            document.getElementById("post-preview").style.display = "block";
        };
        reader.readAsDataURL(file);
    }
});