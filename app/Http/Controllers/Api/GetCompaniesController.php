<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class GetCompaniesController
{
    public function __invoke(): AnonymousResourceCollection
    {
        return CompanyResource::collection(
            Company::latest('id')->take(5)->get()
        );
    }
}
