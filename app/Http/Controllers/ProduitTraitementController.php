<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProduitTraitementRequest;
use App\Models\ProduitTraitement;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProduitTraitementController extends Controller
{
  use AuthorizesRequests;

  public function index()
  {
    $this->authorize('viewAny', ProduitTraitement::class);

    return ProduitTraitement::all();
  }

  public function store(ProduitTraitementRequest $request)
  {
    $this->authorize('create', ProduitTraitement::class);

    return ProduitTraitement::create($request->validated());
  }

  public function show(ProduitTraitement $ProduitTraitement)
  {
    $this->authorize('view', $ProduitTraitement);

    return $ProduitTraitement;
  }

  public function update(ProduitTraitementRequest $request, ProduitTraitement $ProduitTraitement)
  {
    $this->authorize('update', $ProduitTraitement);

    $ProduitTraitement->update($request->validated());

    return $ProduitTraitement;
  }

  public function destroy(ProduitTraitement $ProduitTraitement)
  {
    $this->authorize('delete', $ProduitTraitement);

    $ProduitTraitement->delete();

    return response()->json();
  }
}
