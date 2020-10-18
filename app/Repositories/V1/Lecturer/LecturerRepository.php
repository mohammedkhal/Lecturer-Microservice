<?php

namespace App\Repositories\V1\Lecturer;

use App\Models\V1\Lecturer;
use App\Repositories\Repository;

class LecturerRepository extends Repository
{
    /**
     * Create a new Lecturer instance.
     * @return object
     */
    public function getModel()
    {
        return new Lecturer;
    }

    /**
     * Return the list of Lecturer
     * @return App\Models\V1\Lecturer
     */
    public function index()
    {
        $lecturer = $this->getModel();

        $lecturer = $lecturer->whereStatus(Lecturer::STATUS_ACTIVE)->get();

        return $lecturer;
    }

    /**
     * Update an existing Lecturer
     * @return App\Models\V1\Lecturer
     */
    public function update($data)
    {
        $lecturer = $this->getModel();

        $lecturer = $lecturer->findOrFail($data['lecturer_uuid'])->first();

        $lecturer->facility_uuid = $data['facility_uuid'];
        $lecturer->specialization_uuid = $data['specialization_uuid'];
        $lecturer->first_name = $data['first_name'];
        $lecturer->second_name = $data['second_name'];
        $lecturer->third_name = $data['third_name'];
        $lecturer->family_name = $data['family_name'];

        $lecturer->save();

        return $lecturer;
    }

    /**
     * Remove an existing lecturer
     * @return App\Models\V1\Lecturer
     */
    public function destroy($data)
    {
        $lecturer = $this->getModel();

        $lecturer = $lecturer->findOrFail($data['lecturer_uuid'])->first();
        $lecturer->status = Lecturer::STATUS_INACTIVE;

        $lecturer->save();

        return $lecturer;
    }

    /**
     * Create one new lecturer
     * @return App\Models\V1\Lecturer
     */
    public function store($data)
    {
        $lecturer = $this->getModel();

        $lecturer->user_uuid = $data['user_uuid'];
        $lecturer->facility_uuid = $data['facility_uuid'];
        $lecturer->specialization_uuid = $data['specialization_uuid'];
        $lecturer->first_name = $data['first_name'];
        $lecturer->second_name = $data['second_name'];
        $lecturer->third_name = $data['third_name'];
        $lecturer->family_name = $data['family_name'];

        $lecturer->save();

        return $lecturer;
    }

    /**
     * Obtains and show one lecturer
     * @return App\Models\V1\Lecturer
     */
    public function show($data)
    {
        $lecturer = $this->getModel();

        $lecturer = $lecturer->findOrFail($data['lecturer_uuid'])->first();

        return $lecturer;
    }
}
