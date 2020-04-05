<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller {

        private $categoria;

        public function __construct(Categoria $categoria) {
            $this->categoria = $categoria;
        }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return response()->json($this->categoria->paginate(25));
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
            $categoria = $this->categoria->create($data);

            return response()->json(['data' => $categoria], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->errorInfo], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $categoria = $this->categoria->find($id);
        if (!$categoria) {
            return response()->json([], 404);
        }
        return response()->json(['data'=> $categoria]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
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
