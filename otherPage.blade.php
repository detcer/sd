@include('head.head')

<body>
<div class="wrapper" id="wrapper">
    @include('head.header')
    <main>
        <section class="title-box">
            <div class="container">
                {!! $content !!}
            </div>
        </section>
   </main>

@include('footer.footer')
