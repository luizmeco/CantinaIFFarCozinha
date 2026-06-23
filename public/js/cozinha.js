document.addEventListener('DOMContentLoaded', function() {
    let tempoRestante = 15;
    const timerDisplay = document.getElementById('timer-display');

    if (timerDisplay) {
        // Inicializa o valor na tela
        timerDisplay.textContent = tempoRestante;

        // Intervalo de contagem regressiva de 1 segundo
        const interval = setInterval(function() {
            tempoRestante--;
            timerDisplay.textContent = tempoRestante;

            if (tempoRestante <= 0) {
                clearInterval(interval);
                window.location.reload();
            }
        }, 1000);
    }
});
