<?php

namespace App\Repositories;

use App\Models\AdminSetting;
use App\Models\Contact;

class AdminSettingsRepository extends AbstractRepository
{
    protected $modelClass = AdminSetting::class;

}
