function verificarRespuestas() {
    const respuestasCorrectas = [
        "griego", "olimpo", "animales", "procreación",
        "cosas", "cosmos", "eternidad", "inmortalidad"
    ];

    let respuestasUsuario = [
        document.getElementById("respuesta1").value.trim().toLowerCase(),
        document.getElementById("respuesta2").value.trim().toLowerCase(),
        document.getElementById("respuesta3").value.trim().toLowerCase(),
        document.getElementById("respuesta4").value.trim().toLowerCase(),
        document.getElementById("respuesta5").value.trim().toLowerCase(),
        document.getElementById("respuesta6").value.trim().toLowerCase(),
        document.getElementById("respuesta7").value.trim().toLowerCase(),
        document.getElementById("respuesta8").value.trim().toLowerCase()
    ];

    let correctas = 0;

    for (let i = 0; i < respuestasCorrectas.length; i++) {
        if (respuestasUsuario[i] === respuestasCorrectas[i]) {
            correctas++;
        }
    }

    const resultado = document.getElementById("resultado");
    if (correctas === respuestasCorrectas.length) {
        resultado.innerText = "¡Todas las respuestas son correctas!";
        resultado.style.color = "green";
    } else {
        resultado.innerText = `Tienes ${correctas} respuestas correctas de ${respuestasCorrectas.length}. Intenta de nuevo.`;
        resultado.style.color = "red";
    }
}

function regresar() {
    window.history.back();
}
function irAlVideo() {
    window.location.href = "video.html";
}

