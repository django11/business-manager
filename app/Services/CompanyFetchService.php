<?php

namespace App\Services;

use App\Models\Company;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

class CompanyFetchService
{
    public function getUserCompanies(User $user): LengthAwarePaginator
    {
        return Company::where('user_id', $user->id)->paginate(5);
    }

    public function getUserCompanyById(User $user, int $companyId): Company
    {
        return Company::where('user_id', $user->id)->where('id', $companyId)->firstOrFail();
    }
}
