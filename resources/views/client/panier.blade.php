<!DOCTYPE HTML>
<!--
	Aesthetic by gettemplates.co
	Twitter: http://twitter.com/gettemplateco
	URL: http://gettemplates.co
-->
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Love Africa</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by GetTemplates.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="GetTemplates.co" />

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="{{ asset('client/savory/css/animate.css') }}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{ asset('client/savory/css/icomoon.css') }}">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="{{ asset('client/savory/css/themify-icons.css') }}">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{ asset('client/savory/css/bootstrap.css') }}">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{ asset('client/savory/css/magnific-popup.css') }}">

	<!-- Bootstrap DateTimePicker -->
	<link rel="stylesheet" href="{{ asset('client/savory/css/bootstrap-datetimepicker.min.css') }}">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="{{ asset('client/savory/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('client/savory/css/owl.theme.default.min.css') }}">

	<!-- Theme style  -->
	<link rel="stylesheet" href="{{ asset('client/savory/css/style.css') }}">

	<!-- Modernizr JS -->
	<script src="{{ asset('client/savory/js/modernizr-2.6.2.min.js') }}"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<style>
		button:hover{
			background-color: red;
			color: white;
		}
	</style>
	</head>
	<body>
		
	<div class="gtco-loader"></div>
	
	<div id="page">

	
	<!-- <div class="page-inner"> -->
	<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">
			
			<div class="row">
				<div class="col-sm-4 col-xs-12">
					<div id="gtco-logo"><a href="{{ route('client.panel') }}">Love Africa<em>.</em></a></div>
				</div>
				<div class="col-xs-8 text-right menu-1">
					<ul>
						<li><a href="{{ route('client.panel') }}">Retour</a></li>
						<li class="has-dropdown">
							<a href="services.html">Services</a>
							<ul class="dropdown">
								<li><a href="#">Food Catering</a></li>
								<li><a href="#">Wedding Celebration</a></li>
								<li><a href="#">Birthday's Celebration</a></li>
							</ul>
						</li>
						<li><a href="contact.html">Contact</a></li>
						<li class="btn-cta"><a href="#reservation"><span>Reservation</span></a></li>
					</ul>	
				</div>
			</div>
			
		</div>
	</nav>
	
	<header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner" style="background-image: url(../../../public/client/savory/images/love_africa.jpg)" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-left">

				@if($nbre_prod == 0)
					<h4 class=" row row-mt-15em" style="color:white">Votre panier est vide</h4>
				@else
					<div class="row-mt-15em">
						<button class="btn" id="a2">Panier</button> 
						<button id="a3" href="" class="btn"><em>Informations supplémentaires</em></button>
					</div>
					<div class="table-responsive" id="table">
						<table
						id="zero_config"
						class="table table-striped table-bordered"
						>
						<thead>
							<tr>
							<th></th>
							<th>Nom</th>
							<th>Description</th>
							<th>Prix Untaire</th>
							<th>Quantité</th>
							<th>Total</th>
							<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach($produits as $produit)
							<tr>
							<td>
								<img src="{{ asset('images_produit/'.$produit->attributes['picture'])}}" width="50px", height="50px" alt=""></img>
							</td>
							<td>{{$produit->name}}</td>
							<td>{{$produit->attributes['description']}}</td>
							<td>{{number_format($produit->price, 2)}} fr CFA</td>
							<td id="td1">{{$produit->quantity}}</td>
							<td id="td2" style="display: none">
								<form action="{{ route('update_panier.produit', $produit->id) }}" method="POST">
									@csrf
									<input type="number" name="quantity" value="{{$produit->quantity}}">
									<button type="submit" class="btn-primary">ok</button>
								</form>
							</td>
							<td>{{number_format($produit->quantity * $produit->price, 2)}} fr CFA</td>
							<td>
								<button href="" class="btn-secondary ml-3" id="a1">
                                    <i class="icon-edit"></i>
								</button>
								<a href="{{ route('delete_panier.produit', $produit->id) }}" class="btn-danger">
                                    <i class="icon-trash"></i>
                                </a>
							</td>
							</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
							<th></th>
							<th>Nom</th>
							<th>Description</th>
							<th>Prix Untaire</th>
							<th>Quantité</th>
							<th>Total</th>
							<th></th>
							</tr>
						</tfoot>
						</table>
					</div>
				@endif
		</div>
					

		<div class="card" style="color: white;">
				<div style="margin-bottom: 30px; display:none; color:black;" id="supplement" >
					<div class="row mb-6">
						<div class="col-lg-4 col-md-12 text-end">
							
						</div>
						<button class="col-lg-4 col-md-12 text-end" id="a4">
							<span>Je suis au restaurant</span>
						</button>
						<button class="col-lg-4 col-md-12 text-end" id="a5">
							<span>Je suis hors du restaurant</span>
						</button>
					</div>
				</div>
                <div class="card-body">
					<form action="{{ route('client.commande') }}" method="POST">
					@csrf
					<div class="row mb-3 align-items-center" id="prix" style="margin-bottom: 15px; display:none;">
						<div class="col-lg-4 col-md-12 text-end">
						<span>Total de la commande (F CFA)</span>
						</div>
						<div class="col-lg-8 col-md-12">
							<input
								type="number"
								name="prixTotal"
								data-toggle="tooltip"
								title="prix total de la commande"
								class="form-control"
								id="validationDefault05"
								value="{{$prixTotal}}"
								required readonly
							/>
						</div>
					</div>
                  <div class="row mb-3 align-items-center" id="telephone" style="display:none">
                    <div class="col-lg-4 col-md-12 text-end">
                      <span>Numéro de téléphone</span>
                    </div>
                    <div class="col-lg-8 col-md-12">
                      <input
                        type="number"
						name="telephone"
                        class="form-control"
                        placeholder="Saisir ici votre numéro de téléphone"
                        required
                      />
                    </div>
                  </div><hr>
				  <div class="row mb-3 align-items-center" id="num_table" style="display:none">
                    <div class="col-lg-4 col-md-12 text-end">
                      <span>Numéro de table</span>
                    </div>
                    <div class="col-lg-8 col-md-12">
                      <input
                        type="number"
						name="num_table"
                        class="form-control"
                        placeholder="Saisir ici votre numéro de table"
                      />
                    </div>
                  </div>
				  <div class="row mb-3" id="span_exterieur" style="display:none">
				  	<div class="col-lg-6 col-md-12 text-end">
                      <span>Nom du quartier</span>
                    </div>
					<div class="col-lg-6 col-md-12 text-end">
                      <span>Lieu de précision</span>
                    </div>
				  </div>
				  <div class="row mb-3" id="exterieur" style="display:none">
                    <div class="col-lg-6">
                      <input
                        type="text"
						name="quartier"
                        class="form-control"
                        placeholder="Saisir ici votre nom de quartier"
                      />
                    </div>
                    <div class="col-lg-6">
                      <input
                        type="text"
						name="reference"
                        class="form-control"
                        placeholder="Préciser un lieu de référence où vous recvrez le coli"
                      />
                    </div>
                  </div>

				  <div id="commander" style="display: none;">
					<button type="submit" class="btn-primary" style="margin-top: 15px;">
						Commander
					</button>
				  </div>
                  
                </div>
				</form>
              </div>



				</div>
			</div>
		</div>
	</header>



	<footer id="gtco-footer" role="contentinfo" style="background-image: url(images/img_bg_1.jpg)" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row row-pb-md">

				

				
				<div class="col-md-12 text-center">
					<div class="gtco-widget">
						<h3>Get In Touch</h3>
						<ul class="gtco-quick-contact">
							<li><a href="#"><i class="icon-phone"></i> +1 234 567 890</a></li>
							<li><a href="#"><i class="icon-mail2"></i> info@GetTemplates.co</a></li>
							<li><a href="#"><i class="icon-chat"></i> Live Chat</a></li>
						</ul>
					</div>
					<div class="gtco-widget">
						<h3>Get Social</h3>
						<ul class="gtco-social-icons">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
					</div>
				</div>

				<div class="col-md-12 text-center copyright">
					<p><small class="block">&copy; 2016 Free HTML5. All Rights Reserved.</small> 
						<small class="block">Designed by <a href="http://gettemplates.co/" target="_blank">GetTemplates.co</a> Demo Images: <a href="http://unsplash.com/" target="_blank">Unsplash</a></small></p>
				</div>

			</div>

			

		</div>
	</footer>
	<!-- </div> -->

	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script>
		let a1 = document.getElementById("a1");
		let a2 = document.getElementById("a2");
		let a3 = document.getElementById("a3");
		let a4 = document.getElementById("a4");
		let a5 = document.getElementById("a5");

		let td1 = document.getElementById("td1");
		let td2 = document.getElementById("td2");
		let div1 = document.getElementById("table");
		let div2 = document.getElementById("supplement");
		let telephone = document.getElementById("telephone");
		let num_table = document.getElementById("num_table");
		let prix = document.getElementById("prix");
		let span_exterieur = document.getElementById("span_exterieur");
		let exterieur = document.getElementById("exterieur");
		let commander = document.getElementById("commander");

		a1.addEventListener("click", () => {
		if(getComputedStyle(td1).display != "none"){
			td1.style.display = "none";
			td2.style.display = "block";
		} else {
			td1.style.display = "block";
			td2.style.display = "none";
		}
		})

		a2.addEventListener("click", () => {
		if(getComputedStyle(div2).display != "none"){
			div1.style.display = "block";
			div2.style.display = "none";
			prix.style.display = "none";
			telephone.style.display = "none";
			span_exterieur.style.display = "none";
			exterieur.style.display = "none";
			num_table.style.display = "none";
			commander.style.display = "none";
		} else {
			div1.style.display = "block";
			div2.style.display = "none";
			prix.style.display = "none";
			telephone.style.display = "none";
			span_exterieur.style.display = "none";
			exterieur.style.display = "none";
			num_table.style.display = "none";
			commander.style.display = "none";
		}
		})

		a3.addEventListener("click", () => {
		if(getComputedStyle(div1).display != "none"){
			div2.style.display = "block";
			div1.style.display = "none";
		} else {
			div2.style.display = "block";
			div1.style.display = "none";
		}
		})

		a4.addEventListener("click", () => {
		if(getComputedStyle(exterieur).display != "none"){
			prix.style.display = "block";
			telephone.style.display = "block";
			num_table.style.display = "block";
			commander.style.display = "block";

			exterieur.style.display = "none";
			span_exterieur.style.display = "none";
		} else {
			prix.style.display = "block";
			telephone.style.display = "block";
			num_table.style.display = "block";
			commander.style.display = "block";

			exterieur.style.display = "none";
			span_exterieur.style.display = "none";
		}
		})

		a5.addEventListener("click", () => {
		if(getComputedStyle(num_table).display != "none"){
			prix.style.display = "block";
			telephone.style.display = "block";
			exterieur.style.display = "block";
			span_exterieur.style.display = "block";
			commander.style.display = "block";

			num_table.style.display = "none";
		} else {
			prix.style.display = "block";
			telephone.style.display = "block";
			exterieur.style.display = "block";
			span_exterieur.style.display = "block";
			commander.style.display = "block";

			num_table.style.display = "none";
		}
		})
	</script>


	<script src="{{ asset('client/savory/js/jquery.min.js') }}"></script>
	<!-- jQuery Easing -->
	<script src="{{ asset('client/savory/js/jquery.easing.1.3.js') }}"></script>
	<!-- Bootstrap -->
	<script src="{{ asset('client/savory/js/bootstrap.min.js') }}"></script>
	<!-- Waypoints -->
	<script src="{{ asset('client/savory/js/jquery.waypoints.min.js') }}"></script>
	<!-- Carousel -->
	<script src="{{ asset('client/savory/js/owl.carousel.min.js') }}"></script>
	<!-- countTo -->
	<script src="{{ asset('client/savory/js/jquery.countTo.js') }}"></script>

	<!-- Stellar Parallax -->
	<script src="{{ asset('client/savory/js/jquery.stellar.min.js') }}"></script>

	<!-- Magnific Popup -->
	<script src="{{ asset('client/savory/js/jquery.magnific-popup.min.js') }}"></script>
	<script src="{{ asset('client/savory/js/magnific-popup-options.js') }}"></script>
	
	<script src="{{ asset('client/savory/js/moment.min.js') }}"></script>
	<script src="{{ asset('client/savory/js/bootstrap-datetimepicker.min.js') }}"></script>


	<!-- Main -->
	<script src="{{ asset('client/savory/js/main.js') }}"></script>

	</body>
</html>