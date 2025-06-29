<?php
	
	use App\Http\Controllers\AdminController;
	use App\Http\Controllers\DashboardController;

	use App\Http\Controllers\CouponsController;
	use App\Http\Controllers\BannerController;
	use App\Http\Controllers\AuctionController;
	use App\Http\Controllers\vendor\offer\vendorofferController;
	use App\Http\Controllers\MarketingController;
	use App\Http\Controllers\StaffController;
	use App\Http\Controllers\RoleController;
	use App\Http\Controllers\VendorController;
	use App\Http\Controllers\ActivityController;
	use App\Http\Controllers\MasterController;
	use App\Http\Controllers\SettingController;
	use Illuminate\Support\Facades\Route;
	use App\Http\Controllers\AuthController;
	
	use App\Http\Controllers\vendor\CategoryController\CategoryController;
	use App\Http\Controllers\vendor\CategoryMainController\CategoryMainController;
	use App\Http\Controllers\vendor\CategorySubController\CategorySubController;
	use App\Http\Controllers\vendor\ProductsController\ProductsController;
	use App\Http\Controllers\vendor\ProductsController\CollectionController;
	use App\Http\Controllers\vendor\ProductsController\ProductCollectionController;
	
	use App\Http\Controllers\vendor\ProductsController\SpecificationGroupController;
	use App\Http\Controllers\vendor\SalesController;
	use App\Http\Controllers\vendor\ProductsController\AttributeController;
	use App\Http\Controllers\vendor\GstController\GstController;
	use App\Http\Controllers\vendor\PackageController;
	use App\Http\Controllers\vendor\VendorcreateController;
	use App\Http\Controllers\vendor\ProductsController\SpecificationController;
	use App\Http\Controllers\vendor\coupon\CouponController;
	use App\Http\Controllers\vendor\PinCodeController\PinCodeController;
	// use App\Http\Controllers\vendor\PinCodeController1\PinCodeController1;
	
	
	//Marketting
	use App\Http\Controllers\vendor\Marketting\WhAppController;
	use App\Http\Controllers\vendor\Marketting\FaceBookController;
	use App\Http\Controllers\vendor\Marketting\InstaController;
	use App\Http\Controllers\vendor\Marketting\OxygenController;
	// use App\Http\Controllers\StaffController\StaffController;
	/*
		|--------------------------------------------------------------------------
		| Admin Routes
		|--------------------------------------------------------------------------
		|
		| Here is where you can register web routes for your application. These
		| routes are loaded by the RouteServiceProvider within a group which
		| contains the "web" middleware group. Now create something great!
		|
	*/
	
	Route::get('/register', [AuthController::class, 'register']);
	Route::get('/', function () {
		return view('auth.vendorlogin');
	});
	Route::get('login', function () {
		$viewBag['error'] = '';     
		return view('auth.vendorlogin');
	})->name('vendorerror');
	
	
	Route::post('login', [AuthController::class, 'vendorlogin'])->name('vendorlogin');
	
	Route::get('add_designation', [AdminController::class, 'designation']);
	
	Route::get('dashboard/{id}', 
	[DashboardController::class, 'vendordashboard'])
	->name('vendordashboard')
    ->middleware('auth');
    // Category Sub
	 Route::resource('category_sub', CategorySubController::class, ['names' => 'vendorcategory.sub']);
	

	 Route::get('viewcategory_sub/{id}', [CategorySubController::class, 'viewcategory_sub']);
	 Route::resource('specification_groups', SpecificationGroupController::class);
	 Route::post('update_specification', [SpecificationGroupController::class, 'update_specification'])->name('update_specification');
	 


    // Category Main
	 Route::resource('category_main', CategoryMainController::class, ['names' => 'vendorcategory.main']);
	 Route::post('category_main/update/{id}', [CategoryMainController::class, 'update'])->name('vendorcategory_main_update');
	
	//category
	 Route::resource('category', CategoryController::class, ['names' => 'vendorcategory']);
	 Route::post('category/update/{id}', [CategoryController::class, 'update'])->name('vendorcategory_update');
	 Route::post('subcategory/update/{id}', [CategorySubController::class, 'update'])->name('vendorsubcategory_update');
	
	
	// Category Main
	//   Route::resource('category_main', CategoryMainController::class, ['names' => 'category.main']);
	
	//category
	//  Route::resource('category', CategoryController::class, ['names' => 'category']);
	
	
	// Category Sub
	//  Route::resource('category_sub', CategorySubController::class, ['names' => 'category.sub']);
	
	//Pincode
	//Route::resource('pincode', PinCodeController::class, ['names' => 'pincode']);
	// Route::resource('pincode', PinCodeController::class, ['names' => 'pincode']);
	// Route::resource('pincode1', PinCodeController1::class, ['names' => 'vendorpincode1']);
	
	// Route::match(['put', 'patch'], '/pincode1/update/{id}','PinCodeController1@update');
	//  Route::post('pincode1/update/{id}', 'PinCodeController1@update');
	//Staff Controller
	// Route::resource('staff/create', StaffController::class, ['names' => 'staff']);
	// Gst Controller 
//	Route::resource('gst_master', GstController::class, ['names' => 'gst.master']);
	
	//Route::resource('gst_master', GstController::class, ['names' => 'gst.master']);
	// php artisan make:controller <controller name>  --resource
	//Route::post('/gst', [GstController::class, 'gst'])->name('gst');
	
	
	// Route::resource('offer/create', OfferController::class, ['names' => 'offer.main']);
	//    
	// Route::resource('offer/list', OfferController::class, ['names' => 'offer.list']);
	// Route::post('offer/offerupdate', OfferController::class, ['names' => 'offer.update']);
	
	// Route::get('Offer/index', [OfferController::class, 'list'])->name('index');
	
	
	
	//Route::get('offer/create', [OfferController::class, 'create']);
	//Route::post('offer/create', [OfferController::class, 'create']);
	
	
	
	Route::get('get-category', [CategoryController::class, 'getCategory'])->name('vendorgetCategory');
	Route::get('get-subcategory', [CategoryController::class, 'getSubCategory'])->name('vendorgetSubCategory');
	
	
	Route::post("vendorproducts/addinfo", [ProductsController::class, "addinfo"])->name('vendorproducts.addinfo');
	//    // hide
	Route::resource("vendorproducts_crud", ProductsController::class, ['names' => 'vendorproducts.crud'])->middleware('auth');
	Route::get("productscreate", [ProductsController::class, "index"])->name('vendorproductscreate');
	Route::post("vendorproductsstore/{id}", [ProductsController::class, "store"])->name('vendorproductsstore');
	
	//    
	Route::get("products/listing", [ProductsController::class, "vendorlisting"])->name('vendorproducts.crud.listing');
	Route::get("products/view/{id}", [ProductsController::class, "view"])->name('vendorproducts.crud.view');
	//    
	
	Route::post('productbulkdelete', [ProductsController::class, 'productbulkdelete'])->name('productbulkdelete');
    Route::post('productbulkactive', [ProductsController::class, 'productbulkactive'])->name('productbulkactive');
    Route::post('productbulkdeactive', [ProductsController::class, 'productbulkdeactive'])->name('productbulkdeactive');

	Route::post("products/details_update", [ProductsController::class, "updateProductDetails"])->name('vendorproducts.details.update');
	
	
	/*Vendar bulk data*/
    Route::post('vendorproductbulkdelete', [ProductsController::class, 'vendorproductbulkdelete'])->name('vendorproductbulkdelete');
    Route::post('vendorproductbulkactive', [ProductsController::class, 'vendorproductbulkactive'])->name('vendorproductbulkactive');
    Route::post('vendorproductbulkdeactive', [ProductsController::class, 'vendorproductbulkdeactive'])->name('vendorproductbulkdeactive');

	// hide
	Route::post("products/productdetailsdelete", [ProductsController::class, "productdetailsdelete"])->name('products.crud.vendorproductdetailsdelete');
	
	Route::get("vendorproducts/edit/{id}/{sub_id?}", [ProductsController::class, "edit"])->name('vendorproducts.crud.edit');
	
	Route::post("products/offerupdate", [ProductsController::class, "offerupdate"])->name('offer.update');
	Route::get('products/getsubproductdetails', [ProductsController::class, 'getsubproductdetails'])->name('getvendorsubproductdetails');
	
	Route::resource('attribute-listing', AttributeController::class, ['names' => 'vendorattribute.master']);
	
	Route::resource('product-collection', ProductCollectionController::class, ['names' => 'vendorproductcollection.master']);
	Route::resource('vendorproduct-specification', SpecificationController::class, ['names' => 'vendorproduct.specification']);
	
	/*Edit Attribute*/
	Route::get('editattribute/{id}/edit', [AttributeController::class, 'editattribute']);
	Route::post('attributeupdate/{id}/update', [AttributeController::class, 'updateattribute'])->name('vendorattributeupdate');

	
	/*Edit specification*/
	Route::get('vendoreditspec/{id}/edit', [SpecificationController::class, 'vendoreditspec']);
	Route::post('vendorspecupdate/{id}/update', [SpecificationController::class, 'updatespec'])->name('vendorspecupdate');

    Route::post('searchdetails', [AttributeController::class, 'searchdetails'])->name('searchdetails');
	
	
	// Get Value By On Change Fields
	
	// hide
	// Route::get('get-category', [CategoryController::class, 'getCategory'])->name('getCategory');
	// Route::get('get-subcategory', [CategoryController::class, 'getSubCategory'])->name('getSubCategory');
	Route::get('get-attribute', [AttributeController::class, 'getAttributes'])->name('getvendorAttributes');
	Route::get('get-spec--value', [SpecificationController::class, 'getSpecValue'])->name('getvendorSpecValue');
	Route::get('get-specification', [SpecificationController::class, 'getSpecifications'])->name('getvendorSpecifications');
	Route::get('get_product_details', [ProductsController::class, 'getProductDetails'])->name('getvendorProductDetails');
	// Route::get('get_zonal', [MasterController::class, 'getZonalById'])->name('getvendorZonal');
	// Route::post("products/productsdetailsdelete/{id?}", [ProductsController::class, "productsdetailsdelete"])->name('vendorproductsdetailsdelete');
	
	//sales
	Route::get('order', [SalesController::class, 'order'])->name('vendor.order');
	Route::get('Print_invoice/{id}', [SalesController::class, 'print_invoice'])->name('vendor.print_invoice');
	Route::get('transaction', [SalesController::class, 'transaction'])->name('vendor.transaction');
	//coupon
	Route::get('coupon/create', [CouponsController::class, 'create']);
	
	Route::post('orderstatusupdate/{id}', [SalesController::class, 'orderstatusupdate'])->name('orderstatusupdate');
	Route::get("quickview_product/{id}", [SalesController::class, "quickview_product"])->name('vendar.quickview_product');
	//banner
	// Route::get('advbanner', [BannerController::class, 'banner']);
	
	// Route::get('advoxygen', [BannerController::class, 'oxygen']);
	
	// Route::get('slider', [BannerController::class, 'slider'])->name('banners.slider');
	
	//auction
	Route::get('auction/create', [AuctionController::class, 'create']);
	
	Route::get('auction/list', [AuctionController::class, 'list']);
	
	
	//offer
	
	Route::resource('offer/create', vendorofferController::class, ['names' => 'vendoroffer.main']);
	
	Route::resource('offer/list', vendorofferController::class, ['names' => 'vendoroffer.list']);
	//Route::get('offer/create', [OfferController::class, 'create']);
	
	//Route::get('offer/list', [OfferController::class, 'list']);
	
	//marketing
	
	//marketting   
	Route::resource('whatsapp',  WhAppController::class,['names' => 'vendorwhatsapp']);
	Route::resource('facebook',  FaceBookController::class,['names' => 'vendorfacebook']);
	Route::resource('instagram',  InstaController::class,['names' => 'vendorinstagram']);
	Route::resource('oxygen',  OxygenController::class,['names' => 'vendoroxygen']);
	
	
	// Route::get('marketing/facebook', [MarketingController::class, 'facebook']);
	// Route::get('marketing/instagram', [MarketingController::class, 'instagram']);
	// Route::get('marketing/whatsapp', [MarketingController::class, 'whatsapp']);
	// Route::get('marketing/oxygen', [MarketingController::class, 'oxygen']);
	
	//staff
	//Route::get('staff/create', [StaffController::class, 'create']);
	
	//Route::get('staff/list', [StaffController::class, 'list'])->name('staff-list');
	//Route::post('staff/store', [StaffController::class, 'store']);
	//Route::post('staff/update', [StaffController::class, 'update']);
	//Route::delete('staff/destroy/{id}', [StaffController::class, 'destroy'])->name('staff.destroy');
	
	// Route::delete('staff/destroy/{id}', 'StaffController@destroy')->name('staff.destroy');
	//role
	Route::get('role/create', [RoleController::class, 'create']);
	
	Route::get('role/list', [RoleController::class, 'list']);
	
	//vendor
	Route::get('vendor/create', [VendorController::class, 'create']);
	
	//activity
	Route::get('activity/create', [ActivityController::class, 'create']);
	
	Route::get('activity/list', [ActivityController::class, 'list']);
	
	//Master
	//Route::get('department', [MasterController::class, 'department']);
	//Route::post('department', [MasterController::class, 'department']);
	//Route::post('/saveDepartments', [MasterController::class, 'saveDepartments'])->name('saveDepartments');
	//Route::post('/checkDepartmentnamePost', [MasterController::class, 'checkDepartmentnamePost'])->name('checkDepartmentnamePost');
	//Route::get('designation', [MasterController::class, 'designation']);
	//
	//Route::get('gst', [MasterController::class, 'gst']);
	//
	//Route::get('package', [MasterController::class, 'package']);
	//
	//Route::get('pincode', [MasterController::class, 'pincode']);
	//Route::post('/savePincodes', [MasterController::class, 'savePincodes'])->name('savePincodes');
	//Route::post('/checkPincodenamePost', [MasterController::class, 'checkPincodenamePost'])->name('checkPincodenamePost');
	//
// 	Route::get('route', [MasterController::class, 'route']);
// 	Route::get('route_delete/{{ $id }}', [MasterController::class, 'route_delete']);
// 	Route::post('/saveRoute', [MasterController::class, 'saveRoute'])->name('saveRoute');
// 	Route::post('/checRoutenamePost', [MasterController::class, 'checRoutenamePost'])->name('checRoutenamePost');
	
// 	Route::get('zonal', [MasterController::class, 'zonal']);
// 	Route::post('/getZonalById', [MasterController::class, 'getZonalById'])->name('getZonalById');
// 	Route::post('/saveZonals', [MasterController::class, 'saveZonals'])->name('saveZonals');
// 	Route::post('/checkZonalnamePost', [MasterController::class, 'checkZonalnamePost'])->name('checkZonalnamePost');
// 	Route::post('/zonalsListingPost', [MasterController::class, 'zonalsListingPost'])->name('zonalsListingPost');
	
	//Setting
	
	Route::get('profile', [SettingController::class, 'profile']);
	Route::get('logout', [AuthController::class, 'logout'])->name('logout');
	
	
	//vendor
	
//	Route::resource('package', PackageController::class, ['names' => 'package']);
	//Route::resource('vendorcreate', VendorcreateController::class, ['names' => 'vendorcreate']);
	
	//Route::get('vendor/list', [VendorcreateController::class, 'list'])->name('vendor-list');
	
	Route::Post('/Ajaxpackage', [VendorcreateController::class, 'Ajaxpackage'])->name('Ajaxpackage');
	
	// coupon
	// Route::resource('coupon', CouponController::class, ['names' => 'coupon']);
	//Route::resource('coupon', CouponController::class, ['names' => 'coupon']);
	// Route::get("products/listing", [ProductsController::class, "listing"])->name('products.crud.listing');
	
	// Route::get('coupon/couponlisting', [CouponController::class, "couponlisting"])->name('coupon.couponlisting');
	
	
	//Route::get('coupon/list', CouponsController::class, 'list');
	
	//Route::resource('coupon', CouponController::class, ['names' => 'coupon']);
	
	
