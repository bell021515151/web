document.addEventListener('DOMContentLoaded', function() {
    // Variables globales para los datos del gráfico
    let okCount = 0;
    let ngCount = 0;

    // Obtener elementos del DOM
    const okPorcentajeElement = document.getElementById('ok-porcentaje');
    const ngPorcentajeElement = document.getElementById('ng-porcentaje');
    const porcentajesChart = document.getElementById('porcentajes-chart').getContext('2d');

    // Función para actualizar los porcentajes y el gráfico
    function actualizarPorcentajes() {
        // Calcular porcentajes
        const total = okCount + ngCount;
        const okPorcentaje = total > 0 ? ((okCount / total) * 100).toFixed(2) : 0;
        const ngPorcentaje = total > 0 ? ((ngCount / total) * 100).toFixed(2) : 0;

        // Actualizar textos en el HTML
        okPorcentajeElement.textContent = `${okPorcentaje}%`;
        ngPorcentajeElement.textContent = `${ngPorcentaje}%`;

        // Actualizar el gráfico
        if (window.porcentajesChart) {
            window.porcentajesChart.destroy();
        }
        
        window.porcentajesChart = new Chart(porcentajesChart, {
            type: 'pie',
            data: {
                labels: ['OK', 'NG'],
                datasets: [{
                    label: 'Porcentajes',
                    data: [okPorcentaje, ngPorcentaje],
                    backgroundColor: ['#4CAF50', '#FF6347']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, data) {
                            const dataset = data.datasets[tooltipItem.datasetIndex];
                            const total = dataset.data.reduce((previousValue, currentValue) => previousValue + currentValue);
                            const currentValue = dataset.data[tooltipItem.index];
                            const percentage = Math.floor(((currentValue / total) * 100) + 0.5);
                            return `${data.labels[tooltipItem.index]}: ${percentage}%`;
                        }
                    }
                }
            }
        });
    }

    // Simular cambios para pruebas (puedes eliminar esto en tu implementación real)
    document.getElementById('crud-form').addEventListener('submit', function(event) {
        event.preventDefault();

        // Aquí deberías tener la lógica para contar los OK y NG según los datos ingresados en el formulario
        const cincoSValue = document.getElementById('cinco_s').value.trim().toLowerCase();
        if (cincoSValue === 'ok') {
            okCount++;
        } else if (cincoSValue === 'ng') {
            ngCount++;
        }

        // Actualizar los porcentajes y el gráfico
        actualizarPorcentajes();
    });

    // Llamar a la función inicialmente para mostrar el gráfico vacío
    actualizarPorcentajes();
});
