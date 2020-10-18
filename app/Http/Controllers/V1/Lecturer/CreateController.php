<?php

namespace App\Http\Controllers\V1\Lecturer;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Services\V1\Lecturer\LecturerService;

class CreateController extends Controller
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
     * Create one new author
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'user_uuid' => 'required|uuid',
            'facility_uuid' => 'required|uuid',
            'specialization_uuid' => 'required|uuid',
            'first_name' => 'required|max:255',
            'second_name' => 'required|max:255',
            'third_name' => 'required|max:255',
            'family_name' => 'required|max:255',
        ];

        $this->validate($request, $rules);

        $data = $request->all();
        $lecturer = $this->lecturerService->store($data);

        return $this->successResponse($lecturer, Response::HTTP_CREATED);
    }
}
