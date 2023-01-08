<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Group PHP N20">

    <title>xanut</title>
	<link rel="shortcut icon" href="/uploads/mex.jpg" type="image/jpg">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Font Awesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    
    <!--My style-->
    <link rel="stylesheet" href="/css/mystyle.css">
    <link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.3/dist/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


</head>

    
<body>


<div class="container-fluid bgg sticky-top">
	<div class="container">
		<div class="row text-light py-2">
			<div class="col-md-2 ln">
			<a class="" href="../index.php"><img src="/uploads/mex.jpg" width="50px" alt=""></a>
			</div>
			<div class="col-md-2 ln">
				<a class="social-icons" href="">
					<i class="fab fa-facebook-f"></i>
				</a>
				<a class="social-icons" href="">
					<i class="fab fa-instagram"></i>
				</a>
			</div>
			<div class="col-sm-2">		
				<button class='arm flags leng' type=button value='arm' id="arm"></button>		
				<button class='rus flags leng' type=button value='rus' id="rus"></button>		
				<button class='eng flags leng' type=button value='en' id="eng"></button>
			</div>
			<div class="col-sm-5">
                <?php if(!isset($_SESSION['user_id'])) { ?>
                 <a class="login localization" href="../signup"  caption="grancvel">
					<i class="fas fa-user-alt"></i>
					Գրանցվել
				</a>
				<a class="login localization" href="../login"  caption="mutq" >
					<i class="fas fa-lock"></i>
					Մուտք
				</a>
			</div>
		
		</div>
	</div>
</div>
			<div></div>	
				<?php } else { ?>
				
                <a class="login localization" href="../user/logout" caption="durs">
					<i class="fas fa-unlock"></i>
					Դուրս գալ
				</a>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid bg-light">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-lg navbar-light bg-light">
				 	
					 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					  </button>
					
					 <div class="collapse navbar-collapse" id="navbarNav">
						<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
							<li class="nav-item">
								<a class="nav-link localization " caption="mypage" href="../user/profile">Իմ էջ</a>
							</li>

							<li class="nav-item">
								<a class="nav-link localization " caption="myorder" href="../user/gallery">Իմ պատվերները</a>
							</li>
							<li class="nav-item">
								<a class="nav-link localization " caption="tesakani" href="../user/blog">Տեսականի</a>
							</li>

						

							<li class="nav-item">
								<a class="nav-link localization " caption="products" href="../user/product">Ապրանքներ</a>
							</li>

						</ul>
						<!--<form class="form-inline my-2 my-lg-0 ">
						  <input id="searchInp" class="form-control mr-sm-2" type="search" placeholder="Search By Title" aria-label="Search">
						  <button id="postSearch" class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
						</form>-->
					</div>
					
				</nav>
			</div>
		</div>
	 </div> 
</div>
<?php } ?>
			
		

<div class="container-fluid">
    <div class="row">
    
			




    
    

