<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStyleRequest;
use App\Http\Requests\UpdateStyleRequest;
use App\Repositories\StyleRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class StyleController extends AppBaseController
{
    /** @var  StyleRepository */
    private $styleRepository;

    public function __construct(StyleRepository $styleRepo)
    {
        $this->styleRepository = $styleRepo;
    }

    /**
     * Display a listing of the Style.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $styles = $this->styleRepository->all();

        return view('styles.index')
            ->with('styles', $styles);
    }

    /**
     * Show the form for creating a new Style.
     *
     * @return Response
     */
    public function create()
    {
        return view('styles.create');
    }

    /**
     * Store a newly created Style in storage.
     *
     * @param CreateStyleRequest $request
     *
     * @return Response
     */
    public function store(CreateStyleRequest $request)
    {
        $input = $request->all();

        $style = $this->styleRepository->create($input);

        Flash::success('Style saved successfully.');

        return redirect(route('styles.index'));
    }

    /**
     * Display the specified Style.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $style = $this->styleRepository->find($id);

        if (empty($style)) {
            Flash::error('Style not found');

            return redirect(route('styles.index'));
        }

        return view('styles.show')->with('style', $style);
    }

    /**
     * Show the form for editing the specified Style.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $style = $this->styleRepository->find($id);

        if (empty($style)) {
            Flash::error('Style not found');

            return redirect(route('styles.index'));
        }

        return view('styles.edit')->with('style', $style);
    }

    /**
     * Update the specified Style in storage.
     *
     * @param int $id
     * @param UpdateStyleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStyleRequest $request)
    {
        $style = $this->styleRepository->find($id);

        if (empty($style)) {
            Flash::error('Style not found');

            return redirect(route('styles.index'));
        }

        $style = $this->styleRepository->update($request->all(), $id);

        Flash::success('Style updated successfully.');

        return redirect(route('styles.index'));
    }

    /**
     * Remove the specified Style from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $style = $this->styleRepository->find($id);

        if (empty($style)) {
            Flash::error('Style not found');

            return redirect(route('styles.index'));
        }

        $this->styleRepository->delete($id);

        Flash::success('Style deleted successfully.');

        return redirect(route('styles.index'));
    }
}
