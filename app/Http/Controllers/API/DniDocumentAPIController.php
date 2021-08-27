<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDniDocumentAPIRequest;
use App\Http\Requests\API\UpdateDniDocumentAPIRequest;
use App\Models\DniDocument;
use App\Repositories\DniDocumentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\DniDocumentResource;
use Response;

/**
 * Class DniDocumentController
 * @package App\Http\Controllers\API
 */

class DniDocumentAPIController extends AppBaseController
{
    /** @var  DniDocumentRepository */
    private $dniDocumentRepository;

    public function __construct(DniDocumentRepository $dniDocumentRepo)
    {
        $this->dniDocumentRepository = $dniDocumentRepo;
    }

    /**
     * Display a listing of the DniDocument.
     * GET|HEAD /dniDocuments
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $dniDocuments = $this->dniDocumentRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(DniDocumentResource::collection($dniDocuments), 'Dni Documents retrieved successfully');
    }

    /**
     * Store a newly created DniDocument in storage.
     * POST /dniDocuments
     *
     * @param CreateDniDocumentAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDniDocumentAPIRequest $request)
    {
        $input = $request->all();

        $dniDocument = $this->dniDocumentRepository->create($input);

        return $this->sendResponse(new DniDocumentResource($dniDocument), 'Dni Document saved successfully');
    }

    /**
     * Display the specified DniDocument.
     * GET|HEAD /dniDocuments/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var DniDocument $dniDocument */
        $dniDocument = $this->dniDocumentRepository->find($id);

        if (empty($dniDocument)) {
            return $this->sendError('Dni Document not found');
        }

        return $this->sendResponse(new DniDocumentResource($dniDocument), 'Dni Document retrieved successfully');
    }

    /**
     * Update the specified DniDocument in storage.
     * PUT/PATCH /dniDocuments/{id}
     *
     * @param int $id
     * @param UpdateDniDocumentAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDniDocumentAPIRequest $request)
    {
        $input = $request->all();

        /** @var DniDocument $dniDocument */
        $dniDocument = $this->dniDocumentRepository->find($id);

        if (empty($dniDocument)) {
            return $this->sendError('Dni Document not found');
        }

        $dniDocument = $this->dniDocumentRepository->update($input, $id);

        return $this->sendResponse(new DniDocumentResource($dniDocument), 'DniDocument updated successfully');
    }

    /**
     * Remove the specified DniDocument from storage.
     * DELETE /dniDocuments/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var DniDocument $dniDocument */
        $dniDocument = $this->dniDocumentRepository->find($id);

        if (empty($dniDocument)) {
            return $this->sendError('Dni Document not found');
        }

        $dniDocument->delete();

        return $this->sendSuccess('Dni Document deleted successfully');
    }
}
