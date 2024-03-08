<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaleAddProductsRequest;
use App\Http\Requests\SaleRequest;
use App\Http\Resources\SaleResource;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::with('products')->get();
        return SaleResource::collection($sales);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(SaleRequest $request)
    {
        $validated = $request->validated();
        $saleId = $validated['sales_id'];
        $products = $validated['products'];

        $sale = Sale::create(['sales_id' => $saleId]);
        $sale->addProductsToSale($products);
        $sale->refresh();

        return new SaleResource($sale);
    }

    public function show(string $id)
    {
        $sale = Sale::with('products')->find($id);
        return new SaleResource($sale);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaleAddProductsRequest $request, string $id)
    {
        $products = $request->validated();
        $sale = Sale::with('products')->find($id);
        $sale->addProductsToSale($products);
        $sale->refresh();

        return new SaleResource($sale);
    }

    public function destroy(string $id)
    {
        $sale = Sale::findOrFail($id);
        $sale->products()->detach();
        $sale->delete();

        return response()->json(['message' => 'Venda excluída com sucesso'], Response::HTTP_OK);
    }
}
