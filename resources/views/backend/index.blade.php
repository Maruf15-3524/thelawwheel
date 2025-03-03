@extends('layouts.backend')

@section('title', 'Dashboard')

@section('content')
<style>
    .card {
        border: none;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        background: #ffffff;
    }

    .card-header {
        border-bottom: 1px solid #e0e0e0;
        font-weight: bold;
    }

    /* Marquee */
    marquee {
        color: #007bff;
        font-weight: bold;
    }

    /* Widget Styles */
    .wg-chart-default {
        background: #fff;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 20px;
        box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
        text-decoration: none;
        color: inherit;
    }

    /* Icon Background */
    .ic-bg {
        padding: 10px;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5em;
    }

    /* Assign unique colors to each icon */
    .bg-customer { background: #007bff; }
    .bg-supplier { background:  #809BCE; }
    .bg-stockamount { background:  #502F4C;}
    .bg-product { background: #28a745; }
    .bg-stock { background: #ffc107; }
    .bg-orders { background: #17a2b8; }
    .bg-today-orders { background: #8e44ad; }
    .bg-category { background: #ff6347; }
    .bg-income { background: #dc3545; }
    .bg-today-income { background: #25d012; }

    .body-text {
        font-size: 14px;
        color: #666;
    }

    h4 {
        font-size: 24px;
        font-weight: bold;
    }

    /* Responsive Flex Layout */
    .tf-section-2 {
        display: flex;
        flex-wrap: wrap;
        gap: 16px;
    }
    .text{
        text-align: center;
    }

    /* Default: 1 widget per row */
    .widget {
        flex: 1 1 100%;
    }
    #profitLossChart {
    max-height: 300px;
    width: 100%;
    }
    /* Tablet: 2 widgets per row */
    @media (min-width: 576px) {
        .widget {
            flex: 0 0 48%;
        }
    }

    /* Desktop: 5 widgets per row */
    @media (min-width: 1200px) {
        .widget {
            flex: 0 0 18%;
        }
    }

    .container-fluid {
    margin: 0 !important;
    padding: 0 !important;
    overflow-x: hidden !important;
    }
.tf-section-2 {
    display: flex;
    flex-wrap: wrap;
    gap: 16px;
    justify-content: center; /* Ensure widgets stay within the container */
    overflow: hidden;
}
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="tf-section-2 mb-30">

                            <a href="" class="widget">
                                <div class="wg-chart-default">
                                    <div class="flex items-center gap-2">
                                        <div class="ic-bg bg-customer">
                                            <i class="fas fa-users"></i>
                                        </div>
                                        <div>
                                            <div class="body-text mb-2 text">Total Customers</div>
                                            <h4 class="text"></h4>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            
                      


                        
                        <a href="" class="widget">
                            <div class="wg-chart-default">
                                <div class="flex items-center gap-2">
                                    <div class="ic-bg bg-category">
                                        <i class="fas fa-layer-group"></i>
                                    </div>
                                    <div>
                                        <div class="body-text mb-2 text">Total Category</div>
                                        <h4 class="text"></h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                       
                       

                        <a href="" class="widget">
                            <div class="wg-chart-default">
                                <div class="flex items-center gap-2">
                                    <div class="ic-bg bg-product">
                                        <i class="fas fa-boxes"></i>
                                    </div>
                                    <div>
                                        <div class="body-text mb-2 text">Total Product</div>
                                        <h4 class="text"></h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                       
                      
                       
                        <a href="" class="widget">
                            <div class="wg-chart-default">
                                <div class="flex items-center gap-2">
                                    <div class="ic-bg bg-stock">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </div>
                                    <div>
                                        <div class="body-text mb-2 text">Low Stock Product</div>
                                        <h4 class="text"></h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                      
                       
                       
                        <a href="" class="widget">
                            <div class="wg-chart-default">
                                <div class="flex items-center gap-2">
                                    <div class="ic-bg bg-today-orders">
                                        <i class="fas fa-calendar-check"></i>
                                    </div>
                                    <div>
                                        <div class="body-text mb-2 text">Today Orders</div>
                                        <h4 class="text"></h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                       
                       
                     
                        <a href="" class="widget">
                       <div class="wg-chart-default">
                        <div class="ic-bg bg-orders">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div>
                        <div class="body-text mb-2 text">Total Orders</div>
                            <h4 class="text"></h4>
                        </div>
                    </div>
                </a>
               
                
            


                        <a href="" class="widget">
                            <div class="wg-chart-default">
                                <div class="flex items-center gap-2">
                                    <div class="ic-bg bg-today-income">
                                        <i class="fas fa-dollar-sign"></i>
                                    </div>
                                    <div>
                                        <div class="body-text mb-2 text">Today Income</div>
                                        <h4 class="text"></h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                        
                     
                       
                        
                        <a href="" class="widget">
                            <div class="wg-chart-default">
                                <div class="flex items-center gap-2">
                                    <div class="ic-bg bg-stockamount">
                                        <i class="fas fa-comment-dollar"></i>
                                    </div>
                                    <div>
                                        <div class="body-text mb-2 text">Total Stock Amount</div>
                                        <h4 class="text"></h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                       
                        
                        
                     

                        <a href="" class="widget">
                            <div class="wg-chart-default">
                                <div class="flex items-center gap-2">
                                    <div class="ic-bg bg-income">
                                        <i class="fas fa-coins"></i>
                                    </div>
                                    <div>
                                        <div class="body-text mb-2 text">Total Income</div>
                                        <h4 class="text"></h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                     
                        
                        
                    </div>
                </div>
            </div>
            

            <div class="row mt-4">
        <div class="col-md-6">
            <div class="card text-center">
                <h3>Last 7 Days Sales (Products)</h3>
                <canvas id="salesChart" height="300"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-center">
                <h3>Profit Loss Pie Chart</h3>
                <canvas id="profitLossChart" height="200"></canvas>
            </div>
        </div>
    </div>
        </div>
    </div>
</div> 





<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Sales Chart
    const salesCtx = document.getElementById('salesChart').getContext('2d');
new Chart(salesCtx, {
    type: 'bar',
    data: {
        labels: ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5', 'Day 6', 'Day 7'], // Placeholder dates
        datasets: [{
            label: 'Sales (Last 7 Days)',
            data: [100, 200, 150, 300, 250, 180, 220], // Placeholder sales data
            backgroundColor: [
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(153, 102, 255, 0.8)',
                'rgba(255, 159, 64, 0.8)',
                'rgba(99, 255, 132, 0.8)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(99, 255, 132, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: true,
            },
        },
        scales: {
            x: {
                title: {
                    display: true,
                    text: 'Date'
                },
            },
            y: {
                title: {
                    display: true,
                    text: 'Sales Amount'
                },
                beginAtZero: true
            }
        }
    }
});



    // Profit Loss Pie Chart
    const profitCtx = document.getElementById('profitLossChart').getContext('2d');
    new Chart(profitCtx, {
        type: 'pie',
        data: {
            labels: ['Profit', 'Loss'],
            datasets: [{
                data: [70, 30],
                backgroundColor: ['rgba(75, 192, 192, 0.5)', 'rgba(255, 99, 132, 0.5)']
            }]
        },
        options: {
            responsive: true
        }
    });
</script>
</div>
@endsection