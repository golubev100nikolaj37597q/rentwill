<?php
require('php/merchant.php');
check_payment(); ?>
<!doctype html>
<html class="h-100" lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rentwill - Оплата бронирования</title>
    <meta name="description" content="Domain">
    <link href="./assets/css/fonts.css" rel="stylesheet">
    <link href="./assets/css/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href="./assets/css/animate.min.css" rel="stylesheet">
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/css/owl.carousel.min.css" rel="stylesheet">
    <link href="./assets/css/owl.theme.default.min.css" rel="stylesheet">
    <link href="./assets/css/styles.css" rel="stylesheet">
    <link rel="preload" as="video" href="./assets/videos/example.mp4">
    <link rel="shortcut icon" href="./favicon.png" type="image/x-icon">
    <link rel="icon" href="./favicon.png" type="image/x-icon">
</head>

<body>
    <header class="hero-pay">
        <nav class="navbar navbar-expand-md navbar-dark fixed-top" id="nav-header">
            <div class="container">
                <a class="navbar-brand d-md-none" href="#">
                    <img alt="img" src="./assets/img/logo.svg" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php#apartments">Апартаменты</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php#aboutus">Об агенстве</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php#whyus">Почему мы?</a>
                        </li>
                        <a class="navbar-brand d-none d-md-block" href="index.php">
                            <img alt="img" src="./assets/img/logo.svg" alt="Logotype" class="logotype">
                        </a>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php#services">Дополнительные услуги</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php#reviews">Отзывы</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php#contacts">Контакты</a>
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
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                EN
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">RU</a></li>
                                <li><a class="dropdown-item" href="#">EN</a></li>
                                <li><a class="dropdown-item" href="#">RO</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </header>

    <main>
        <section class="secmt mb-5" id="about-room">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mb-5 position-relative">
                        <h1 class="text-center">Оплата бронирования</h1>
                    </div>
                    <div class="col-md-12 mb-5 position-relative">
                        <center><img alt="img" src="assets/img/ok_pay.png"></center><br>
                        <p class="text-center">Оплата произведена успешно. Большое спасибо за интерес к нашему агенству.</p>
                        <p class="text-center">Наши менеджеры свяжутся с вами в течение <b>15-30 минут</b> в течение рабочего времени, для уточнения деталей.</p><br>
                        <p class="text-center">Всю нужную информацию мы отправили на ваш e-mail адрес который вы указали при бронировании квартиры.</p>
                        <p class="text-center" id="name-apartaments">Вы забронировали аппартаменты  на даты с <b></b> по <b></b>.</p><br>
                        <button type="submit" class="square-button mt-4 mx-auto text-center d-block py-3 w-50">Вернуться на главную страницу</button>
                    </div>
                    <script>
                        var name_apartaments = document.getElementById('name-apartaments');
                        const date1 = new Date(localStorage.getItem('first_date'));
                        const day1 = date1.getDate().toString().padStart(2, '0');
                        const month1 = (date1.getMonth() + 1).toString().padStart(2, '0'); // Месяцы в JavaScript начинаются с 0
                        const year1 = date1.getFullYear().toString().slice(-2); // Получаем последние две цифры года

                        const formattedDate1 = `${day1}.${month1}.${year1}`;

                        const date2 = new Date(localStorage.getItem('last_date'));
                        const day2 = date2.getDate().toString().padStart(2, '0');
                        const month2 = (date2.getMonth() + 1).toString().padStart(2, '0'); // Месяцы в JavaScript начинаются с 0
                        const year2 = date2.getFullYear().toString().slice(-2); // Получаем последние две цифры года

                        const formattedDate2 = `${day2}.${month2}.${year2}`;
                        name_apartaments.innerHTML = 'Вы забронировали ' + localStorage.getItem('name_appartaments') + ' на даты с <b>' + formattedDate1 + '</b> по <b>' + formattedDate2 +'</b>';
                        console.log(localStorage.getItem('name_appartaments') + "1" + localStorage.getItem('first_date') + "2" + localStorage.getItem('last_date') + "3")
                        
                    </script>
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
                                <small class="text-white mt-4">*Вы можете воспользоваться услугой аренды<br>PlayStation при бронировании квартиры.</small>
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
                                <button type="submit" class="book-btn mt-4"><img alt="img" src="./assets/img/rent.svg" alt="Book">Забронировать квартиру</button>
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
                    <a class="link-body-emphasis" href="assets/other/rentwill.pdf">Правила проживания</a>
                    <img alt="img" class="logo_img" src="/assets/img/card/SafeKey_BlueBox_rgb.svg" alt="">
                    <img alt="img" class="logo_img" src="/assets/img/card/logo.svg" alt="">
                    <img alt="img" class="logo_img" src="/assets/img/card/mc.svg" alt="">
                    <img alt="img" class="logo_img" src="/assets/img/card//visa_logo.jpg" alt="">
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
                            <input type="text" name="subjectModal" id="subjectModal" required>
                        </div>
                        <p class="text-white mb-2 mt-4 text-center">Наш менеджер обязательно с вами свяжется в течение 10-20 минут,
                            для уточнения всех интересующих вас деталей.</p>
                        <button type="submit" class="square-button mt-4 mx-auto text-center d-block py-3 w-50">Заказать звонок</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/main.js"></script>
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
</body>
<script>
    localStorage.removeItem('data2');
    localStorage.removeItem('data1');
</script>
</html>