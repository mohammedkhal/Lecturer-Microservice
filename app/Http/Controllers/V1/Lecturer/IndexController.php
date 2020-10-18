<?php

namespace App\Http\Controllers\V1\Lecturer;

use App\Traits\ApiResponser;
use App\Http\Controllers\Controller;
use App\Services\V1\Lecturer\LecturerService;

class IndexController extends Controller
{
    use ApiResponser;
    private $lecturerService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(LecturerService $lecturerService)
    {
        $this->lecturerService = $lecturerService;
    }

    /**
     * Return the list of lecturers
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        $lecturers = $this->lecturerService->index();

        return $this->successResponse($lecturers);
    }

    /**
     * Obtains and show one lecturer
     * @return Illuminate\Http\Response
     */
    public function show($lecturer_uuid)
    {
        $data['lecturer_uuid'] = $lecturer_uuid;
        $lecturer = $this->lecturerService->show($data);

        return $this->successResponse($lecturer);
    }
}
