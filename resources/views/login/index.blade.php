

<link rel="stylesheet" href="{{asset("assets/$theme/assets/css/bootstrap.min.css")}}" />
<link rel="stylesheet" href="{{asset("assets/$theme/assets/font-awesome/4.5.0/css/font-awesome.min.css")}}" />
<link rel="stylesheet" href="{{asset("assets/$theme/assets/css/fonts.googleapis.com.css")}}" />
<link rel="stylesheet" href="{{asset("assets/$theme/assets/css/ace.min.css")}}" />
<link rel="stylesheet" href="{{asset("assets/$theme/assets/css/ace-rtl.min.css")}}" />
<link rel="stylesheet" href="{{asset("assets/css/estilos.css")}}">
<script src="{{asset("assets/$theme/assets/js/jquery-2.1.4.min.jss")}}"></script>
<!DOCTYPE html>
<html lang="en">
	{{-- class="login-layout blur-login" --}}
	<body class="login-layout" style="background-image: url(http://inv/assets/lte/assets/images/gallery/fon.jpg); width:100%;">
		<img src="" alt="">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h4>
									<div class="space"></div>
									<div class="space"></div>
									<div class="space"></div>
									<div class="row" >
										<div class="col-lg-1">

										</div>
										<div class="col-lg-6" style=" text-align:center">
											<h1>
												<font face="Bernard MT Condensed" style="color: rgb(21, 60, 82)" size="6"><b>LUBRICANTES</b></font>
											</h1>
											<div style="margin:0px auto;">
												<font FACE="Cooper Black" style="color: rgb(7, 90, 105)" size="6"><u>NAIN</u></font>
											</div>
										</div>
										<div class="col-lg-5" style="float: left">
											@php
												$clinica=MyHelper::Datos_Clinica();
											@endphp
											@if($clinica->logo==null)
												<img class="nav-user-photo" style="border-radius: 800px" width="90px" height="90px" src="{{asset("assets/$theme/assets/images/gallery/logo.png")}}" />
											@else
												<img class="nav-user-photo" style="border-radius: 800px" width="90px" height="90px" src="{{Storage::url("datos/fotos/entidad/$clinica->logo")}}" />
											@endif
											&nbsp; &nbsp;
										</div>									 
										
									</div>		
								</h4>
							</div>
							<div class="position-relative" >
								<div id="login-box" class="login-box visible widget-box no-border" style="background-color: rgb(28, 78, 85)">
									<div class="widget-body">
										<div class="widget-main" style="background-image: url(http://inv/assets/lte/assets/images/gallery/fon3.jpg); width:100%;">
											<h4 class="header center" style="color: midnightblue" >
												<b>Sistema de Inventario</b>	
											</h4>
                                            @if (session('status'))
                                                <div class="alert alert-success" role="alert">
                                                    {{ session('status') }}
                                                </div>
                                            @endif
                                            @if ($errors->any())
                                                <div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <div class="alert-text">
                                                        @foreach ($errors->all() as $error)
                                                            <span><li type="square">{{ $error }}<br></li></span>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endif
											@include('mensajes.correcto')
                                            <form action="{{route('login_post')}}" method="POST" autocomplete="off" class="">
                                                @csrf <!--esto es untocken para enviar datos con metodo post-->								
												<div class="form">
													<label class="block clearfix" style="font-weight:bold;">
														<span class="block input-icon input-icon-right">
															<input name="usuario" type="text" value="{{old('usuario')}}" required/>
															<label class="lbl-usuario">
																<span class="txt-usuario"><i class="ace-icon fa fa-user"></i> Usuario</span>
															</label>
														</span>
													</label>
												</div>		
												<div class="form">
													<label class="block clearfix" style="font-weight:bold;">
														<span class="block input-icon input-icon-right">
															<input name="password" type="password" required/>
															<label class="lbl-password">
																<span class="txt-password"><i class="ace-icon fa fa-lock"></i> Contraseña</span>
															</label>															
														</span>
													</label>
												</div>
												<div class="form">
													<div class="clearfix center">
                                                        <button type="submit" class="width-90  btn btn-sm btn-primary" style="border-radius: 0%">
															<i class="ace-icon fa fa-key bigger-110"></i>
															<span class="bigger-110"><b>Iniciar Sesión</b></span>
														</button><br>
													</div>
													<div class="clearfix pull-right">
														<a href="{{route('new_user')}}" data-target="#signup-box" class="user-signup-link" style="color: rgb(16, 6, 71); font-size:11; font-family: Arial Narrow"><b>Nuevo usuario</b></a>
														<i class="ace-icon fa fa-arrow-right" style="color: rgb(16, 6, 71); font-size:11"></i>
													</div>
												</div>
											</form>
										</div><!-- /.widget-main -->
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->
                            </div><!-- /.position-relative -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->
	</body>
</html>