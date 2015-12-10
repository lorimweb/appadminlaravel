<!DOCTYPE HTML>
<html>
	<head>
		<title>LorimWeb - Desenvolvedor Web</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="{{asset('front-end/assets/css/main.css')}}" />
		<link rel="stylesheet" href="{{asset('front-end/assets/css/jquery.fancybox.css')}}" />
		<noscript><link rel="stylesheet" href="{{asset('front-end/assets/css/noscript.css')}}" /></noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>

		<!-- Wrapper-->
			<div id="wrapper">

				<!-- Nav -->
					<nav id="nav">
						<a href="#me" class="icon fa-home active"><span>Home</span></a>
						<a href="#work" class="icon fa-folder"><span>Portfólio</span></a>
						<a href="#contact" class="icon fa-envelope"><span>Contato</span></a>
						<a href="http://www.twitter.com/LorimWeb" target="_blank" class="icon fa-twitter"><span>Twitter</span></a>
						<a href="http://www.facebook.com/LorimWeb" target="_blank" class="icon fa-facebook"><span>Facebook</span></a>
					</nav>

				<!-- Main -->
					<div id="main">

						<!-- Me -->
							<article id="me" class="panel">
								<header>
									<h1>LorimWeb</h1>
									<p>Desenvolvedor Web</p>
									<h5 class="sobre">Tenho 32 anos atualmente estou cursando Analise e Desenvolvimento de Sistema pela Universidade Paulista(UNIP) e sou apaixonado por tecnologia.</p>
								</header>
								<a href="#work" class="jumplink pic">
									<span class="arrow icon fa-chevron-right"><span>Veja meu portfólio</span></span>
									<img src="{{asset('front-end/images/lorimweb.jpg')}}" alt="" />
								</a>
							</article>

						<!-- Work -->
							<article id="work" class="panel">
								<header>
									<h2>Portfólio</h2>
								</header>
								<section>
									<div class="row">
										<div class="4u 12u$(mobile)">
											<a href="{{asset('front-end/images/pic01.jpg')}}" class="image fit portfolio" rel="gallery1" title="Front-end"><img src="{{asset('front-end/images/pic01.jpg')}}" alt=""></a>
											<p class="job">Job: Front-end</p>
											<p class="link"><a href="#">www.yukigabriel.com.br</a></p>
										</div>
										<div class="4u 12u$(mobile)">
											<a href="{{asset('front-end/images/pic02.jpg')}}" class="image fit portfolio" rel="gallery1" title="Front-end"><img src="{{asset('front-end/images/pic02.jpg')}}" alt=""></a>
											<p class="job">Job: Front-end</p>
											<p class="link"><a href="#">www.yukigabriel.com.br</a></p>
										</div>
										<div class="4u$ 12u$(mobile)">
											<a href="{{asset('front-end/images/pic01.jpg')}}" class="image fit portfolio" rel="gallery1" title="Front-end"><img src="{{asset('front-end/images/pic01.jpg')}}" alt=""></a>
											<p class="job">Job: Front-end</p>
											<p class="link"><a href="#">www.yukigabriel.com.br</a></p>
										</div>
									</div>
								</section>
							</article>

						<!-- Contact -->
							<article id="contact" class="panel">
								<header>
									<h2>Entre em contato</h2>
								</header>
								@if(Session::has('message'))
									<div class="alert alert-{{ Session::get('type') }}"><b><i class="icon fa-{{ Session::get('icon') }}"></i> {{ Session::get('message') }}</b></div>
								@endif
								<form action="contato/enviar_msg#contact" method="post">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<div>
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
												<input type="text" name="assunto" placeholder="Assunto" />
												<span class="text-danger">{{($errors->first('assunto') ? $errors->first('assunto') : '')}} </span>
											</div>
											<div class="12u$">
												<textarea name="msg" placeholder="Mensagem" rows="6"></textarea>
												<span class="text-danger">{{($errors->first('msg') ? $errors->first('msg') : '')}} </span>
											</div>
											<div class="12u$">
												<input type="submit" value="Enviar Mensagem" />
											</div>
										</div>
									</div>
								</form>
							</article>

					</div>

				<!-- Footer -->
					<div id="footer">
						<ul class="copyright">
							<li>&copy; {{@date('Y')}} LorimWeb - Desenvolvedor Web.</li>
						</ul>
					</div>

			</div>

		<!-- Scripts -->
			<script src="{{asset('front-end/assets/js/jquery.min.js')}}"></script>
			<script src="{{asset('front-end/assets/js/skel.min.js')}}"></script>
			<script src="{{asset('front-end/assets/js/skel-viewport.min.js')}}"></script>
			<script src="{{asset('front-end/assets/js/util.js')}}"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="{{asset('front-end/assets/js/main.js')}}"></script>
			<script src="{{asset('front-end/assets/js/jquery.fancybox.pack.js')}}"></script>
			<script src="{{asset('front-end/assets/js/jquery.mousewheel-3.0.6.pack.js')}}"></script>
			<script type="text/javascript">
				$(document).ready(function() {
					$(".portfolio").fancybox();
				});
			</script>
	</body>
</html>
