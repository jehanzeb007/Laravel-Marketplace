
<div class="footer_icon">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5 order-lg-0"> <a href="{{ route('front.index') }}" class="footer_logo"><img src="{{asset('assets/images/'.$gs->footer_logo)}}" alt=""></a>
                <p {{--class="footer_text"--}}>{!! $gs->footer !!}</p>
            </div>
            <div class="col-lg-3 col-md-7  order-lg-4">
                <h4 class="footer_heading">Newsletter</h4>
                <div class="subscriber_form">
                    <form action="{{route('front.subscribe')}}" id="subscribeform" method="POST">
                        {{csrf_field()}}
                        <input type="email" name="email"  placeholder="{{ $langg->lang741 }}" required="">
                        <input id="sub-btn" type="submit" value="{{ strtolower($langg->lang742) }}">
                    </form>
                </div>
                <p class="footer_phone">{!! $gs->below_subscriber !!}</p>
                <ul class="footer_social">
                    @php
                        $social_row = App\Models\Socialsetting::find(1);
                    @endphp
                    @if(!empty($social_row->facebook))
                        <li>
                            <a href="{{ $social_row->facebook }}" class="facebook" target="_blank"><img src="{{url('/front-end/images/fb_icon.png')}}" style="width: 10px;" alt=""></a>
                        </li>
                    @endif
                    @if(!empty($social_row->twitter))
                        <li>
                            <a href="{{ $social_row->twitter }}" class="twitter" target="_blank"><img src="{{url('/front-end/images/twitter_icon.png')}}" style="width: 20px;" alt=""></a></li>
                    @endif

                    @if(!empty($social_row->linkedin))
                        <li>
                            <a href="{{ $social_row->linkedin }}" class="linkedin" target="_blank"><img src="{{url('/front-end/images/linkdin_icon.png')}}" style="width: 20px" alt="" ></a></li>
                    @endif
                    @if(!empty($social_row->instagram))
                        <li>
                            <a href="{{ $social_row->instagram }}" class="linkedin" target="_blank"><img src="{{url('/front-end/images/insta_icon.png')}}" style="width: 20px" alt="" ></a></li>
                    @endif
                    @if(!empty($social_row->youtube))
                        <li>
                            <a href="{{ $social_row->youtube }}" class="linkedin" target="_blank"><img src="{{url('/front-end/images/youtube_icon.png')}}" style="width: 20px" alt="" ></a></li>
                    @endif

                </ul>
            </div>

            <div class="col-lg-2 col-md-4 order-lg-1">
                <h4 class="footer_heading">{!! $gs->menu_1_heading !!}</h4>
                <div class="footer_links">
                    @foreach(DB::table('pages')->where('footer_menu_1','=','1')->get() as $data)
                        <a href="{{ route('front.page',$data->slug) }}">
                            {{ $data->title }}
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-2 col-md-4 order-lg-2">
                <h4 class="footer_heading">{!! $gs->menu_2_heading !!}</h4>
                <div class="footer_links">
                    @foreach(DB::table('pages')->where('footer_menu_2','=','1')->get() as $data)
                        <a href="{{ route('front.page',$data->slug) }}">
                            {{ $data->title }}
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-2 col-md-4 order-lg-3">
                <h4 class="footer_heading">{!! $gs->menu_3_heading !!}</h4>
                <div class="footer_links">
                    @foreach(DB::table('pages')->where('footer_menu_3','=','1')->get() as $data)
                        <a href="{{ route('front.page',$data->slug) }}">
                            {{ $data->title }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="copyright_text"> {!! $gs->copyright !!} </div>


<!-- LOGIN MODAL -->
<div class="modal fade" id="comment-log-reg" tabindex="-1" role="dialog" aria-labelledby="comment-log-reg-Title"
     aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <nav class="comment-log-reg-tabmenu">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link login active" id="nav-log-tab1" data-toggle="tab" href="#nav-log1"
                           role="tab" aria-controls="nav-log" aria-selected="true">
                            {{ $langg->lang197 }}
                        </a>
                        <a class="nav-item nav-link" id="nav-reg-tab1" data-toggle="tab" href="#nav-reg1" role="tab"
                           aria-controls="nav-reg" aria-selected="false">
                            {{ $langg->lang198 }}
                        </a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-log1" role="tabpanel"
                         aria-labelledby="nav-log-tab1">
                        <div class="login-area">
                            <div class="header-area">
                                <h4 class="title">{{ $langg->lang172 }}</h4>
                            </div>
                            <div class="login-form signin-form">
                                @include('includes.admin.form-login')
                                <form class="mloginform" action="{{ route('user.login.submit') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-input">
                                        <input type="email" name="email" placeholder="{{ $langg->lang173 }}"
                                               required="">
                                        <i class="icofont-user-alt-5"></i>
                                    </div>
                                    <div class="form-input">
                                        <input type="password" class="Password" name="password"
                                               placeholder="{{ $langg->lang174 }}" required="">
                                        <i class="icofont-ui-password"></i>
                                    </div>
                                    <div class="form-forgot-pass">
                                        <div class="left">
                                            <input type="checkbox" name="remember" id="mrp"
                                                    {{ old('remember') ? 'checked' : '' }}>
                                            <label for="mrp">{{ $langg->lang175 }}</label>
                                        </div>
                                        <div class="right">
                                            <a href="javascript:;" id="show-forgot">
                                                {{ $langg->lang176 }}
                                            </a>
                                        </div>
                                    </div>
                                    <input type="hidden" name="modal" value="1">
                                    <input class="mauthdata" type="hidden" value="{{ $langg->lang177 }}">
                                    <button type="submit" class="submit-btn">{{ $langg->lang178 }}</button>
                                    @if(App\Models\Socialsetting::find(1)->f_check == 1 ||
                                    App\Models\Socialsetting::find(1)->g_check == 1)
                                        <div class="social-area">
                                            <h3 class="title">{{ $langg->lang179 }}</h3>
                                            <p class="text">{{ $langg->lang180 }}</p>
                                            <ul class="social-links">
                                                @if(App\Models\Socialsetting::find(1)->f_check == 1)
                                                    <li>
                                                        <a href="{{ route('social-provider','facebook') }}">
                                                            <i class="fab fa-facebook-f"></i>
                                                        </a>
                                                    </li>
                                                @endif
                                                @if(App\Models\Socialsetting::find(1)->g_check == 1)
                                                    <li>
                                                        <a href="{{ route('social-provider','google') }}">
                                                            <i class="fab fa-google-plus-g"></i>
                                                        </a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-reg1" role="tabpanel" aria-labelledby="nav-reg-tab1">
                        <div class="login-area signup-area">
                            <div class="header-area">
                                <h4 class="title">{{ $langg->lang181 }}</h4>
                            </div>
                            <div class="login-form signup-form">
                                @include('includes.admin.form-login')
                                <form class="mregisterform" action="{{route('user-register-submit')}}"
                                      method="POST">
                                    {{ csrf_field() }}

                                    <div class="form-input">
                                        <input type="text" class="User Name" name="name"
                                               placeholder="{{ $langg->lang182 }}" required="">
                                        <i class="icofont-user-alt-5"></i>
                                    </div>

                                    <div class="form-input">
                                        <input type="email" class="User Name" name="email"
                                               placeholder="{{ $langg->lang183 }}" required="">
                                        <i class="icofont-email"></i>
                                    </div>

                                    <div class="form-input">
                                        <input type="text" class="User Name" name="phone"
                                               placeholder="{{ $langg->lang184 }}" required="">
                                        <i class="icofont-phone"></i>
                                    </div>

                                    <div class="form-input">
                                        <input type="text" class="User Name" name="address"
                                               placeholder="{{ $langg->lang185 }}" required="">
                                        <i class="icofont-location-pin"></i>
                                    </div>

                                    <div class="form-input">
                                        <input type="password" class="Password" name="password"
                                               placeholder="{{ $langg->lang186 }}" required="">
                                        <i class="icofont-ui-password"></i>
                                    </div>

                                    <div class="form-input">
                                        <input type="password" class="Password" name="password_confirmation"
                                               placeholder="{{ $langg->lang187 }}" required="">
                                        <i class="icofont-ui-password"></i>
                                    </div>


                                    @if($gs->is_capcha == 1)

                                        <ul class="captcha-area">
                                            <li>
                                                <p><img class="codeimg1"
                                                        src="{{asset("assets/images/capcha_code.png")}}" alt=""> <i
                                                            class="fas fa-sync-alt pointer refresh_code "></i></p>
                                            </li>
                                        </ul>

                                        <div class="form-input">
                                            <input type="text" class="Password" name="codes"
                                                   placeholder="{{ $langg->lang51 }}" required="">
                                            <i class="icofont-refresh"></i>
                                        </div>


                                    @endif

                                    <input class="mprocessdata" type="hidden" value="{{ $langg->lang188 }}">
                                    <button type="submit" class="submit-btn">{{ $langg->lang189 }}</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- LOGIN MODAL ENDS -->

<!-- FORGOT MODAL -->
<div class="modal fade" id="forgot-modal" tabindex="-1" role="dialog" aria-labelledby="comment-log-reg-Title"
     aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="login-area">
                    <div class="header-area forgot-passwor-area">
                        <h4 class="title">{{ $langg->lang191 }} </h4>
                        <p class="text">{{ $langg->lang192 }} </p>
                    </div>
                    <div class="login-form">
                        @include('includes.admin.form-login')
                        <form id="mforgotform" action="{{route('user-forgot-submit')}}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-input">
                                <input type="email" name="email" class="User Name"
                                       placeholder="{{ $langg->lang193 }}" required="">
                                <i class="icofont-user-alt-5"></i>
                            </div>
                            <div class="to-login-page">
                                <a href="javascript:;" id="show-login">
                                    {{ $langg->lang194 }}
                                </a>
                            </div>
                            <input class="fauthdata" type="hidden" value="{{ $langg->lang195 }}">
                            <button type="submit" class="submit-btn">{{ $langg->lang196 }}</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- FORGOT MODAL ENDS -->


<!-- VENDOR LOGIN MODAL -->
<div class="modal fade" id="vendor-login" tabindex="-1" role="dialog" aria-labelledby="vendor-login-Title" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" style="transition: .5s;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <nav class="comment-log-reg-tabmenu">
                    <div class="nav nav-tabs" id="nav-tab1" role="tablist">
                        <a class="nav-item nav-link login active" id="nav-log-tab11" data-toggle="tab" href="#nav-log11" role="tab" aria-controls="nav-log" aria-selected="true">
                            {{--{{ $langg->lang234 }}--}}
                            Supplier Login
                        </a>
                        <a class="nav-item nav-link" id="nav-reg-tab11" data-toggle="tab" href="#nav-reg11" role="tab" aria-controls="nav-reg" aria-selected="false">
                            {{--{{ $langg->lang235 }}--}}
                            Supplier Registration
                        </a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-log11" role="tabpanel" aria-labelledby="nav-log-tab">
                        <div class="login-area">
                            <div class="login-form signin-form">
                                @include('includes.admin.form-login')
                                <form class="mloginform" action="{{ route('user.login.submit') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-input">
                                        <input type="email" name="email" placeholder="{{ $langg->lang173 }}" required="">
                                        <i class="icofont-user-alt-5"></i>
                                    </div>
                                    <div class="form-input">
                                        <input type="password" class="Password" name="password" placeholder="{{ $langg->lang174 }}" required="">
                                        <i class="icofont-ui-password"></i>
                                    </div>
                                    <div class="form-forgot-pass">
                                        <div class="left">
                                            <input type="checkbox" name="remember"  id="mrp1" {{ old('remember') ? 'checked' : '' }}>
                                            <label for="mrp1">{{ $langg->lang175 }}</label>
                                        </div>
                                        <div class="right">
                                            <a href="javascript:;" id="show-forgot1">
                                                {{ $langg->lang176 }}
                                            </a>
                                        </div>
                                    </div>
                                    <input type="hidden" name="modal"  value="1">
                                    <input type="hidden" name="vendor"  value="1">
                                    <input class="mauthdata" type="hidden"  value="{{ $langg->lang177 }}">
                                    <button type="submit" class="submit-btn">{{ $langg->lang178 }}</button>
                                    @if(App\Models\Socialsetting::find(1)->f_check == 1 || App\Models\Socialsetting::find(1)->g_check == 1)
                                        <div class="social-area">
                                            <h3 class="title">{{ $langg->lang179 }}</h3>
                                            <p class="text">{{ $langg->lang180 }}</p>
                                            <ul class="social-links">
                                                @if(App\Models\Socialsetting::find(1)->f_check == 1)
                                                    <li>
                                                        <a href="{{ route('social-provider','facebook') }}">
                                                            <i class="fab fa-facebook-f"></i>
                                                        </a>
                                                    </li>
                                                @endif
                                                @if(App\Models\Socialsetting::find(1)->g_check == 1)
                                                    <li>
                                                        <a href="{{ route('social-provider','google') }}">
                                                            <i class="fab fa-google-plus-g"></i>
                                                        </a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-reg11" role="tabpanel" aria-labelledby="nav-reg-tab">
                        <div class="login-area signup-area">
                            <div class="login-form signup-form">
                                @include('includes.admin.form-login')
                                <form class="mregisterform" action="{{route('user-register-submit')}}" method="POST" autocomplete="off">
                                    {{ csrf_field() }}

                                    <div class="row">

                                        <div class="col-lg-6">
                                            <div class="form-input">
                                                <input type="text" class="User Name" name="name" placeholder="Enter your company name" required="">
                                                <i class="icofont-user-alt-5"></i>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-input">
                                                <input type="email" class="User Name" name="email" placeholder="{{ $langg->lang183 }}" required="">
                                                <i class="icofont-email"></i>
                                            </div>

                                        </div>
                                        <div class="col-lg-6">

                                            <div class="form-input">
                                                <input type="text" class="User Name" name="address" placeholder="{{ $langg->lang185 }}" required="">
                                                <i class="icofont-location-pin"></i>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-input">
                                                {{Form::select('country',$reg_countries,'',[])}}
                                                <i class="icofont-flag"></i>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-input">
                                                <input type="text" class="User Name" name="phone" placeholder="{{ $langg->lang184 }}" required="">
                                                <i class="icofont-phone"></i>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-input">
                                                <input type="text" class="User Name" name="reg_number" placeholder="{{ $langg->lang242 }}" required="">
                                                <i class="icofont-ui-cart"></i>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-input">
                                                <select name="who_are_you">
                                                    <option value="">Who are you?</option>
                                                    <option value="product">Product Supplier</option>
                                                    <option value="services">Service Supplier</option>
                                                    <option value="both">Product and Service Supplier</option>
                                                </select>
                                                <i class="icofont-building"></i>
                                            </div>

                                        </div>
                                        <div class="col-lg-6 product cats" style="display: none;">
                                            <div class="form-input">
                                                <label>Product Category</label>
                                                <div class="row">
                                                    <div class="col-3">
                                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#product-cat" class="cat_main_anker select_product_cat"><i class="fa fa-plus"></i></a>
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="product_catgeory_cont category_main_cont">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 services cats" style="display: none;">
                                            <div class="form-input">
                                                <label>Service Category</label>
                                                <div class="row">
                                                    <div class="col-3">
                                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#services-cat" class="cat_main_anker select_services_cat"><i class="fa fa-plus"></i></a>
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="services_catgeory_cont category_main_cont">

                                                        </div>
                                                    </div>
                                                </div></div>
                                        </div>
                                        <div class="col-lg-12 visible-lg-block"></div>
                                        <div class="col-lg-12">
                                            <div class="form-input">
                                                <textarea class="User Name" name="shop_message" placeholder="Describe your company in more detail." required=""></textarea>
                                                <i class="icofont-envelope"></i>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-input">
                                                <input type="password" class="Password" name="password" placeholder="{{ $langg->lang186 }}" required="">
                                                <i class="icofont-ui-password"></i>
                                            </div>

                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-input">
                                                <input type="password" class="Password" name="password_confirmation" placeholder="{{ $langg->lang187 }}" required="">
                                                <i class="icofont-ui-password"></i>
                                            </div>
                                        </div>
                                        @if($gs->is_capcha == 1)
                                            <div class="col-lg-6">


                                                <ul class="captcha-area">
                                                    <li>
                                                        <p>
                                                            <img class="codeimg1" src="{{asset("assets/images/capcha_code.png")}}" alt=""> <i class="fas fa-sync-alt pointer refresh_code refresh_captcha_vendor "></i>
                                                        </p>

                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-6">

                                                <div class="form-input">
                                                    <input type="text" class="Password" name="codes" placeholder="{{ $langg->lang51 }}" required="">
                                                    <i class="icofont-refresh"></i>

                                                </div>
                                            </div>
                                        @endif
                                        <div class="col-lg-12">
                                            <h3>Verification Documents</h3>
                                            <div class="form-input">
                                                <label>Please attach your company license, company registrations documents and your identity documents e.g. passport or national id card.</label>
                                            </div>
                                            <input type="file" name="files[]" multiple id="upload_file_vendor_registration">
                                        </div>
                                        <input type="hidden" name="vendor"  value="1">
                                        <input class="mprocessdata" type="hidden"  value="{{ $langg->lang188 }}">
                                        <button type="submit" class="submit-btn">{{ $langg->lang189 }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- VENDOR LOGIN MODAL ENDS -->

<!-- Product Quick View Modal -->

<div class="modal fade" id="quickview" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog quickview-modal modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="submit-loader">
                <img src="{{asset('assets/images/'.$gs->loader)}}" alt="">
            </div>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container quick-view-modal">

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Quick View Modal -->


<!-- Order Tracking modal Start-->
<div class="modal fade" id="track-order-modal" tabindex="-1" role="dialog" aria-labelledby="order-tracking-modal" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title"> <b>{{ $langg->lang772 }}</b> </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="order-tracking-content">
                    <form id="track-form" class="track-form">
                        {{ csrf_field() }}
                        <input type="text" id="track-code" placeholder="{{ $langg->lang773 }}" required="">
                        <button type="submit" class="mybtn1">{{ $langg->lang774 }}</button>
                        <a href="#"  data-toggle="modal" data-target="#order-tracking-modal"></a>
                    </form>
                </div>

                <div>
                    <div class="submit-loader d-none">
                        <img src="{{asset('assets/images/'.$gs->loader)}}" alt="">
                    </div>
                    <div id="track-order">

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Order Tracking modal End -->
<!-- Vendor Cat Modal -->

<div class="modal fade category_modal" id="product-cat" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog quickview-modal modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="h4">Select a category
                    <div class="modal-count">
                        Selected <span></span>
                        <a href="javascript:void(0)" data-dismiss="modal">OK</a>
                    </div></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal_cat">
                    <ul>
                        @php
                            $i=1;
                        @endphp
                        @foreach($categories as $category)
                            <li class="{{count($category->subs) > 0 ? 'dropdown_list':''}} {{ $i >= 15 ? 'rx-child' : '' }}">
                                @if(count($category->subs) > 0)

                                    <div class="link-area">
                                        <a href="javascript:;">
                                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        </a>
                                        <span><input autocomplete="off" type="checkbox" value="main_cat##{{ $category->id }}" class="cat_checkbox" data-name="{{ $category->name }}" style="display: inline-block; margin-right: 5px;">{{ $category->name }}</span>
                                        @if(count($category->subs) > 0)

                                        @endif
                                    </div>

                                @else
                                    <input type="checkbox" autocomplete="off" value="main_cat##{{ $category->id }}" class="cat_checkbox" data-name="{{ $category->name }}" style="display: inline-block; margin-right: 5px;"> {{ $category->name }}</a>

                                @endif
                                @if(count($category->subs) > 0)

                                    @php
                                        $ck = 0;
                                        foreach($category->subs as $subcat) {
                                            if(count($subcat->childs) > 0) {
                                                $ck = 1;
                                                break;
                                            }
                                        }
                                    @endphp
                                    <ul class="{{ $ck == 1 ? 'categories_mega_menu' : 'categories_mega_menu column_1' }}">
                                        @foreach($category->subs as $subcat)
                                            <li>
                                                <input autocomplete="off" type="checkbox" value="sub_cat##{{ $subcat->id }}" class="cat_checkbox" data-name="{{ $subcat->name }}" style="display: inline-block; margin-right: 5px;"><a href="javascript:void(0)">{{$subcat->name}}</a>
                                                @if(count($subcat->childs) > 0)
                                                    <div class="categorie_sub_menu">
                                                        <ul>
                                                            @foreach($subcat->childs as $childcat)
                                                                <li><input autocomplete="off" type="checkbox" value="child_cat##{{ $childcat->id }}" class="cat_checkbox" data-name="{{ $childcat->name }}" style="display: inline-block; margin-right: 5px;">{{$childcat->name}}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>

                                @endif

                            </li>

                            @php
                                $i++;
                            @endphp


                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Vendor Cat Modal -->
<!-- Services Cat Modal -->

<div class="modal fade category_modal" id="services-cat" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog quickview-modal modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="h4">Select a category
                    <div class="modal-count">
                        Selected <span></span>
                        <a href="javascript:void(0)" data-dismiss="modal">OK</a>
                    </div></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal_cat">
                    <ul>
                        @php
                            $i=1;
                        @endphp
                        @foreach($service_categories as $category)

                            <li class="{{count($category->subs) > 0 ? 'dropdown_list':''}} {{ $i >= 15 ? 'rx-child' : '' }}">
                                @if(count($category->subs) > 0)

                                    <div class="link-area">
                                        <a href="javascript:;">
                                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        </a>
                                        <span><input type="checkbox" value="main_cat##{{ $category->id }}" class="cat_checkbox" data-name="{{ $category->name }}" style="display: inline-block; margin-right: 5px;">{{ $category->name }}</span>
                                        @if(count($category->subs) > 0)

                                        @endif
                                    </div>

                                @else
                                    <input type="checkbox" value="main_cat##{{ $category->id }}" class="cat_checkbox" data-name="{{ $category->name }}" style="display: inline-block; margin-right: 5px;"> {{ $category->name }}</a>

                                @endif
                                @if(count($category->subs) > 0)

                                    @php
                                        $ck = 0;
                                        foreach($category->subs as $subcat) {
                                            if(count($subcat->childs) > 0) {
                                                $ck = 1;
                                                break;
                                            }
                                        }
                                    @endphp
                                    <ul class="{{ $ck == 1 ? 'categories_mega_menu' : 'categories_mega_menu column_1' }}">
                                        @foreach($category->subs as $subcat)
                                            <li>
                                                <input type="checkbox" value="sub_cat##{{ $subcat->id }}" class="cat_checkbox" data-name="{{ $subcat->name }}" style="display: inline-block; margin-right: 5px;"><a href="javascript:void(0)">{{$subcat->name}}</a>
                                                @if(count($subcat->childs) > 0)
                                                    <div class="categorie_sub_menu">
                                                        <ul>
                                                            @foreach($subcat->childs as $childcat)
                                                                <li><input type="checkbox" value="sub_cat##{{ $childcat->id }}" class="cat_checkbox" data-name="{{ $childcat->name }}" style="display: inline-block; margin-right: 5px;">{{$childcat->name}}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>

                                @endif

                            </li>

                            @php
                                $i++;
                            @endphp


                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Vendor Cat Modal -->

<!-- Vendor Cat Modal -->

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KBXKJKT"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<script src="{{asset('assets/front/js/jquery.js')}}"></script>
<script type="text/javascript" src="{{url('/front-end/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('/front-end/js/bootstrap-select.min.js')}}"></script>
<script src="{{url('/front-end/js/bootstrap-select-country.min.js')}}"></script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script>
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
    }
    $('.countrypicker').countrypicker();
    $('#vendor-login').on('shown.bs.modal', function (e) {
        $('.refresh_captcha_vendor').trigger('click');
    });
    @if(!auth()->guard('web')->check())
    $(document).ready(function(){
        $("#upload_file_vendor_registration").filer({
            limit: 15,
            maxSize: 100,
            extensions: null,
            changeInput: '<div class="jFiler-input-dragDrop"><div class="jFiler-input-inner"><div class="jFiler-input-icon"><i class="icon-jfi-cloud-up-o"></i></div><div class="jFiler-input-text"><h3>Drag&Drop files here</h3> <span style="display:inline-block; margin: 15px 0">or</span></div><a class="jFiler-input-choose-btn blue">Browse Files</a></div></div>',
            showThumbs: true,
            theme: "dragdropbox",
            dragDrop: {
                dragEnter: null,
                dragLeave: null,
                drop: null,
                dragContainer: null,
            },
            captions: {
                errors: {
                    filesLimit: "Only @{{fi-limit}} files are allowed to be uploaded.",
                    filesType: "Only Images are allowed to be uploaded.",
                    filesSize: "@{{fi-name}} is too large! Please upload file up to @{{fi-maxSize}} MB.",
                    filesSizeAll: "Files you've choosed are too large! Please upload files up to @{{fi-maxSize}} MB."
                }
            },
            files: null,
            addMore: true,
            allowDuplicates: false,
            clipBoardPaste: true,
            excludeName: null,
            beforeRender: null,
            afterRender: null,
            beforeShow: null,
            beforeSelect: null,
            onSelect: null,
            afterShow: null,
            onEmpty: null,
            options: null
        });
    });
    @endif
    $(document).ready(function(){
        $('.selectpicker, .product_select, select.nice').selectpicker();
        $('.lang_select').selectpicker({
            showIcon: true,
        });
        $('select[name=currency], select[name=language]').on('change', function () {
            var url = $(this).val(); // get selected value
            if (url) { // require a URL
                window.location = url; // redirect
            }
            return false;
        });

        $('.modal_cat ul li .link-area').click(function(e){
            var container = $(this).find('input');
            if (!container.is(e.target) && container.has(e.target).length === 0)
            {
                if($(this).next('.categories_mega_menu').is(":visible"))
                {
                    $(this).next('.categories_mega_menu').slideUp();
                    $(this).find('i').removeClass('fa-angle-down');
                    $(this).find('i').addClass('fa-angle-right');
                } else{
                    $(this).next('.categories_mega_menu').slideDown();
                    $(this).find('i').addClass('fa-angle-down');
                    $(this).find('i').removeClass('fa-angle-right');

                }
            }
        });
        $('.cat_checkbox').on('change',function(){
            if($(this).parents('.category_modal').attr('id') == 'product-cat'){
                var type='product';
            }else if($(this).parents('.category_modal').attr('id') == 'quote-cat'){
                var type='quote';
            }else{
                var type='services';
            }

            $('.'+type+'_catgeory_cont').html('');
            var i=0;
            $('.'+type+'_catgeory_cont').parent('div').find('input[type=hidden]').remove();

            $('#'+type+'-cat .cat_checkbox').each(function(){
                if($(this).prop('checked') == true){
                    $('.'+type+'_catgeory_cont').append('<span class="form-cat" data-id="'+$(this).val()+'">'+$(this).data('name')+'<a href="javascript:void(0)" onClick=removeCat(this,"'+type+'")><i class="fa fa-times"></i></a></span>');
                    $('.'+type+'_catgeory_cont').parent('div').append('<input type="hidden" name="'+type+'_categories[]" value="'+$(this).val()+'">');
                    i++;
                }
                $('#'+type+'-cat .modal-count span').text(i);
                if(i >= 1){
                    $('#'+type+'-cat .modal-count').show();
                }
            });
        });

        $('#product-cat, #services-cat').on('show.bs.modal', function (e) {
            $('#vendor-login').modal('hide');
            //$('#vendor-login').css('visibility','hidden');
        });
        $('#product-cat, #services-cat').on('hide.bs.modal', function (e) {
            //$('#vendor-login').css('visibility','visible');
            $('#vendor-login').modal('show');

        });
        /*$('body').on('show.bs.modal', function() {
         $('html').addClass('modal-open');
         });
         $('body').on('hidden.bs.modal', function() {
         $('html').removeClass('modal-open');
         });*/
        $('select[name=who_are_you]').on('change',function(){
            $('.category_main_cont').parent('div').find('input[type=hidden]').remove();
            $('.category_main_cont').find('span').remove();
            $('.cat_checkbox').each(function(){
                $(this).prop('checked',false);
            });
            $('.category_modal .modal-count span').text(0);
            $('.category_modal .modal-count').hide();
            if($(this).val() != 'both'){
                $('.col-lg-6.cats').hide();
                $('.col-lg-6.'+$(this).val()).show();
            }
            else{
                $('.col-lg-6.cats').show();
            }
        });
    });

    function removeCat(_this, type){
        type = $.trim(type);
        $('#'+type+'-cat input.cat_checkbox[value='+$(_this).parents('.form-cat').data('id')+']').prop('checked',false).change();
        $(_this).parents('.form-cat').remove();
        var i=0;
        $('.'+type+'_catgeory_cont').parent('div').find('input[type=hidden]').remove();
        $('#'+type+'-cat .cat_checkbox').each(function(){
            if($(this).prop('checked') == true){
                $('.'+type+'_catgeory_cont').parent('div').append('<input type="hidden" name="category[]" value="'+$(this).val()+'">');
                i=parseInt(i)+1;
            }
            $('#'+type+'-cat .modal-count span').text(i);
            if(i >= 1){
                $('#'+type+'-cat .modal-count').show();
            }
        });
    }
</script>
<script type="text/javascript">
    var $zoho=$zoho || {};$zoho.salesiq = $zoho.salesiq ||
        {widgetcode:"548be5ef21c039ad725904510fbab272000fd1c282c48252d635aabd4319db5f9798270d4337cd11deda006f2483f83e1a2010ab7b6727677d37b27582c0e9c4", values:{},ready:function(){}};
    var d=document;s=d.createElement("script");s.type="text/javascript";s.id="zsiqscript";s.defer=true;
    s.src="https://salesiq.zoho.com/widget";t=d.getElementsByTagName("script")[0];t.parentNode.insertBefore(s,t);d.write("<div id='zsiqwidget'></div>");
</script>