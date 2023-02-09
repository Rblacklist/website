<?php

namespace Modules\Setting\Http\Controllers\Settings;

use App\Traits\UploadImages;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Setting\Entities\Setting;
use App\Http\Controllers\ApiController;
use Modules\Setting\Transformers\Settings\SettingResource;
use Modules\Setting\Transformers\Settings\SettingCollection;
use Modules\Setting\Http\Requests\Settings\UpdateSettingRequest;

class SettingController extends ApiController
{

    //
    private $pathLogo = 'images/logo/';
    private $pathFavicon = 'images/favicon/';

    //
    public function __construct()
    {
        $this->middleware('role:super-admin');
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        //
        $settings = Setting::all();
        //
        return $this->successResponse(new SettingCollection($settings), Response::HTTP_OK);
    }

    /**
     * Show the specified resource.
     * @param $value
     * @return Response
     */
    public function show($value)
    {
        //
        if (empty($value) || Setting::where('key', $value)->doesntExist()) {
            return $this->errorResponse(trans('messages.recource_cannot_be_found'), Response::HTTP_NOT_FOUND);
        }
        //
        $setting = Setting::where('key', $value)->first();
        //
        return $this->successResponse(new SettingResource($setting), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function update(UpdateSettingRequest $request)
    {
        // Site name
        if (request()->has('key') && $request->get('key') === 'site_name') {
            Setting::where('key', 'site_name')->update(['value' => $request->value]);
        }

        // Title
        if (request()->has('key') && $request->get('key') === 'title') {
            Setting::where('key', 'title')->update(['value' => $request->value]);
        }

        // Currency
        if (request()->has('key') && $request->get('key') === 'currency') {
            Setting::where('key', 'currency')->update(['value' => $request->value]);
        }

        // Country
        if (request()->has('key') && $request->get('key') === 'country') {
            Setting::where('key', 'country')->update(['value' => $request->value]);
        }

        // Phone
        if (request()->has('key') && $request->get('key') === 'phone') {
            Setting::where('key', 'phone')->update(['value' => $request->value]);
        }

        // Email
        if (request()->has('key') && $request->get('key') === 'email') {
            Setting::where('key', 'email')->update(['value' => $request->value]);
        }

        // Address
        if (request()->has('key') && $request->get('key') === 'address') {
            Setting::where('key', 'address')->update(['value' => $request->value]);
        }

        // Time zone
        if (request()->has('key') && $request->get('key') === 'time_zone') {
            Setting::where('key', 'time_zone')->update(['value' => $request->value]);
        }

        // Logo
        if (request()->has('logo') && !empty($request->logo)) {
            Setting::where('key', 'logo')->update([
                'value' => UploadImages::file($request->file('logo'), $this->pathLogo)
            ]);
        }

        // Favicon
        if (request()->has('favicon') && !empty($request->favicon)) {
            Setting::where('key', 'favicon')->update([
                'value' => UploadImages::file($request->file('favicon'), $this->pathFavicon)
            ]);
        }

        return $this->successResponse(trans('messages.updated_successfully'), Response::HTTP_NO_CONTENT);
    }
}
