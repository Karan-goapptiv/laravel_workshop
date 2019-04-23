<?php

namespace App\Library\RepositoriesPattern\Contracts;


interface ServiceContract {

    public function create(array $data);

    public function update(array $data, $id);

    public function destroy($id);

    public function getRepository();


}