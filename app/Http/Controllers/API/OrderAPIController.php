<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateOrderAPIRequest;
use App\Http\Requests\API\UpdateOrderAPIRequest;
use App\Models\Order;
use App\Models\DniDocument;

use App\Repositories\OrderRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\OrderResource;
use Response;
use Auth;
/**
 * Class OrderController
 * @package App\Http\Controllers\API
 */

class OrderAPIController extends AppBaseController
{
    /** @var  OrderRepository */
    private $orderRepository;

    public function __construct(OrderRepository $orderRepo)
    {
        $this->orderRepository = $orderRepo;
        $this->middleware('auth:api')->except(['getDniData']);
    }

    /**
     * Display a listing of the Order.
     * GET|HEAD /orders
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $orders = $this->orderRepository->all(
            ['user_id' => Auth::user()->id]
        );

        return $this->sendResponse(OrderResource::collection($orders), Auth::user());
    }

    /**
     * Store a newly created Order in storage.
     * POST /orders
     *
     * @param CreateOrderAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateOrderAPIRequest $request)
    {
        $input = $request->all();
        $input['company_id'] = $request->get('company_id');
        $input['user_id'] = Auth::user()->id;
        if ($request->has('dni')) {
            $img = $this->storeFromBase64($request->dni);
            if ($img) {
                $input['dni'] = $img;
            }
        }
        if ($request->has('card')) {
            $img = $this->storeFromBase64($request->card);
            if ($img) {
                $input['card'] = $img;
            }
        }
        if ($request->has('remit')) {
            $img = $this->storeFromBase64($request->remit);
            if ($img) {
                $input['remit'] = $img;
            }
        }
        if ($request->has('sign')) {
            $img = $this->storeFromBase64($request->sign);
            if ($img) {
                $input['sign'] = $img;
            }
        }

        $dniDoc = DniDocument::firstOrNew(['dni_number' => $input['dni_number']]);
        $dniDoc->dni = $input['dni'];
        $dniDoc->card = $input['card'];
        $dniDoc->name = $input['name'];
        $dniDoc->save();
        $order = $this->orderRepository->create($input);

        return $this->sendResponse(new OrderResource($order), 'Order saved successfully');
    }

    /**
     * Display the specified Order.
     * GET|HEAD /orders/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Order $order */
        $order = $this->orderRepository->find($id);

        if (empty($order)) {
            return $this->sendError('Order not found');
        }

        return $this->sendResponse(new OrderResource($order), 'Order retrieved successfully');
    }

    /**
     * Update the specified Order in storage.
     * PUT/PATCH /orders/{id}
     *
     * @param int $id
     * @param UpdateOrderAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrderAPIRequest $request)
    {
        $input = $request->all();

        /** @var Order $order */
        $order = $this->orderRepository->find($id);

        if (empty($order)) {
            return $this->sendError('Order not found');
        }

        $order = $this->orderRepository->update($input, $id);

        return $this->sendResponse(new OrderResource($order), 'Order updated successfully');
    }

    /**
     * Remove the specified Order from storage.
     * DELETE /orders/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Order $order */
        $order = $this->orderRepository->find($id);

        if (empty($order)) {
            return $this->sendError('Order not found');
        }

        $order->delete();

        return $this->sendSuccess('Order deleted successfully');
    }


    public function getDniData($dni)
    {
        $dniDoc = DniDocument::where('dni_number', $dni)->first();
        if($dniDoc) {
            return $dniDoc;
        }
        return false;
    }
}
