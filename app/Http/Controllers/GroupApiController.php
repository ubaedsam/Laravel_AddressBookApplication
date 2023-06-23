<?php

namespace App\Http\Controllers;

use App\Http\Resources\GroupResource;
use App\Models\Groups;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Groups::where('user_id', auth()->user()->id)->paginate(100);

        return GroupResource::collection($groups);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $group = new Groups();
        $group->user_id = $user_id;
        $group->group = $request->group;
        if($group->save())
        {
            return new GroupResource($group);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = Groups::findOrFail($id);
        return new GroupResource($group);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function edit(Groups $groups)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user_id = Auth::user()->id;
        $group = Groups::findOrFail($id);
        $group->user_id = $user_id;
        $group->group = $request->group;
        if($group->save())
        {
            return new GroupResource($group);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = Groups::findOrFail($id);
        if($group->delete())
        {
            return new GroupResource($group);
        }
    }

    public function search($group)
    {
        return Groups::where([
            ["group","like","%".$group."%"],
            ['user_id', auth()->user()->id]
            ])
            ->get();
    }
}
