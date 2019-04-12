<?php

namespace App\Models\Comment;

use App\Models\TraceableBaseModel;

class Comment extends TraceableBaseModel {

    /**
     * Table name
     */
    public static $tableName = 'COMMENTS';

    /**
     * Guarded Fields
     *
     * @var array
     */
    protected $guarded = [];
}
