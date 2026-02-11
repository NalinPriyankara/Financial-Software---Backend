<?php

namespace App\Repositories\All\UploadData;

use App\Models\UploadData;
use App\Repositories\Base\BaseRepository;

class UploadDataRepository extends BaseRepository implements UploadDataInterface
{
    public function __construct(UploadData $model)
    {
        parent::__construct($model);
    }
}