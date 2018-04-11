<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="{{ asset ('plugins/bootstrap/css/bootstrap.css') }}">
  </head>
  <body>
    <div class="content">
    <div class="container">
    <div class="row">
        	<div class="col-md-4 col-md-offset-4">
        	<!-- <?php if(isset($_COOKIE['password_updated'])):?> -->
        		<div class="alert alert-success">
        		<p><i class='glyphicon glyphicon-off'></i> Se ha cambiado la contraseña exitosamente !!</p>
        		<p>Pruebe iniciar sesion con su nueva contraseña.</p>

        		</div>
        	<!-- <?php setcookie("password_updated","",time()-18600);
        	 endif; ?> -->






    <div class="card">
                                  <div class="card-header" data-background-color="green">
                                      <h4 class="title">Acceder a Inventio Lite</h4>
                                  </div>
                    <div class="card-content">

     <form accept-charset="UTF-8" role="form" method="post" action="">
                        <fieldset>
    			    	  	<div class="form-group">
    			    		    <input class="form-control" placeholder="Usuario" name="mail" type="email" required autofocus>
    			    		</div>
    			    		<div class="form-group">
    			    			<input class="form-control" placeholder="Contraseña" name="password" type="password" value="">
    			    		</div>
    			    		<input class="btn btn-lg btn-primary btn-block" type="submit" value="Iniciar Sesion">
    			    	</fieldset>
    			      	</form>

                    </div>
                  </div>




    		</div>
    	</div>
    	</div>
    	</div>

  </body>
</html>
