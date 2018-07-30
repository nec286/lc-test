<?php

namespace App\Contracts;

interface Resource
{
    public function store($data);

    public function update($id, $data);

    public function destroy($id);
}
