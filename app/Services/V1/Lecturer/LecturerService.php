<?php

namespace App\Services\V1\Lecturer;

use App\Repositories\V1\Lecturer\LecturerRepository;

class LecturerService
{
    private $lecturerRepository;

    /**
     * Create a new Repository instance.
     * @return void
     */
    public function __construct(LecturerRepository $lecturerRepository)
    {
        $this->lecturerRepository = $lecturerRepository;
    }

    /**
     * Return the list of Lecturers
     * @return App\Models\V1\Lecturer
     */
    public function index()
    {
        return $this->lecturerRepository->index();
    }

    /**
     * Update an existing Lecturer
     * @return App\Models\V1\Lecturer
     */
    public function update($data)
    {
        return $this->lecturerRepository->update($data);
    }

    /**
     * Remove an existing Lecturer
     * @return App\Models\V1\Lecturer
     */
    public function destroy($data)
    {
        return $this->lecturerRepository->destroy($data);
    }

    /**
     * Create one new author
     * @return App\Models\V1\Lecturer
     */
    public function store($data)
    {
        return $this->lecturerRepository->store($data);
    }

    /**
     * Obtains and show one Lecturer
     * @return App\Models\V1\Lecturer
     */
    public function show($data)
    {
        return $this->lecturerRepository->show($data);
    }
}
