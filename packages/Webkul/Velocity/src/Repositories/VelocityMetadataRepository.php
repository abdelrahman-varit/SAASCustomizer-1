<?php

namespace Webkul\Velocity\Repositories;

use Webkul\Core\Eloquent\Repository;

class VelocityMetadataRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    function model()
    {
        return 'Webkul\Velocity\Contracts\VelocityMetadata';
    }


    public function update(array $data, $id)
    {
   
        $meta_data = $this->where('id',$id)->update($data);

        return $meta_data;
    }

}