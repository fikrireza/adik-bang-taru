<!DOCTYPE html>
<html lang="en">
<head>
  <title>Matrix Admin</title><meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="{{asset('theme/css/bootstrap.min.css')}}" />
	<link rel="stylesheet" href="{{asset('theme/css/bootstrap-responsive.min.css')}}" />
  <link rel="stylesheet" href="{{asset('theme/css/matrix-login.css')}}" />
  <link href="{{asset('theme/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
    <body>
        <div id="loginbox">
            <form id="loginform" class="form-vertical" action="{{url('authenticate')}}" method="post">
			          <div class="control-group normal_text">
                  <h3><img src="{{asset('theme/img/logo3.png')}}" alt="Logo" /></h3>
                  {{-- <h3 style="margin-bottom:0px;">ADIK BANG TARU</h3> --}}
                  Aplikasi Data dan Informasi Keuangan dan Bangunan
                  <br><span style="font-size:10px;">Dinas Tata Ruang dan Bangunan, Kabupaten Tangerang.</span>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            {{ csrf_field() }}
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" placeholder="Email" name="email"/>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" placeholder="Password" name="password"/>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                  <center>
                    <input type="reset" class="btn btn-danger" value="Reset">
                    <input type="submit" class="btn btn-success" value="Login">
                  </center>
                </div>
            </form>
        </div>
    </body>
</html>
