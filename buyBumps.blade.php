@include('head.head')

<div class="wrapper" id="wrapper">

@include('head.header')


    <main class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <form method="post" action="" class="formBumps" enctype='multipart/form-data'>
                    @csrf
                    <div class="about-updating bumps__container">
                        <div class="updating-box-1">
                            <h2 class="title-updating">Save your money - buy package of Bumps</h2>
                            <div class="container-checkbox">
                                <div class="box-checkbox">
                                    <label>
                                        <input class="checkbox" type="radio" value="20"
                                               name="bumps">
                                        <span class="checkbox-custom"></span>
                                        <span class="label">20 bumps - 18$</span>
                                    </label>
                                    <label>
                                        <input class="checkbox" type="radio" value="30"
                                               name="bumps">
                                        <span class="checkbox-custom"></span>
                                        <span class="label">30 bumps - 26$</span>
                                    </label>
                                    <label>
                                        <input class="checkbox" type="radio" value="40"
                                               name="bumps">
                                        <span class="checkbox-custom"></span>
                                        <span class="label">40 bumps - 34$</span>
                                    </label>
                                </div>
                                <div class="box-checkbox">
                                    <label>
                                        <input class="checkbox" type="radio" value="100"
                                               name="bumps">
                                        <span class="checkbox-custom"></span>
                                        <span class="label">100 bumps - 80$</span>
                                    </label>
                                    <label>
                                        <input class="checkbox" type="radio" value="200"
                                               name="bumps">
                                        <span class="checkbox-custom"></span>
                                        <span class="label">200 bumps - 150$</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    <input type="submit" class="btn btn-success bumps__btn buy__bumps" value="Buy">
                </form>
            </div>
        </div>

    </main>

@include('footer.footer')
