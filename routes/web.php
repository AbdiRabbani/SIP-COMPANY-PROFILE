<?php

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
    return redirect('/home');
});

Auth::routes();

//home
Route::get('/home', 'ViewController@home');

//profile
Route::get('/profile', 'ViewController@profile');

//Insights
Route::get('/insights/blog', 'ViewController@insight_b');
Route::get('/insights/news', 'ViewController@insight_n');
Route::get('/insights/data', 'ViewController@insight_b_allData');
Route::get('/insights/data/{id}', 'ViewController@insight_b_data');
Route::get('/insights/search/{name}', 'ViewController@insight_b_search');
Route::get('/insights/data2', 'ViewController@insight_n_allData');
Route::get('/insights/search2/{name}', 'ViewController@insight_n_search');
Route::get('/insights/tag/{id}', 'ViewController@insight_n_tag');
Route::get('/insights/{id}', 'ViewController@insight_show');

//Solution
Route::get('/solution', 'ViewController@solution');
Route::get('/solution/detail', 'ViewController@solution_show');

//Campaign
Route::get('/campaign', 'ViewController@campaign');
Route::get('/campaign/{id}', 'ViewController@campaign_show');

//Partnership
Route::get('/partnership', 'ViewController@partnership');
Route::get('/partnership/alldata', 'ViewController@pa_data');

//Customer
Route::get('/customer', 'ViewController@customer');
Route::get('/customer/data/{id}', 'ViewController@c_data');
Route::get('/customer/alldata', 'ViewController@ca_data');

//Career
Route::get('/career', 'ViewController@career');
Route::get('/join/{id}', 'ViewController@job');
Route::post('/join/send', 'ViewController@job_store');
Route::get('/career/data', 'ViewController@allData');
Route::get('/career/data/{name}', 'ViewController@careerData');
Route::get('/career/detail/{id}', 'ViewController@career_show');

//Quotation
Route::get('/quotation', 'ViewController@quotation');






// Admin
Route::get('/admin/solution','SolutionController@index');
Route::post('/admin/solution/create','SolutionController@store');
Route::put('/admin/solution/update/{id}','SolutionController@update');

Route::get('/admin/quotation','QuotationController@index');
Route::get('/admin/quotation/detail/{id}','QuotationController@show');
Route::delete('/admin/quotation/delete/{id}','QuotationController@destroy');
Route::post('/quotation/send','QuotationController@store');

Route::get('/admin/insights','InsightController@index');
Route::get('/admin/insights/create','InsightController@create');
Route::delete('/admin/insights/delete/{id}','InsightController@destroy');
Route::post('/admin/insights/store','InsightController@store');
Route::get('/admin/insights/edit/{id}','InsightController@edit');
Route::put('/admin/insights/update/{id}','InsightController@update');

Route::post('/ckeditor/upload','InsightController@ckstore')->name('ckeditor.upload');

Route::get('/admin/tag', 'TagController@index');
Route::delete('/admin/tag/delete/{id}', 'TagController@destroy');
Route::get('/admin/tag/edit/{id}', 'TagController@edit');
Route::put('/admin/tag/update/{id}', 'TagController@update');

Route::get('/admin/campaign','CampaignController@index');
Route::get('/admin/campaign/create','CampaignController@create');
Route::post('/admin/campaign/store','CampaignController@store');
Route::get('/admin/campaign/edit/{id}','CampaignController@edit');
Route::put('/admin/campaign/update/{id}','CampaignController@update');
Route::delete('/admin/campaign/delete/{id}','CampaignController@destroy');

Route::get('/admin/category','CategoryController@index');
Route::post('/admin/category/store','CategoryController@store');
Route::get('/admin/category/p/edit/{id}','CategoryController@editP');
Route::put('/admin/category/p/update/{id}','CategoryController@updateP');
Route::delete('/admin/category/dp/{id}','CategoryController@destroyP');

Route::get('/admin/project-reference', 'ProjectController@index');
Route::get('/admin/project-reference/{id}', 'ProjectController@create');
Route::post('/admin/project-reference/store', 'ProjectController@store');
Route::get('/admin/project-reference/edit/{id}', 'ProjectController@edit');
Route::put('/admin/project-reference/update/{id}', 'ProjectController@update');

Route::get('/admin/career','CareerController@index');
Route::get('/admin/career/register','CareerController@register');
Route::delete('/admin/career/register/{id}','CareerController@register_destroy');
Route::post('/admin/career/store','CareerController@store');
Route::delete('/admin/career/d/{id}','CareerController@destroy');
Route::put('/admin/career/update/{id}','CareerController@update');
Route::get('/admin/career/edit/{id}','CareerController@edit');

Route::get('/admin/partnership','PartnershipController@index');
Route::get('/admin/partnership/edit/{id}','PartnershipController@edit');
Route::post('/admin/partnership/store','PartnershipController@store');
Route::delete('/admin/partnership/d/{id}','PartnershipController@destroy');
Route::put('/admin/partnership/update/{id}','PartnershipController@update');

Route::get('/partnership/edit/{id}', 'ViewController@partnershipEdit');
Route::put('/partnership/update/{id}', 'ViewController@partnershipUpdate');
Route::get('/partnership/data/{id}', 'ViewController@p_data');

Route::get('/admin/customer','CustomerController@index');
Route::post('/admin/customer/store','CustomerController@store');
Route::get('/admin/customer/edit/{id}','CustomerController@edit');
Route::delete('/admin/customer/d/{id}','CustomerController@destroy');
Route::put('/admin/customer/update/{id}','CustomerController@update');


