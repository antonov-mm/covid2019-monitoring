<?
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Онлайн статистика распространения коронавируса (COVID-19) в мире и России">
        <meta name="author" content="antonov.m&m">
        <link rel="image_src" href="/assets/home.png">
        <title>Статистика распространения коронавируса в мире на сегодня.</title>
        <link rel="icon" sizes="16x16 24x24 32x32 48x48 64x64" href="/assets/favicon.png">
        <link rel="stylesheet" href="assets/css/theme.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
	<body class="d-flex flex-column h-100 container-fluid">
		<style id="inverter" media="none">
		  .bg-dark{background-color:black!important; }
		  .button {filter: invert(100%);}
		  .footer-invert{background-color: black!important;}
		  .main-inver{filter: invert(100%);}
		  .row-invert{filter: invert(100%);}
		  body {background: #343a40!important; }
		  .thead-dark th{filter: invert(100%);}
		  .thead-dark tr{filter: invert(100%);}
		  .thead-dark{filter: invert(100%);}
		  .table{filter: invert(100%); color:white;}
		</style>
		<header>	
			<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
			  <a class="navbar-brand" href="#">КОРОНАВИРУС-2019.РФ</a>
			  <label class="checkbox">
				  <input type="checkbox" id="themer"/>
				  <span></span>
			  </label> 
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarText">
			    <ul class="navbar-nav mr-auto">
			      <li class="nav-item active">
			        <a class="nav-link" href="https://коронавирус-2019.рф/">Главная</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="https://коронавирус-2019.рф/Russia/">РОССИЯ</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="https://коронавирус-2019.рф/news/">НОВОСТИ</a>
			      </li>
			    </ul>
			    <span class="navbar-text">
			      Почта: contact@коронавирус-2019.рф
			    </span>
			  </div>
			</nav>
		</header>
		<main role="main" class="flex-shrink-0">
			
			<br>
			<div class="container-fluid">
				<div class="row row-invert">
				    <div class="col-md-8">
				      	<h1 class="mt-5">Статистика распространения коронавируса<br> в мире и России на сегодня.</h1><br>
						<? selectINFO($connect); ?>
						<div class="alert alert-info align-items-center py-2 px-3" role="alert">
							<samp><b>* Обновление данных происходит 1(один) раз в ЧАС..</b></samp>
						</div>
				    </div>
				    <div class="col-md-4">
				    	<h1 class="mt-5">Новости сайта</h1><br>
				    	<div class="card">
						  <h5 class="card-header"><? echo ru_date(date("d M y"),1); ?></h5>
						  <div class="card-body">
						    <? echo $news->selectNews($connect); ?>
						  </div>
						</div>
				    </div>
				</div>
				<div class="row row-invert">
					<div class="col-md-6">
						<div class="card">
						  <div class="card-body">
						    <h3 class="card-title text-center">Симптомы коронавируса</h3>
						    <p>Инкубационный период коронавируса Covid-19 может продолжаться более двух недель. Более продолжительные сроки инкубационного периода могут быть характерны при передаче вируса от животных.</p>
							<p>Симптомы коронавируса Covid-19 схожи с симптомами пневмонии или тяжёлого острого респираторного синдрома:</p>
						    <p class="card-text">
								<ul>
									<li>Потеря сознания (в результате прогрессирующего разрушения лёгочных тканей),</li>
									<li>Сухой, непродуктивный кашель,</li><li>Лихорадка и повышение температуры (38 °С или выше, озноб),</li>
									<li>Затруднения при дыхании,</li>
									<li>Боли в области груди,</li>
									<li>Головная боль,</li>
									<li>Боль в мышцах,</li>
									<li>Общее недомогание.</li>
								</ul>
							</p>
						  </div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="card">
						  <div class="card-body">
						    <h3 class="card-title text-center">Меры профилактики коронавируса</h3>
						    <p class="card-text">
						    	<ul class="">
									<li>Часто мойте руки с мылом - не менее 20 секунд</li>
									<li>Не касайтесь грязными руками глаз, рта и слизистых</li>
									<li>Избегайте тесного контакта с зараженными людьми</li>
									<li>Почаще делайте влажную уборку с использованием дезинфицирующих средств</li>
									<li>Уточняйте эпидемиологическую обстановку при планировании путешествия</li>
									<li>Используйте маски для защиты органов дыхания</li>
									<li>При первых признаках заболевания обратитесь за медицинской помощью в лечебные организации</li>
								</ul>
							</p>
						  </div>
						</div>
					</div>
				</div>
			</div>
		</main><br>
		<footer class="footer footer-invert">
		  	<div class="container">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
					<p>
						<p class="liveinternet">
							<!--LiveInternet counter--><script type="text/javascript">
							document.write('<a href="//www.liveinternet.ru/click" '+
							'target="_blank"><img src="//counter.yadro.ru/hit?t28.20;r'+
							escape(document.referrer)+((typeof(screen)=='undefined')?'':
							';s'+screen.width+'*'+screen.height+'*'+(screen.colorDepth?
							screen.colorDepth:screen.pixelDepth))+';u'+escape(document.URL)+
							';h'+escape(document.title.substring(0,150))+';'+Math.random()+
							'" alt="" title="LiveInternet: показано количество просмотров и'+
							' посетителей" '+
							'border="0" width="88" height="120"><\/a>')
							</script><!--/LiveInternet-->
						</p>
						&copy; <? echo date('Y');?> коронавирус-2019.рф. 
						Разработано <a href="https://vk.com/mm.antonov">antonov.m&m</a>. 
						<p>Данные взяты с <a href="https://thevirustracker.com"><b>Coronavirus Tracker</b></a></p>
					</p>		
				</div>
				</hr>
			</div>	
				
			</div>
		</footer>
	</body>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script type="text/javascript">
		var checkbox = document.getElementById('themer');
		var invertor = document.getElementById('inverter');

		checkbox.addEventListener('change', function () {
  			// Triggers repaint in most browsers:
  			invertor.setAttribute('media', this.checked ? 'screen' : 'none');
  			// Forces repaint in Chrome:
  			invertor.textContent = invertor.textContent.trim();
		});
	</script>
</html>