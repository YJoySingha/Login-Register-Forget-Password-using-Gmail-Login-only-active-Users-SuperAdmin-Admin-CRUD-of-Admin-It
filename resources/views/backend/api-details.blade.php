<!DOCTYPE html>
<html lang="en">
<head>
@include('backend.common.head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  @include('backend.common.navbar')
  <!-- /.navbar -->

  @include('backend.common.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>API Data</h1>
          </div>
          <div class="col-sm-6">
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Geo</th>
                    <th>Phone</th>
                    <th>Company Name</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php  $i=1; ?>
                  @foreach ($jsonData as $apiData)
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $apiData['name'] }}</td>
                    <td>{{ $apiData['email'] }}</td>
                    <td>{{ $apiData['address']['street'] }}</td>
                    <td>{{ $apiData['address']['geo']['lat'] }}</td>
                    <td>{{ $apiData['phone'] }}</td>
                    <td>{{ $apiData['company']['name'] }}</td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('backend.common.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('backend.common.footer-bottom')
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,"pageLength": 5,
    });
  });
</script>
</body>
</html>
