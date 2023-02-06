<?php

namespace Modules\Setting\Http\Controllers\mails;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\QueryBuilder\QueryBuilder;
use Modules\Setting\Entities\ConfMail;
use Spatie\QueryBuilder\AllowedFilter;
use App\Http\Controllers\ApiController;
use Modules\Setting\Transformers\Mail\ConfMailResource;
use Modules\Setting\Http\Requests\Mail\StoreEmailRequest;
use Modules\Setting\Transformers\Mail\ConfMailCollection;
use Modules\Setting\Http\Requests\Mail\UpdateEmailRequest;

class ConfMailController extends ApiController
{

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) // {{domain}}/api/mail-configuration (GET)
    {
        //
        $limit = $request->query->get('limit') ?? 10;
        $offset = $request->query->get('offset') ?? 0;
        //
        $columns = [
            // Order
            AllowedFilter::exact('id'), 'mailer', 'host', 'port',
            'email', 'encryption', 'is_selected', 'created_at'
        ];

        $confMails = QueryBuilder::for(ConfMail::class)
            //filtering
            ->allowedFilters($columns)
            //sorting
            ->defaultSort('id') //default
            ->allowedSorts([
                // Order
                'id', 'mailer', 'host', 'port',
                'email', 'encryption', 'is_selected', 'created_at'
            ])
            ->limit($limit)->offset($offset * $limit)
            ->get() ?? [];
        //
        return $this->showAll(new ConfMailCollection($confMails), Response::HTTP_OK);
    }

    /**
     * Display a listing of the resource.
     * @param ConfMail $confMail
     * @return Response
     */
    public function show(ConfMail $confMail) // {{domain}}/api/mail-configuration/1 (GET)
    {
        if ($confMail) {
            //
            return $this->showOne(new ConfMailResource($confMail), Response::HTTP_OK);
        }
        //
        return $this->errorResponse(__('messages.recource_cannot_be_found'), Response::HTTP_NOT_FOUND);
    }

    /**
     * Display a listing of the resource.
     * @param StoreEmailRequest $request
     * @return Response
     */
    public function store(StoreEmailRequest $request) // {{domain}}/api/mail-configuration (POST)
    {
        //
        $confMail = ConfMail::create($request->all());
        //
        return $this->successResponse(new ConfMailResource($confMail), Response::HTTP_CREATED);
    }


    /**
     * Display a listing of the resource.
     * @param UpdateEmailRequest $request
     * @param ConfMail $confMail
     * @return Response
     */
    public function update(UpdateEmailRequest $request, ConfMail $confMail) // {{domain}}/api/mail-configuration/1 (PUT)
    {
        // Mailer
        if ($request->has('mailer')) {
            $confMail->mailer = $request->mailer;
        }

        // Host
        if ($request->has('host')) {
            $confMail->host = $request->host;
        }

        // Port
        if ($request->has('port')) {
            $confMail->port = $request->port;
        }

        // Email
        if ($request->has('email')) {
            $confMail->username = $request->email;
            $confMail->from_address = $request->email;
        }

        // Password
        if (
            $request->has('password') &&
            !empty($request->password)
        ) {

            $confMail->password = $request->password;
        }

        // Encryption
        if ($request->has('encryption')) {
            $confMail->encryption = $request->encryption;
        }

        // is selected
        if ($request->has('is_selected')) {
            $confMail->is_selected = $request->is_selected;
        }

        //
        $confMail->save();

        //
        return $this->successResponse(trans('messages.updated_successfully'), Response::HTTP_NO_CONTENT);
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @param ConfMail $confMail
     * @return Response
     */
    public function isSelected(Request $request, ConfMail $confMail) // {{domain}}/api/mail-configuration/is-selected/1 (PUT)
    {
        //
        $request->validate([
            'is_selected' => ['required', 'between:0,1'],
        ]);
        //
        $confMail->update(['is_selected' => $request->is_selected]);
        //
        return $this->successResponse(trans('messages.updated_successfully'), Response::HTTP_NO_CONTENT);
    }

    /**
     * Remove the specified resource from storage.
     * @param ConfMail $confMail
     * @return Response
     */
    public function destroy(ConfMail $confMail) // {{domain}}/api/mail-configuration/1 (DELETE)
    {
        if ($confMail) {
            //
            if ($confMail->delete()) {
                //
                return $this->successResponse(__('messages.deleted_successfully'), Response::HTTP_NO_CONTENT);
            }
            //
            return $this->errorResponse(__('messages.resource_cannot_be_deleted'), Response::HTTP_CONFLICT);
        }
        //
        return $this->errorResponse(__('messages.recource_cannot_be_found'), Response::HTTP_NOT_FOUND);
    }
}
