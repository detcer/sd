@include('head.head')

<body>

<div class="wrapper" id="wrapper">

    @include('head.header')

    <main class="container">
        <div class="row">
            <div class="col-12">

                @php echo $content->content ; @endphp
            </div>
        </div>
    </main>

@include('footer.footer')
