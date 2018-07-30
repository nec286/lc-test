<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Http\Requests\Member as MemberRequest;
use App\Http\Resources\Member as MemberResource;
use App\Contracts\Member;

class MemberController extends Controller
{
    protected $repo;

    public function __construct(Member $repo)
    {
        $this->repo = $repo;
    }

    public function store($list, MemberRequest $request)
    {
        return response(new MemberResource(
            $this->repo->store($list, $request->all())
        ), Response::HTTP_CREATED);
    }

    public function update($list, $id, MemberRequest $request)
    {
        return new MemberResource(
            $this->repo->update($list, $id, $request->all())
        );
    }

    public function destroy($list, $id)
    {
        $this->repo->destroy($list, $id);
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
