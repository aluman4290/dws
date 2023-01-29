
window.onload = function () {
    let cites = [
        "No hay que ir para atrás ni para darse impulso, por Lao Tsé.",
        "No hay caminos para la paz; la paz es el camino, por Mahatma Gandhi.",
        "Haz el amor y no la guerra, por John Lennon.",
        "Para trabajar basta estar convencido de una cosa: que trabajar es menos aburrido que divertirse, por Charles Baudelaire.",
        "Las guerras seguirán mientras el color de la piel siga siendo más importante que el de los ojos, por Bob Marley.",
        "Cada    día sabemos más y entendemos menos, por Albert Einstein.",
        "El sabio no dice nunca todo lo que piensa, pero siempre piensa todo lo que dice, por Aristóteles.",
        "Pienso, luego existo, por René Descartes.",
        "La esperanza es un estimulante vital muy superior a la suerte, por Friedrich Nietzsche."
    ]
    const randomCite = () => {
        return cites[Math.floor(Math.random() * cites.length)];
    }

    let cite = document.getElementById('cite');
    let text = document.createTextNode(randomCite());
    cite.appendChild(text);


}