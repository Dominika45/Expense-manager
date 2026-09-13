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

const budgetChartElement = document.getElementById('transactionsVsBudgetsChart');

if (budgetChartElement) {
    const data = JSON.parse(budgetChartElement.dataset.data);

    const labels = data.map(item => item.category);
    const transactions = data.map(item => item.transactions);
    const budgets = data.map(item => item.budget);

    new Chart(budgetChartElement, {
        type: 'bar',

        data: {
            labels: labels,

            datasets: [
                {
                    label: 'Wydatki',
                    data: transactions
                },
                {
                    label: 'Budżet',
                    data: budgets
                }
            ]
        },

        options: {
            responsive: true,

            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}