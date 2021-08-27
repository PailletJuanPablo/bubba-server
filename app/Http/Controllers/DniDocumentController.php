<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDniDocumentRequest;
use App\Http\Requests\UpdateDniDocumentRequest;
use App\Repositories\DniDocumentRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class DniDocumentController extends AppBaseController
{
    /** @var  DniDocumentRepository */
    private $dniDocumentRepository;

    public function __construct(DniDocumentRepository $dniDocumentRepo)
    {
        $this->dniDocumentRepository = $dniDocumentRepo;
    }

    /**
     * Display a listing of the DniDocument.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $dniDocuments = $this->dniDocumentRepository->all();

        return view('dni_documents.index')
            ->with('dniDocuments', $dniDocuments);
    }

    /**
     * Show the form for creating a new DniDocument.
     *
     * @return Response
     */
    public function create()
    {
        return view('dni_documents.create');
    }

    /**
     * Store a newly created DniDocument in storage.
     *
     * @param CreateDniDocumentRequest $request
     *
     * @return Response
     */
    public function store(CreateDniDocumentRequest $request)
    {
        $input = $request->all();

        $dniDocument = $this->dniDocumentRepository->create($input);

        Flash::success('Dni Document saved successfully.');

        return redirect(route('dniDocuments.index'));
    }

    /**
     * Display the specified DniDocument.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dniDocument = $this->dniDocumentRepository->find($id);

        if (empty($dniDocument)) {
            Flash::error('Dni Document not found');

            return redirect(route('dniDocuments.index'));
        }

        return view('dni_documents.show')->with('dniDocument', $dniDocument);
    }

    /**
     * Show the form for editing the specified DniDocument.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dniDocument = $this->dniDocumentRepository->find($id);

        if (empty($dniDocument)) {
            Flash::error('Dni Document not found');

            return redirect(route('dniDocuments.index'));
        }

        return view('dni_documents.edit')->with('dniDocument', $dniDocument);
    }

    /**
     * Update the specified DniDocument in storage.
     *
     * @param int $id
     * @param UpdateDniDocumentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDniDocumentRequest $request)
    {
        $dniDocument = $this->dniDocumentRepository->find($id);

        if (empty($dniDocument)) {
            Flash::error('Dni Document not found');

            return redirect(route('dniDocuments.index'));
        }

        $dniDocument = $this->dniDocumentRepository->update($request->all(), $id);

        Flash::success('Dni Document updated successfully.');

        return redirect(route('dniDocuments.index'));
    }

    /**
     * Remove the specified DniDocument from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dniDocument = $this->dniDocumentRepository->find($id);

        if (empty($dniDocument)) {
            Flash::error('Dni Document not found');

            return redirect(route('dniDocuments.index'));
        }

        $this->dniDocumentRepository->delete($id);

        Flash::success('Dni Document deleted successfully.');

        return redirect(route('dniDocuments.index'));
    }
}
