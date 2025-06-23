
@extends('front_end.app')
@section('content')
    <div class="page-wrapper">
        @include('front_end.common.header')
        <!-- Start of Main -->
        <main class="main">

        
      

      
        
            
   
    <!-- End of Container grey-section -->

    
            <!-- End of Tab -->
            <div class="tab-content product-wrapper appear-animate">
                <div class="tab-pane active pt-4" id="tab1-1">
                    <div class="row cols-xl-5 cols-md-4 cols-sm-3 cols-2">
        @foreach ($productDetails as $product)
            @php
                // Decode product_detail_image (JSON)
                $images = json_decode($product->product_detail_image, true);
                $image = $images[0] ?? 'default.jpg';

                // Calculate save amount
                $saveAmount = $product->retail_price - $product->selling_price;

                // Pincode logic
                $adcartbtn = 'd-block';
                $adcartbtnactinact = session()->has('pincode') ? 'enable' : 'disabled';
                $pincodetxtbtn = session()->has('pincode') ? 'd-none' : 'd-block';
            @endphp

            <div class="product-wrap col-md-2">
                <div class="product text-center">
                    <figure class="product-media">
                        <a href="{{ route('getProduct', $product->id) }}">
                            <img src="{{ asset('assets/images/products/detail/' . $image) }}"
                                 alt="Product"
                                 width="300"
                                 height="308" />
                        </a>

                        <div class="product-action-vertical">
                            <a href="{{ route('getProduct', $product->id) }}"
                               class="btn-product-icon w-icon-cart"
                               title="Add to cart"></a>

                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart" title="Add to wishlist"></a>
                            <a href="#" class="btn-product-icon btn-quickview w-icon-search" title="Quickview"></a>
                        </div>
                    </figure>

                    <div class="product-details">
                        <h4 class="product-name">
                            <a href="{{ route('getProduct', $product->id) }}">
 <p> {{ $product->attributename1 }} {{ $product->attributevalue1 }}</p>
                                SKU: {{ $product->sku }}
                            </a>
                        </h4>

                        <div class="ratings-container">
                            <div class="ratings-full">
                                <span class="ratings" style="width: 100%;"></span>
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <a href="{{ route('getProduct', $product->id) }}" class="rating-reviews">(5 reviews)</a>
                        </div>

                        <div class="product-price">
                            <ins class="new-price">₹{{ $product->selling_price }}</ins>
                            <del class="old-price">₹{{ $product->retail_price }}</del>

                            @if ($saveAmount > 0)
                                <span class="save-price"> (Save ₹{{ $saveAmount }})</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
                </div>
                <!-- End of Tab Pane -->
                

          
            <h2 class="title title-underline mb-4 ls-normal appear-animate">Our Clients</h2>
            <div class="swiper-container swiper-theme brands-wrapper mb-9 appear-animate"
                data-swiper-options="{
    'spaceBetween': 0,
    'slidesPerView': 2,
    'breakpoints': {
    '576': {
    'slidesPerView': 3
    },
    '768': {
    'slidesPerView': 4
    },
    '992': {
    'slidesPerView': 5
    },
    '1200': {
    'slidesPerView': 6
    }
    }
    }">
                <div class="swiper-wrapper row gutter-no cols-xl-6 cols-lg-5 cols-md-4 cols-sm-3 cols-2">
                    <div class="swiper-slide brand-col">
                        <figure class="brand-wrapper">
                            <img src="{{ asset('website_assets/images/demos/demo1/brands/1.png') }}" alt="Brand"
                                width="410" height="186" />
                        </figure>
                        <figure class="brand-wrapper">
                            <img src="{{ asset('website_assets/images/demos/demo1/brands/2.png') }}" alt="Brand"
                                width="410" height="186" />
                        </figure>
                    </div>
                    <div class="swiper-slide brand-col">
                        <figure class="brand-wrapper">
                            <img src="{{ asset('website_assets/images/demos/demo1/brands/3.png') }}" alt="Brand"
                                width="410" height="186" />
                        </figure>
                        <figure class="brand-wrapper">
                            <img src="{{ asset('website_assets/images/demos/demo1/brands/4.png') }}" alt="Brand"
                                width="410" height="186" />
                        </figure>
                    </div>
                    <div class="swiper-slide brand-col">
                        <figure class="brand-wrapper">
                            <img src="{{ asset('website_assets/images/demos/demo1/brands/5.png') }}" alt="Brand"
                                width="410" height="186" />
                        </figure>
                        <figure class="brand-wrapper">
                            <img src="{{ asset('website_assets/images/demos/demo1/brands/6.png') }}" alt="Brand"
                                width="410" height="186" />
                        </figure>
                    </div>
                    <div class="swiper-slide brand-col">
                        <figure class="brand-wrapper">
                            <img src="{{ asset('website_assets/images/demos/demo1/brands/7.png') }}" alt="Brand"
                                width="410" height="186" />
                        </figure>
                        <figure class="brand-wrapper">
                            <img src="{{ asset('website_assets/images/demos/demo1/brands/8.png') }}" alt="Brand"
                                width="410" height="186" />
                        </figure>
                    </div>
                    <div class="swiper-slide brand-col">
                        <figure class="brand-wrapper">
                            <img src="{{ asset('website_assets/images/demos/demo1/brands/9.png') }}" alt="Brand"
                                width="410" height="186" />
                        </figure>
                        <figure class="brand-wrapper">
                            <img src="{{ asset('website_assets/images/demos/demo1/brands/10.png') }}" alt="Brand"
                                width="410" height="186" />
                        </figure>
                    </div>
                    <div class="swiper-slide brand-col">
                        <figure class="brand-wrapper">
                            <img src="{{ asset('website_assets/images/demos/demo1/brands/11.png') }}" alt="Brand"
                                width="410" height="186" />
                        </figure>
                        <figure class="brand-wrapper">
                            <img src="{{ asset('website_assets/images/demos/demo1/brands/12.png') }}" alt="Brand"
                                width="410" height="186" />
                        </figure>
                    </div>
                </div>
            </div>
            <!-- End of Brands Wrapper -->


            <!-- Post Wrapper -->

            {{-- <h2 class="title title-underline mb-4 ls-normal appear-animate">Your Recent Views</h2>
            <div class="swiper-container swiper-theme shadow-swiper appear-animate pb-4 mb-8"
                data-swiper-options="{
    'spaceBetween': 20,
    'slidesPerView': 2,
    'breakpoints': {
    '576': {
    'slidesPerView': 3
    },
    '768': {
    'slidesPerView': 5
    },
    '992': {
    'slidesPerView': 6
    },
    '1200': {
    'slidesPerView': 8
    }
    }
    }">
                <div class="swiper-wrapper row cols-xl-8 cols-lg-6 cols-md-4 cols-2">
                    <div class="swiper-slide product-wrap mb-0">
                        <div class="product text-center product-absolute">
                            <figure class="product-media">
                                <a href="product-defaproduct-default.html">
                                    <img src="{{ asset('website_assets/images/demos/demo1/products/7-1.jpg') }}"
                                        alt="Category image" width="130" height="146"
                                        style="background-color: #fff" />
                                </a>
                            </figure>
                            <h4 class="product-name">
                                <a href="product-default.html">Women's Fashion Handbag</a>
                            </h4>
                        </div>
                    </div>
                    <!-- End of Product Wrap -->
                    <div class="swiper-slide product-wrap mb-0">
                        <div class="product text-center product-absolute">
                            <figure class="product-media">
                                <a href="product-defaproduct-default.html">
                                    <img src="{{ asset('website_assets/images/demos/demo1/products/7-2.jpg') }}"
                                        alt="Category image" width="130" height="146"
                                        style="background-color: #fff" />
                                </a>
                            </figure>
                            <h4 class="product-name">
                                <a href="product-default.html">Electric Frying Pan</a>
                            </h4>
                        </div>
                    </div>
                    <!-- End of Product Wrap -->
                    <div class="swiper-slide product-wrap mb-0">
                        <div class="product text-center product-absolute">
                            <figure class="product-media">
                                <a href="product-defaproduct-default.html">
                                    <img src="{{ asset('website_assets/images/demos/demo1/products/7-3.jpg') }}"
                                        alt="Category image" width="130" height="146"
                                        style="background-color: #fff" />
                                </a>
                            </figure>
                            <h4 class="product-name">
                                <a href="product-default.html">Black Winter Skating</a>
                            </h4>
                        </div>
                    </div>
                    <!-- End of Product Wrap -->
                    <div class="swiper-slide product-wrap mb-0">
                        <div class="product text-center product-absolute">
                            <figure class="product-media">
                                <a href="product-defaproduct-default.html">
                                    <img src="{{ asset('website_assets/images/demos/demo1/products/7-4.jpg') }}"
                                        alt="Category image" width="130" height="146"
                                        style="background-color: #fff" />
                                </a>
                            </figure>
                            <h4 class="product-name">
                                <a href="product-default.html">HD Television</a>
                            </h4>
                        </div>
                    </div>
                    <!-- End of Product Wrap -->
                    <div class="swiper-slide product-wrap mb-0">
                        <div class="product text-center product-absolute">
                            <figure class="product-media">
                                <a href="product-defaproduct-default.html">
                                    <img src="{{ asset('website_assets/images/demos/demo1/products/7-5.jpg') }}"
                                        alt="Category image" width="130" height="146"
                                        style="background-color: #fff" />
                                </a>
                            </figure>
                            <h4 class="product-name">
                                <a href="product-default.html">Home Sofa</a>
                            </h4>
                        </div>
                    </div>
                    <!-- End of Product Wrap -->
                    <div class="swiper-slide product-wrap mb-0">
                        <div class="product text-center product-absolute">
                            <figure class="product-media">
                                <a href="product-defaproduct-default.html">
                                    <img src="{{ asset('website_assets/images/demos/demo1/products/7-6.jpg') }}"
                                        alt="Category image" width="130" height="146"
                                        style="background-color: #fff" />
                                </a>
                            </figure>
                            <h4 class="product-name">
                                <a href="product-default.html">USB Receipt</a>
                            </h4>
                        </div>
                    </div>
                    <!-- End of Product Wrap -->
                    <div class="swiper-slide product-wrap mb-0">
                        <div class="product text-center product-absolute">
                            <figure class="product-media">
                                <a href="product-defaproduct-default.html">
                                    <img src="{{ asset('website_assets/images/demos/demo1/products/7-7.jpg') }}"
                                        alt="Category image" width="130" height="146"
                                        style="background-color: #fff" />
                                </a>
                            </figure>
                            <h4 class="product-name">
                                <a href="product-default.html">Electric Rice-Cooker</a>
                            </h4>
                        </div>
                    </div>
                    <!-- End of Product Wrap -->
                    <div class="swiper-slide product-wrap mb-0">
                        <div class="product text-center product-absolute">
                            <figure class="product-media">
                                <a href="product-defaproduct-default.html">
                                    <img src="{{ asset('website_assets/images/demos/demo1/products/7-8.jpg') }}"
                                        alt="Category image" width="130" height="146"
                                        style="background-color: #fff" />
                                </a>
                            </figure>
                            <h4 class="product-name">
                                <a href="product-default.html">Table Lamp</a>
                            </h4>
                        </div>
                    </div>
                    <!-- End of Product Wrap -->
                </div>
                <div class="swiper-pagination"></div>
            </div> --}}
            <!-- End of Reviewed Producs -->
        </div>
        <!-- End of Container -->
    </section>
    <!-- End of Grey Section -->
    </main>
    </div>
    <!-- The Modal -->
   
    <div class="product-action">
        <a href="#" class="btn-product btn-cart" title="Add to Cart"><i class="w-icon-cart"></i> Bid Amount</a>
        <button id="myBtn">Open Modal</button>
    </div>
    
@endsection
