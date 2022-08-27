<?php

namespace App\Http\Controllers;

use App\Handlers\RedirectHandler;
use App\Helpers\ModelHelper;
use App\Helpers\RelationPaginator;
use Illuminate\Http\Request;

class SourceController extends Controller
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
     * Show 'source de revenu' section
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $sources = $this->relationPaginator->getUserRelationWithPagination('sources');
        return view('dashboard.sources', compact('sources'));
    }

    /**
     * Save "source de revenu
     * @param Request $verb
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $verb)
    {
        $data = $verb->except('_token');
        $save = $this->modelHelper->modelSave('Source', $data);
        return $this->redirector->redirect($save);
    }

    public function edit(Request $verb)
    {
        $data = $verb->except(['_token', '_method']);
        $save = $this->modelHelper->modelUpdate('Source', $data, $verb->get('id'));
        return $this->redirector->redirect($save);
    }

    public function delete(Request $verb)
    {
        $delete = $this->modelHelper->modelDelete('Source', $verb->get('id'));
        $this->modelHelper->deleteRelation('Revenu', 'id_source', $verb->get('id'));
        return $this->redirector->redirect($delete);
    }
}
