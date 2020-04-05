<?php

namespace App\Http\Controllers\Api;

use App\CategoriaProduto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Respose;

class CategoriaProdutoController extends Controller
{
    private $categoria;

    public function __construct(CategoriaProduto $categoria) {
        $this->categoria = $categoria;
    }

    public function list() {
        return response()->json($this->categoria->paginate(25));
    }

    public function retrive($id) {
        $categoria = $this->categoria->find($id);
        if (!$categoria) {
            return response()->json([], 404);
        }
        return response()->json(['data'=> $categoria]);
    }

    public function create(Request $request) {
        try {
            $data = $request->all();
            $categoria = $this->categoria->create($data);

            return response()->json(['data' => $categoria], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->errorInfo], 400);
        }
    }

    public function update(Request $request, $id) {
        try {
            $data = $request->all();

            $categoria = $this->categoria->find($id);
            if (!$categoria) {
                return response()->json([], 404);
            }

            $categoria->update($data);

            return response()->json(['data' => $categoria], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->errorInfo], 400);
        }
    }

    public function delete($id) {
        try {
            $categoria = $this->categoria->find($id);
            if (!$categoria) {
                return response()->json([], 404);
            }

            $categoria->delete();
            return response()->json([], 204);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->errorInfo], 500);
        }
    }
}
