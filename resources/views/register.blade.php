@extends('layout.master')
@section('main')
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <span>Shopping cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Checkout Section Begin -->
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
                            <div class="col-lg-6">
                                <div class="checkout__form__input">
                                    <p> Name <span>*</span></p>
                                    <input type="text" name="name">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="checkout__form__input">
                                    <p>Email <span>*</span></p>
                                    <input type="email" name="email">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Phone <span>*</span></p>
                                    <input type="text" name="phone">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">

                                <div class="checkout__form__input">
                                    <p>Address <span>*</span></p>
                                    <input type="text" name="address">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>birthday <span>*</span></p>
                                    <input type="text" name="birthday">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>gender <span>*</span></p>
                                 
                                 <div class="radio">
                                     <label>
                                         <input type="radio" name="gender"  value="0">
                                         Radio Box
                                     </label>
                                     <label>
                                         <input type="radio" name="gender"  value="1">
                                         Radio Box
                                     </label>
                                 </div>
                                 
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
                                <div class="checkout__form__input">
                                    <p>Account Password <span>*</span></p>
                                    <input type="password" name="password">
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