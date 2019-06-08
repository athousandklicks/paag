<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateHangRequest;
use App\Http\Requests\UpdateHangRequest;
use App\Repositories\HangRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class HangController extends AppBaseController
{
    /** @var  HangRepository */
    private $hangRepository;

    public function __construct(HangRepository $hangRepo)
    {
        $this->hangRepository = $hangRepo;
    }

    /**
     * Display a listing of the Hang.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $hangs = $this->hangRepository->all();

        return view('hangs.index')
            ->with('hangs', $hangs);
    }

    /**
     * Show the form for creating a new Hang.
     *
     * @return Response
     */
    public function create()
    {
        return view('hangs.create');
    }

    /**
     * Store a newly created Hang in storage.
     *
     * @param CreateHangRequest $request
     *
     * @return Response
     */
    public function store(CreateHangRequest $request)
    {
        $input = $request->all();

        $hang = $this->hangRepository->create($input);

        Flash::success('Hang saved successfully.');

        return redirect(route('hangs.index'));
    }

    /**
     * Display the specified Hang.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $hang = $this->hangRepository->find($id);

        if (empty($hang)) {
            Flash::error('Hang not found');

            return redirect(route('hangs.index'));
        }

        return view('hangs.show')->with('hang', $hang);
    }

    /**
     * Show the form for editing the specified Hang.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $hang = $this->hangRepository->find($id);

        if (empty($hang)) {
            Flash::error('Hang not found');

            return redirect(route('hangs.index'));
        }

        return view('hangs.edit')->with('hang', $hang);
    }

    /**
     * Update the specified Hang in storage.
     *
     * @param int $id
     * @param UpdateHangRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHangRequest $request)
    {
        $hang = $this->hangRepository->find($id);

        if (empty($hang)) {
            Flash::error('Hang not found');

            return redirect(route('hangs.index'));
        }

        $hang = $this->hangRepository->update($request->all(), $id);

        Flash::success('Hang updated successfully.');

        return redirect(route('hangs.index'));
    }

    /**
     * Remove the specified Hang from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $hang = $this->hangRepository->find($id);

        if (empty($hang)) {
            Flash::error('Hang not found');

            return redirect(route('hangs.index'));
        }

        $this->hangRepository->delete($id);

        Flash::success('Hang deleted successfully.');

        return redirect(route('hangs.index'));
    }
}
