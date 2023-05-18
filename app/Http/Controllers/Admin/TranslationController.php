<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TranslationRequest;
use App\Models\Translation;
use App\Services\TranslationService;
use Illuminate\Http\Request;

class TranslationController extends Controller
{

    public function __construct(protected TranslationService $service)
    {
    }

    public function index()
    {

        $translations = $this->service->index();
        return view('admin.translation.index',compact('translations'));
    }

    public function create()
    {
        return view('admin.translation.form');
    }

    public function store(TranslationRequest $request)
    {


        $this->service->store($request);
        return redirect()->route('translation.index');
    }

    public function edit(Translation $translation)
    {
        return view('admin.translation.form',['model'=>$translation]);
    }

    public function update(Translation $translation)
    {
        $this->service->update(\request(),$translation);
        return redirect()->back();
    }

    public function destroy(Translation $translation)
    {
        $this->service->delete($translation);
        return redirect()->back();
    }

}
