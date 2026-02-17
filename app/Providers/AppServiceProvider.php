<?php

namespace App\Providers;

use App\Repositories\All\Auth\AuthInterface;
use App\Repositories\All\Auth\AuthRepository;
use App\Repositories\All\BankAccounts\BankAccountRepository;
use App\Repositories\All\BankAccounts\BankAccountsInterface;
use App\Repositories\All\BankTransactions\BankTransactionsInterface;
use App\Repositories\All\BankTransactions\BankTransactionsRepository;
use App\Repositories\All\CompanySetup\CompanySetupInterface;
use App\Repositories\All\CompanySetup\CompanySetupRepository;
use App\Repositories\All\Creditors\CreditorsInterface;
use App\Repositories\All\Creditors\CreditorsRepository;
use App\Repositories\All\Customers\CustomersInterface;
use App\Repositories\All\Customers\CustomersRepository;
use App\Repositories\All\Debtors\DebtorsInterface;
use App\Repositories\All\Debtors\DebtorsRepository;
use App\Repositories\All\Expenses\ExpensesInterface;
use App\Repositories\All\Expenses\ExpensesRepository;
use App\Repositories\All\Items\ItemsInterface;
use App\Repositories\All\Items\ItemsRepository;
use App\Repositories\All\LoanInstallments\LoanInstallmentsInterface;
use App\Repositories\All\LoanInstallments\LoanInstallmentsRepository;
use App\Repositories\All\Loans\LoansInterface;
use App\Repositories\All\Loans\LoansRepository;
use App\Repositories\All\ProductionItems\ProductionItemsInterface;
use App\Repositories\All\ProductionItems\ProductionItemsRepository;
use App\Repositories\All\Productions\ProductionsInterface;
use App\Repositories\All\Productions\ProductionsRepository;
use App\Repositories\All\SaleItems\SaleItemsInterface;
use App\Repositories\All\SaleItems\SaleItemsRepository;
use App\Repositories\All\Sales\SalesInterface;
use App\Repositories\All\Sales\SalesRepository;
use App\Repositories\All\SecurityRoles\SecurityRolesInterface;
use App\Repositories\All\SecurityRoles\SecurityRolesRepository;
use App\Repositories\All\Stocks\StocksInterface;
use App\Repositories\All\Stocks\StocksRepository;
use App\Repositories\All\Suppliers\SuppliersInterface;
use App\Repositories\All\Suppliers\SuppliersRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\All\UserManagement\UserManagementInterface;
use App\Repositories\All\UserManagement\UserManagementRepository;
use App\Repositories\All\UploadData\UploadDataInterface;
use App\Repositories\All\UploadData\UploadDataRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserManagementInterface::class, UserManagementRepository::class);
        $this->app->bind(AuthInterface::class, AuthRepository::class);
        $this->app->bind(SecurityRolesInterface::class, SecurityRolesRepository::class);
        $this->app->bind(CompanySetupInterface::class, CompanySetupRepository::class);
        $this->app->bind(UploadDataInterface::class, UploadDataRepository::class);
        $this->app->bind(CustomersInterface::class, CustomersRepository::class);
        $this->app->bind(SuppliersInterface::class, SuppliersRepository::class);
        $this->app->bind(ItemsInterface::class, ItemsRepository::class);
        $this->app->bind(StocksInterface::class, StocksRepository::class);
        $this->app->bind(SalesInterface::class, SalesRepository::class);
        $this->app->bind(SaleItemsInterface::class, SaleItemsRepository::class);
        $this->app->bind(ExpensesInterface::class, ExpensesRepository::class);
        $this->app->bind(ProductionsInterface::class, ProductionsRepository::class);
        $this->app->bind(ProductionItemsInterface::class, ProductionItemsRepository::class);
        $this->app->bind(BankAccountsInterface::class, BankAccountRepository::class);
        $this->app->bind(BankTransactionsInterface::class, BankTransactionsRepository::class);
        $this->app->bind(LoansInterface::class, LoansRepository::class);
        $this->app->bind(LoanInstallmentsInterface::class, LoanInstallmentsRepository::class);
        $this->app->bind(DebtorsInterface::class, DebtorsRepository::class);
        $this->app->bind(CreditorsInterface::class, CreditorsRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $router = $this->app->make(\Illuminate\Routing\Router::class);

        if (method_exists($router, 'aliasMiddleware')) {
            $router->aliasMiddleware('permission', \App\Http\Middleware\CheckPermission::class);
        } else {
            $router->middleware('permission', \App\Http\Middleware\CheckPermission::class);
        }
    }
}
