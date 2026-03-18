document.addEventListener("DOMContentLoaded", () => {
    const greetingElement = document.getElementById("greeting");
    const dbTimeElement = document.getElementById("dbTime");
    const now = new Date();
    const hour = now.getHours();
    let minutes = now.getMinutes();

    if (greetingElement) {
        if (hour < 12) {
            greetingElement.textContent = "Goedemorgen";
        } else if (hour < 18) {
            greetingElement.textContent = "Goedemiddag";
        } else {
            greetingElement.textContent = "Goedenavond";
        }
    }

    if (dbTimeElement) {
        if (minutes < 10) {
            minutes = `0${minutes}`;
        }

        dbTimeElement.textContent = `Database geladen om: ${hour}:${minutes}`;
    }
});
