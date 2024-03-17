<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Throwable;
use DB;

class ResourceController extends Controller
{
    protected $moduleId;

    public function __construct($service)
    {
        $this->service = $service;
    }

    public function storeValidationRequest()
    {
        return '';
    }

    public function updateValidationRequest()
    {
        return '';
    }

    public function defaultRequest()
    {
        return 'Illuminate\Http\Request';
    }

    /**
     * Overide this function and make it return true, if current module is a submodule (nested one). (compulsory if current module is submodule)
     * for example: Posts Module = /users/:users_id/posts.
     * @returns {boolean}
     */
    public function isSubModule()
    {
        return false;
    }

    /**
     * @params id -> id of the module (for example: users_id)
     * @returns {void}
     */
    public function setModuleId($id)
    {
        if ($this->isSubModule()) {
            $this->moduleId = $id;
        }

        return $this->moduleId;
    }

    /**
     * Get current module name.
     * @returns {string}
     * Override this function (compulsory)
     */
    public function moduleName()
    {
        return '';
    }

    /**
     * Get current sub module name.
     * @returns {string}
     * Override this function (compulsory if current module is submodule)
     */
    public function subModuleName()
    {
        return '';
    }

    /**
     * Get view folder for current module.
     * @returns {string}
     * Override this function (compulsory)
     */
    public function viewFolder()
    {
        return '';
    }

    /**
     * Convert module name into title by capitalizing each word.
     * @returns {string}
     */
    public function moduleToTitle()
    {
        $title = '';
        $data = explode('-', $this->moduleName());
        foreach ($data as $d) {
            $title .= $d . ' ';
        }

        return ucwords($title);
    }

    /**
     * Convert submodule name into title by capitalizing each word.
     * @returns {string}
     */
    public function subModuleToTitle()
    {
        $title = '';
        $data = explode('-', $this->subModuleName());
        foreach ($data as $d) {
            $title .= $d . ' ';
        }

        return ucwords($title);
    }

    // Breadcrumb for dashboard page
    public static function breadcrumbBase()
    {
        return [
            'title' => ucwords('Dashboard'),
            'link' => '/' . getSystemPrefix() . '/home',
        ];
    }

    /**
     * @param activate -> weather to activate the title or not
     * @returns {*[]}
     */
    public function breadcrumbForIndex($activate = true)
    {
        $breadcrumbs = [
            $this->breadcrumbBase(),
            [
                'title' => $this->moduleToTitle(),
                'link' => $this->indexUrl(),
                'active' => $this->isSubModule() ? false : $activate,
            ],
        ];
        if ($this->isSubModule()) {
            $breadcrumbs = array_merge($breadcrumbs, [[
                'title' => $this->subModuleToTitle(),
                'link' => $this->subModuleIndexUrl(),
                'active' => $activate,
            ]]);
        }

        return $breadcrumbs;
    }

    /**
     * Breadcrumb for form pages.
     * @param title -> create/edit
     * @returns {*[]}
     */
    public function breadcrumbForForm($title)
    {
        return array_merge($this->breadcrumbForIndex(false), [
            [
                'title' => $title,
                'active' => true,
            ],
        ]);
    }

    public function getUrl()
    {
        return $this->isSubModule() ? $this->subModuleIndexUrl() : $this->indexUrl();
    }

    public function getModuleName()
    {
        return $this->isSubModule() ? $this->subModuleToTitle() : $this->moduleToTitle();
    }

    /**
     * Get index url for current module.
     * @returns {string}
     */
    public function indexUrl()
    {
        return '/' . getSystemPrefix() . '/' . $this->moduleName();
    }

    /**
     * Get index url for current sub module.
     * @returns {string}
     */
    public function subModuleIndexUrl()
    {
        return $this->indexUrl() . '/' . $this->moduleId . '/' . $this->subModuleName();
    }

    public function renderView($viewFile, $data)
    {
        $data['indexUrl'] = $this->getUrl();
        $data['title'] = $this->getModuleName();
        return view($this->viewFolder() . '.' . $viewFile, $data)->render();
    }

    /**
     * Show a list of all resources.
     * GET resources.
     */
    public function index(Request $request, $id = '')
    {
        $data = $this->service->indexPageData($request);
        $data['breadcrumbs'] = $this->breadcrumbForIndex();
        $this->setModuleId($id);
        return $this->renderView('index', $data);
    }

    /**
     * Render a form to be used for creating a new resource.
     * GET resources/create.
     */
    public function create()
    {
        $request = $this->defaultRequest();
        $request = app()->make($request);
        $data = $this->service->createPageData($request);
        $this->setModuleId($request->id);
        $data['breadcrumbs'] = $this->breadcrumbForForm('Create');

        return $this->renderView('form', $data);
    }

    /**
     * Create/save a new resource.
     * POST resources.
     */
    public function store()
    {
        try {
            DB::beginTransaction();
            if (!empty($this->storeValidationRequest())) {
                $request = $this->storeValidationRequest();
            } else {
                $request = $this->defaultRequest();
            }
            $request = app()->make($request);
            $this->service->store($request);
            $this->setModuleId($request->id);
            DB::commit();
            return redirect($this->getUrl())->withErrors(['success' => 'Successfully created.']);
        } catch (Throwable $throwableCatch) {
            DB::rollback();
            return redirect()->back()->withErrors(['alert-danger' => 'Something went wrong.']);
        }
    }

    /**
     * Render a form to update an existing resource.
     * GET resources/:id/edit.
     */
    public function edit($id)
    {
        try {
            $request = $this->defaultRequest();
            $request = app()->make($request);
            DB::beginTransaction();
            $data = $this->service->editPageData($request, $id);
            $this->setModuleId($id);
            $data['breadcrumbs'] = $this->breadcrumbForForm('Edit');
            DB::commit();
            return $this->renderView('form', $data);
        } catch (Throwable $throwableCatch) {
            DB::rollback();
            return redirect()->back()->withErrors(['alert-danger' => 'Something went wrong.']);
        }
    }

    /**
     * Update resource details.
     * PUT or PATCH resources/:id.
     */
    public function update($id)
    {
        try {
            if (!empty($this->updateValidationRequest())) {
                $request = $this->updateValidationRequest();
            } elseif (!empty($this->storeValidationRequest())) {
                $request = $this->storeValidationRequest();
            } else {
                $request = $this->defaultRequest();
            }
            $request = app()->make($request);
            DB::beginTransaction();
            $this->service->update($request, $id);
            $this->setModuleId($id);
            DB::commit();
            return redirect($this->getUrl())->withErrors(['success' => 'Successfully updated.']);
        } catch (Throwable $throwableCatch) {
            DB::rollback();
            return redirect()->back()->withErrors(['alert-danger' => 'Something went wrong.']);
        }
    }

    /**
     * Delete a resource with id.
     * DELETE resources/:id.
     */
    public function destroy(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $this->service->delete($request, $id);
            $this->setModuleId($id);
            DB::commit();
            return redirect($this->getUrl())->withErrors(['success' => 'Successfully deleted.']);
        } catch (Throwable $throwableCatch) {
            DB::rollback();
            return redirect()->back()->withErrors(['alert-danger' => 'Something went wrong.']);
        }
    }
}
