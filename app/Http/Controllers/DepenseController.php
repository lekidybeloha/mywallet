<?php

namespace App\Http\Controllers;

use App\Handlers\RedirectHandler;
use App\Helpers\ModelHelper;
use App\Helpers\RelationPaginator;
use App\Models\Depense;
use App\Services\Mouvement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepenseController extends Controller
{
    private $relationPaginator;
    private $modelHelper;
    private $redirector;
    protected $mouvement;

    public function __construct()
    {
        $this->relationPaginator    = new RelationPaginator();
        $this->modelHelper          = new ModelHelper();
        $this->redirector           = new RedirectHandler();
        $this->mouvement            = new Mouvement();
    }

    /**
     * Show depense section
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $depenses = $this->relationPaginator->getUserRelationWithPagination('depenses');
        return view('dashboard.depenses.depenses', compact('depenses'));
    }

    /**
     * Save a client dépense
     * @param Request $verb
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $verb)
    {
        $data       = $verb->except('_token');
        $save       = $this->modelHelper->modelSave('Depense', $data);
        $this->mouvement->move(Auth::id(), -$data['montant']);
        return $this->redirector->redirect($save);
    }

    /**
     * Suppression d'une dépense
     * @param Request $verb
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Request $verb)
    {
        $data       = $verb->except('_token');
        $depense    = Depense::where('id', '=', $data['id'])->first();
        $this->mouvement->move(Auth::id(), abs($depense->montant));
        $delete     = $this->modelHelper->modelDelete('Depense', $data['id']);
        return $this->redirector->redirect($delete);
    }
}
