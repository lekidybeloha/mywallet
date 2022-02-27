<?php

namespace App\Http\Controllers;

use App\Handlers\RedirectHandler;
use App\Helpers\ModelHelper;
use App\Helpers\RelationPaginator;
use Illuminate\Http\Request;

class ProjetController extends Controller
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
     * Show projets section
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function projets()
    {
        $projets = $this->relationPaginator->getUserRelationWithPagination('projets');
        return view('dashboard.projets', compact('projets'));
    }
}
