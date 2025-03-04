@extends('admin.page.filter');


@section('filter')

    <h2 class="select-title text-center">Select your location:</h2>
    <section class="location">
        <div class="container">
            <div class="location-container">
                <form method="GET" class="form-loc" action="{{ route('admin.pageEdit.state') }}" style="display:flex; justify-content: space-between;">
                    @csrf
                    <div class="select-box">
                        <div class="select-box ">
                            <select name="state"  data-style="btn-inverse" required="" title="State" size="5" class="selectpicker" data-live-search="true" id="selectState" tabindex="-98"><option class="bs-title-option" value=""></option>
                                <option value="3919">Alabama</option>
                                <option value="3920">Alaska</option>
                                <option value="3921">Arizona</option>
                                <option value="3922">Arkansas</option>
                                <option value="3924">California</option>
                                <option value="3926">Colorado</option>
                                <option value="3927">Connecticut</option>
                                <option value="3928">Delaware</option>
                                <option value="3929">District of Columbia</option>
                                <option value="3930">Florida</option>
                                <option value="3931">Georgia</option>
                                <option value="3932">Hawaii</option>
                                <option value="3933">Idaho</option>
                                <option value="3934">Illinois</option>
                                <option value="3935">Indiana</option>
                                <option value="3936">Iowa</option>
                                <option value="3937">Kansas</option>
                                <option value="3938">Kentucky</option>
                                <option value="3939">Louisiana</option>
                                <option value="3941">Maine</option>
                                <option value="3942">Maryland</option>
                                <option value="3943">Massachusetts</option>
                                <option value="3945">Michigan</option>
                                <option value="3946">Minnesota</option>
                                <option value="3947">Mississippi</option>
                                <option value="3948">Missouri</option>
                                <option value="3949">Montana</option>
                                <option value="3950">Nebraska</option>
                                <option value="3951">Nevada</option>
                                <option value="3952">New Hampshire</option>
                                <option value="3953">New Jersey</option>
                                <option value="3955">New Mexico</option>
                                <option value="3956">New York</option>
                                <option value="3957">North Carolina</option>
                                <option value="3958">North Dakota</option>
                                <option value="3959">Ohio</option>
                                <option value="3960">Oklahoma</option>
                                <option value="3962">Oregon</option>
                                <option value="3963">Pennsylvania</option>
                                <option value="3965">Rhode Island</option>
                                <option value="3966">South Carolina</option>
                                <option value="3967">South Dakota</option>
                                <option value="3969">Tennessee</option>
                                <option value="3970">Texas</option>
                                <option value="3972">Utah</option>
                                <option value="3973">Vermont</option>
                                <option value="3974">Virginia</option>
                                <option value="3975">Washington</option>
                                <option value="3976">West Virginia</option>
                                <option value="3977">Wisconsin</option>
                                <option value="3978">Wyoming</option>

                            </select>

                        </div>
                    </div>
                    <div class="button-send-wrap">
                        <button type="submit" class="btn btn-inverse">Select</button>
                    </div>

                </form>
            </div>
        </div>
    </section>

@endsection;
