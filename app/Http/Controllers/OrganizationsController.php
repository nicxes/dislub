<?php

namespace App\Http\Controllers;

use acidjazz\metapi\MetApi;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

use App\Models\Organization;

class OrganizationsController extends Controller
{
    use MetApi;

    /**
     * Endpoint getting tasks list
     */
    public function index(Request $request)
    {
        $organizations = Organization::all();

        return $this->render($organizations);
    }

    /**
     * Endpoint to find a specified task from ID
     */
    public function find(Request $request, $id)
    {
        $organization = Organization::where('id', $id)->first();

        return $this->render($organization);
    }

    /**
     * Endpoint to find a specified organization from his PIN
     */
    public function login(Request $request, $pin)
    {
        $organization = Organization::where('pin', $pin)->first();

        return $this->render($organization);
    }

    /**
     * Endpoint to create a task
     */
    public function store(Request $request)
    {
        $this
          ->option('title', 'required|string')
          ->option('description', 'nullable')
          ->verify();

        $organization = Organization::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'completed' => $request->input('completed'),
        ]);

        return $this->render([
            'success' => 'true',
            'message' => 'Organization created'
        ]);
    }

    /**
     * Endpoint to update a task
     */
    public function update(Request $request, $id)
    {
        $this
          ->option('id', 'required')
          ->option('title', 'required|string')
          ->option('description', 'nullable')
          ->verify();

        $organization = Organization::where('id', $id)->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'completed' => $request->input('completed'),
        ]);

        return $this->render([
            'success' => 'true',
            'message' => 'Organization edited'
        ]);
    }

    /**
     * Endpoint to destroy a task
     */
    public function destroy($id)
    {
        $organization = Organization::find($id);
        $organization->delete();

        return $this->render([
            'success' => 'true',
            'message' => 'Organization deleted'
        ]);
    }

    /**
     * Endpoint getting tasks list
     */
    public function orders(Request $request)
    {
        $organizations = Organization::all();

        foreach ($organizations as $organization) {
            $total = 0;
            foreach ($organization->orders()->get() as $order) {
                foreach ($order->ordersProducts()->get() as $orderProduct) {
                    $total += $orderProduct->quantity;
                }
            }

            $organization['total_products'] = $total;
        }

        return $this->render($organizations);
    }

    /**
     * Error response
     */
    public function error(): Response|JsonResponse
    {
        return $this->render(['forced_error' => $forced_error]);
    }
}