<?php

namespace Modules\Zone\Http\Controllers\Zones;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Zone\Entities\Daira;
use Modules\Zone\Entities\Wilaya;
use App\Http\Controllers\ApiController;
use Modules\Zone\Transformers\Dairas\DairaCollection;

class DairaController extends ApiController
{
    public function __construct()
    {
        $this->middleware('role:super-admin');
    }
    
    public function getDairaByWilaya($wilayaId)
    {
        if (Wilaya::where('id', $wilayaId)->doesntExist())
            return $this->errorResponse(trans('messages.not_data_found', Response::HTTP_NOT_FOUND));
        return $this->successResponse(new DairaCollection(Daira::where('wilaya_id', $wilayaId)->get()), Response::HTTP_OK);
    }
}
