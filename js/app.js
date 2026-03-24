const greetingElement = document.getElementById('greeting');

if (greetingElement) {
    const hour = new Date().getHours();
    let greeting = 'goedenavond';

    if (hour >= 6 && hour < 12) {
        greeting = 'goedemorgen';
    } else if (hour >= 12 && hour < 18) {
        greeting = 'goedemiddag';
    }

    greetingElement.textContent = greeting;
}
