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
            <h1>Item Details</h1>
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
                    <th>Description</th>
                    <th>Price</th>
                    <th>Unique Item-ID</th>
                    <th>Stock</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php  $i=1; ?>
                  @foreach ($itemsData as $itemlist)
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $itemlist['name'] }}</td>
                    <td>{{ $itemlist['description'] }}</td>
                    <td>{{ $itemlist['price'] }}</td>
                    <td>{{ $itemlist['itemUniqueId'] }}</td>
                    <td class="<?php echo ($itemlist['stock'] <= '10') ? "outOfStockClass" : "" ; ?>">
                    
                    {{ $itemlist['stock'] }}</td>
                    <th>{{ $itemlist['status'] }}</th>
                    <td>
                      <a href="{{url('/admin/edit-item/'.$itemlist['id'])}}"><button type="button" class="btn btn-block btn-outline-primary btn-xs">Edit</button> </a>
                    </td>
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
     "lengthChange": false, "autoWidth": true,"pageLength": 5, "scrollX": true,
    });
  });
</script>
</body>
</html>

<style>
  .outOfStockClass{
    color:red;
  }

</style>