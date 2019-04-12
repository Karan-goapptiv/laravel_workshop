<?php

namespace App\Models\Post;

use App\Models\TraceableBaseModel;

class Post extends TraceableBaseModel {

    /**
     * Table name
     */
    public static $tableName = 'POSTS';

    /**
     * Guarded Fields
     *
     * @var array
     */
    protected $guarded = [];
}
