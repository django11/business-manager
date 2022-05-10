<?php

namespace App\Actions;

use App\Http\Requests\CompanyUpdateRequest;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CompanyUpdateAction
{
    public function execute(Company $company, CompanyUpdateRequest $request): Company
    {
        $data = $request->only(['name', 'email', 'address']);
        $logo = $request->file('logo');

        if ($logo) {
            $path = 'logos/' . Str::uuid() . '.' . $logo->getClientOriginalExtension();
            Storage::disk('public')->put($path, $logo->getContent());
            $data['logo'] = $path;
        }

        $company->update($data);

        return $company->refresh();
    }
}
