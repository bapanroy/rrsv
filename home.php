<?php
// echo $_SERVER['HTTP_REFERER'];
// die();
include('include/header.php');
?>

<!DOCTYPE html>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 col-xl-6 grid-margin stretch-card">
              <div class="row w-100 flex-grow">
                <div class="col-md-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <p class="card-title">Student Audience Metrics</p>
                      <p class="text-muted">25% more traffic than previous week</p>
                      <div class="row mb-3">
                        <div class="col-md-7">
                          <div class="d-flex justify-content-between traffic-status">
                            <div class="item">
                              <p class="mb-">Total Student</p>
                              <h5 class="font-weight-bold mb-0">93,956</h5>
                              <div class="color-border"></div>
                            </div
                          </div>
                        </div>
                       
                      </div>
                      <canvas id="audience-chart"></canvas>
                    </div>
                  </div>
                </div>
                
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                      <p class="card-title">Student payment collection</p>
                    <div class="row mb-3">
                        <div class="col-md-7">
                            <div class="d-flex justify-content-between traffic-status">
                                <div class="item">
                                    <p class="mb-">Total Income</p>
                                    <h5 class="font-weight-bold mb-0">100</h5>
                                    <div class="color-border"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <canvas id="balance-chart"></canvas>
                </div>
            </div>
        </div>
                
            </div>
          </div>
          
          <!-- row end -->
          
          <!-- row end -->
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:./partials/_footer.html -->
         <?php
include('include/footer.php');
?>
        