<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>ternakin</title>
	<meta name="viewport" content="width=device-width, initial-scale=10">
	<link rel="stylesheet" href="css/style.css">
	<link href='logo.png' style="width: 32px;height: 32px;" rel='shortcut icon'>

</head>

<body>
	<header>
		<img src="img/logo-horizontal.png" style="width: 200px; height: 70px;">
	</header>
	
	<nav id="navigation-menu">
		<ul>
			<li><a href="#section-1">Beranda</a></li>
			<li><a href="#section-2">Informasi</a></li>
			<li><a href="#section-3">Tentang Kita</a></li>
			<li><a href="{{url('login')}}">Masuk</a></li>
		</ul>
	</nav>
	
	<div id="content">
		<section id="section-1">			
			<div class="content">

				<h3>TERNAKLAH</h3>
				<h3>DAN</h3>
				<h3>DAPATLAH HASIL YANG MENGUNTUNGKAN</h3>	
				
				<img src="img/diskusi.png" style="	width: 50%;
				height: 30%px; margin-left: 49%; margin-top: -220px;">
			</div>
			<div id= "kotaku">
				<a href="{{url('register')}}">DAFTAR SEKARANG!!!</a>
			</div>

		</section>
		<section id="section-2">
			<div class="content">
				<div id="atasbg"> Fokus Pada</div>
				<div id="bawahbg"></div>
				<div id="tengahbg">
					<div id="kotakin1" class="kotakin">
						<div id="hkotak">
							<img src="img/pendidikan.png" />
							<div class="ket">
								<b>Pendidikan</b><br />
								Permasalahan yang terjadi maupun usulan ide terkait dunia pendidikan 
							</div>
						</div>
						<div id="ikotak"><center>Pendidikan</center></div>
					</div>
					<div id="kotakin2" class="kotakin">
						<div id="hkotak">
							<img src="img/sosial.png" />
							<div class="ket">
								<b>Sosial</b><br />
								Permasalahan sosial yang terjadi terkait lingkungan sosial
							</div>
						</div>
						<div id="ikotak"><center>Sosial</center></div>
					</div>
					<div id="kotakin3" class="kotakin">
						<div id="hkotak">
							<img src="img/pariwisata.png" />
							<div class="ket">
								<b>Pariwiasata</b><br />
								Pengembangan potensi wisata yang ada di lingkungan komunitas
							</div>
						</div><div id="ikotak"><center>Pariwisata</center></div>
					</div>

				</div>			
			</div>
		</section>
		<section id="section-3">
			<div class="content">
				<div id="atasbg1"><img src="logo.png"></div>
				<div id="bawahbg1"></div>
				<div id="tgh">KaryaMuda adalah sosial media berbasis platform web, dimana menjadi wadah ide dan karya inovatif mahasiswa dan menghubungkan para mahasiswa untuk berkontribusi mengembangkan daerah asalnya.</div>
			</div>
		</section>
		<footer>Copyright &copy; GEMASTIK UNEJ 2017 | LAN TEAM PSSI</footer>
	</div>
	

	
	<!-- Google CDN jQuery -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	
	<!-- Page Scroll plugin -->
	<script src="jquery.PageScroll2id.js"></script>
	
	<script>
		(function($){
			$(window).load(function(){
				$("#navigation-menu a,a[href='#top'],a[rel='m_PageScroll2id']").mPageScroll2id({
					highlightSelector:"#navigation-menu a"
				});

				$("a[rel='next']").click(function(e){
					e.preventDefault();
					var to=$(this).parent().parent("section").next().attr("id");
					$.mPageScroll2id("scrollTo",to);
				});				
			});
		})(jQuery);
	</script>
</body>
</html>