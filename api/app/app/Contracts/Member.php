<?php

namespace App\Contracts;

interface Member {
    public function store($listId, $data);

    public function update($listId, $id, $data);

    public function destroy($listId, $id);
}
