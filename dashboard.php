<?php include 'inc/init.inc.php'; ?>
<?php include 'inc/head.inc.php'; ?>
<?php include 'inc/nav.inc.php'; ?>

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">  
    <h1 class="h2">Chiffre d'affaire</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="input-group">
        <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar4"></i></span>
        <select class="form-select" aria-label="Default select example">
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
          <option value="11">December</option>
        </select>
      </div>    
    </div>
  </div>

  <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

  <h2 class="border-bottom">Transactions</h2>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">Commandes</th>
          <th scope="col">Montant</th>
          <th scope="col">Type de paiement</th>
          <th scope="col">Date</th>
          <th scope="col">Référence de la transaction</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>00,00€</td>
          <td>Paypal</td>
          <td>00/00/0000 00:00</td>
          <td>ABCD1234</td>
        </tr>
        <tr>
          <td>2</td>
          <td>00,00€</td>
          <td>Visa</td>
          <td>00/00/0000 00:00</td>
          <td>ABCD1234</td>
        </tr>
        <tr>
          <td>3</td>
          <td>00,00€</td>
          <td>Mastercard</td>
          <td>00/00/0000 00:00</td>
          <td>ABCD1234</td>
        </tr>
        <tr>
          <td>4</td>
          <td>00,00€</td>
          <td>Visa</td>
          <td>00/00/0000 00:00</td>
          <td>ABCD1234</td>
        </tr>
      </tbody>
    </table>
  </div>

  <hr>

  <div class="dashboard-product">
    <div class="d-flex flex-column align-items-center justify-content-center mx-auto">
      <table class="table table-striped-columns">
        <tr>
          <td>Nom du produit 1</td>
          <td>0 ventes</td>
          <td>00,00€ total</td>
        </tr>
        <tr>
          <td>Nom du produit 2</td>
          <td>0 ventes</td>
          <td>00,00€ total</td>
        </tr>
        <tr>
          <td>Nom du produit 3</td>
          <td>0 ventes</td>
          <td>00,00€ total</td>
        </tr>
        <tr>
          <td>Nom du produit 4</td>
          <td>0 ventes</td>
          <td>00,00€ total</td>
        </tr>
        <tr>
          <td>Nom du produit 5</td>
          <td>0 ventes</td>
          <td>00,00€ total</td>
        </tr>
        <tr>
          <td>Nom du produit 6</td>
          <td>0 ventes</td>
          <td>00,00€ total</td>
        </tr>
        <tr>
          <td>Nom du produit 7</td>
          <td>0 ventes</td>
          <td>00,00€ total</td>
        </tr>
        <tr>
          <td>Nom du produit 8</td>
          <td>0 ventes</td>
          <td>00,00€ total</td>
        </tr>
        <tr>
          <td>Nom du produit 9</td>
          <td>0 ventes</td>
          <td>00,00€ total</td>
        </tr>
        <tr>
          <td>Nom du produit 10</td>
          <td>0 ventes</td>
          <td>00,00€ total</td>
        </tr>
        <tr>
          <td>Nom du produit 11</td>
          <td>0 ventes</td>
          <td>00,00€ total</td>
        </tr>
        <tr>
          <td>Nom du produit 12</td>
          <td>0 ventes</td>
          <td>00,00€ total</td>
        </tr>
        <tr>
          <td>Nom du produit 13</td>
          <td>0 ventes</td>
          <td>00,00€ total</td>
        </tr>
        <tr>
          <td>Nom du produit 14</td>
          <td>0 ventes</td>
          <td>00,00€ total</td>
        </tr>
      </table>
    </div>
    <div class="d-flex flex-column align-items-center justify-content-center mx-auto">
      <canvas id="myChart2" width="400" height="400"></canvas>
    </div>
  </div> 
</main>
</div>
</div>
<script>
//diagramme 1
(() => {
  'use strict'

  feather.replace({ 'aria-hidden': 'true' })

  const ctx = document.getElementById('myChart')
  const myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: [
        '1',
        '2',
        '3',
        '4',
        '5',
        '6',
        '7',
        '8',
        '9',
        '10',
        '11',
        '12',
        '13',
        '14',
        '15',
        '16',
        '17',
        '18',
        '19',
        '20',
        '21',
        '22',
        '23',
        '24',
        '25',
        '26',
        '27',
        '28',
        '29',
        '30',
        '31'
      ],
      datasets: [{
        data: [
          1000,
          1400,
          1848,
          2003,
          2349,
          2492,
          1234,
          700,
          400,
          848,
          2203,
          349,
          492,
          1234,
          1200,
          430,
          898,
          223,
          2349,
          2492,
          1234,
          1000,
          1400,
          1848,
          203,
          2349,
          492,
          234,
          989,
          2798,
          3000
        ],
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
  })
})()

// diagramme 2
var ctx = document.getElementById('myChart2').getContext('2d');
var myChart2 = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Nom du produit 1', 'Nom du produit 2', 'Nom du produit 3', 'Nom du produit 4', 'Nom du produit 5', 'Nom du produit 6', 'Nom du produit 7', 'Nom du produit 8', 'Nom du produit 9', 'Nom du produit 10', 'Nom du produit 11', 'Nom du produit 12', 'Nom du produit 13', 'Nom du produit 14'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3, 7, 9, 12, 8, 14, 6, 1, 4],
            backgroundColor: [
                'rgba(255, 99, 132, 0.6)',
                'rgba(54, 162, 235, 0.6)',
                'rgba(255, 206, 86, 0.6)',
                'rgba(75, 192, 192, 0.6)',
                'rgba(153, 102, 255, 0.6)',
                'rgba(255, 159, 64, 0.6)',
                'rgba(255, 99, 132, 0.6)',
                'rgba(54, 162, 235, 0.6)',
                'rgba(255, 206, 86, 0.6)',
                'rgba(75, 192, 192, 0.6)',
                'rgba(153, 102, 255, 0.6)',
                'rgba(255, 159, 64, 0.6)',
                'rgba(255, 99, 132, 0.6)',
                'rgba(54, 162, 235, 0.6)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: false,
        maintainAspectRatio: false
    }
});
</script>
</body>
</html>