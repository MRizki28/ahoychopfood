<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <section class="testing">
        @include('FE.layouts.navbar')
        @include('FE.Contents.hero')
    </section>
    <section class="category">
        @include('FE.Contents.category')
    </section>
    <section class="bg-[#FEFAF5]">
        @include('FE.Contents.menu')
    </section>
</body>

</html>
