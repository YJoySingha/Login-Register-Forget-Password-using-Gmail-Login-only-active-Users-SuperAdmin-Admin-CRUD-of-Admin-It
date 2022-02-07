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
            <h1>Admin Details</h1>
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
                <table id="example1" class="table table-hover table-striped">
                  <thead>
                  <tr>
                    <th>Sl.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Role</th>
                    <th>Employee Id</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php  $i=1; ?>
                  @foreach ($userData as $adminlist)
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $adminlist['name'] }}</td>
                    <td>{{ $adminlist['email'] }}</td>
                    <td>{{ $adminlist['address'] }}</td>
                    <td>{{ $adminlist['phone'] }}</td>
                    <td>{{ $adminlist['role'] }}</td>
                    <td>{{ $adminlist['employeeId'] }}</td>
                    <td>
                      <div class="btn-group btn-group-toggle" data-toggle="buttons" >
                        <label class="btn btn-secondary" >
                          <input type="radio"  name="status" value="active"  <?php echo ($adminlist['status'] == 'active') ? 'checked' : " " ; ?> onclick="updateStatus(<?php echo $adminlist['id'] ?>)" > Active
                        </label>
                        <label class="btn btn-secondary">
                          <input type="radio"  name="status" value="inactive" <?php  echo ($adminlist['status'] == 'inactive') ? 'checked' : " " ; ?> onclick="updateStatus(<?php echo $adminlist['id'] ?>)" > Blocked
                        </label>
                      </div>
                    </td>
                    <td>
                      <a href="{{url('/admin/edit-admin/'.$adminlist['id'])}}"><button type="button" class="btn btn-block btn-outline-primary btn-xs">Edit</button> </a>
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


<script>
  function updateStatus(adminid) {

  var statusValue = $("input[type='radio'][name='status']:checked").val();
        
  //console.log(adminid);
  //console.log(statusValue);

  $.ajax({
            type:"POST",

            url:"/admin/changeStatusOfAdmin",

            data: { 'status':statusValue, 'id':adminid, _token: '{{csrf_token()}}' },
            dataType: 'JSON',
            success:function(data){

              //console.log('success');

            }
        });
}

</script>

