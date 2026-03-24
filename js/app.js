let hour = new Date().getHours();
let greetingElement = document.getElementById("greeting");

if (hour < 12) {
    greetingElement.textContent = "Goedemorgen";
} else if (hour < 18) {
    greetingElement.textContent = "Goedemiddag";
} else {
    greetingElement.textContent = "Goedenavond";
}