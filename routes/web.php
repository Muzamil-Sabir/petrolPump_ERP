<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TariffController;
use App\Http\Controllers\NozzelReadingsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ServiceStationController;
use App\Http\Controllers\DiprodScaleController;
use App\Http\Controllers\DiprodReadingsController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\StockinController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ExpenseHeadController;
use App\Http\Controllers\LubricantsController;
use App\Http\Controllers\LubricantItemsController;
use App\Http\Controllers\LubricantStockinController;
use App\Http\Controllers\LubricantSaleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CreditsController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::get('mainDashboard',[DashboardController::class,'index2'] );
Route::get('dashboard',[DashboardController::class,'index'] );


Route::get('tariff',[TariffController::class,'index'] );
Route::get('/tariffLog', [TariffController::class, 'getTariffList'])->name('tariffLog.list');

Route::get('nozzleReadings',[NozzelReadingsController::class,'index']);
Route::any('viewNozzelReadings',[NozzelReadingsController::class,'show'])->name('viewNozzelReadings');

// Route::get('/nozzleReadings', function () {c
//     return view('nozzleReadings');
// });

Route::post('/uploadTariff', [TariffController::class,'store']);
Route::post('/uploadReadings', [NozzelReadingsController::class,'uploadReadings']);

Route::get('DiprodScale',[DiprodScaleController::class,'index']);
Route::post('/uploadDiprodScale',[DiprodScaleController::class,'store']);
Route::get('viewDiprodScale',[DiprodScaleController::class,'showDiprodScale']);


Route::get('ServiceStationSale',[ServiceStationController::class,'index']);
Route::post('/uploadServiceStationSale',[ServiceStationController::class,'store']);

Route::get('diprodReadings',[DiprodReadingsController::class,'index']);
Route::post('/uploadDiprodReadings',[DiprodReadingsController::class,'store']);
Route::any('viewDipReadings',[DiprodReadingsController::class,'getTodaysReadings'])->name('viewDipReadings');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/financialReport',[ReportsController::class,'financialReport']);
Route::get('/reports',[ReportsController::class,'index']);
Route::post('/generateReport',[ReportsController::class,'viewReport']);
Route::any('/expenseReport',[ReportsController::class,'expenseReport']);
Route::post('/generateExpenseReport',[ReportsController::class,'generateExpenseReport']);
Route::get('/profitLossRange',[ReportsController::class,'profitLossRange']);
Route::post('/profitLoss',[ReportsController::class,'getProfitLoss']);
Route::get('/wetStockReport',[ReportsController::class,'wetStockReport']);
Route::post('/generateWetStockReport',[ReportsController::class,'generateWetStockReport']);
Route::get('/stockReport',[ReportsController::class,'stockReport']);
Route::any('/openingClosingStock',[ReportsController::class,'openingClosingStock']);
Route::get('/viewStockReport',[ReportsController::class,'generateStockReport']);
Route::any('/stockinReport',[ReportsController::class,'stockinReport']);
Route::post('/viewStockinReport',[ReportsController::class,'generateStockinReport']);
Route::get('/onedayReport',[ReportsController::class,'onedayReport']);
Route::Post('/onedayGeneratedReport',[ReportsController::class,'onedayReportCalculation']);
// Route::get('/onedayGeneratedReport',[ReportsController::class,'onedayReportCalculation']);


Route::get('/stocking',[StockController::class,'index']);
Route::any('/currentstock',[StockController::class,'currentStock']);

//Stockin Routes
Route::get('/stockin',[StockinController::class,'index']);
Route::post('/addstockin',[StockinController::class,'store']);

Route::get('/distributor',[DistributorController::class,'index']);
Route::post('/adddistributor',[DistributorController::class,'store']);

Route::get('/purchase/{id}',[PurchaseController::class,'getDistributorPurchases'])->name('purchase');


//expense Routes
Route::get('/expense',[ExpenseController::class,'index']);
Route::post('/addExpenseHead',[ExpenseHeadController::class,'store']);
Route::post('/addExpense',[ExpenseController::class,'store']);

Route::get('/expense/{id}',[ExpenseController::class,'getExpenseHeadDetails']);
Route::get('/expense/{id}/{from}/{to}',[ExpenseController::class,'getexpenseDetailswithDateRange']);
Route::post('/uploadLubricantCategory',[LubricantsController::class,'store']);
Route::get('/lubricantCategories',[LubricantsController::class,'addLubricantsCategory']);
Route::get('/lubricants',[LubricantsController::class,'index']);
Route::get('/lubricantItems',[LubricantItemsController::class,'index']);
Route::post('/uploadLubricantItem',[LubricantItemsController::class,'store']);
Route::get('/lubricantsStockIn',[LubricantStockinController::class,'index']);
Route::post('/uploadLubricantsStock',[LubricantStockinController::class,'store']);
Route::get('/getlubricantItem/{id}',[LubricantItemsController::class,'getItemByCategory']);
Route::get('/lubricantItem/{id}',[LubricantItemsController::class,'getLubricantItem'])->name('purchase');
Route::post('/updateItem',[LubricantItemsController::class,'update']);


Route::get('/lubricantsSale',[LubricantSaleController::class,'index']);
Route::get('/createSale',[LubricantSaleController::class,'createSaleView'])->name('createSale');
Route::post('/uploadLubricantSale',[LubricantSaleController::class,'createSale']);
Route::get('/lubricantsSale/{id}',[LubricantSaleController::class,'saleDetails']);

Route::get('/users',[AdminController::class,'index']);
Route::post('/adduser',[AdminController::class,'create']);


Route::get('/credits',[CreditsController::class,'index']);
Route::post('/addParty',[CreditsController::class,'addParty']);
Route::post('/addVehicle',[CreditsController::class,'addVehicle']);
Route::post('/addCreditFill',[CreditsController::class,'creditFill']);
Route::post('/addPayment',[CreditsController::class,'addPayment']);
Route::get('/getvehicle/{id}',[CreditsController::class,'getVehicle']);
Route::get('/gettariff/{id}',[CreditsController::class,'getTariff']);
Route::get('/getbalance/{id}',[CreditsController::class,'getBalance']);
Route::get('/creditFill/{id}',[CreditsController::class,'getFill']);





