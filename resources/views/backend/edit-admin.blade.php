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

  <!-- Main Sidebar Container -->
  @include('backend.common.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Admin</h1>
          </div>
          <div class="col-sm-6">
          </div> 
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-2">
          
        </div>
        <div class="col-md-8">

        @if (session('status'))
        <div class="alert alert-success" role="alert">
          <button type="button" class="close" data-dismiss="alert">×</button>
          {{ session('status') }}
        </div>
        @elseif(session('failed'))
        <div class="alert alert-danger" role="alert">
          <button type="button" class="close" data-dismiss="alert">×</button>
          {{ session('failed') }}
        </div>
        @endif

          <div class="card card-outline card-info">
            <form action="{{url('/admin/update-admin/'. $user['id'] )}}" method="post">
            {{ csrf_field() }}
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Admin Name</label>
                  <input type="text" class="form-control" name="name" value="{{ $user['name']  }}" placeholder="Enter email">
                  @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                  @endif
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Phone</label>
                  <input type="text" class="form-control" name="phone" value="{{ $user['phone']  }}" placeholder="Password">
                  @if ($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                  @endif
                </div>
               
                <div class="form-group">
                  <label for="exampleInputPassword1">Email-Id</label>
                  <input type="text" class="form-control" name="email" value="{{ $user['email']  }}" placeholder="Password">
                  @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                  @endif
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" name="password" value="{{ $user['password']  }}" placeholder="Password">
                  @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                  @endif
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Address</label>
                  <textarea class="form-control" rows="3" name="address">{{ $user['address'] }}</textarea>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                    <label for="exampleInputPassword1">Role</label>
                          <select class="form-control" name="role">
                            <option value="sadmin" <?php echo ($user['role']=='sadmin') ? 'selected' : '' ?>> Super Admin</option>
                            <option value="admin" <?php echo ($user['role']=='admin') ? 'selected' : '' ?> > Admin</option>
                          </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                    <label for="exampleInputPassword1">Employee Id Auto-generate</label>
                    <input type="text" class="form-control" value="{{ $user['employeeId']  }}" placeholder="Auto-generation-ID" readonly>
                    </div>
                  </div>
                </div>

              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>

          </div>
        </div>
        <div class="col-md-2"></div>
        <!-- /.col-->
      </div>
      <!-- ./row -->

      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('backend.common.footer');

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('backend.common.footer-bottom')

</body>
</html>
