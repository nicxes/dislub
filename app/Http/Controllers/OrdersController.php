<?php

namespace App\Http\Controllers;

use acidjazz\metapi\MetApi;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

use App\Models\Order;

class OrdersController extends Controller
{
    use MetApi;

    /**
     * Endpoint getting a list of orders
     */
    public function index(Request $request)
    {
        $orders = Order::all();

        return $this->render($orders);
    }

    /**
     * Endpoint to find a specified order from ID
     */
    public function find(Request $request, $id)
    {
        $order = Order::where('id', $id)->first();
       
        $order->organization;

        foreach ($order->ordersProducts as $orderProduct) {
            $orderProduct->product;
        }

        return $this->render($order);
    }

    /**
     * Endpoint to create a new order
     */
    public function store(Request $request)
    {
        $this
          ->option('organization_id', 'required')
          ->option('email', 'required|string')
          ->option('description', 'nullable')
          ->verify();

        $order = new Order;
        $order->fill($request->all());
        $order->save();

        return $this->render($order);
    }

    /**
     * Endpoint to destroy a order
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();

        return $this->render([
            'success' => 'true',
            'message' => 'Order deleted'
        ]);
    }

    /**
     * Error response
     */
    public function error(): Response|JsonResponse
    {
        return $this->render(['forced_error' => $forced_error]);
    }
}