<?php

namespace App\Http\Controllers;

use App\Handlers\RedirectHandler;
use App\Helpers\ModelHelper;
use App\Helpers\RelationPaginator;
use App\Models\Revenu;
use Illuminate\Http\Request;

class RevenuController extends Controller
{
    private $relationPaginator;
    private $modelHelper;
    private $redirector;

    public function __construct()
    {
        $this->relationPaginator    = new RelationPaginator();
        $this->modelHelper          = new ModelHelper();
        $this->redirector           = new RedirectHandler();
    }

    /**
     * Show revenu section
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $revenus = $this->relationPaginator->getUserRelationWithPagination('revenus');
        $sources = $this->relationPaginator->getUserRelationWithPagination('sources');
        return view('dashboard.revenus.revenus', compact('revenus', 'sources'));
    }

    /**
     * Save user revenu
     * @param Request $verb
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $verb)
    {
        $data = $verb->except('_token');
        $save = $this->modelHelper->modelSave('Revenu', $data);
        return $this->redirector->redirect($save);
    }

    /**
     * Affiche la page d'édition d'un revenu
     * @param Revenu $revenu
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Revenu $revenu)
    {
        $sources = $this->relationPaginator->getUserRelationWithPagination('sources');
        return view('dashboard.revenus.edit', compact('revenu', 'sources'));
    }

    /**
     * Mise à jour des données d'un revenu
     * @param Revenu $revenu
     * @param Request $verb
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Revenu $revenu, Request $verb)
    {
        $data = $verb->except('_token');
        $save = $this->modelHelper->modelUpdate('Revenu', $data, $revenu->id);
        return $this->redirector->redirect($save);
    }

    /**
     * Suppression d'un revenu client
     * @param Request $verb
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Request $verb)
    {
        $data   = $verb->except('_token');
        $delete = $this->modelHelper->modelDelete('Revenu', $data['id']);
        return $this->redirector->redirect($delete);
    }
}
