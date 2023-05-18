<?php

use App\Models\Translation;
use App\Repositories\TranslationRepository;
use App\Services\TranslationService;
use Illuminate\Support\Facades\Cache;

function t($key)
{
    $translationService = new TranslationService(new TranslationRepository());
    $translations = $translationService->cachedTranslations();
    return $translations[$key] ?? $key;
}
