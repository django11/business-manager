<?php

namespace App\Http\Controllers;

use App\Actions\CompanyCreateAction;
use App\Actions\CompanyUpdateAction;
use App\Http\Requests\CompanyStoreRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Services\CompanyFetchService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CompanyController extends Controller
{
    public function __construct(private CompanyFetchService $companyFetchService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('pages.companies.index', [
           'companies' => $this->companyFetchService->getUserCompanies(auth()->user())
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('pages.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CompanyStoreRequest $request
     * @param CompanyCreateAction $companyCreateAction
     *
     * @return RedirectResponse
     */
    public function store(CompanyStoreRequest $request, CompanyCreateAction $companyCreateAction): RedirectResponse
    {
        $companyCreateAction->execute(auth()->user(), $request);

        return redirect(route('companies.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function show(int $id): View
    {
        return view('pages.companies.show', [
            'company' => $this->companyFetchService->getUserCompanyById(auth()->user(), $id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function edit(int $id): View
    {
        return view('pages.companies.edit', [
            'company' => $this->companyFetchService->getUserCompanyById(auth()->user(), $id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CompanyUpdateRequest  $request
     * @param  CompanyUpdateAction  $companyUpdateAction
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(CompanyUpdateRequest $request, CompanyUpdateAction $companyUpdateAction, int $id): RedirectResponse
    {
        $companyUpdateAction->execute(
            $this->companyFetchService->getUserCompanyById(auth()->user(), $id),
            $request
        );

        return redirect(route('companies.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $company = $this->companyFetchService->getUserCompanyById(auth()->user(), $id);
        $company->delete();

        return redirect(route('companies.index'));
    }
}
