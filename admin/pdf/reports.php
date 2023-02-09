



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css" integrity="sha512-YFENbnqHbCRmJt5d+9lHimyEMt8LKSNTMLSaHjvsclnZGICeY/0KYEeiHwD1Ux4Tcao0h60tdcMv+0GljvWyHg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../src/css/preloader.css">
  <title>Report</title>
</head>
<style>
  .focus {
    border: none;
  }

  body {
    overflow-x: hidden;
  }

  .active {
    background: rgba(255, 255, 255, 0.3) !important;
  }
</style>

<body>
  <div class="preload-wrapper">
    <div class="spinner-border text-info" role="status">
      <span class="visually-hidden">Loading...</span>
    </div>
  </div>
  <main class="d-flex">
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 250px; min-height: 100vh;">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <img src="../src/img/dilg.png" height="80" alt="">
        <span class="fs-4 ps-3">DILG</span>
      </a>
      <hr>
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="index.php" class="nav-link text-white">
            <i class="bi bi-house-door me-2"></i>
            Home
          </a>
        </li>
        <li>
          <a href="add-report.php" class="nav-link text-white">
            <i class="bi bi-clipboard me-2"></i>
            New Report
          </a>
        </li>
        <li>
          <a href="reports.php" class="nav-link text-white active" aria-current="page">
            <i class="bi bi-book-half me-2"></i>
            View Reports
          </a>
        </li>
        <li>
          <a href="draft.php" class="nav-link text-white">
            <i class="bi bi-archive me-2"></i>
            Drafts
          </a>
        </li>
        <li>
          <a href="ranking.php" class="nav-link text-white">
            <i class="bi bi-award me-2"></i>
            Ranking
          </a>
        </li>
      </ul>
      <hr>
      <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="admins/speed test.PNG" alt="" width="32" height="32" class="rounded-circle me-2">
          Josiah Aiko        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
          <li><a class="dropdown-item" href="profile.php">Profile</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
        </ul>
      </div>
    </div>
    <div class="container-fluid p-0">
      <nav class="navbar bg-dark navbar-dark">
        <div class="container">
          <a class="navbar-brand ms-auto" href="#"><i class="bi bi-bell-fill"></i></a>
        </div>
      </nav>
      <div class="row mt-4">
        <div class="col-lg-4">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link text-secondary" href="daily.php">Daily</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-secondary" href="weekly.php">Weekly</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-secondary" href="monthly.php">Monthly</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-secondary" href="semi-anual.php">Semi-Annual</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-secondary" href="annualy.php">Annual</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-8">
          <div class="card shadow py-0 mx-4" style="border: none; border-radius: 0; min-height: 35rem;">
            <table class="table table-bordered table-hover" id="data">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>From</th>
                  <th>Subject</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                
                    <tr class="clickable-row" data-href="view-reports.php?rid=3l5tO8ddbtQ=" style="cursor:pointer;">
                      <td>1</td>
                      <td>dj123@dilg.com</td>
                      <td>jklasfhsdljk</td>
                      <td><p class='text-warning'> Incomplete </p> </td>                      <td>
                        <a class='text-danger text-decoration-none' href="delete-reports.php?rid=3l5tO8ddbtQ=" onClick="return confirm('Delete This report?')">Delete</a>
                      </td>
                    </tr>



                
                    <tr class="clickable-row" data-href="view-reports.php?rid=3l5tO8ddbtU=" style="cursor:pointer;">
                      <td>2</td>
                      <td>dj123@dilg.com</td>
                      <td>haha</td>
                      <td> <p class='text-success'> Complete </p> </td>                      <td>
                        <a class='text-danger text-decoration-none' href="delete-reports.php?rid=3l5tO8ddbtU=" onClick="return confirm('Delete This report?')">Delete</a>
                      </td>
                    </tr>



                              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

  <script src=" ../src/js/jquery-3.6.1.min.js"></script>

  <script src="../src/js/table.click.js"></script>
  <script src="../src/js/preload.js"></script>
</body>

</html>