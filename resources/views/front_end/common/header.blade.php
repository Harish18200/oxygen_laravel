<!-- Start of Header -->

<?php
// $menu = App\Http\Controllers\Website\Home\HomeController::menu();
// print_r($menu);
use App\Models\Category\CategoryMain;
use App\Models\Category\Category;
use App\Models\Category\CategorySub;

$categorymain = CategoryMain::get();
$category = Category::get();
$categorysub = CategorySub::get();
?>

<style>
    #search-results-container {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background-color: #fff;
        z-index: 1050;
        border-radius: 0.25rem;
    }

    #search-results {
        padding: 0;
        list-style: none;
    }

    #search-results a {
        display: flex;
        gap: 10px;
        padding: 10px;
        text-decoration: none;
        color: black;
        border-bottom: 1px solid #eee;
    }

    #search-results a:hover {
        background-color: #f8f9fa;
    }
</style>

<header class="header">
    <div class="header-middle">
        <div class="container">
            <div class="header-left mr-md-4">
                <a href="#" class="mobile-menu-toggle text-white w-icon-hamburger" aria-label="menu-toggle">
                </a>
                <a href="{{url('/')}}" class="logo ml-lg-0">
                    <img src="{{ asset('website_assets/images/demos/demo8/header-logo.png')}} " alt="lo\go" width="150" />
                </a>
                <form method="get" action="#" class="input-wrapper header-search hs-expanded hs-round d-none d-md-flex">
                    <!-- <div class="select-box bg-white">
                        <select id="category" name="category">
                            <option value="">All Categories</option>
                            @foreach ($categorymain as $categoriesmain)
                            <option value="{{ $categoriesmain->id }}" {{ request('category') == $categoriesmain->id ? 'selected' : '' }}>
                                {{ $categoriesmain->category_main_name }}
                            </option>
                            @endforeach
                        </select>
                    </div> -->
                    <!-- <button class="btn btn-search" type="submit"><i class="w-icon-search"></i></button> -->
                    <div class="position-relative w-100" style="max-width: 700px;">
                        <input type="text" class="form-control bg-white w-100" name="search" id="search"
                            value="{{ request('search') }}" placeholder="Search in..." required />

                        <!-- Dropdown Search Results -->
                        <div id="search-results-container"
                            class="dropdown-menu show w-100 p-0 mt-1"
                            style="display: none; max-height: 250px; overflow-y: auto; border: 1px solid #dee2e6; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
                            <ul id="search-results" class="list-group list-group-flush"></ul>
                        </div>
                    </div>

                </form>



            </div>


            <div class="header-right ml-4">
                {{-- <div class="header-call d-xs-show d-lg-flex align-items-center">
                            <a href="tel:#" class="w-icon-call text-white"></a>
                            <div class="call-info d-lg-show">
                                <h4 class="chat font-weight-normal font-size-md text-normal ls-normal text-white mb-0">
                                    <a href="mailto:#" class="text-capitalize text-white">Live Chat</a> or :</h4>
                                <a href="tel:#" class="phone-number font-weight-bolder text-white ls-50">0(800)123-456</a>
                            </div>
                        </div> --}}
                @if(session()->has('customer_id'))

                <div class="dropdown">
                    <a href="{{url('/Accounts/Myaccount')}}" class="wishlist label-down link d-xs-show"> <i class="w-icon-account"></i>
                        <span class="wishlist-label d-lg-show">My Account</span> </a>
                    <div class="dropdown-box">
                        <a href="{{url('/Accounts/Myaccount')}}">My Profile</a>
                        <a href="{{url('/CusLogout')}}">Logout</a>
                    </div>
                </div>
                @else
                <a class="wishlist label-down link d-xs-show btn-quickview" href="#">
                    <i class="w-icon-account"></i>
                    <span class="wishlist-label d-lg-show">Login</span>
                </a>
                @endif
                <a class="wishlist label-down link d-xs-show" href="{{url('/View_wishlist')}}">
                    <span class="wishcount">0</span>
                    <i class="w-icon-heart"> </i>
                    <span class="wishlist-label d-lg-show">Wishlist</span>
                </a>

                <div class="dropdown cart-dropdown cart-offcanvas mr-0 mr-lg-2">
                    <div class="cart-overlay"></div>
                    <a href="#" class="cart-toggle label-down link text-white">
                        <i class="w-icon-cart">
                            <span class="cart-count">0</span>
                        </i>
                        <span class="cart-label">Cart</span>
                    </a>
                    <div class="dropdown-box">
                        <div class="cart-header">
                            <span>Shopping Cart</span>
                            <a href="#" class="btn-close">Close<i class="w-icon-long-arrow-right"></i></a>
                        </div>

                        <div class="products" id="cart_dt">


                        </div>

                        <div class="cart-total">
                            <label>Subtotal:</label>
                            <span class="cart-price"></span>
                        </div>

                        <div class="cart-action">
                            <a href="{{url('/Shopping-cart')}}" class="btn btn-dark btn-outline btn-rounded">View Cart</a>
                            <a href="{{url('/Checkout')}}" class="btn btn-primary  btn-rounded">Checkout</a>
                        </div>
                    </div>
                    <!-- End of Dropdown Box -->
                </div>
            </div>

        </div>

    </div>
    <!-- <div class="row">
        <div class="col-md-3">
            </div>

              <div class="col-md-6">
                  <ul id="search-results" class=" shadow-sm  position-absolute w-100 border rounded mt-1" 
        style="z-index: 1000; display: none; max-height: 200px; overflow-y: auto;">
    </ul>
            </div>
             <div class="col-md-3">
            </div>

              
            </div> -->

    <!-- End of Header Middle -->
    @php
    use Illuminate\Support\Facades\Request;
    @endphp
    <div class="header-bottom sticky-content fix-top sticky-header has-dropdown ">
        <div class="container">
            <div class="inner-wrap">
                <div class="header-left">
                    {{-- {{ Request::is('/') ? 'show-dropdown' : '' }} --}}
                    <div class="dropdown category-dropdown has-border                            
                                " data-visible="true">
                        <a href="#" class="category-toggle text-dark bg-secondary text-capitalize" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"
                            data-display="static" title="Browse Categories">
                            <i class="w-icon-category"></i>
                            <span>Browse Categories</span>
                        </a>
                        <div class="dropdown-box text-default">
                            <ul class="menu vertical-menu category-menu">
                                @foreach ($categorymain as $categoriesmain)
                                @if(count($categoriesmain->submenu) > 0)
                                <li>
                                    <a href="{{ url( 'MainCatergoryproductshow/'.$categoriesmain->id ) }}">
                                        {{-- <i class="w-icon-home"></i> --}}
                                        {{ $categoriesmain->category_main_name }}
                                    </a>
                                    <ul class="megamenu">
                                        @foreach($categoriesmain->submenu as $submenus)
                                        @if(count($submenus->childmenu) > 0)
                                        <li>
                                            <h4 class="menu-title">{{ $submenus->category_name }}</h4>
                                            <hr class="divider">
                                            <ul>
                                                @foreach($submenus->childmenu as $childmenus)
                                                <li><a href="{{ url( 'Subcategoryproductshow/'.$childmenus->id ) }}">{{ $childmenus->category_sub_name }}</a></li>
                                                @endforeach
                                            </ul>
                                            {{-- <h4 class="menu-title mt-1">Living Room</h4>
                                                    <hr class="divider">
                                                    <ul>
                                                        <li><a href="shop-fullwidth-banner.html">Coffee Tables</a>
                                                        </li>
                                                        <li><a href="shop-fullwidth-banner.html">Chairs</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Tables</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Futons & Sofa
                                                                Beds</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Cabinets &
                                                                Chests</a></li>
                                                    </ul> --}}
                                        </li>
                                        @else
                                        <li><a href="{{ url( 'Categoryproductshow/'.$submenus->id ) }}">{{ $submenus->category_name }}</a></li>
                                        @endif
                                        @endforeach

                                        {{-- <li>
                                                    <div class="menu-banner banner-fixed menu-banner3">
                                                        <figure>
                                                            <img src="{{ asset('website_assets/images/menu/banner-3.jpg')}}" alt="Menu Banner"
                                        width="235" height="461" />
                                        </figure>
                                        <div class="banner-content">
                                            <h4
                                                class="banner-subtitle font-weight-normal text-white mb-1">
                                                Restroom</h4>
                                            <h3
                                                class="banner-title font-weight-bolder text-white ls-normal">
                                                Furniture Sale</h3>
                                            <div
                                                class="banner-price-info text-white font-weight-normal ls-25">
                                                Up to <span
                                                    class="text-secondary text-uppercase font-weight-bold">25%
                                                    Off</span></div>
                                            <a href="demo8-shop.html"
                                                class="btn btn-white btn-link btn-sm btn-slide-right btn-icon-right">
                                                Shop Now<i class="w-icon-long-arrow-right"></i>
                                            </a>
                                        </div>
                        </div>
                        </li>--}}
                        </ul>
                        </li>
                        @else
                        <li><a href="{{ url( 'MainCatergoryproductshow/'.$categoriesmain->id ) }}">{{ $categoriesmain->category_main_name }}</a></li>
                        @endif
                        @endforeach
                        </ul>
                        {{-- @foreach ($categorymain as $categoriesmain)
                                       @if(count($categoriesmain->submenu) > 0)
                                       <li>
                                           <a href="{{ url( 'MainCatergoryproductshow/'.$categoriesmain->id ) }}">{{ $categoriesmain->category_main_name }}</a>
                        <ul>
                            @foreach($categoriesmain->submenu as $submenus)
                            @if(count($submenus->childmenu) > 0)
                            <li>
                                <a href="{{ url( 'Categoryproductshow/'.$submenus->id ) }}">{{ $submenus->category_name }}</a>
                                <ul>
                                    @foreach($submenus->childmenu as $childmenus)
                                    <li><a href="{{ url( 'Subcategoryproductshow/'.$childmenus->id ) }}">{{ $childmenus->category_sub_name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            @else
                            <li><a href="{{ url( 'Categoryproductshow/'.$submenus->id ) }}">{{ $submenus->category_name }}</a></li>
                            @endif
                            @endforeach
                        </ul>
                        </li>
                        @else
                        <li><a href="{{ url( 'MainCatergoryproductshow/'.$categoriesmain->id ) }}">{{ $categoriesmain->category_main_name }}</a></li>
                        @endif
                        @endforeach --}}
                    </div>
                </div>
                <nav class="main-nav">
                    <ul class="menu">
                        <li class="active">
                            <a href="{{ url ('/') }}"><i class="fas fa-home mr-1"></i> Home</a>
                        </li>
                        <li class="active">
                            <a href="{{ url ('/View_AuctionProducts') }}"><i class="fas fa-gavel mr-1"></i> Auction Products</a>
                        </li>
                        <li class="">
                            <a href="#"><i class="fas fa-store mr-1"></i> Shops </a>
                            {{-- </li> 
                                      <li class="">
                                        <a href="{{ url ('/landing') }}">Change Delivery Pincode</a>
                        </li> --}}
                    </ul>
                </nav>
            </div>
            <div class="header-right">
                <a href="#" class="d-xl-show"><i class="w-icon-sale mr-1"></i>Offer Products</a>
                <a href="#"><i class="w-icon-map-marker"></i>Track Order</a>

            </div>
        </div>
    </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            // $(document).on('click', '.product-click', function() {
            //     let productId = $(this).data('name');
            //     handleProductClick(productId);
            // });

//             function handleProductClick(productId) {
//                 let query = $('#search').val();

//                 if (productId) {
//                     $.ajax({
//                         url: "{{ route('getCategoryByMainId') }}",
//                         type: "GET",
//                         data: {
//                             categoryId: productId,
//                             searchKey: query

//                         },
//                         success: function(data) {
//                             let results = $('#search-results');
//                             results.empty().show();

//                             if (data.length === 0) {
//                                 results.append('<li class="list-group-item" style="background-color: white; padding: 6px 10px; color: black;">No products found</li>');
//                             } else {
//                                 data.forEach(function(item) {
//                                     results.append(`
//                                 <li class="list-group-item" style="padding: 6px 10px; background-color: white;">
//     <a href="/categoryWiseListProduct/${item.id}" 
//    class=" d-flex gap-2 align-items-center text-decoration-none"
//    data-name="${item.id}"
//    style="background-color: white;">
//     <img src="/assets/images/products/${item.product_image}" 
//          style="width: 60px; height: 60px; object-fit: cover; border-radius: 6px; box-shadow: 0 1px 4px rgba(0,0,0,0.1);">
//     <div style="font-size: 14px;">
//         <strong style="color: black;">${item.product_name}</strong><br>
//         <small class="text-muted"></small>
//     </div>
// </a>

// </li>


//                             `);
//                                 });
//                             }
//                         }
//                     });
//                 } else {
//                     $('#search-results').empty().hide();
//                 }

//             }

            function performSearch() {
                let query = $('#search').val();
                let category = $('#category').val();

                if (query.length >= 2) {
                    $.ajax({
                        url: "{{ route('ajax.search') }}",
                        type: "GET",
                        data: {
                            search: query,
                            category: category
                        },
                        success: function(data) {
                            let results = $('#search-results');
                            let container = $('#search-results-container');
                            results.empty();

                            if (data.length === 0) {
                                results.append('<li class="list-group-item">No products found</li>');
                            } else {
                                data.forEach(function(item) {
                                    results.append(`
                            <li class="list-group-item">
                                <a href="/categoryWiseListProduct/${item.product_id}" 
                                   class=" d-flex gap-2 align-items-center text-decoration-none"
                                   data-name="${item.product_id}">
                                    <img src="/assets/images/products/${item.product_image}" 
                                         style="width: 60px; height: 60px; object-fit: cover; border-radius: 6px;">
                                    <div>
                                        <strong>${item.category_main_name}</strong><br>
                                    </div>
                                </a>
                            </li>
                        `);
                                });
                            }

                            // Show the dropdown container
                            container.show();
                        }
                    });
                } else {
                    $('#search-results').empty();
                    $('#search-results-container').hide();
                }
            }


            // Trigger AJAX on typing
            $('#search').on('keyup', performSearch);

            // Prevent form submit and trigger AJAX on form submit
            $('.header-search').on('submit', function(e) {
                e.preventDefault();
                performSearch();
            });

            $(document).click(function(e) {
                if (!$(e.target).closest('#search-results-container, #search').length) {
                    $('#search-results-container').hide();
                }
            });
        });
    </script>



</header>


<!-- End of Header -->