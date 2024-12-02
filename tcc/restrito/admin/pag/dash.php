<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Resultados</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <style>
        
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 0px;
        }
        .container {
            max-width: 1400px;
        }
        .card {
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: none;
        }
        .chart-container {
            position: relative;
            height: 250px;
        }
        .navbar {
            background-color: #562b2d;
        }
        .navbar-brand, .navbar-nav .nav-item .nav-link, #downloadPdf {
            color: #ffffff !important;
            
        }
        .stat-card {
            text-align: center;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .stat-value {
            font-size: 2rem;
            font-weight: bold;
        }
        .stat-label {
            color: #888;
        }

    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light mb-4">
        <a class="navbar-brand" href="#">Dashboard de Resultados</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="box-shadow: none;
            border: none; ">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <button class="btn btn-default  mr-2" id="downloadCsv"  style=" color: white;">Baixar CSV</button>
                    <button class="btn  mr-2" id="downloadExcel" style=" color: white;">Baixar Excel</button>
                    <button class="btn btn-primary" id="downloadPdf" style=" color: white;">Baixar PDF</button>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="stat-value" id="total-revenue">$1,061M</div>
                    <div class="stat-label">Receita Total</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="stat-value" id="new-customers">10,719</div>
                    <div class="stat-label">Novos Clientes</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="stat-value" id="gross-profit">$192.13M</div>
                    <div class="stat-label">Lucro Bruto</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="stat-value" id="customer-satisfaction">93.13%</div>
                    <div class="stat-label">Satisfação do Cliente</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Comparativo de Vendas</h5>
                        <div class="chart-container">
                            <canvas id="salesComparisonChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Vendas por Categoria de Produto</h5>
                        <div class="chart-container">
                            <canvas id="salesByCategoryChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Vendas por Mês</h5>
                        <div class="chart-container">
                            <canvas id="monthlySalesChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Lucro por Região</h5>
                        <div class="chart-container">
                            <canvas id="regionalProfitChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Inicialização dos gráficos usando Chart.js
            const salesComparisonCtx = document.getElementById('salesComparisonChart').getContext('2d');
            const salesByCategoryCtx = document.getElementById('salesByCategoryChart').getContext('2d');
            const monthlySalesCtx = document.getElementById('monthlySalesChart').getContext('2d');
            const regionalProfitCtx = document.getElementById('regionalProfitChart').getContext('2d');

            const salesComparisonChart = new Chart(salesComparisonCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Vendas 2023',
                        data: [100, 200, 300, 400, 500, 600, 700, 800, 900, 1000, 1100, 1200],
                        borderColor: '#4caf50',
                        fill: false
                    }, {
                        label: 'Vendas 2024',
                        data: [150, 250, 350, 450, 550, 650, 750, 850, 950, 1050, 1150, 1250],
                        borderColor: '#2196f3',
                        fill: false
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });

            const salesByCategoryChart = new Chart(salesByCategoryCtx, {
                type: 'pie',
                data: {
                    labels: ['Categoria A', 'Categoria B', 'Categoria C', 'Categoria D'],
                    datasets: [{
                        data: [30, 20, 25, 25],
                        backgroundColor: ['#4caf50', '#ff9800', '#2196f3', '#9c27b0']
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });

            const monthlySalesChart = new Chart(monthlySalesCtx, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Vendas',
                        data: [120, 150, 180, 200, 220, 300, 250, 270, 320, 340, 390, 420],
                        backgroundColor: '#007bff'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });

            const regionalProfitChart = new Chart(regionalProfitCtx, {
                type: 'horizontalBar',
                data: {
                    labels: ['América do Norte', 'Europa', 'Ásia', 'América do Sul'],
                    datasets: [{
                        label: 'Lucro',
                        data: [400, 300, 200, 100],
                        backgroundColor: ['#4caf50', '#ff9800', '#2196f3', '#f44336']
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });
        });
    </script>
</body>
</html>
<!--<iframe src="https://app.powerbi.com/view?r=eyJrIjoiMjA0NTNlNGYtNWUyYy00ODU0LTg2ODAtM2RmYzQ0Y2Y1MTU5IiwidCI6ImIxMDUxYzRiLTNiOTQtNDFhYi05NDQxLWU3M2E3MjM0MmZkZCJ9" frameborder="0" height="600px" width="1500px"></iframe>
