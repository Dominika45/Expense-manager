import Chart from 'chart.js/auto';

const chartElement = document.getElementById('expensesChart');

if (chartElement) {
    const transactions = JSON.parse(chartElement.dataset.transactions);

    const labels = transactions.map(transaction => transaction.name);
    const data = transactions.map(transaction => transaction.total);

    new Chart(chartElement, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                data: data
            }]
        }
    });
}