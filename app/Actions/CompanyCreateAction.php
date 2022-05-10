<?php

namespace App\Actions;

use App\Http\Requests\CompanyStoreRequest;
use App\Mail\NewCompanyAddedEmail;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CompanyCreateAction
{
    public function execute(User $user, CompanyStoreRequest $request): Company
    {
        $logo = $request->file('logo');
        $path = 'logos/' . Str::uuid() . '.' . $logo->getClientOriginalExtension();

        Storage::disk('public')->put($path, $logo->getContent());

        $company = Company::create(
            array_merge([
                'user_id' => $user->id,
                'logo' => $path,
            ], $request->only(['name', 'email', 'address']))
        );

        NewCompanyAddedEmail::dispatch($company);

        return $company;
    }
}
