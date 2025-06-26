@extends('front_end.app')
@section('content')
<div class="page-wrapper">
    @include('front_end.common.header')
    <!-- Start of Main -->
    <main class="main">
        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb bb-no">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="{{url('/MainCatergoryproductshow/'.$maincategory->id)}}">{{$maincategory->category_main_name}}</a></li>
                    <li>{{$category->category_name}}</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->
        <input type="hidden" id="cateid" value="{{$category->id}}">
        <!-- Start of Page Content -->
        <div class="page-content">
            <div class="container">
                <hr>
                <div class="text-center">

                </div>

                <!-- Start of Shop Category -->
                <div class="shop-default-category category-ellipse-section mb-6">

                </div>
                <!-- End of Shop Category -->

                <!-- Start of Shop Content -->
                <div class="shop-content row gutter-lg mb-10">
                    <!-- Start of Sidebar, Shop Sidebar -->
                    <aside class="sidebar shop-sidebar sticky-sidebar-wrapper sidebar-fixed">
                        <!-- Start of Sidebar Overlay -->
                        <div class="sidebar-overlay"></div>
                        <a class="sidebar-close" href="#"><i class="close-icon"></i></a>

                        <!-- Start of Sidebar Content -->
                        <div class="sidebar-content scrollable">
                            <!-- Start of Sticky Sidebar -->
                            <div class="sticky-sidebar">
                                <div class="filter-actions">
                                    <label>Filter :</label>
                                    <a href="#" class="btn btn-dark btn-link filter-clean" onclick="location.reload(); return false;">Clean All</a>
                                </div>
                                <!-- Start of Collapsible Widget -->
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title"><label>Price</label></h3>
                                    <div class="widget-body">

                                        <form class="price-range">
                                            <input type="number" name="min_price" id="min_price" class="min_price text-center"
                                                placeholder="₹min"><span class="delimiter">-</span><input
                                                type="number" name="max_price" id="max_price" class="max_price text-center"
                                                placeholder="₹max">
                                            <button type="button"
                                                class="btn btn-primary btn-rounded" id="getproducts">Go</button>
                                        </form>
                                    </div>
                                </div>
                                <!-- End of Collapsible Widget -->

                                <style>
                                    .color-picker {
                                        display: flex;
                                        flex-wrap: wrap;
                                        gap: 5px;
                                        margin-top: 10px;
                                    }

                                    .color-swatch {
                                        width: 25px;
                                        height: 25px;
                                        position: relative;
                                    }

                                    .color-swatch label {
                                        display: block;
                                        width: 100%;
                                        height: 100%;
                                        border: 1px solid #ccc;
                                        cursor: pointer;
                                        position: relative;
                                        transition: border 0.2s ease-in-out;
                                    }

                                    .color-swatch input:checked+label {
                                        border: 2px solid orange;
                                        /* Highlight selected color with orange border */
                                    }

                                    .color-swatch input:checked+label::after {
                                        content: '✔';
                                        /* You can use a tick icon image if needed */
                                        color: white;
                                        /* White tick mark */
                                        font-size: 16px;
                                        position: absolute;
                                        top: 2px;
                                        left: 4px;
                                        font-weight: bold;
                                    }

                                    /* Size */

                                    .size-picker {
                                        display: flex;
                                        flex-wrap: wrap;
                                        gap: 5px;
                                        margin-top: 10px;
                                    }

                                    .size-swatch {
                                        width: 40px;
                                        height: 40px;

                                        position: relative;
                                    }

                                    .size-swatch label {
                                        display: block;
                                        width: 100%;
                                        height: 100%;
                                        border: 1px solid #ccc;
                                        cursor: pointer;
                                        padding: 10px;
                                    }

                                    .size-swatch input:checked+label {
                                        border: 2px solid #000;

                                        background-color: #007185;
                                        /* Highlight selected color */
                                    }

                                    #brand {
                                        width: 18px;
                                        height: 18px;
                                    }
                                </style>
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title"><span>Color</span><span class="toggle-btn"></span></h3>
                                    <ul class="widget-body filter-items item-check mt-1">
                                        <div class="color-picker">
                                            @foreach ($colours as $color)
                                            <div class="color-swatch" title="{{ $color }}">
                                                <input type="checkbox" id="color_{{ $color }}" name="colors[]" value="{{ $color }}" style="display: none;">
                                                <label for="color_{{ $color }}" style="background-color: {{ $color }};"></label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </ul>

                                </div>
                                @php $size=0; @endphp
                                <!-- End of Collapsible Widget -->
                                @foreach ($attributes as $group)
                                @php
                                $size++;

                                $attr_val = json_decode($group->attribute_values);


                                @endphp
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title"><span>{{ $group->attribute_group_name }}</span><span class="toggle-btn"></span></h3>
                                    <ul class="widget-body filter-items item-check mt-1">
                                        <div class="size-picker">
                                            @foreach ($attr_val as $key => $value)
                                            <div class="size-swatch" title="{{ $value }}">
                                                <input type="checkbox" id="size{{ $value }}" name="size{{ $size }}[]" value="{{ $value }}" style="display: none;">
                                                <label for="size{{ $value }}"> {{ $value }} </label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </ul>
                                </div>
                                @endforeach
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title"><span>Brand</span><span class="toggle-btn"></span></h3>
                                    <ul class="widget-body filter-items item-check mt-1">
                                        @foreach($productbrand as $brand)
                                        <li style="padding:1rem 0 1rem 0.2rem">
                                            <input type="checkbox" id="brand" name="brand[]" value="{{$brand->specify_value}}">
                                            <label for="brand" style="font-size: 18px;">{{$brand->specify_value}}</label>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>



                            </div>
                            <!-- End of Sidebar Content -->
                        </div>
                        <!-- End of Sidebar Content -->
                    </aside>
                    <!-- End of Shop Sidebar -->

                    <!-- Start of Shop Main Content -->
                    <div class="main-content">
                        <nav class="toolbox sticky-toolbox sticky-content fix-top">
                            <div class="toolbox-left">
                                <a href="#" class="btn btn-primary btn-outline btn-rounded left-sidebar-toggle 
                                        btn-icon-left d-block d-lg-none"><i
                                        class="w-icon-category"></i><span>Filters</span></a>
                                <div class="toolbox-item toolbox-sort select-box text-dark">
                                    <label>Sort By :</label>
                                    <select name="orderby" id="orderby" class="form-control">
                                        <option value="default" selected="selected">Default sorting</option>
                                        <!--<option value="popularity">Sort by popularity</option>
                                            <option value="rating">Sort by average rating</option>-->
                                        <option value="date">Sort by latest</option>
                                        <option value="price-low">Sort by pric: low to high</option>
                                        <option value="price-high">Sort by price: high to low</option>
                                    </select>
                                </div>
                            </div>
                            <div class="toolbox-right d-none">
                                <div class="toolbox-item toolbox-show select-box">
                                    <select name="count" class="form-control">
                                        <option value="9">Show 9</option>
                                        <option value="12" selected="selected">Show 12</option>
                                        <option value="24">Show 24</option>
                                        <option value="36">Show 36</option>
                                    </select>
                                </div>
                                <div class="toolbox-item toolbox-layout">
                                    <a href="shop-banner-sidebar.html" class="icon-mode-grid btn-layout active">
                                        <i class="w-icon-grid"></i>
                                    </a>
                                    <a href="shop-list.html" class="icon-mode-list btn-layout">
                                        <i class="w-icon-list"></i>
                                    </a>
                                </div>
                            </div>
                        </nav>
                        <div class="product-wrapper row cols-md-4 cols-sm-2 cols-2" id="productslist">
                            @if($product != null)
                            @foreach ($product as $product)
                            <div class="product-wrap">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="{{ route('getProduct',$product->productdetails->id )  }}">
                                            <img src="{{ asset('assets/images/products') . '/' . $product->product_image }}" alt="Product" width="300"
                                                height="338" />
                                        </a>
                                        <div class="product-action-horizontal">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Compare"></a>

                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <div class="product-cat">
                                            <a href="#">{{ $product->CategorySub->category_name }}</a>
                                        </div>
                                        <h3 class="product-name">
                                            <a href="{{ route('getProduct',$product->productdetails->id )  }}">{{ $product->product_name }}</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="{{ route('getProduct',$product->productdetails->id )  }}" class="rating-reviews">(3 reviews)</a>
                                        </div>
                                        <div class="product-pa-wrapper">
                                            <div class="product-price">
                                                ₹ {{ $product->productdetails->selling_price }} - <del><span class="text-danger"> ₹ {{ $product->productdetails->retail_price }} </span></del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <div align="center">
                                <img src="{{ asset('assets/images/banners/outofstock.png') }}" alt="Out Of Stock" width="190" height="190">
                            </div>
                            @endif
                        </div>

                    </div>
                    <!-- End of Shop Main Content -->
                </div>
                <!-- End of Shop Content -->
            </div>
        </div>
        <!-- End of Page Content -->
    </main>
    <!-- End of Main -->
</div>

<script src="{{ asset('website_assets/vendor/jquery/jquery.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('input[name="colors[]"]').on('change', function() {
            getproducts();
        });
        // Trigger the AJAX request on a button click or some event
        $('#getproducts').click(function() {

            getproducts();
        });
          $('input[name="size1[]"]').on('change', function() {
            // Create an array to store checked values
            getproducts();

        });
        $('input[name="size2[]"]').on('change', function() {
            // Create an array to store checked values
            getproducts();

        });
        $('input[name="brand[]"]').on('change', function() {
            // Create an array to store checked values
            getproducts();

        });
    });
    $(document).ready(function() {
        // Trigger the AJAX request on a button click or some event
        $('#orderby').change(function() {

            getproducts();
        });
    });

    function getproducts() {
        let min_price = $('#min_price').length ? $('#min_price').val() : null;
        let max_price = $('#max_price').length ? $('#max_price').val() : null;
        let orderby = $('#orderby').length ? $('#orderby').val() : null;
        let cateid = $('#cateid').length ? $('#cateid').val() : null;
        var checkedColors = [];
        // Loop through each checked checkbox
        $('input[name="colors[]"]:checked').each(function() {
            checkedColors.push($(this).val()); // Add the checked value to the array
        });
        var checkedsize1 = [];
        // Loop through each checked checkbox
        $('input[name="size1[]"]:checked').each(function() {
            checkedsize1.push($(this).val()); // Add the checked value to the array
        });
        var checkedsize2 = [];
        // Loop through each checked checkbox
        $('input[name="size2[]"]:checked').each(function() {
            checkedsize2.push($(this).val()); // Add the checked value to the array
        });
        var checkedbrand = [];
        // Loop through each checked checkbox
        $('input[name="brand[]"]:checked').each(function() {
            checkedbrand.push($(this).val()); // Add the checked value to the array
        });

        var siteurl = "{{ url('/') }}";
        $.ajax({
            url: "{{route('getcatefilterproduct')}}", // Update with your API endpoint
            data: {
                minprice: min_price,
                maxprice: max_price,
                orderby: orderby,
                id: cateid,
                color: checkedColors,
                 size1: checkedsize1,
                size2: checkedsize2,
                brand: checkedbrand
            },
            method: 'GET',
            success: function(data) {
                // Assuming `data` is the new products array
                //alert(data.products.length);

                $('#productslist').empty(); // Clear existing products

                if (data.products.length > 0) {
                    $.each(data.products, function(index, product) {

                        var productHtml = `
                            <div class="product-wrap">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="` + siteurl + `/ViewProduct_information/` + product.id + `">
                                            <img src="` + siteurl + `/assets/images/products/` + product.product_image + `" alt="Product" width="300" height="338" />
                                        </a>
                                        <div class="product-action-horizontal">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart" title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart" title="Wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare" title="Compare"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <div class="product-cat">
                                            <a href="#">` + product.category_main_name + `  </a>
                                        </div>
                                        <h3 class="product-name">
                                            <a href="` + siteurl + `/ViewProduct_information/` + product.id + `>` + product.product_name + `</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="` + siteurl + `/ViewProduct_information/` + product.id + `" class="rating-reviews">(3 reviews)</a>
                                        </div>
                                        <div class="product-pa-wrapper">
                                            <div class="product-price">
                                                ₹ ` + product.selling_price + ` - 
                                                <del><span class="text-danger"> ₹ ` + product.retail_price + ` </span></del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>`;
                        $('#productslist').append(productHtml);
                    });
                } else {
                    $('#productslist').append(`
                        <div align="center">
                            <img src="` + siteurl + `/assets/images/banners/outofstock.png" alt="Out Of Stock" width="190" height="190">
                        </div>
                    `);
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
                // Handle error appropriately
            }
        });
    }
</script>
@endsection