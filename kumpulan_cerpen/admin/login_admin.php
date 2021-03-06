
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		LOGIN ADMIN
	</title>
	<link rel="icon" href="img/favicon.ico">
	<link href="css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<style>
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: -webkit-box;
            display: flex;
            -ms-flex-align: center;
            -ms-flex-pack: center;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
        }

        .form-signin .checkbox {
            font-weight: 400;
        }

        .form-signin .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }

        .form-signin .form-control:focus {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
</head>
<body class="text-center" style="background: url(img/logologin.jpg) center;">
    <div class="container-fluid">
        <form class="form-signin" method="post" action="verifikasi.php">
            <h1 class="h3 mb-3 font-weight-normal" style="color:#deeaee;opacity: 1;">Please sign in</h1>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="text" id="inputEmail" name="nama" class="form-control" style="opacity: 1;" placeholder="Username" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" name="password" class="form-control" style="opacity: 1;" placeholder="Password" required>

            <button class="btn btn-lg btn-dark btn-block" style="opacity: 1;" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted"></p>
        </form>
    </div>
</body>
</html>