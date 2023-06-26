<?php 
include 'inc/init.inc.php';
include 'inc/head.inc.php';
include 'inc/nav.inc.php'; 
$result_order = executeQuery("SELECT * FROM `order`");
$result_product = executeQuery("SELECT * FROM `products`");
$data = array();
?>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Chiffre d'affaire</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="input-group">
              <span class="input-group-text">
                <i class="bi bi-calendar4"></i>
              </span>
              <select class="form-select">
                <option value="1">January</option>
                <option value="2">February</option>
                <option value="3">March</option>
                <option value="4">May</option>
                <option value="5">June</option>
                <option value="6">July</option>
                <option value="7">August</option>
                <option value="8">September</option>
                <option value="9">October</option>
                <option value="10">November</option>
                <option value="11">December</option><!--ajouter une div pour le CA de l'année en cours -->
              </select>
            </div>    
          </div>
        </div>
        <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
        <h2 class="border-bottom">Transactions</h2>
        <div class="table-responsive table-transactions">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col" class='text-center'>Commandes</th>
                <th scope="col" class='text-center'>Montant</th>
                <th scope="col" class='text-center'>Type de paiement</th>
                <th scope="col" class='text-center'>Date</th>
                <th scope="col" class='text-center'>Référence de la transaction</th>
              </tr>
            </thead>
            <tbody>
            <?php
              while($line_order = $result_order->fetch_assoc())
              {
                echo "<tr>
                        <td class='text-center'>{$line_order['idOrder']}</td>
                        <td class='text-center'>{$line_order['amount']}</td>
                        <td class='text-center'>-</td>
                        <td class='text-center'>{$line_order['dateOrder']}</td>
                        <td class='text-center'>-</td>
                      </tr>";
              }
            ?>
            </tbody>
          </table>
        </div>
        <hr>
        <div class="dashboard-product">
          <div class="d-flex flex-column align-items-center justify-content-center mx-auto">
            <table class="table table-striped-columns">
            <?php
              while($line_product = $result_product->fetch_assoc())
              {
                $result_retailOrder = executeQuery("SELECT `idProduct`, SUM(`quantity`) AS `total_quantity`, SUM(`price` * `quantity`) AS `total_price` FROM `retailOrder` WHERE `idProduct` = {$line_product['idProduct']} GROUP BY `idProduct`");
                if($line_retailOrder = $result_retailOrder->fetch_assoc())
                {
                  $product_data = array('name' => $line_product['name'], 'quantity' => $line_retailOrder['total_quantity'], 'revenue' => $line_retailOrder['total_price']);
                }
                else
                {
                  $product_data = array('name' => $line_product['name'], 'quantity' => 0, 'revenue' => 0);
                }
                $data[] = $product_data;
              }
              foreach($data as $product_data)
              {
                echo "<tr>";
                echo "<td>{$product_data['name']}</td>";
                echo "<td>{$product_data['quantity']} unités vendues</td>";
                echo "<td>{$product_data['revenue']} € de revenues total</td>";
                echo "</tr>";
              }
            ?>
            </table>
          </div>
          <div class="d-flex flex-column align-items-center justify-content-center mx-auto">
              <canvas id="myChart2" width="300" height="300"></canvas>
          </div>
        </div> 
      </main>
    </div>
  </div>
</body>
<script>
(() => {
  'use strict';

  feather.replace({ 'aria-hidden': 'true' });

  const ctx = document.getElementById('myChart');
  const myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: [], 
      datasets: [{
        data: [],
        lineTension: 0,
        backgroundColor: 'transparent',
        borderColor: '#007bff',
        borderWidth: 4,
        pointBackgroundColor: '#007bff'
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: false
          }
        }]
      },
      legend: {
        display: false
      }
    }
  });

  const select = document.querySelector('.form-select');
  select.addEventListener('change', updateChart);
  const currentMonth = new Date().getMonth() + 1; 
  select.value = currentMonth;

  updateChart();

  function updateChart() {
    const selectedMonth = select.value;
    const daysInMonth = getDaysInMonth(selectedMonth);
    const data = generateData(daysInMonth);
    
    myChart.data.labels = data.labels;
    myChart.data.datasets[0].data = data.values;
    myChart.update();
  }

  function getDaysInMonth(month) {
    const monthIndex = parseInt(month) - 1;
    const year = new Date().getFullYear();
    const date = new Date(year, monthIndex, 1);
    const daysInMonth = [];
    
    while (date.getMonth() === monthIndex) {
      daysInMonth.push(date.getDate());
      date.setDate(date.getDate() + 1);
    }
    
    return daysInMonth;
  }

  function generateData(days) {
    const values = [];
    for (let i = 0; i < days.length; i++) {
      values.push(Math.floor(Math.random() * 3000));
    }
    return {
      labels: days.map(String),
      values: values
    };
  }

})();

(() => {
    var ctx = document.getElementById('myChart2').getContext('2d');
    var myChart2 = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: [<?php foreach($data as $product_data){ echo "'" . $product_data['name'] . "', "; } ?>],
            datasets: [{
                label: '# of Votes',
                data: [<?php foreach($data as $product_data){ echo $product_data['quantity'] . ", "; } ?>],
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40', '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: false,
            maintainAspectRatio: false
        }
    });
})();
</script>
</html>
