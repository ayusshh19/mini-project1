<!doctype html>
<html lang="en">
  <head>
  <title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="{{url_for('static',filename='images/icons/favicon.ico')}}"/>
	<link rel="stylesheet" type="text/css" href="{{url_for('static',filename='vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url_for('static',filename='fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url_for('static',filename='vendor/animate/animate.css')}}">	
	<link rel="stylesheet" type="text/css" href="{{url_for('static',filename='vendor/css-hamburgers/hamburgers.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url_for('static',filename='vendor/select2/select2.min.css')}}">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{url_for('static',filename='css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url_for('static',filename='css/main.css')}}">
    <title>Hello, world!</title>
  </head>
  <body>
  {% if errormessage==True %}
  <div class="alert alert-danger alert-dismissible fade show m-0" role="alert">
  <strong>Your password dont match!!!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
    {% endif %}
  <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="{{url_for('static',filename='images/img-01.png')}}" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="/registration" method="post">
					<span class="login100-form-title">
						Register
					</span>
          <div class="wrap-input100 validate-input" data-validate = "Enter valid username">
						<input class="input100" type="text" name="username" placeholder="username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
						{% if errormessage==True %}
						<div id="validationServer04Feedback" class="invalid-feedback">
      						Please select a valid state.
    					</div>
    					{% endif %}
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
						{% if errormessage==True %}
						<div id="validationServer04Feedback" class="invalid-feedback">
      						Please select a valid state.
    					</div>
    					{% endif %}
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
						{% if errormessage==True %}
						<div id="validationServer04Feedback" class="invalid-feedback">
      						Please select a valid state.
    					</div>
    					{% endif %}
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
					{% if errormessage==True %}
						<div id="validationServer04Feedback" class="invalid-feedback">
      						Please select a valid state.
    					</div>
						{% endif %}
						<input class="input100" type="password" name="repass" placeholder="Re-Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
						
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Sign up
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<script src="{{url_for('static',filename='vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{url_for('static',filename='vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{url_for('static',filename='vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{url_for('static',filename='vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{url_for('static',filename='vendor/tilt/tilt.jquery.min.js')}}"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="{{url_for('static',filename='js/main.js')}}"></script> 
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
 </body>
</html>
