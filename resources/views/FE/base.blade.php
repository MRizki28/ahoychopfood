<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header class="bg-white sticky top-0 z-50">
        @include('FE.layouts.navbar')
    </header>
    <section class="testing" id="home">
        @include('FE.Contents.hero')
    </section>
    <section class="bg-[#FEFAF5]" id="menu">
        @include('FE.Contents.menu')
    </section>
    <section class="bg-white" id="service">
        @include('FE.Contents.tasty')
    </section>
    <section class="category" id="information">
        @include('FE.Contents.blog')
    </section>
    <section class="bg-white" id="site">
        @include('FE.Contents.map')
    </section>
    <section class="footer-bg" id="footer">
        @include('FE.layouts.footer')
    </section>
</body>


<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();

            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
    AOS.init();
</script>

</html>
