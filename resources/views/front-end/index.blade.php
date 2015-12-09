<!DOCTYPE HTML>
<html>
	<head>
		<title>LorimWeb - Web Developer</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="{{asset('assets/front-end/css/main.css')}}" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body>

		<!-- Header -->
			<div id="header">

				<div class="top">

					<!-- Logo -->
						<div id="logo">
							<span class="image avatar60"><img src="{{asset('assets/front-end/images/avatar.jpg')}}" alt="" /></span>
							<h1 id="title">LorimWeb</h1>
							<p>Web Developer</p>
						</div>

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a href="#top" id="top-link" class="skel-layers-ignoreHref"><span class="icon fa-home">Intro</span></a></li>
								<li><a href="#blog" id="portfolio-link" class="skel-layers-ignoreHref"><span class="icon fa-file-text">Blog</span></a></li>
								<li><a href="#about" id="about-link" class="skel-layers-ignoreHref"><span class="icon fa-user">Perfil</span></a></li>
								<li><a href="#contact" id="contact-link" class="skel-layers-ignoreHref"><span class="icon fa-envelope">Contato</span></a></li>
							</ul>
						</nav>

				</div>

				<div class="bottom">

					<!-- Social Icons -->
						<ul class="icons">
							<li><a href="http://www.twitter.com/LorimWeb" target="_blank" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="http://www.facebook.com/LorimWeb" target="_blank" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="https://github.com/lorimweb" target="_blank" class="icon fa-github"><span class="label">Github</span></a></li>
							<li><a href="https://www.linkedin.com/in/lorimweb" target="_blank" class="icon fa-linkedin-square"><span class="label">Dribbble</span></a></li>
							<li><a href="#" class="icon fa-envelope"><span class="label">Email</span></a></li>
						</ul>

				</div>

			</div>

		<!-- Main -->
			<div id="main">

				<!-- Intro -->
					<section id="top" class="one dark cover">
						<div class="container">

							<header>
								<h2 class="alt">Oi! Eu sou <strong>LorimWeb</strong>, a <a href="http://html5up.net/license">free</a> responsive<br />
								site template designed by <a href="http://html5up.net">HTML5 UP</a>.</h2>
								<p>Ligula scelerisque justo sem accumsan diam quis<br />
								vitae natoque dictum sollicitudin elementum.</p>
							</header>

							<footer>
								<a href="#about" class="button scrolly">Perfil</a>
							</footer>

						</div>
					</section>

				<!-- Portfolio -->
					<section id="blog" class="two">
						<div class="container">

							<header>
								<h2>Blog</h2>
							</header>

							<p>Fique atualizado</p>

							<div class="row">
								<div class="4u 12u$(mobile)">
									<article class="item">
										<a href="#" class="image fit"><img src="{{asset('assets/front-end/images/pic02.jpg')}}" alt="" /></a>
										<header>
											<h3>Ipsum Feugiat</h3>
										</header>
									</article>
								</div>
							</div>

						</div>
					</section>

				<!-- About Me -->
					<section id="about" class="three">
						<div class="container">

							<header>
								<h2>Sobre min</h2>
							</header>

							<a href="#" class="image featured"><img src="{{asset('assets/front-end/images/avatar.jpg')}}" alt="" /></a>

							<p>Tincidunt eu elit diam magnis pretium accumsan etiam id urna. Ridiculus
							ultricies curae quis et rhoncus velit. Lobortis elementum aliquet nec vitae
							laoreet eget cubilia quam non etiam odio tincidunt montes. Elementum sem
							parturient nulla quam placerat viverra mauris non cum elit tempus ullamcorper
							dolor. Libero rutrum ut lacinia donec curae mus vel quisque sociis nec
							ornare iaculis.</p>

						</div>
					</section>

				<!-- Contact -->
					<section id="contact" class="four">
						<div class="container">

							<header>
								<h2>Contato</h2>
							</header>

							<p>Elementum sem parturient nulla quam placerat viverra
							mauris non cum elit tempus ullamcorper dolor. Libero rutrum ut lacinia
							donec curae mus. Eleifend id porttitor ac ultricies lobortis sem nunc
							orci ridiculus faucibus a consectetur. Porttitor curae mauris urna mi dolor.</p>
		          @if(Session::has('message'))
		            <div class="alert alert-{{ Session::get('type') }}"><b><i class="icon fa-{{ Session::get('icon') }}"></i> {{ Session::get('message') }}</b><button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon fa-remove"></i></button></div>
		          @endif
							<form method="post" action="contato/enviar_msg#contact">
								<input type="hidden" name="_token" value="{{csrf_token()}}">
								<div class="row">
									<div class="6u 12u$(mobile)">
										<input type="text" name="nome" placeholder="Nome" />
										<span class="text-danger">{{($errors->first('nome') ? $errors->first('nome') : '')}} </span>
									</div>
									<div class="6u$ 12u$(mobile)">
										<input type="text" name="email" placeholder="Email" />
										<span class="text-danger">{{($errors->first('email') ? $errors->first('email') : '')}} </span>
									</div>
									<div class="12u$">
										<textarea name="msg" placeholder="Mensagem"></textarea>
										<span class="text-danger">{{($errors->first('msg') ? $errors->first('msg') : '')}} </span>
									</div>
									<div class="12u$">
										<input type="submit" value="Enviar Mensagem" />
									</div>
								</div>
							</form>

						</div>
					</section>

			</div>

		<!-- Footer -->
			<div id="footer">

				<!-- Copyright -->
					<ul class="copyright">
						<li>&copy; 2015 LorimWeb. Todos os direitos reservados.</li>
					</ul>

			</div>

		<!-- Scripts -->
			<script src="{{asset('assets/front-end/js/jquery.min.js')}}"></script>
			<script src="{{asset('assets/front-end/js/jquery.scrolly.min.js')}}"></script>
			<script src="{{asset('assets/front-end/js/jquery.scrollzer.min.js')}}"></script>
			<script src="{{asset('assets/front-end/js/skel.min.js')}}"></script>
			<script src="{{asset('assets/front-end/js/util.js')}}"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="{{asset('assets/front-end/js/main.js')}}"></script>
			<script type="text/javascript" src="{{asset('assets/js/plugins/bootstrap/bootstrap.min.js')}}"></script>

	</body>
</html>
