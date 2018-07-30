<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Http\Requests\MailingList as MailingListRequest;
use App\Http\Resources\MailingList as MailingListResource;
use App\Contracts\MailingList;

class MailingListController extends Controller
{
    protected $repo;

    public function __construct(MailingList $repo)
    {
        $this->repo = $repo;
    }

    public function store(MailingListRequest $request)
    {
        return response(new MailingListResource(
            $this->repo->store($request->all())
        ), Response::HTTP_CREATED);
    }

    public function update($id, MailingListRequest $request)
    {
        return new MailingListResource(
            $this->repo->update($id, $request->all())
        );
    }

    public function destroy($id)
    {
        $this->repo->destroy($id);
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
