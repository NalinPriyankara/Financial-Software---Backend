<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BankAccountsController;
use App\Http\Controllers\BankTransactionsController;
use App\Http\Controllers\CompanySetupController;
use App\Http\Controllers\CreditorsController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\DebtorsController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\LoanInstallmentsController;
use App\Http\Controllers\LoansController;
use App\Http\Controllers\ProductionItemsController;
use App\Http\Controllers\ProductionsController;
use App\Http\Controllers\SaleItemsController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SecurityRolesController;
use App\Http\Controllers\StocksController;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\UploadDataController;
use App\Http\Controllers\UserManagementController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    $user = $request->user();

    if (!$user) {
        return response()->json(null, 204);
    }

    // fetch role row from security_roles by role name (the user_profiles.role column)
    $roleRow = DB::table('security_roles')->where('role', $user->role)->first();

    $sections = [];
    $areas = [];

    if ($roleRow) {
        if (!empty($roleRow->sections)) {
            $sections = array_values(array_filter(explode(';', $roleRow->sections)));
        }
        if (!empty($roleRow->areas)) {
            $areas = array_values(array_filter(explode(';', $roleRow->areas)));
        }
    }

    return response()->json([
        'id' => $user->id ?? null,
        'email' => $user->email ?? null,
        'telephone' => $user->telephone ?? null,
        'image' => $user->image ?? null,
        'role' => $user->role ?? null,
        'role_id' => $roleRow->id ?? null,
        'sections' => $sections,
        'areas' => $areas,
        'status' => $user->status ?? null,
        'first_name' => $user->first_name ?? ($user->firstName ?? null),
        'last_name' => $user->last_name ?? ($user->lastName ?? null),
    ]);
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::resource("user-managements", UserManagementController::class);

Route::apiResource('security-roles', SecurityRolesController::class);
Route::apiResource('company-setup', CompanySetupController::class);
Route::apiResource('upload-data', UploadDataController::class);
Route::apiResource('customers', CustomersController::class);
Route::apiResource('suppliers', SuppliersController::class);
Route::apiResource('items', ItemsController::class);
Route::apiResource('stocks', StocksController::class);
Route::apiResource('sales', SalesController::class);
Route::apiResource('sale-items', SaleItemsController::class);
Route::apiResource('expenses', ExpensesController::class);
Route::apiResource('productions', ProductionsController::class);
Route::apiResource('production-items', ProductionItemsController::class);
Route::apiResource('bank-accounts', BankAccountsController::class);
Route::apiResource('bank-transactions', BankTransactionsController::class);
Route::apiResource('loans', LoansController::class);
Route::apiResource('loan-installments', LoanInstallmentsController::class);
Route::apiResource('debtors', DebtorsController::class);
Route::apiResource('creditors', CreditorsController::class);