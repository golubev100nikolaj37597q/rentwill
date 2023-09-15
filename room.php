<?php
require('php/get_info.php');
require('php/merchant.php');
check_payment();
$info = get_info_product($_GET['id']);
require('php/sendEmail.php');
?>
<!doctype html>
<html class="h-100" lang="en" data-bs-theme="auto">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Rentwill - Аппартаменты “<?= $info['title'] ?>”</title>
	<meta name="description" content="Domain">
	<link href="./assets/css/fonts.css" rel="stylesheet">
	<link href="./assets/css/animate.min.css" rel="stylesheet">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
	<link href="./assets/css/animate.min.css" rel="stylesheet">
	<link href="./assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="./assets/css/owl.carousel.min.css" rel="stylesheet">
	<link rel="stylesheet" href="/assets/css/flatpickr_main.min.css">
	<link href="./assets/css/owl.theme.default.min.css" rel="stylesheet">
	<link href="./assets/css/styles.css" rel="stylesheet">
	<link rel="preload" as="video" href="./assets/videos/example.mp4">
	<link rel="shortcut icon" href="./favicon.png" type="image/x-icon">
	<link rel="icon" href="./favicon.png" type="image/x-icon">
	<link rel="stylesheet" href="/assets/css/flatpickr_main.min.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
	
	<link rel="stylesheet" href="./assets/css/tilda.css">
	<script src="https://npmcdn.com/flatpickr/dist/l10n/ru.js"></script>
	<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

</head>

<body>
	<div class="t898__wrapper"><input type="checkbox" class="t898__btn_input" id="t898__btn_input_463609367"><label for="t898__btn_input_463609367" class="t898__btn_label" style="background:#21234a;"><svg role="presentation" class="t898__icon t898__icon-write" width="35" height="32" viewBox="0 0 35 32" xmlns="http://www.w3.org/2000/svg">
				<path d="M11.2667 12.6981H23.3667M11.2667 16.4717H23.3667M4.8104 23.5777C2.4311 21.1909 1 18.1215 1 14.7736C1 7.16679 8.38723 1 17.5 1C26.6128 1 34 7.16679 34 14.7736C34 22.3804 26.6128 28.5472 17.5 28.5472C15.6278 28.5472 13.8286 28.2868 12.1511 27.8072L12 27.7925L5.03333 31V23.8219L4.8104 23.5777Z" stroke="#F7EFEA" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" fill="none"></path>
			</svg><svg role="presentation" xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="t898__icon t898__icon-close" viewBox="0 0 23 23">
				<g fillrule="evenodd">
					<path d="M10.314 -3.686H12.314V26.314H10.314z" transform="rotate(-45 11.314 11.314)"></path>
					<path d="M10.314 -3.686H12.314V26.314H10.314z" transform="rotate(45 11.314 11.314)"></path>
				</g>
			</svg></label><!-- old soclinks --><a class="t898__icon t898__icon-telegram_wrapper t898__icon_link" href="https://t.me/RentWill" target="_blank" rel="nofollow noopener noreferrer"><span class="t898__tooltip t-name t-name_xs">Telegram</span><svg role="presentation" width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M25 50C38.8071 50 50 38.8071 50 25C50 11.1929 38.8071 0 25 0C11.1929 0 0 11.1929 0 25C0 38.8071 11.1929 50 25 50Z" fill="#0087D0"></path>
				<path d="M36.11 13.0399L9.40999 22.7999C8.86999 22.9999 8.85999 23.7999 9.38999 24.0299L16.23 26.7199L18.78 34.4099C18.93 34.8199 19.47 34.9599 19.81 34.6799L23.73 31.1899L31.17 35.9099C31.55 36.1499 32.06 35.9399 32.15 35.5099L36.99 13.7599C37.09 13.2799 36.59 12.8699 36.11 13.0599V13.0399ZM20.03 28.1599L19.6 32.1199L17.53 26.0299L32.1 16.8699L20.03 28.1699V28.1599Z" fill="white"></path>
			</svg></a><a class="t898__icon t898__icon-whatsapp_wrapper t898__icon_link" href="https://wa.me/37369774747" target="_blank" rel="nofollow noopener noreferrer"><span class="t898__tooltip t-name t-name_xs">WhatsApp</span><svg role="presentation" width="50" height="50" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M25 50a25 25 0 100-50 25 25 0 000 50z" fill="#fff"></path>
				<path d="M26.1 12a12.1 12.1 0 00-10.25 18.53l.29.46-1.22 4.46 4.57-1.2.45.27a12.1 12.1 0 106.16-22.51V12zm6.79 17.22c-.3.85-1.72 1.62-2.41 1.72-.62.1-1.4.14-2.25-.14-.7-.22-1.37-.47-2.03-.77-3.59-1.57-5.93-5.24-6.1-5.48-.19-.24-1.47-1.97-1.47-3.76 0-1.79.93-2.67 1.25-3.03.33-.37.72-.46.96-.46.23 0 .47 0 .68.02.22 0 .52-.09.8.62l1.1 2.7c.1.18.16.4.04.64s-.18.39-.36.6c-.18.21-.38.47-.54.64-.18.18-.36.38-.15.74.2.36.92 1.55 1.98 2.52 1.37 1.23 2.52 1.62 2.88 1.8.35.18.56.15.77-.1.2-.23.9-1.05 1.13-1.42.24-.36.48-.3.8-.18.33.12 2.09 1 2.44 1.18.36.19.6.28.69.43.09.15.09.88-.21 1.73z" fill="#27D061"></path>
				<path d="M25 0a25 25 0 100 50 25 25 0 000-50zm1.03 38.37c-2.42 0-4.8-.6-6.9-1.76l-7.67 2 2.05-7.45a14.3 14.3 0 01-1.93-7.2c0-7.92 6.49-14.38 14.45-14.38a14.4 14.4 0 110 28.79z" fill="#27D061"></path>
			</svg></a><a class="t898__icon t898__icon-viber_wrapper t898__icon_link" href="viber://chat?number=%2B37369774747" target="_blank" rel="nofollow noopener noreferrer"><span class="t898__tooltip t-name t-name_xs">Viber</span><svg role="presentation" width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M25 43C34.9411 43 43 34.9411 43 25C43 15.0589 34.9411 7 25 7C15.0589 7 7 15.0589 7 25C7 34.9411 15.0589 43 25 43Z" fill="white"></path>
				<path d="M25 0C11.194 0 0 11.194 0 25C0 38.806 11.194 50 25 50C38.806 50 50 38.806 50 25C50 11.194 38.806 0 25 0ZM24.063 12.977C24.247 12.973 24.439 13.002 24.604 13.002C24.671 13.002 24.734 12.996 24.787 12.982C30.735 13.198 35.924 18.605 35.817 24.552C35.817 25.092 36.033 25.958 35.167 25.958C34.302 25.958 34.519 25.093 34.519 24.444C34.4326 23.7048 34.3034 22.9712 34.132 22.247C33.9787 21.5995 33.7772 20.9644 33.529 20.347C33.1967 19.5117 32.7468 18.7281 32.193 18.02C30.586 15.991 28.146 14.827 24.679 14.28C24.139 14.173 23.381 14.28 23.381 13.632C23.381 13.069 23.705 12.977 24.063 12.977V12.977ZM32.248 24.768C31.275 24.877 31.49 24.011 31.383 23.471C30.733 19.686 29.436 18.281 25.544 17.415C25.004 17.307 24.139 17.415 24.246 16.551C24.355 15.686 25.219 16.011 25.761 16.119C29.653 16.551 32.789 19.794 32.789 23.471C32.681 23.903 33.005 24.661 32.249 24.769L32.248 24.768ZM29.869 22.823C29.869 23.255 29.869 23.795 29.22 23.903C28.788 23.903 28.571 23.579 28.463 23.147C28.355 21.525 27.489 20.66 25.868 20.443C25.436 20.335 24.895 20.227 25.11 19.577C25.22 19.145 25.65 19.145 26.085 19.145C27.923 19.038 29.869 20.984 29.869 22.823ZM35.924 34.718C35.275 36.556 33.004 38.394 31.058 38.394C30.842 38.286 30.301 38.286 29.761 38.069C21.327 34.393 15.055 28.445 11.594 19.795C10.404 16.983 11.702 14.497 14.623 13.523C14.8797 13.4163 15.155 13.3613 15.433 13.3613C15.711 13.3613 15.9863 13.4163 16.243 13.523C17.542 13.956 20.677 18.39 20.786 19.687C20.893 20.767 20.136 21.308 19.488 21.741C18.19 22.607 18.19 23.796 18.731 24.985C20.029 27.797 22.191 29.635 24.894 30.933C25.868 31.365 26.841 31.365 27.49 30.283C28.679 28.445 30.193 28.445 31.815 29.635C32.572 30.175 33.436 30.716 34.193 31.365C35.276 32.23 36.573 32.986 35.924 34.717V34.718Z" fill="#935BBE"></path>
			</svg></a><a class="t898__icon t898__icon-mail_wrapper t898__icon_link" href="mailto:rentwill.md@gmail.com" target="_blank" rel="nofollow noopener noreferrer"><span class="t898__tooltip t-name t-name_xs">Mail</span><svg role="presentation" width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M25 43C34.9411 43 43 34.9411 43 25C43 15.0589 34.9411 7 25 7C15.0589 7 7 15.0589 7 25C7 34.9411 15.0589 43 25 43Z" fill="white"></path>
				<path d="M25 0C11.2 0 0 11.2 0 25C0 38.8 11.2 50 25 50C38.8 50 50 38.8 50 25C50 11.2 38.84 0 25 0ZM38.8 14.96L25 27.18L11.2 14.96H38.8ZM9.32 16.68L18.76 25L9.33 33.32V16.68H9.32ZM11.2 35.04L20.63 26.72L24.13 29.87C24.3744 30.0647 24.6776 30.1707 24.99 30.1707C25.3024 30.1707 25.6056 30.0647 25.85 29.87L29.35 26.72L38.78 35.04H11.21H11.2ZM40.66 33.32L31.29 25L40.72 16.68V33.32H40.67H40.66Z" fill="#168DE2"></path>
			</svg></a><a class="t898__icon t898__icon-phone_wrapper t898__icon_link" href="tel:+37369774747" target="_blank" rel="nofollow noopener noreferrer"><span class="t898__tooltip t-name t-name_xs">Phone</span><svg role="presentation" width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M25 0C11.2 0 0 11.2 0 25C0 38.8 11.2 50 25 50C38.8 50 50 38.8 50 25C50 11.2 38.84 0 25 0Z" fill="#004D73"></path>
				<path d="M38.66 34.1001L32.44 27.7801C32.3435 27.6746 32.226 27.5904 32.0952 27.5327C31.9643 27.4751 31.8229 27.4453 31.68 27.4453C31.537 27.4453 31.3956 27.4751 31.2647 27.5327C31.1339 27.5904 31.0165 27.6746 30.92 27.7801L27.5 31.2001C26.81 31.8801 25.79 31.8801 25.1 31.2001L18.74 24.8301C18.5778 24.6751 18.4488 24.4889 18.3606 24.2826C18.2724 24.0764 18.227 23.8544 18.227 23.6301C18.227 23.4058 18.2724 23.1838 18.3606 22.9776C18.4488 22.7713 18.5778 22.5851 18.74 22.4301L22.16 19.0001C22.61 18.5601 22.61 17.9201 22.16 17.4801L15.9 11.3101C15.7943 11.209 15.6695 11.13 15.5329 11.0776C15.3963 11.0253 15.2506 11.0008 15.1045 11.0054C14.9583 11.0101 14.8145 11.0439 14.6815 11.1048C14.5485 11.1657 14.429 11.2525 14.33 11.3601C12.33 13.8101 8.65996 20.6201 18.73 30.9101L18.89 31.0601L19.03 31.2101C29.36 41.3501 36.16 37.6801 38.61 35.6701C39.1 35.2701 39.15 34.5401 38.66 34.1001Z" fill="white"></path>
			</svg></a><!-- old soclinks --></div>

	<header class="hero-room">
		<nav class="navbar navbar-expand-md navbar-dark fixed-top" id="nav-header">
			<div class="container">
				<a class="navbar-brand d-md-none" href="/index.php">
					<img alt="img" src="./assets/img/logo.svg" alt="">
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav mx-auto">
						<li class="nav-item">
							<a class="nav-link" href="/#apartments">Апартаменты</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="/#aboutus">Об агенстве</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="/#whyus">Почему мы?</a>
						</li>
						<a class="navbar-brand d-none d-md-block" href="/index.php">
							<img alt="img" src="./assets/img/logo.svg" alt="Logotype" class="logotype">
						</a>
						<li class="nav-item">
							<a class="nav-link" href="#services">Дополнительные услуги</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#reviews">Отзывы</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#contacts">Контакты</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<section class="container pt-85 animate__animated animate__fadeInDown">
			<div class="row under-nav">
				<div class="col-md-6 circle-socials">
					<a href="https://www.instagram.com/rentwill.md/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
					<a href="https://www.tiktok.com/@rentwill.md" target="_blank"><i class="fa-brands fa-tiktok"></i></a>
					<a href="https://www.facebook.com/rentwill.md" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
					<a href="https://t.me/RentWill" target="_blank"><i class="fa-solid fa-paper-plane"></i></a>
				</div>
				<div class="col-md-6">
					<div class="nav-contacts">
						<a href="tel:+37369774747" class="phone"><i class="fa-solid fa-lg fa-phone"></i> +373 69 77 47 47</a>
						<div>
							<div class="select-language" id="select-language">
								<?php
								// Получаем значение куки googtrans
								$cookieValue = $_COOKIE['googtrans'] ?? '';

								// Разбиваем значение по символу '/'
								$segments = explode('/', $cookieValue);

								// Получаем последний сегмент
								$lastSegment = strtoupper(end($segments));
								if ($lastSegment == 'NULL' || $lastSegment == '') $lastSegment = 'RU';
								echo $lastSegment ?> <span aria-hidden="true" style="color: rgb(118, 118, 118);">▼</span>

							</div>
							<div id="option-language">
								<a href="javascript:" class="option-lang" data-google-lang="en">EN</a>
								<a href="javascript:" class="option-lang" data-google-lang="ru">RU</a>
								<a href="javascript:" class="option-lang" data-google-lang="ro">RO</a>
							</div>
							<script>
								var selectHeader = document.getElementById('select-language');
								selectHeader.addEventListener('click', () => {
									selectHeader.classList.toggle('active');
								});
							</script>


						</div>


						<style>
							.select-language {
								background: rgba(255, 255, 255, 0.10);
								border: none;
								color: white !important;
								border-radius: 65px;
								padding: 10px;
								margin-left: 10px;
							}

							.option-lang {
								text-align: center;
								color: white;
							}

							.option-lang.active {
								text-align: center;
								color: white;
								background: rgba(255, 255, 255, 0.20);
								border-radius: 5px;
							}

							#option-language {
								background: rgba(255, 255, 255, 0.10);
								border: none;
								color: white !important;
								border-radius: 25px;
								padding: 10px;
								margin-left: 10px;
								display: none;
								flex-direction: column;
								position: absolute;
								width: 65px;
							}

							.select-language.active+#option-language {
								display: flex;
							}
						</style>
					</div>
				</div>
			</div>
		</section>
		<section class="container pt-85 rtrd-container animate__animated animate__fadeInDown" id="rentThisRoom">
			<div class="rtrd">
				<div class="row">
					<div class="col-md-2 mobile-mt-25">
						<div class="pr-form">
							<h6>Apartments</h6>
							<div class="d-flex align-items-center justify-content-between">
								<span><?= $info['title'] ?></span>
							</div>
						</div>
					</div>
					<div class="col-md-3 mobile-mt-25">
						<div class="pr-form">
							<h6>Check-in/Check-out</h6>
							<div class="d-flex align-items-center justify-content-between">
								<input type="text" class="pr-input" id="selectedDateInput" onclick="$('#big-calendar').toggle();" name="" value="">
								<script>
									if (localStorage.getItem('data1') && localStorage.getItem('data2')) {
										$('#selectedDateInput').val(localStorage.getItem('data1') + ' - ' + localStorage.getItem('data2'))
									}
								</script>
							</div>
						</div>
					</div>
					<div class="col-md-3 mobile-mt-25 d-flex align-items-center justify-content-evenly">
						<div class="pr-form">
							<h6>Взрослые</h6>
							<div class="d-flex align-items-center justify-content-between">
								<span id="adultsCounter<?php echo $_GET['id'] ?>">0</span>

								<button type="button" onclick="changeValue('adultsCounter<?php echo $_GET['id'] ?>', 1)">+</button>
								<button type="button" onclick="changeValue('adultsCounter<?php echo $_GET['id'] ?>', -1)">-</button>
							</div>
						</div>
						<div class="pr-form">
							<h6>Дети</h6>
							<div class="d-flex align-items-center justify-content-between">
								<span id="childCounter<?php echo $_GET['id'] ?>">0</span>
								<button type="button" onclick="changeValue('childCounter<?php echo $_GET['id'] ?>', 1)">+</button>
								<button type="button" onclick="changeValue('childCounter<?php echo $_GET['id'] ?>', -1)">-</button>
							</div>
						</div>
						<script>
							if (localStorage.getItem('adults') && localStorage.getItem('child')) {
								$('#adultsCounter<?php echo $_GET['id'] ?>').text(localStorage.getItem('adults'));
								$('#childCounter<?php echo $_GET['id'] ?>').text(localStorage.getItem('child'));
							}
						</script>
					</div>
					<script>
						function changeValue(el, amount) {
							var counterElement = document.getElementById(el);
							let currentValue = parseInt(counterElement.textContent);
							currentValue += amount;
							if (currentValue < 0) {
								currentValue = 0; // Не допускаем отрицательных значений
							}
							counterElement.textContent = currentValue;
						}
					</script>
					<div class="col-md-4 mobile-mt-25">
						<button type="button" class="square-button h-100 w-100" onclick="$('#big-calendar').toggle();">Рассчитать стоимость</button>
					</div>
				</div>
			</div>
			<div class="big-calendar animate__animated animate__fadeIn animate" id="big-calendar" style="display: none;">

				<input type="text" id="data-picker" style="background: none; display: none;" class="pr-input1" data-closed-dates='<?= $info['closed_dates'] ?>' data-price-dates='<?= $info['price_dates'] ?>'>
				<div class="employment">
					<div class="employment-status">
						<div class="employment-ind white"></div>
						<p>Свободно</p>
					</div>
					<div class="employment-status">
						<div class="employment-ind choosed"></div>
						<p>Выбрано</p>
					</div>
					<div class="employment-status">
						<div class="employment-ind busy"></div>
						<p>Занято</p>
					</div>
				</div>
			</div>
		</section>
		<div class="hero-slider h-100 room-slider owl-carousel owl-theme animate__animated animate__fadeInDown">
			<?php $filePathsArray = json_decode($info['img'], true);
			foreach ($filePathsArray as $filePathObject) { ?>
				<div class="item">
					<div class="overlay-sl"></div>
					<img alt="img" alt="" src="<?php echo $filePathObject['file_path'] ?>" id="image-room">
				</div>

			<?php } ?>

		</div>
	</header>

	<main>
		<section class="secmt mb-5" id="about-room">
			<div class="container">
				<div class="row">
					<div class="col-md-12 mb-5 position-relative">
						<h1 class="text-center" id="appartaments-name">Апартаменты “<?= $info['title'] ?>”</h1>
					</div>
					<div class="col-md-6" id="room-info">
						<div class="room-description">
							<h2>Основная информация</h2>
							<p style="max-width: 570px;"><?= $info['short_desc'] ?></p>
							<h2 class="mt-4">О квартире</h2>
							<p style="line-height: 30px;">
								<i class="fa-solid fa-location-dot"></i> <?= $info['address'] ?><br>
								<i class="fa-solid fa-house"></i> <?= $info['kvm'] ?>м²<br>
								<i class="fa-solid fa-people-group"></i> Максимум <?= $info['max_adults'] ?> чел.<br>
							</p>
							<h2 class="mt-4">Удобства</h2>
							<p>
								<?= $info['description'] ?>
							</p>
							<div>
								<?= $info['GoogleMap'] ?>
							</div>
						</div>
					</div>
					<div class="col-md-6" id="room-form">
						<div class="rent-form">
							<h1 id="data_selected">Выберите дату</h1>
							<p class="mt-2 price" id="p-cost"></p>
							<?php
							if ($info['discount'] != null && $info['discount'] != 0) {
							?>
								<p class="mt-3 mb-3">
									*При бронировании квартиры от 2x недель <b> скидка
									<?php echo $info['discount'] . ' %';
								}
									?></b></p>
								<form action="" method="POST" id="main-form">
									<div id="data-main">
										<div class="mobile-mt-25">
											<label>Выберите способ заселения*</label>
											<select id="type-checkIN" onchange="change_form(this.value)" name="way">
												<option value="standard">Обычное заселение</option>
												<option value="non-contact">Бесконтактное заселение </option>
											</select>
										</div>

										<div class="mobile-mt-25 mt-3">
											<label>Ваше ФИО?*</label>
											<input type="text" name="name" class="light-input" required>
										</div>
										<div class="mobile-mt-25 mt-3">
											<label>Номер телефона*</label>
											<input type="number" name="phone" required>
										</div>
										<div class="mobile-mt-25 mt-3">
											<label>Email*</label>
											<input type="text" name="email" required>
										</div>
										<div class="mobile-mt-25 mt-3">
											<label>Примерное время заселения</label>
											<input type="text" name="time" id="timeInput" required>
											<script>
												document.addEventListener("DOMContentLoaded", function() {
													flatpickr("#timeInput", {
														enableTime: true,
														noCalendar: true,
														dateFormat: "H:i",
														minTime: "14:00",
														time_24hr: true,
														onClick: function(selectedDates, dateStr, instance) {
															instance.open(); // Открыть виджет времени при клике
														}
													});
												});
											</script>
											<p class="mt-2">Заселение с <b>14:00</b>, Выселение до <b>12:00</b></p>
										</div>
										<div сlass="mobile-mt-25 mt-3" id="image_input" style="display: none; margin-top: 1rem!important;">
											<label>Загрузите фото документов</label>
											<input type="file" id="document_input" name="document_input" accept=".jpg, .jpeg, .png, .gif" multiple>
										</div>
										<div class="mobile-mt-25 mt-3">
											<label>Дополнительные пожелания</label>
											<textarea name="comment" id="comment" rows="3"></textarea>
										</div>
										<div class="mobile-mt-25 mt-3">
											<label>Аренда PlayStation</label>
											<select name="subject">
												<option value="0">Не нужно</option>
												<option value="<?= $info['ps-1'] ?>" id="ps-1">1 день (<?= $info['ps-1'] ?> lei)</option>
												<option value="<?= $info['ps-3'] ?>" id="ps-3">3 дня (<?= $info['ps-3'] ?> lei)</option>
												<option value="<?= $info['ps-7'] ?>" id="ps-7">7 дней (<?= $info['ps-7'] ?> lei)</option>
											</select>
										</div>
										<div class="mobile-mt-25 mt-3 form-check">
											<input class="form-check-input" type="checkbox" value="" name="transfer" id="transfer">
											<label class="form-check-label mb-0 ms-2" for="">Мне нужен трансфер из/в аэропорт (<span id="transfer-value-1"><?= $info['transfer'] ?></span> lei)</label>
										</div>
										<span class="form-check-label mb-0 ms-2 d-none" id="not_selected_date" style="color:red">Вы не выбрали даты заезда!</span>
										<button type="button" class="square-button mt-4 mx-auto text-center d-block py-3 w-50" onclick="next('data-main')">Забронировать</button>
									</div>
									<div id="data_pay" class="d-none">
										<h1 class="text-center">Апартаменты “<?php echo $info['title'] ?>”</h1>
										<div class="mobile-mt-25 mt-3 d-flex">

											<input style="width: auto" type="radio" id="full_cost" value="full_cost" name="radio">
											<span style="margin-left: 10px; font-size:16px;">Оплата полной суммы банковской картой (Скидка -5%)</span>
										</div>
										<div class="mobile-mt-25 mt-3 d-flex">
											<input style="width: auto" type="radio" value="pay_first_days" id="pay_first_days" name="radio" checked>
											<span style="margin-left: 10px;font-size: 16px;">Оплата первых суток бронирования</span>
										</div>
										<div class="mobile-mt-25 mt-3 d-flex">
											<input style="width: auto" type="radio" value="pay_checkIN" id="pay_checkIN" name="radio">
											<span style="margin-left: 10px;font-size: 16px;">Оплата при заселении (Комиссия +3% к сумме)</span>
										</div>
										<div class="d-flex">
											<button type="submit" class="square-button mt-4 mx-auto text-center d-block py-3 w-40">Забронировать</button>
											<button type="button" class="square-button mt-4 mx-auto text-center d-block py-3 w-40 " onclick="back('data_pay')">Вернутся назад</button>
										</div>
									</div>

									<div id="data_check" class="d-none">
										<span>Ваши данные</span>
										<div class="mobile-mt-25 mt-3">
											<span>ФИО:</span><br>
											<label id="nameValue"></label>
										</div>
										<div class="mobile-mt-25 mt-3">
											<span>Номер телефона:</span><br>
											<label id="numberValue"></label>
										</div>
										<div class="mobile-mt-25 mt-3">
											<span>Email:</span><br>
											<label id="emailValue"></label>
										</div>
										<div class="mobile-mt-25 mt-3">
											<span>Примерное время заселения:</span><br>
											<label id="timeValue"></label>
										</div>
										<div class="mobile-mt-25 mt-3">
											<span>Дополнительные пожелания:</span><br>
											<label id="commentValue"></label>
										</div>
										<div class="mobile-mt-25 mt-3">
											<span>Тип заселения</span><br>
											<label id="wayValue"></label>
										</div>
										<div class="mobile-mt-25 mt-3">
											<span>Аренда PlayStation</span><br>
											<label id="checkPS"></label>
										</div>
										<div class="mobile-mt-25 mt-3">
											<span>Трансфер из/в аэропорт</span><br>
											<label id="transferValue"></label>
										</div>
										<div class="mobile-mt-25 mt-3 form-check">
											<input class="form-check-input" type="checkbox" value="" id="confirm_rules">
											<!-- Сделай чтобы кнопка Забронировать зависела от checkbox сверху-->

											<label class="form-check-label mb-0 ms-2" style="font-size: 13px;margin-top: 4px;" for="">Я соглашаюсь с <a href="./assets/other/rentwill.pdf" target="_blank">условиями и правилами</a> проживания</label>
										</div>
										<div class="d-flex">
											<button type="button" class="square-button mt-4 mx-auto text-center d-block py-3 w-40 disabled" onclick="next('check_data')" id="confirm_bron" disabled>Забронировать</button>
											<button type="button" class="square-button mt-4 mx-auto text-center d-block py-3 w-40 " onclick="back('check_data')">Вернутся назад</button>

										</div>
									</div>
									<style>
										.disabled{
											background: rgba(255,255,255,0.3);
										}
									</style>
									<script>
										// Получаем ссылки на флажок и кнопку
										const checkbox = document.getElementById('confirm_rules');
										const button = document.getElementById('confirm_bron');

										// Добавляем обработчик события для изменения состояния флажка
										checkbox.addEventListener('change', function() {
											// Если флажок отмечен, разблокируем кнопку, в противном случае блокируем
											if (checkbox.checked) {
												button.disabled = false;
												button.classList.remove('disabled');
											} else {
												button.disabled = true;
												button.classList.add('disabled');
											}
										});
									</script>
									
									<div id="confirm_pay" class="d-none">

										<div class="mobile-mt-25 mt-3 text-center">
											<span>Бронирование произведено успешно. Большое спасибо за интерес к нашему агенству. <br><br>

												Наши менеджеры свяжутся с вами в течение 15-30 минут в течение рабочего времени, для уточнения деталей. <br>

												Всю нужную информацию мы отправили на ваш e-mail адрес который вы указали при бронировании квартиры. <br><br>

												Вы забронировали аппартаменты “<?php echo $info['title'] ?>” на даты <b><span id="confirm_pay_date"></span></b></span><br>

										</div>
										<div class="d-flex">
											<button type="button" class="square-button mt-4 mx-auto text-center d-block py-3 w-40 " onclick="back('check_data')">Вернутся назад</button>
										</div>
									</div>
								</form>
						</div>
					</div>
					<style>

					</style>
				</div>
			</div>
		</section>
		<section class="services" id="services">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1 class="text-white mb-5">Для вас доступно</h1>
					</div>
					<div class="col-md-4">
						<div class="service mt-3">
							<div class="service-title">
								<h4 class="text-white">Аренда PlayStation</h4>
								<p class="p text-white">Позаботься о своём досуге - выбери дополнительную опцию аренды PlayStation!</p>
								<small class="text-white mt-4" style="min-height:37px">*Вы можете воспользоваться услугой аренды<br>PlayStation при бронировании квартиры.</small>
							</div>
							<img alt="img" src="./assets/img/s1.png" alt="Service">
						</div>
					</div>
					<div class="col-md-4">
						<div class="service mt-3">
							<div class="service-title">
								<h4 class="text-white">Аренда авто</h4>
								<p class="p text-white">Мы сэкономим твоё время и сделаем всё за тебя.</p>
								<button type="button" class="white-button mt-4" data-bs-toggle="modal" data-bs-target="#rentModal" subject="Аренда авто" onclick="document.getElementById('subjectModal').value = this.getAttribute('subject');">Арендовать</button>
							</div>
							<img alt="img" src="./assets/img/s2.png" alt="Service">
						</div>
					</div>
					<div class="col-md-4">
						<div class="service mt-3">
							<div class="service-title">
								<h4 class="text-white">Сервис</h4>
								<p class="p text-white">Массаж, прачечная, уборка апартаментов, замена постельного белья.</p>
								<button type="button" class="white-button mt-4" data-bs-toggle="modal" data-bs-target="#rentModal" subject="Аренда PlayStation" onclick="document.getElementById('subjectModal').value = this.getAttribute('subject');">Заказать сейчас</button>
							</div>
							<img alt="img" src="./assets/img/s3.png" alt="Service">
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="reviews" id="reviews">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1 class="mb-2">Отзывы клиентов</h1>
					</div>
					<div class="col-md-12 review-slider owl-carousel owl-theme">
						<div class="review mt-5">
							<div class="review-title">
								<h5>Ольга Куриленко</h5>
								<p class="p review-text">Прекрасная и красивая квартира , мы остановились вдвух квартирах с Александром. А Валерией как
									хозяевами и сейчас остановились у них в третьей.
									Этот факт говорит о многом. В квартире есть все, что
									вам может понадобиться, хорошо спланировано, с
									большим количеством места для хранения. Каждая
									деталь в квартире хорошо подходит.</p>
								<div class="review-stars text-end my-2">
									<i class="fa-solid fa-star"></i>
									<i class="fa-solid fa-star"></i>
									<i class="fa-solid fa-star"></i>
									<i class="fa-solid fa-star"></i>
									<i class="fa-regular fa-star"></i>
								</div>
							</div>
							<div class="review-city">
								<img alt="img" src="./assets/img/review-avatars/1.png" alt="Avatar" class="review-avatar">
								<p>Одесса, Украина</p>
							</div>
						</div>
						<div class="review mt-5">
							<div class="review-title">
								<h5>Ольга Куриленко</h5>
								<p class="p review-text">Прекрасная и красивая квартира , мы остановились вдвух квартирах с Александром. А Валерией как
									хозяевами и сейчас остановились у них в третьей.
									Этот факт говорит о многом. В квартире есть все, что
									вам может понадобиться, хорошо спланировано, с
									большим количеством места для хранения. Каждая
									деталь в квартире хорошо подходит.</p>
								<div class="review-stars text-end my-2">
									<i class="fa-solid fa-star"></i>
									<i class="fa-solid fa-star"></i>
									<i class="fa-solid fa-star"></i>
									<i class="fa-solid fa-star"></i>
									<i class="fa-regular fa-star"></i>
								</div>
							</div>
							<div class="review-city">
								<img alt="img" src="./assets/img/review-avatars/1.png" alt="Avatar" class="review-avatar">
								<p>Одесса, Украина</p>
							</div>
						</div>
						<div class="review mt-5">
							<div class="review-title">
								<h5>Ольга Куриленко</h5>
								<p class="p review-text">Прекрасная и красивая квартира , мы остановились вдвух квартирах с Александром. А Валерией как
									хозяевами и сейчас остановились у них в третьей.
									Этот факт говорит о многом. В квартире есть все, что
									вам может понадобиться, хорошо спланировано, с
									большим количеством места для хранения. Каждая
									деталь в квартире хорошо подходит.</p>
								<div class="review-stars text-end my-2">
									<i class="fa-solid fa-star"></i>
									<i class="fa-solid fa-star"></i>
									<i class="fa-solid fa-star"></i>
									<i class="fa-solid fa-star"></i>
									<i class="fa-regular fa-star"></i>
								</div>
							</div>
							<div class="review-city">
								<img alt="img" src="./assets/img/review-avatars/1.png" alt="Avatar" class="review-avatar">
								<p>Одесса, Украина</p>
							</div>
						</div>
						<div class="review mt-5">
							<div class="review-title">
								<h5>Ольга Куриленко</h5>
								<p class="p review-text">Прекрасная и красивая квартира , мы остановились вдвух квартирах с Александром. А Валерией как
									хозяевами и сейчас остановились у них в третьей.
									Этот факт говорит о многом. В квартире есть все, что
									вам может понадобиться, хорошо спланировано, с
									большим количеством места для хранения. Каждая
									деталь в квартире хорошо подходит.</p>
								<div class="review-stars text-end my-2">
									<i class="fa-solid fa-star"></i>
									<i class="fa-solid fa-star"></i>
									<i class="fa-solid fa-star"></i>
									<i class="fa-solid fa-star"></i>
									<i class="fa-regular fa-star"></i>
								</div>
							</div>
							<div class="review-city">
								<img alt="img" src="./assets/img/review-avatars/1.png" alt="Avatar" class="review-avatar">
								<p>Одесса, Украина</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="secmt mb-5 contacts" id="contacts">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1 class="mb-5">Контакты</h1>
					</div>
					<div class="col-md-8 position-relative">
						<img alt="img" src="./assets/img/c4.webp" class="about-image about-image-1 mt-0" alt="Contacts">
					</div>
					<div class="col-md-4 position-relative">
						<div class="contact-form">
							<form action="" method="POST">
								<div class="mobile-mt-25">
									<label for="name">Ваше имя</label>
									<input type="text" name="name" id="name" required>
								</div>
								<div class="mobile-mt-25 mt-3">
									<label for="phone">Номер телефона</label>
									<input type="tel" name="phone" id="phone" required>
								</div>
								<p style="color:green;text-align:center;margin-top:10px" class="d-none" id="successContact">Вы успешно отправили заявку</p>
								<button type="submit" class="book-btn mt-4" id="submitContact"><img alt="img" src="./assets/img/rent.svg" alt="Book">Забронировать квартиру</button>
							</form>
						</div>
						<div class="circle-socials mt-5">
							<a href="https://www.instagram.com/rentwill.md/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
							<a href="https://www.tiktok.com/@rentwill.md" target="_blank"><i class="fa-brands fa-tiktok"></i></a>
							<a href="https://www.facebook.com/rentwill.md" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
							<a href="https://t.me/RentWill" target="_blank"><i class="fa-solid fa-paper-plane"></i></a>
						</div>
						<div class="contact-info mt-4">
							<p>+373 69 77 47 47</p>
							<p>rentwill.md@gmail.com</p>
							<p>Кишинёв, Молдова</p>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>

	<footer class="footer mt-auto theme-background">
		<div class="container">
			<div class="row py-5">
				<div class="col-md-4">
					<p class="copyright">Rentwill.md &copy; 2023, Все права защищены</p>
				</div>
				<div class="col-md-8 footer-right">
					<a class="link-body-emphasis" href="assets/other/rentwill.pdf" target="_blank">Правила проживания</a>
					<img alt="img" class="logo_img" src="/assets/img/card/safekey_icon.svg" alt="">
					<img alt="img" class="logo_img" src="/assets/img/card/maib.svg" alt="">
					<img alt="img" class="logo_img" src="/assets/img/card/mastercard.svg" alt="">
					<img alt="img" class="logo_img" src="/assets/img/card/maestro.svg" alt="">
					<img alt="img" class="logo_img" src="/assets/img/card/visa.svg" alt="">
				</div>
			</div>
		</div>
	</footer>

	<div class="modal fade" id="rentModal" tabindex="-1" aria-labelledby="rentModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-centered-none">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title" id="rentModalLabel">Обратный звонок</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
				</div>
				<div class="modal-body dark-inputs">
					<form action="" method="POST">
						<div class="mobile-mt-25">
							<label for="nameModal">Как вас зовут?</label>
							<input type="text" name="nameModal" id="nameModal" required>
						</div>
						<div class="mobile-mt-25 mt-3">
							<label for="phoneModal">Ваш номер телефона</label>
							<input type="tel" name="phoneModal" id="phoneModal" required>
						</div>
						<div class="mobile-mt-25 mt-3">
							<label for="subjectModal">Выберите интересующую вас услугу</label>
							<select name="subjectModal" id="subjectModal" required class="select-custom">
								<option value="Аренда PlayStation">Аренда PlayStation</option>
								<option value="Сервис">Сервис</option>
								<option value="Аренда Авто">Аренда Авто</option>
							</select>
							<style>
								select option {
									background-color: #fff;
									color: #333;
								}
							</style>
						</div>
						<p class="text-white mb-2 mt-4 text-center">Наш менеджер обязательно с вами свяжется в течение
							10-20 минут,
							для уточнения всех интересующих вас деталей.</p>
						<p style="color:green; text-align: center;" class="d-none" id="successText">Вы успешно отправили заявку</p>
						<button type="submit" class="square-button mt-4 mx-auto text-center d-block py-3 w-50" id="submitButton">Заказать
							звонок</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<script>
		$(document).ready(function() {
			$("#submitButton").click(function() {
				event.preventDefault();
				var name = $("#nameModal").val();
				var number = $("#phoneModal").val();
				var subject = $("#subjectModal").val();

				$.ajax({
					url: 'php/newForm.php',
					type: 'POST',
					data: {
						name: name,
						number: number,
						subject: subject,
						form: 'Апартаменты'
					},
					success: function(response) {
						$("#successText").removeClass('d-none');
						console.log('Успешный ответ от сервера:', response);
						localStorage.clear();
					},
					error: function(xhr, status, error) {
						console.log('Ошибка запроса:', error);
						// Здесь можно обработать ошибку запроса
					}
				});
			});
			$("#submitContact").click(function() {
				event.preventDefault();
				var name = $("#name").val();
				var number = $("#phone").val();

				$.ajax({
					url: 'php/newForm.php',
					type: 'POST',
					data: {
						name: name,
						number: number,
						subject: "Контакты",
						form: 'Апартаменты'
					},
					success: function(response) {
						$("#successContact").removeClass('d-none');
						console.log('Успешный ответ от сервера:', response);

					},
					error: function(xhr, status, error) {
						console.log('Ошибка запроса:', error);
						// Здесь можно обработать ошибку запроса
					}
				});
			});
		});

		$('a[href^="#"').on('click', function() {
			let href = $(this).attr('href');

			$('html, body').animate({
				scrollTop: $(href).offset().top
			});
			return false;
		});
	</script>
	<script src="./assets/js/bootstrap.bundle.min.js"></script>
	<script src="./assets/js/main.js"></script>
	<script src="./assets/js/main-calendar.js"></script>
	<script src="./assets/js/owl.carousel.min.js"></script>
	<script>
		$('a[href^="#"').on('click', function() {
			let href = $(this).attr('href');

			$('html, body').animate({
				scrollTop: $(href).offset().top
			});
			return false;
		});
	</script>
	<script>
		$('.room-slider').owlCarousel({
			margin: 0,
			loop: false,
			autoWidth: true,
			items: 1,
			nav: false,
			rewind: true,
			autoplay: true,
			autoplayTimeout: 4500,
			autoplayHoverPause: true,
			dots: true
		})
	</script>
	<script>
		$('.review-slider').owlCarousel({
			margin: 25,
			loop: true,
			autoWidth: true,
			items: 3,
			nav: false,
			rewind: false,
			autoplay: true,
			autoplayTimeout: 5000,
			autoplayHoverPause: true,
			dots: false
		})
	</script>
	<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
	<script>
		const googleTranslateConfig = {

			lang: "ru",

			langFirstVisit: 'ru',

		};

		function googleTranslateElementInit() {

			if (googleTranslateConfig.langFirstVisit && !Cookies.get('googtrans')) {

				TranslateCookieHandler("/auto/" + googleTranslateConfig.langFirstVisit);
			}

			let code = TranslateGetCode();

			if (document.querySelector('[data-google-lang="' + code + '"]') !== null) {
				$('[data-google-lang="' + code + '"]').addClass('active');
			}
			if (code == 'ru') {
				$('.conditions').attr('href', '/conditions.pdf');
				$('#brief').attr('href', '/brief.pdf');
				console.log('ru');
			} else {
				$('.conditions').attr('href', '/conditions_en.pdf');
				$('#brief').attr('href', '/brief_en.pdf');
				console.log('en');
			}

			if (code == googleTranslateConfig.lang) {

				TranslateCookieHandler(null, googleTranslateConfig.domain);
			}


			new google.translate.TranslateElement({
				pageLanguage: googleTranslateConfig.lang,
			});


			TranslateEventHandler('click', '[data-google-lang]', function(e) {
				TranslateCookieHandler("/" + googleTranslateConfig.lang + "/" + e.getAttribute("data-google-lang"), googleTranslateConfig.domain);

				window.location.reload();
			});
		}

		function TranslateGetCode() {

			let lang = (Cookies.get('googtrans') != undefined && Cookies.get('googtrans') != "null") ? Cookies.get('googtrans') : googleTranslateConfig.lang;
			return lang.match(/(?!^\/)[^\/]*$/gm)[0];
		}

		function TranslateCookieHandler(val, domain) {

			Cookies.set('googtrans', val);
			Cookies.set("googtrans", val, {
				domain: "." + document.domain,
			});

			if (domain == "undefined") return;

			Cookies.set("googtrans", val, {
				domain: domain,
			});

			Cookies.set("googtrans", val, {
				domain: "." + domain,
			});
		}

		function TranslateEventHandler(event, selector, handler) {
			document.addEventListener(event, function(e) {
				let el = e.target.closest(selector);
				if (el) handler(el);
			});
		}
	</script>
	<script src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

	<script>
		setInterval(function() {
			var indicators = document.querySelectorAll('.indicator');
			indicators.forEach(function(indicator) {
				indicator.remove();
			});

			var container2 = document.getElementById(':2.container');
			if (container2) {
				container2.remove();
			}
			var container2 = document.getElementById(':0.container');
			if (container2) {
				container2.remove();
			}
			document.body.removeAttribute('style');

		}, 500); // Интервал в миллисекундах (5 секунд)
	</script>

	<style>
		@media screen and (max-width:715px) {
			.hero-slider img {
				/*height: auto;*/
			}

			#image-room {
				/*width: 700px !important;*/
			}
		}
	</style>
</body>

</html>