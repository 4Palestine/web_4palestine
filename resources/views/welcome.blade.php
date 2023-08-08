<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bees 4 Palestine</title>

    <link rel="stylesheet" href="{{ asset('front/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Alexandria:wght@100;200;300;400;500;600;700;800;900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;1,100;1,200;1,300;1,400&display=swap"
        rel="stylesheet" />
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-white py-4 fw-bold">
        <div class="container border-bottom">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('front/images/logo-light.png') }}" width="108px" alt="" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex align-items-center">
                    <li class="nav-item me-3">
                        <a class="fs-7 nav-link active" href="#">الرئيسية</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="fs-7 nav-link" href="#">أهدافنا</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="fs-7 nav-link" href="#">من نحن</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="fs-7 nav-link" href="#">لماذا Bees</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main style="height: 100vh" class="container mt-4">
        <div class="blur-shape" style="top: 20%; right: 10%; background-color: #43ccaac4"></div>
        <div class="blur-shape" style="bottom: 20%; left: 10%; background-color: #ccb743c4"></div>
        <div class="blur-shape" style="top: 10%; left: 10%; background-color: #5543ccc4"></div>
        <div class="row h-100">
            <div class="py-5 col-6 h-100 d-flex align-items-center">
                <div>
                    <h1 class="fw-bolder lh-md">
                        منصات التواصل الإجتماعي إحدى أشكال
                        <span class="text-main">المقاومة</span>
                    </h1>
                    <p class="fw-bold fs-7 my-4 lh-md _text-secondary">
                        نحن منصة Bees4Palestine، نهتم بتقديم فرص فاعلة لدعم القضية
                        الفلسطينية.
                        <br />
                        نقدم تطبيقًا مبتكرًا للهواتف المحمولة يتيح للشباب المشاركة في
                        مهمات معينة لكشف جرائم الاحتلال والتصدي للظلم.
                        <br />
                        ننشر مهامًا مختلفة ومتنوعة عبر التطبيق لنشر الوعي بالوضع الفلسطيني
                        وتعزيز التضامن الدولي.
                        <br />
                        يهدف تطبيقنا إلى جعل كل فعل بسيط يسهم في مساندة الشعب الفلسطيني
                        ونشر رسالتهم بالعدالة والسلام.
                    </p>

                    <div class="mt-5">
                        <button class="btn btn-dark mb-2 ms-1">
                            <div class="d-flex align-items-center">
                                <span>Google Play</span><img src="{{ asset('front/images/google-play-logo.png') }}" width="30px"
                                    alt="" />
                            </div>
                        </button>
                        <button class="btn btn-dark mb-2 ms-1">
                            <div class="d-flex align-items-center">
                                <span>App Store</span><img src="{{ asset('front/images/apple-logo.png') }}" width="25px" alt="" />
                            </div>
                        </button>
                        <button class="btn btn-main mb-2 ms-1 text-white">
                            <i class="fa-solid fa-download mx-1"></i> تحميل مباشر
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-6 h-100 d-flex justify-content-end align-items-center">
                <div class="__skeleton rounded-8 img" style="border: 2px solid #6b6b6e">
                    <img src="{{ asset('front/images/main.jpeg') }}" class="rounded-8" style="width: 220px; height: 420px" alt="" />
                </div>
                <div class="__skeleton rounded-8 img" style="border: 2px solid #6b6b6e; margin-right: -90px">
                    <img src="{{ asset('front/images/main2.jpeg') }}" class="rounded-8" style="width: 220px; height: 420px" alt="" />
                </div>
            </div>
        </div>
    </main>

    <!-- <div style="height: 300vh;"></div> -->
    <section class="about-us mt-5 py-5 d-flex position-relative" style="height: 100vh">
        <div class="blur-shape" style="top: 20%; left: 10%; background-color: #5543cc7a; z-index: -1"></div>
        <div class="blur-shape"
            style="
          bottom: 20%;
          right: 10%;
          background-color: #43ccaa7a;
          z-index: -1;
        ">
        </div>

        <div class="container d-flex align-items-center">
            <div>
                <div class="position-relative">
                    <h4 class="_text-dark fw-bold">🎯 أهدافنا</h4>
                </div>
                <div class="row py-5">
                    <div class="col-4 mb-4">
                        <div class="p-4 bg-white rounded-8 shadow-sm border-start border-start-1">
                            <p class="fw-bold fs-7 lh-md text-secondary __skeleton">
                                زيادة الوعي العالمي بقضية فلسطين وحقوق الشعب الفلسطيني.
                            </p>
                        </div>
                    </div>

                    <div class="col-4 mb-4">
                        <div class="p-4 bg-white rounded-8 shadow-sm border-start border-start-2">
                            <p class="fw-bold fs-7 lh-md text-secondary __skeleton">
                                نشر قصص الصمود والتحديات التي يواجهها الشعب الفلسطيني في
                                حياتهم.
                            </p>
                        </div>
                    </div>

                    <div class="col-4 mb-4">
                        <div class="p-4 bg-white rounded-8 shadow-sm border-start border-start-3">
                            <p class="fw-bold fs-7 lh-md text-secondary __skeleton">
                                توسيع شبكة التضامن الدولي والتفاعل مع المؤيدين للقضية
                                الفلسطينية.
                            </p>
                        </div>
                    </div>

                    <div class="col-4 mb-4">
                        <div class="p-4 bg-white rounded-8 shadow-sm border-start border-start-4">
                            <p class="fw-bold fs-7 lh-md text-secondary __skeleton">
                                تعزيز الوعي بالتاريخ والثقافة الفلسطينية للحفاظ على التراث
                                الثقافي.
                            </p>
                        </div>
                    </div>

                    <div class="col-4 mb-4">
                        <div class="p-4 bg-white rounded-8 shadow-sm border-start border-start-5">
                            <p class="fw-bold fs-7 lh-md text-secondary __skeleton">
                                دعم المشاريع الإنسانية والاجتماعية لتحسين ظروف الحياة في
                                فلسطين.
                            </p>
                        </div>
                    </div>

                    <div class="col-4 mb-4">
                        <div class="p-4 bg-white rounded-8 shadow-sm border-start border-start-6">
                            <p class="fw-bold fs-7 lh-md text-secondary __skeleton">
                                تعزيز الحوار والتفاهم بين الأطراف المعنية لتحقيق السلام
                                والعدالة في المنطقة.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="who-we-are mt-5 py-5 d-flex position-relative" style="height: 100vh">
        <div class="blur-shape" style="top: 20%; left: 10%; background-color: #5543cc7a; z-index: -1"></div>
        <div class="blur-shape"
            style="
          bottom: 20%;
          right: 10%;
          background-color: #f0ed447a;
          z-index: -1;
        ">
        </div>
        <div class="container d-flex align-items-center">
            <div>
                <div class="row py-5">
                    <div class="col-12 col-md-6 fw-bold text-secondary d-flex align-items-center">
                        <div>
                            <div class="position-relative">
                                <h4 class="_text-dark fw-bold">❓من نحن</h4>
                            </div>
                            <div class="mt-5 lh-md">
                                .مجموعة من الشباب الفلسطيني, وظفنا طاقتنا وشغفنا لتحقيق فرق
                                إيجابي وبسيط في خدمة قضيتنا الفلسطينية الشريفة
                                <div class="my-3"></div>
                                ونسعى في
                                <span class="bees4palestine">bees4palestine</span> لنقل
                                الحقيقة وتعزيز الوعي العام حول القضية الفلطسنية وإيصال صوت
                                الشعب إلى المجتمع الدولي, ونطمح لتعزيز التضامن مع قضيتنا ونحث
                                الناس على العمل من أجل العدل والسلام في المنطقة.
                                <div class="my-3"></div>
                                نؤمن بقوة بأن كل جهد صغير يمكن أن يكون له أثر كبير في خدمة
                                فلسطين فلذلك نتطلع إلى دعمكم ومساهمتكم في هذه الرحلة
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="__skeleton d-flex justify-content-center align-items-center">
                            <img src="{{ asset('front/images/whoweare2.png') }}" loading="lazy" class="w-100" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="why-bees mt-5 py-5 d-flex position-relative" style="height: 100vh">
        <div class="blur-shape" style="bottom: 20%; left: 10%; background-color: #43ccaa7a; z-index: -1"></div>
        <div class="container d-flex align-items-center">
            <div>
                <div class="row py-5">
                    <div class="col-12 col-md-6">
                        <div class="__skeleton d-flex justify-content-center align-items-center">
                            <img src="{{ asset('front/images/logo-light.png') }}" loading="lazy" class="w-100" alt="" />
                        </div>
                    </div>
                    <div
                        class="col-12 col-md-6 fw-bold text-secondary d-flex justify-content-center align-items-center">
                        <div>
                            <div class="position-relative">
                                <h4 class="_text-dark fw-bold">🤔 لماذا Bees</h4>
                            </div>
                            <div class="mt-5 lh-md">
                                <span class="bees4palestine">Bees4Palestine</span> هو إسم يرمز
                                إلى التعاضد والعمل الجماعي لدعم القضية الفلسطينية، تمثل النحل
                                في إسمنا وحدة وهدفًا واحدًا للعمل. كما يعكس النموذج الذي يعيشه
                                النحل في الخلية، حيث يعمل النحل معًا بتنسيق مثالي لتحقيق
                                النجاح.
                                <div class="my-3"></div>
                                تمثل الخلية المثالية رمزًا للتضامن والتعاون في مواجهة
                                التحديات.
                                <div class="my-3"></div>
                                بإسم
                                <span class="bees4palestine">Bees4Palestine</span>، نسعى لنشر
                                هذه الروح والمفهوم بين شباب فلسطين والمؤيدين للقضية، نحن نهدف
                                إلى تحفيز التعاون والتضامن وتحقيق أهدافنا المشتركة لدعم الحقوق
                                الفلسطينية ونشر رسالة العدالة والسلام.
                                <div class="my-3"></div>
                                باختيار اسم
                                <span class="bees4palestine">Bees4Palestine</span>، نؤكد عزمنا
                                على تحقيق التغيير الإيجابي بجهودنا المشتركة كمجتمع تعاضدي
                                ومتماسك نحو بناء مستقبل أفضل لفلسطين وللمنطقة.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-start text-white position-relative" style="background-color: #222222">
        <div class="blur-shape" style="top: 10%; right: 10%; background-color: #43ccaa2d"></div>
        <div class="blur-shape" style="bottom: 10%; left: 10%; background-color: #5543cc2d"></div>
        <!-- Grid container -->
        <div class="container">

            <hr class="my-5" />
            <!-- Section: Text -->
            <section class="mb-5">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <p class="text-end text-gray-100">
                            نحن منصة Bees4Palestine، نهتم بتقديم فرص فاعلة لدعم القضية
                            الفلسطينية.
                            <br />
                            نقدم تطبيقًا مبتكرًا للهواتف المحمولة يتيح للشباب المشاركة في
                            مهمات معينة لكشف جرائم الاحتلال والتصدي للظلم.
                            <br />
                            ننشر مهامًا مختلفة ومتنوعة عبر التطبيق لنشر الوعي بالوضع
                            الفلسطيني وتعزيز التضامن الدولي.
                            <br />
                            يهدف تطبيقنا إلى جعل كل فعل بسيط يسهم في مساندة الشعب الفلسطيني
                            ونشر رسالتهم بالعدالة والسلام.
                        </p>
                        <section class="text-end my-5">
                            <div class="fs-8 mb-2 text-muted">
                                تابعنا عبر منصات التواصل الإجتماعي:
                            </div>
                            <a href="" class="text-white ms-4"><i class="fab fs-5 fa-facebook-f"></i></a>
                            <a href="" class="text-white ms-4"><i class="fab fs-5 fa-twitter"></i></a>
                            <a href="" class="text-white ms-4"><i class="fab fs-5 fa-instagram"></i></a>
                        </section>
                    </div>
                    <div class="col-12 col-md-6">
                        <div>
                            <div class="d-flex flex-column">
                                <div class="text-gray-100 mb-3">
                                    قم بتحميل التطبيق بإحدى الخيارات التالية:
                                </div>
                                <div>
                                    <button class="w-40 btn btn-dark mb-4">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <span>Google Play</span><img src="{{ asset('front/images/google-play-logo.png') }}"
                                                width="30px" alt="" />
                                        </div>
                                    </button>
                                </div>
                                <div>
                                    <button class="w-40 btn btn-dark mb-4">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <span>App Store</span><img src="{{ asset('front/images/apple-logo.png') }}" width="25px"
                                                alt="" />
                                        </div>
                                    </button>
                                </div>
                                <div>
                                    <button class="w-40 btn btn-main mb-4 text-white">
                                        <i class="fa-solid fa-download mx-1"></i> تحميل مباشر
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Section: Text -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center text-gray-100 p-3 fw-light fs-8" style="background-color: rgba(0, 0, 0, 0.2)">
            © 2023 Copyright:
            <a class="text-white" href="http://bees4palestine.org/">bees4palestine.org</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->

    <script src="{{ asset('front/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front/js/popper.min.js') }}"></script>
    <script>
        const allSkeleton = document.querySelectorAll(".__skeleton");

        window.addEventListener("load", function() {
            /* setTimeout(function () { */
            allSkeleton.forEach((item) => {
                item.classList.remove("__skeleton");
            });
            /* }, 2000); */
        });
    </script>
</body>

</html>
