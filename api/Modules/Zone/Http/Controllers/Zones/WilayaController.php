<?php

namespace Modules\Zone\Http\Controllers\Zones;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Zone\Entities\Wilaya;
use App\Http\Controllers\ApiController;
use Modules\Zone\Transformers\Wilayas\WilayaResource;
use Modules\Zone\Transformers\Wilayas\WilayaCollection;

class WilayaController extends ApiController
{
    public function __construct()
    {
        $this->middleware('role:super-admin|admin|manager|member');
    }

    //
    public function index()
    {
        return $this->showAll(new WilayaCollection(Wilaya::get()), Response::HTTP_OK);
    }

    //
    public function show(Wilaya $wilaya)
    {
        return $this->showOne(new WilayaResource($wilaya), Response::HTTP_OK);
    }
}
