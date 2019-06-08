<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSignRequest;
use App\Http\Requests\UpdateSignRequest;
use App\Repositories\SignRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class SignController extends AppBaseController
{
    /** @var  SignRepository */
    private $signRepository;

    public function __construct(SignRepository $signRepo)
    {
        $this->signRepository = $signRepo;
    }

    /**
     * Display a listing of the Sign.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $signs = $this->signRepository->all();

        return view('signs.index')
            ->with('signs', $signs);
    }

    /**
     * Show the form for creating a new Sign.
     *
     * @return Response
     */
    public function create()
    {
        return view('signs.create');
    }

    /**
     * Store a newly created Sign in storage.
     *
     * @param CreateSignRequest $request
     *
     * @return Response
     */
    public function store(CreateSignRequest $request)
    {
        $input = $request->all();

        $sign = $this->signRepository->create($input);

        Flash::success('Sign saved successfully.');

        return redirect(route('signs.index'));
    }

    /**
     * Display the specified Sign.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sign = $this->signRepository->find($id);

        if (empty($sign)) {
            Flash::error('Sign not found');

            return redirect(route('signs.index'));
        }

        return view('signs.show')->with('sign', $sign);
    }

    /**
     * Show the form for editing the specified Sign.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sign = $this->signRepository->find($id);

        if (empty($sign)) {
            Flash::error('Sign not found');

            return redirect(route('signs.index'));
        }

        return view('signs.edit')->with('sign', $sign);
    }

    /**
     * Update the specified Sign in storage.
     *
     * @param int $id
     * @param UpdateSignRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSignRequest $request)
    {
        $sign = $this->signRepository->find($id);

        if (empty($sign)) {
            Flash::error('Sign not found');

            return redirect(route('signs.index'));
        }

        $sign = $this->signRepository->update($request->all(), $id);

        Flash::success('Sign updated successfully.');

        return redirect(route('signs.index'));
    }

    /**
     * Remove the specified Sign from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sign = $this->signRepository->find($id);

        if (empty($sign)) {
            Flash::error('Sign not found');

            return redirect(route('signs.index'));
        }

        $this->signRepository->delete($id);

        Flash::success('Sign deleted successfully.');

        return redirect(route('signs.index'));
    }
}
