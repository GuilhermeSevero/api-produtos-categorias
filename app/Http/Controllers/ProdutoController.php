<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller {

    private $produto;

    public function __construct(Produto $produto) {
        $this->produto = $produto;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return response()->json($this->produto->paginate(25));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        try {
            $data = $request->all();
            $produto = $this->produto->create($data);

            return response()->json(['data' => $produto], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->errorInfo], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $produto = $this->produto->find($id);
        if (!$produto) {
            return response()->json([], 404);
        }
        return response()->json(['data'=> $produto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        try {
            $data = $request->all();

            $produto = $this->produto->find($id);
            if (!$produto) {
                return response()->json([], 404);
            }

            $produto->update($data);

            return response()->json(['data' => $produto], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->errorInfo], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        try {
            $produto = $this->produto->find($id);
            if (!$produto) {
                return response()->json([], 404);
            }

            $produto->delete();
            return response()->json([], 204);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->errorInfo], 500);
        }
    }
}
