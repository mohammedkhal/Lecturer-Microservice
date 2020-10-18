<?php

namespace App\Models\V1;

use App\Models\Model;

class Lecturer extends Model
{
    //Constants
    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';

    const GRADE_TEACHING_ASSISTANT = 'teaching assistant';
    const GRADE_ASSISTANT_PROFESSOR = 'assistant professor';
    const GRADE_ASSOCIATE_PROFESSOR = 'associate professor';
    const GRADE_PROF = 'prof';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $connection = 'mysql';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users_lecturers';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'uuid';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Prevent Eloquent from overriding uuid with `lastInsertId`.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'first_name' => 'string',
        'second_name' => 'string',
        'third_name' => 'string',
        'family_name' => 'string',
        'status' => 'string',
    ];

    /**
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
