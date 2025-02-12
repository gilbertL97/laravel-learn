<?php

namespace Modules\Blog\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function storePost(Request $request)
    {
        //
    }
    public function storeCategory(Request $request)
    {
        //
    }
    public function showAll(Request $request) {}
    /**
     * Show the specified resource.
     */
    public function show($id) {}

    public function showPrevNext($id) {}
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyPost($id)
    {
        //
    }
    public function destroyCategory($id)
    {
        //
    }
}
