<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WorkersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', array('except' => [
            'showHierarchyList',
            'getHierarchyElement',
            'showLogin',
            'doLogin',
            'doLogout',
            'updateChief'
        ]));
    }
    /**
     * Show hierarchy workers list.
     *
     * @return Response
     */
    public function showHierarchyList()
    {
        $workers = DB::table('employees')->get();
        return view('employees', ['workers' => $workers]);
    }

    /**
     * Show subordinates.
     *
     * @return Response
     */
    public function getHierarchyElement($chief_id)
    {
        $workers = DB::table('employees')->where('chief', $chief_id)->get();
        return response()->json($workers);
    }

    /**
     * Update chief.
     *
     */
    public function updateChief(Request $request)
    {
        $worker = \App\Employees::find($request->input('id'));
        $worker->chief = $request->input('chief_id');
        $worker->save();
    }

    /**
     * Show admin page.
     *
     * @return Response
     */
    public function showAdmin()
    {
        return view('admin');
    }

    /**
     * Show workers list.
     *
     * @return Response
     */
    public function getAllWorkers()
    {
        $workers = DB::table('employees')->get();
        return response()->json($workers);
    }

    /**
     * Show edit page.
     *
     * @return Response
     */
    public function showEditWorker($id)
    {
        $worker = DB::table('employees')->where('id', $id)->first();
        if($worker){
            return view('edit', ['worker' => $worker]);
        }else{
            return view('errors.404');
        }
    }

    /**
     * Show create page.
     *
     * @return Response
     */
    public function showCreateWorker()
    {
        return view('new');
    }

    /**
     * Delete worker.
     *
     */
    public function deleteWorker($id)
    {
        $item = DB::table('employees')->where('id', $id)->first();
        $children = DB::table('employees')->where('chief', $id)->update(['chief' => $item->chief]);
        DB::table('employees')->where('id', $id)->delete();
        return redirect('admin');
    }

    /**
     * Update worker.
     *
     */
    public function saveWorker(Request $request)
    {
        /*Checking data*/
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'position' => 'required|max:255',
            'recruited' => 'required|date',
            'salary' => 'required|numeric',
            'chief' => 'numeric',
            'photo' => 'image|mimes:jpeg,bmp,png',
        ]);
        if ($validator->fails()) {
            return \Redirect::back()
                        ->withErrors($validator)
                        ->withInput();
        }
        if($request->input('id') != null){
            /*Getting old data*/
            $worker = \App\Employees::find($request->input('id'));
            /*Deleting old photo*/
            if($worker->photo && $request->file('photo')){
                $oldPhoto = public_path($worker->photo);
                $oldThumb = public_path($worker->thumb);
                if(\File::isFile($oldPhoto)){
                    \File::delete($oldPhoto);
                }
                if(\File::isFile($oldThumb)){
                    \File::delete($oldThumb);
                }
            }
        }else{
            /*Create new worker*/
            $worker = new \App\Employees;
        }
        /*Name and path to new photo*/
        if($request->file('photo')){
            $filename = time().mt_rand(0,1000).'.'.$request->file('photo')->getClientOriginalExtension();
            $imagePath = public_path('photo/'.$filename);
            $thumbPath = public_path('photo/thumb/'.$filename);
            /*Saving new photo*/
            $request->file('photo')->move(base_path().'/public/photo/',$filename);
            \Image::make($imagePath)->fit(50,75)->save($thumbPath);

            $worker->photo = '/photo/'.$filename;
            $worker->thumb = '/photo/thumb/'.$filename;
        }
        /*Changing data*/
        $worker->name = $request->input('name');
        $worker->position = $request->input('position');
        $worker->recruited = $request->input('recruited');
        $worker->salary = $request->input('salary');
        $worker->chief = $request->input('chief');

        $worker->save();

        return redirect('admin');
    }

    /**
     * Show login form.
     *
     */
    public function showLogin()
    {
        return view('login');
    }

    /**
     * Login user.
     *
     */
    public function doLogin(Request $request)
    {
        /*Checking data*/
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required|alphaNum|min:3',
        ]);
        if ($validator->fails()) {
            return \Redirect::to('login')
                        ->withErrors($validator)
                        ->withInput(\Request::except('password'));
        }
        // create our user data for the authentication
        $userdata = array(
            'email'     => $request->input('email'),
            'password'  => $request->input('password')
        );
        // attempt to do the login
        if (\Auth::attempt($userdata)) {
            return redirect('admin');
        }else{
            echo 'error';
            //return redirect('login');
        }
    }

    /**
     * Logout.
     *
     */
    public function doLogout()
    {
        \Auth::logout();
        return redirect('/');
    }
}