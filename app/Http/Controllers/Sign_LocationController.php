<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSign_LocationRequest;
use App\Http\Requests\UpdateSign_LocationRequest;
use App\Repositories\Sign_LocationRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class Sign_LocationController extends AppBaseController
{
    /** @var  Sign_LocationRepository */
    private $signLocationRepository;

    public function __construct(Sign_LocationRepository $signLocationRepo)
    {
        $this->signLocationRepository = $signLocationRepo;
    }

    /**
     * Display a listing of the Sign_Location.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $signLocations = $this->signLocationRepository->all();

        return view('sign__locations.index')
            ->with('signLocations', $signLocations);
    }

    /**
     * Show the form for creating a new Sign_Location.
     *
     * @return Response
     */
    public function create()
    {
        return view('sign__locations.create');
    }

    /**
     * Store a newly created Sign_Location in storage.
     *
     * @param CreateSign_LocationRequest $request
     *
     * @return Response
     */
    public function store(CreateSign_LocationRequest $request)
    {
        $input = $request->all();

        $signLocation = $this->signLocationRepository->create($input);

        Flash::success('Sign  Location saved successfully.');

        return redirect(route('signLocations.index'));
    }

    /**
     * Display the specified Sign_Location.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $signLocation = $this->signLocationRepository->find($id);

        if (empty($signLocation)) {
            Flash::error('Sign  Location not found');

            return redirect(route('signLocations.index'));
        }

        return view('sign__locations.show')->with('signLocation', $signLocation);
    }

    /**
     * Show the form for editing the specified Sign_Location.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $signLocation = $this->signLocationRepository->find($id);

        if (empty($signLocation)) {
            Flash::error('Sign  Location not found');

            return redirect(route('signLocations.index'));
        }

        return view('sign__locations.edit')->with('signLocation', $signLocation);
    }

    /**
     * Update the specified Sign_Location in storage.
     *
     * @param int $id
     * @param UpdateSign_LocationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSign_LocationRequest $request)
    {
        $signLocation = $this->signLocationRepository->find($id);

        if (empty($signLocation)) {
            Flash::error('Sign  Location not found');

            return redirect(route('signLocations.index'));
        }

        $signLocation = $this->signLocationRepository->update($request->all(), $id);

        Flash::success('Sign  Location updated successfully.');

        return redirect(route('signLocations.index'));
    }

    /**
     * Remove the specified Sign_Location from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $signLocation = $this->signLocationRepository->find($id);

        if (empty($signLocation)) {
            Flash::error('Sign  Location not found');

            return redirect(route('signLocations.index'));
        }

        $this->signLocationRepository->delete($id);

        Flash::success('Sign  Location deleted successfully.');

        return redirect(route('signLocations.index'));
    }
}
