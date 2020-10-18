<?php

namespace App\Http\Controllers\V1\Lecturer;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Services\V1\Lecturer\LecturerService;

class EditController extends Controller
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
     * Update an existing lecturer
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $lecturer_uuid)
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
        $data['lecturer_uuid'] = $lecturer_uuid;

        $lecturer = $this->lecturerService->update($data);

        if ($lecturer->isClean()) {
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return $this->successResponse($lecturer);
    }

    /**
     * Remove an existing lecturer
     * @return Illuminate\Http\Response
     */
    public function destroy($lecturer_uuid)
    {
        $data['lecturer_uuid'] = $lecturer_uuid;

        $lecturer = $this->lecturerService->destroy($data);

        return $this->successResponse($lecturer);
    }
}
