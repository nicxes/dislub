<?php

namespace App\Http\Controllers;

use acidjazz\metapi\MetApi;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;

use App\Models\Order;
use App\Mail\OrderMailable;

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
          ->option('products', 'required|array|min:1')
          ->option('total_products', 'required|integer')
          ->verify();

        $order = new Order;
        $order->fill($request->all());
        $order->save();

        // Create products on order_products
        $order->ordersProducts()->createMany($request->input('products'));

        // Send email
        $to = 'dislub@xlns.xyz';
        $email = new OrderMailable($request->all());
        Mail::to($to)->send($email);

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