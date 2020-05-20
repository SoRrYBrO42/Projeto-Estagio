<?php include("ligacao.php"); ?>
<html lang="en">
      <?php include('head.php'); ?>
  <body>
    <div class="container">
      <?php include('navbar_dashboard.php'); ?>
      <!-- Row 1 -->
      <div class="row" style="margin-top: 30px">
        <div class="col-sm-3">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title" style="text-align: center;">Total Users</h5>
            </div>
            <div class="card-body">
              <h1 class="card-text" style="text-align: center;color: #297373">1431</h1>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title" style="text-align: center;">Total Orders</h5>
            </div>
            <div class="card-body">
              <h1 class="card-text" style="text-align: center;color: #297373">1431</h1>
            </div>
          </div>
        </div>
         <div class="col-sm-3">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title" style="text-align: center;">Total Categories</h5>
            </div>
            <div class="card-body">
              <h1 class="card-text" style="text-align: center;color: #297373">1431</h1>
            </div>
          </div>
        </div>
         <div class="col-sm-3">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title" style="text-align: center;">Number of Products</h5>
            </div>
            <div class="card-body">
              <h1 class="card-text" style="text-align: center;color: #297373">1431</h1>
            </div>
          </div>
        </div>
      </div>
      <!-- Row 2 -->
      <div class="row" style="margin-top: 30px">
        <div class="col-sm-4">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title" style="text-align: center;">Total Order Value</h5>
            </div>
            <div class="card-body">
              <h1 class="card-text" style="text-align: center;color: #297373">1431</h1>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title" style="text-align: center;">Best Selling Product</h5>
            </div>
            <div class="card-body">
              <h1 class="card-text" style="text-align: center;color: #297373">1431</h1>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title" style="text-align: center;">Repairs Made</h5>
            </div>
            <div class="card-body">
              <h1 class="card-text" style="text-align: center;color: #297373">1431</h1>
            </div>
          </div>
        </div>

        <!-- Tables -->
        <div class="col-sm-12">
          <div class="card"style="margin-top: 30px">
            <div class="card-header">
              <h3 class="panel-title">Latest Orders</h3>
            </div>
            <div class="card-body">
              <table class="table table-hover table-bordered">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                  </tr>
                </tbody>
              </table>
            </div>
        </div>

        </div>

    </div>

  </body>
</html>
