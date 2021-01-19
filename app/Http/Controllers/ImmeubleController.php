<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Immeuble;

class ImmeubleController extends Controller
{
    /**
     * Create a new immeuble.
     *
     * @return \Illuminate\Http\Response
     */
    public function saveImmeuble(Request $request)
    {
        $immeuble = new Immeuble();
        $immeuble->address = $request->address;
        $immeuble->name = $request->name;
        $immeuble->images = $request->images;
        $immeuble->type_hab = $request->type_hab;
        $immeuble->type_ren = $request->type_ren;
        $immeuble->superficie = $request->superficie;
        $immeuble->superficie_terrain = $request->superficie_terrain;
        $immeuble->price = $request->price;
        $immeuble->description = $request->description;
        $immeuble->user_id = $request->user_id;

        $immeuble->save();
        return ($immeuble);
    }

    /**
     * Get all Immeuble.
     *
     * @return \Illuminate\Http\Response
     */
    public function getImmeuble()
    {
        return Immeuble::all();
    }

    /**
     * Get Immeuble by id.
     *
     * @return \Illuminate\Http\Response
     */
    public function getImmeubleById(Request $request, $id)
    {
        return Immeuble::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Immeuble $immeuble
     * @return \Illuminate\Http\Response
     */
    public function upImmeuble(Request $request, $id, Immeuble $immeuble)
    {
        $immeuble = new Immeuble();
        $immeuble = Immeuble::find($id);

        if ($request->address) {
            $immeuble->address = $request->address;
        }
        if ($request->name) {
            $immeuble->name = $request->name;
        }
        if ($request->images) {
            $immeuble->images = $request->images;
        }
        if ($request->type_hab) {
            $immeuble->type_hab = $request->type_hab;
        }
        if ($request->type_ren) {
            $immeuble->type_ren = $request->type_ren;
        }
        if ($request->superficie) {
            $immeuble->superficie = $request->superficie;
        }
        if ($request->superficie_terrain) {
            $immeuble->superficie_terrain = $request->superficie_terrain;
        }
        if ($request->price) {
            $immeuble->price = $request->price;
        }
        if ($request->description) {
            $immeuble->description = $request->description;
        }
        if ($request->user_id) {
            $immeuble->user_id = $request->user_id;
        }

        $immeuble->save();
        return ($immeuble);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteImmeuble(Request $request, $id)
    {
        $immeuble = Immeuble::destroy($id);

        return ("C fAIT");
    }
}
