@if (count($prods) > 0)
    @foreach ($prods as $key => $prod)
        <li>
            <a href="{{ route('front.product', $prod->slug) }}" class="all_prod_img">
                <img src="{{ $prod->thumbnail ? asset('assets/images/thumbnails/'.$prod->thumbnail):asset('assets/images/noimage.png') }}" alt="">
            </a>
            <span class="all_prod_name">{{ $prod->showName() }}</span>
            <span class="all_prod_price">{!! $prod->showPrice() !!}{!! (!empty($prod->showPreviousPrice()))?'<small style="text-decoration:line-through">'.$prod->showPreviousPrice().'</small>':'' !!}</span>
            <div class="all_prod_btn"><a href="{{ route('front.product', $prod->slug) }}">Buy</a></div>
        </li>

        {{--<div class="col-lg-4 col-md-4 col-6 remove-padding">
            <a href="{{ route('front.product', $prod->slug) }}" class="item">
                <div class="item-img">
                    @if(!empty($prod->features))
                        <div class="sell-area">
                            @foreach($prod->features as $key => $data1)
                                <span class="sale" style="background-color:{{ $prod->colors[$key] }}">{{ $prod->features[$key] }}</span>
                            @endforeach
                        </div>
                    @endif
                    <div class="extra-list">
                        <ul>
                            <li>
                                @if(Auth::guard('web')->check())

                                    <span class="add-to-wish" data-href="{{ route('user-wishlist-add',$prod->id) }}" data-toggle="tooltip" data-placement="right" title="{{ $langg->lang54 }}" data-placement="right"><i class="icofont-heart-alt" ></i>
																</span>

                                @else

                                    <span rel-toggle="tooltip" title="{{ $langg->lang54 }}" data-toggle="modal" id="wish-btn" data-target="#comment-log-reg" data-placement="right">
																	<i class="icofont-heart-alt"></i>
																</span>

                                @endif
                            </li>
                            <li>
																<span class="add-to-compare" data-href="{{ route('product.compare.add',$prod->id) }}"  data-toggle="tooltip" data-placement="right" title="{{ $langg->lang57 }}" data-placement="right">
																	<i class="icofont-exchange"></i>
																</span>
                            </li>
                        </ul>
                    </div>
                    <img class="img-fluid" src="{{ $prod->thumbnail ? asset('assets/images/thumbnails/'.$prod->thumbnail):asset('assets/images/noimage.png') }}" alt="">
                </div>
                <div class="info">
                    <div class="stars">
                        <div class="ratings">
                            <div class="empty-stars"></div>
                            <div class="full-stars" style="width:{{App\Models\Rating::ratings($prod->id)}}%"></div>
                        </div>
                    </div>
                    <h4 class="price">{{ $prod->setCurrency() }} <del><small>{{ $prod->showPreviousPrice() }}</small></del></h4>
                    <h5 class="name">{{ $prod->showName() }}</h5>
                    <div class="item-cart-area">
                        @if($prod->product_type == "affiliate")
                            <span class="add-to-cart-btn affilate-btn"
                                  data-href="{{ route('affiliate.product', $prod->slug) }}"><i class="icofont-cart"></i>
                                {{ $langg->lang251 }}
																</span>
                        @else
                            @if($prod->emptyStock())
                                <span class="add-to-cart-btn cart-out-of-stock">
																	<i class="icofont-close-circled"></i> {{ $langg->lang78 }}
																</span>
                            @else
                                <span class="add-to-cart add-to-cart-btn" data-href="{{ route('product.cart.add',$prod->id) }}">
																	<i class="icofont-cart"></i> {{ $langg->lang56 }}
																</span>
                                <span class="add-to-cart-quick add-to-cart-btn"
                                      data-href="{{ route('product.cart.quickadd',$prod->id) }}">
																	<i class="icofont-cart"></i> {{ $langg->lang251 }}
																</span>
                            @endif
                        @endif
                    </div>
                </div>
            </a>

        </div>--}}
    @endforeach
    <div class="row" style="clear: both">
        <div class="col-lg-12">
            <div class="page-center mt-5">
                {!! $prods->appends(['search' => request()->input('search')])->links() !!}
            </div>
        </div>
    </div>
@else
    <div class="row" style="clear: both">
        <div class="col-lg-12">
            <div class="alert alert-danger">
                <strong>Sorry!</strong> No record found.</a>
            </div>
        </div>
    </div>
@endif


@if(isset($ajax_check))


    <script type="text/javascript">


        // Tooltip Section


        $('[data-toggle="tooltip"]').tooltip({
        });
        $('[data-toggle="tooltip"]').on('click',function(){
            $(this).tooltip('hide');
        });




        $('[rel-toggle="tooltip"]').tooltip();

        $('[rel-toggle="tooltip"]').on('click',function(){
            $(this).tooltip('hide');
        });


        // Tooltip Section Ends

    </script>

@endif