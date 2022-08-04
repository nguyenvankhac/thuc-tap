@extends('layout.master')
@section('main')
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6 class="coupon__link"><span class="icon_tag_alt"></span> <a href="#">Have a coupon?</a> Click
                        here to enter your code.</h6>
                </div>
            </div>
            <form action="" class="checkout__form" method="POST">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-lg-12">
                        <h5>Billing detail</h5>
                        <div class="row">
                            <div class="col-lg-12">
                                    @error('email')
                                    <small>{{$message}}</small>
                                    @enderror
                                <div class="checkout__form__input">
                                    <p> email <span>*</span></p>
                                    <input type="text" name="email">
                                </div>
                            

                                @error('password')
                                    <small>{{$message}}</small>
                                @enderror
                                <div class="checkout__form__input">
                                    <p>Account Password <span>*</span></p>
                                    <input type="password" name="password">
                                </div>
                             
                            </div>
                            <div class="col-lg-12">
                                <div class="checkout__form__checkbox">
                                    <label for="acc">
                                        Create an acount?
                                        <input type="checkbox" id="acc">
                                        <span class="checkmark"></span>
                                    </label>
                                    <p>Create am acount by entering the information below. If you are a returing
                                        customer login at the <br />top of the page</p>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                   
                    
                            <button type="submit" class="site-btn">submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@stop()