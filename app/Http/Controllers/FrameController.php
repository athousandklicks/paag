<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFrameRequest;
use App\Http\Requests\UpdateFrameRequest;
use App\Repositories\FrameRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class FrameController extends AppBaseController
{
    /** @var  FrameRepository */
    private $frameRepository;

    public function __construct(FrameRepository $frameRepo)
    {
        $this->frameRepository = $frameRepo;
    }

    /**
     * Display a listing of the Frame.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $frames = $this->frameRepository->all();

        return view('frames.index')
            ->with('frames', $frames);
    }

    /**
     * Show the form for creating a new Frame.
     *
     * @return Response
     */
    public function create()
    {
        return view('frames.create');
    }

    /**
     * Store a newly created Frame in storage.
     *
     * @param CreateFrameRequest $request
     *
     * @return Response
     */
    public function store(CreateFrameRequest $request)
    {
        $input = $request->all();

        $frame = $this->frameRepository->create($input);

        Flash::success('Frame saved successfully.');

        return redirect(route('frames.index'));
    }

    /**
     * Display the specified Frame.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $frame = $this->frameRepository->find($id);

        if (empty($frame)) {
            Flash::error('Frame not found');

            return redirect(route('frames.index'));
        }

        return view('frames.show')->with('frame', $frame);
    }

    /**
     * Show the form for editing the specified Frame.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $frame = $this->frameRepository->find($id);

        if (empty($frame)) {
            Flash::error('Frame not found');

            return redirect(route('frames.index'));
        }

        return view('frames.edit')->with('frame', $frame);
    }

    /**
     * Update the specified Frame in storage.
     *
     * @param int $id
     * @param UpdateFrameRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFrameRequest $request)
    {
        $frame = $this->frameRepository->find($id);

        if (empty($frame)) {
            Flash::error('Frame not found');

            return redirect(route('frames.index'));
        }

        $frame = $this->frameRepository->update($request->all(), $id);

        Flash::success('Frame updated successfully.');

        return redirect(route('frames.index'));
    }

    /**
     * Remove the specified Frame from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $frame = $this->frameRepository->find($id);

        if (empty($frame)) {
            Flash::error('Frame not found');

            return redirect(route('frames.index'));
        }

        $this->frameRepository->delete($id);

        Flash::success('Frame deleted successfully.');

        return redirect(route('frames.index'));
    }
}
