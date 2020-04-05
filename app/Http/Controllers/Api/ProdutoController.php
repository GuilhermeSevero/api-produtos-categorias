<?php

namespace App\Http\Controllers\Api;

use App\Produto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Respose;

class ProdutoController extends Controller {

    private $produto;

    public function __construct(Produto $produto) {
        $this->produto = $produto;
    }

    public function list() {
        return response()->json($this->produto->paginate(25));
    }

    public function retrive($id) {
        $produto = $this->produto->find($id);
        if (!$produto) {
            return response()->json([], 404);
        }
        return response()->json(['data'=> $produto]);
    }

    public function create(Request $request) {
        try {
            $data = $request->all();
            $produto = $this->produto->create($data);

            return response()->json(['data' => $produto], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->errorInfo], 400);
        }
    }

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

    public function delete($id) {
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
