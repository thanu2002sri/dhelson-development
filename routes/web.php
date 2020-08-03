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
    return view('underc');
});

Route::get('/login', function () {
    return view('welcome');
});


Route::get('/forgot', function () {
    
    return view('forgot');
});

Route::post('/forgot', 'AdminController2@forgotPassword')->name('forgot.password');

Route::get('/forgot2','AdminController2@forgotPasswordStep2');
//Pavans Routes


Route::get('/admin/othersettings', 'AdminController2@otherSettings');
Route::post('/admin/othersettings', 'AdminController2@otherSettingsUpdate')->name('set.othersettings');

Auth::routes();

Route::group(['middleware' => 'admin'], function()
{
    Route::get('/admin/dashboard', 'AdminController@index');

    /*  @@@@@@@@@@  Branches Routing @@@@@@@@@@ */

    Route::get('/admin/add-branch', 'BranchController@index');
    Route::post('/admin/add-branch', 'BranchController@addBranche')->name('add.branch'); 
    Route::get('/admin/manage-branches', 'BranchController@manageBranches'); 
    Route::get('/admin/{id}/edit-branch', 'BranchController@editBranche')->name('edit.branch');
    Route::post('/admin/{id}/update-branch', 'BranchController@updateBranche');
    Route::get('/admin/{id}/delete-branch', 'BranchController@deleteBranche')->name('delete.branch');

    /*  @@@@@@@@@@  Branches Routing @@@@@@@@@@ */

    /*  @@@@@@@@@@  Agent Routing @@@@@@@@@@ */

    Route::get('/admin/create-agent', 'AdminController@addAgent'); 
    Route::post('/admin/add-agent', 'AdminController@createAgent')->name('create.agent');
    Route::get('/admin/manage-agents', 'AdminController@manageAgents');
    Route::get('/admin/{id}/edit-agent', 'AdminController@editAgent')->name('edit.agent');
    Route::post('/admin/{id}/update-agent', 'AdminController@updateAgent');
    Route::get('/admin/{id}/delete-agent', 'AdminController@deleteAgent')->name('delete.agent');

    /*  @@@@@@@@@@  Agent Routing @@@@@@@@@@ */

    /*  @@@@@@@@@@  Incharge Routing @@@@@@@@@@ */

    Route::get('/admin/create-incharge', 'AdminController@addIncharge'); 
    Route::post('/admin/add-incharge', 'AdminController@createIncharge')->name('create.incharge');
    Route::get('/admin/manage-incharges', 'AdminController@manageIncharges');
    Route::get('/admin/{id}/edit-incharge', 'AdminController@editIncharge')->name('edit.incharge');
    Route::post('/admin/{id}/update-incharge', 'AdminController@updateIncharge');
    Route::get('/admin/{id}/delete-incharge', 'AdminController@deleteIncharge')->name('delete.incharge');
    
    /*  @@@@@@@@@@  Incharge Routing @@@@@@@@@@ */

    /*  @@@@@@@@@@  Guard Routing @@@@@@@@@@ */

    Route::get('/admin/create-guard', 'AdminController@addGuard'); 
    Route::post('/admin/add-guard', 'AdminController@createGuard')->name('create.guard');
    Route::get('/admin/manage-guards', 'AdminController@manageGuards');
    Route::get('/admin/{id}/edit-guard', 'AdminController@editGuard')->name('edit.guard');
    Route::post('/admin/{id}/update-guard', 'AdminController@updateGuard');
    Route::get('/admin/{id}/delete-guard', 'AdminController@deleteGuard')->name('delete.guard');
    
    /*  @@@@@@@@@@  Guard Routing @@@@@@@@@@ */

    /*  @@@@@@@@@@  Support Routing @@@@@@@@@@ */

    Route::get('/admin/create-customercare', 'AdminController@addSupport'); 
    Route::post('/admin/add-customercare', 'AdminController@createSupport')->name('create.customercare');
    Route::get('/admin/manage-customercare', 'AdminController@manageSupport');
    Route::get('/admin/{id}/edit-customercare', 'AdminController@editSupport')->name('edit.customercare');
    Route::post('/admin/{id}/update-customercare', 'AdminController@updateSupport');
    Route::get('/admin/{id}/delete-customercare', 'AdminController@deleteSupport')->name('delete.customercare');
    
    /*  @@@@@@@@@@  Support Routing @@@@@@@@@@ */

    Route::get('/admin/{id}/branch-invoice', 'AdminController@branchInvoice')->name('branch.invoice');

    // Settings Routing
    Route::get('/admin/edit-profile', 'AdminController@editProfile');
    Route::post('/admin/reset-password', 'AdminController@resetPassword')->name('admin-reset-password');

    Route::get('/admin/other-settings', 'AdminController@otherSettings');
    Route::post('/admin/insured-settings', 'AdminController@otherSettingsUpdate')->name('insured.settings');
    Route::post('/admin/transit-settings', 'AdminController@transitSettingsUpdate')->name('transit.settings');


    Route::get('/admin/categories', 'CategoriesController@index'); 
    Route::post('/admin/create-category', 'CategoriesController@store')->name('create.category');

    Route::get('/admin/sub-categories', 'AdminController@manageSubCategories'); 
    Route::post('/admin/add-sub-categories', 'AdminController@createSubCategories')->name('create.sub.categories');

    Route::get('/admin/transit-settings', 'AdminController@transitSettings'); 
    Route::post('/admin/{id}/update-transit-settings', 'AdminController@updateTransitSettings');

    Route::get('/admin/transit-request', 'AdminController@transitRequest');
    Route::get('/admin/in-transit', 'AdminController@inTransit');
    Route::get('/admin/destination-delivere', 'AdminController@destinationDelivere');
    Route::get('/admin/delivere-complete', 'AdminController@delivereComplete');
    Route::get('/admin/pending-orders', 'AdminController@pendingOrders'); 
});

Route::group(['middleware' => 'agent'], function()
{
    Route::get('/agent/dashboard', 'AgentController@index');
    Route::get('/agent/add-user', 'AgentController@addUser');
    Route::post('/agent/add-user', 'AgentController@createUser')->name('create.user');
    Route::get('/agent/{id}/edit-user', 'AgentController@editUser')->name('edit.user');
    Route::post('/agent/update-user', 'AgentController@updateUser')->name('update.user');
    Route::get('/agent/{id}/delete-user', 'AgentController@deleteUser')->name('delete.user');
    Route::get('/agent/manage-users', 'AgentController@manageUsers');


    /*  @@@@@@@@@@  Order Routing @@@@@@@@@@ */

    Route::get('/agent/create-order', 'AgentController@addOrder'); 
    Route::post('/agent/add-order', 'AgentController@createOrder')->name('create.order');
    Route::get('/agent/manage-orders', 'AgentController@manageOrders');
    Route::get('/agent/{id}/edit-order', 'AgentController@editOrder')->name('edit.order');
    Route::post('/agent/{id}/update-order', 'AgentController@updateOrder');
    
    /*  @@@@@@@@@@  Order Routing @@@@@@@@@@ */
    
    // Settings Routing
    Route::get('/agent/edit-profile', 'AgentController@editProfile');
    Route::post('/agent/reset-password', 'AgentController@resetPassword')->name('agent-reset-password');
    
}); 

Route::group(['middleware' => 'incharge'], function()
{
    Route::get('/incharge/dashboard', 'InchargeController@index');
    Route::get('/incharge/add-user', 'InchargeController@addUser');
    Route::post('/incharge/add-user', 'InchargeController@createUser')->name('create.user');
    Route::get('/incharge/{id}/edit-user', 'InchargeController@editUser')->name('edit.user');
    Route::post('/incharge/update-user', 'InchargeController@updateUser')->name('update.user');
    Route::get('/incharge/{id}/delete-user', 'InchargeController@deleteUser')->name('delete.user');
    Route::get('/incharge/manage-users', 'InchargeController@manageUsers');
    
    // Settings Routing
    Route::get('/incharge/edit-profile', 'InchargeController@editProfile');
    Route::post('/incharge/reset-password', 'InchargeController@resetPassword')->name('incharge-reset-password');
    
}); 

Route::group(['middleware' => 'guard'], function()
{
    Route::get('/guard/dashboard', 'GuardController@index');
    Route::get('/guard/add-user', 'GuardController@addUser');
    Route::post('/guard/add-user', 'GuardController@createUser')->name('create.user');
    Route::get('/guard/{id}/edit-user', 'GuardController@editUser')->name('edit.user');
    Route::post('/guard/update-user', 'GuardController@updateUser')->name('update.user');
    Route::get('/guard/{id}/delete-user', 'GuardController@deleteUser')->name('delete.user');
    Route::get('/guard/manage-users', 'GuardController@manageUsers');
    
    // Settings Routing
    Route::get('/guard/edit-profile', 'GuardController@editProfile');
    Route::post('/guard/reset-password', 'GuardController@resetPassword')->name('guard-reset-password');
}); 

Route::group(['middleware' => 'customercare'], function()
{
    Route::get('/customercare/dashboard', 'CustomerCareController@index');
    Route::get('/customercare/add-user', 'CustomerCareController@addUser');
    Route::post('/customercare/add-user', 'CustomerCareController@createUser')->name('create.user');
    Route::get('/customercare/{id}/edit-user', 'CustomerCareController@editUser')->name('edit.user');
    Route::post('/customercare/update-user', 'CustomerCareController@updateUser')->name('update.user');
    Route::get('/customercare/{id}/delete-user', 'CustomerCareController@deleteUser')->name('delete.user');
    Route::get('/customercare/manage-users', 'CustomerCareController@manageUsers');
    
    // Settings Routing
    Route::get('/customercare/edit-profile', 'CustomerCareController@editProfile');
    Route::post('/customercare/reset-password', 'CustomerCareController@resetPassword')->name('customercare-reset-password');
    Route::post('/customercare/reset-pin', 'CustomerCareController@resetPin')->name('customercare-reset-pin');
}); 
