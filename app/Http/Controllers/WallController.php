<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;

use App\Models\WallModel;

class WallController extends Controller
{
    private $paginationsize = 5;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        switch ($request->action) {
            case 'create':
                return $this->create($request);
                break;
            case 'delete':
                return $this->destroy($request);
                break;
            default:
                return $this->getList();
                break;
        }
    }

    /**
     * Show list of post.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getList()
    {
     //   $post = DB::table('wall')->orderBy('id')->get();

        $post = DB::table('wall')->orderBy('pdate', 'DESC')->simplePaginate($this->paginationsize);

        return view('wall.listpost', ['posts' => $post]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id = DB::table('wall')->insertGetId(
            ['ptext' => $request->ptext, 
             'pby' => $request->pby,
             'pdate' => date("Y-m-d H:i:s"),
             'pbyid' => $request->pbyid
            ]
        );
        $post = DB::table('wall')->orderBy('pdate', 'DESC')->simplePaginate($this->paginationsize);

        return view('wall.listpost', ['posts' => $post]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $message = "";
        //Compare dates and check if 24 hours passed
        $post = DB::table('wall')->where('id', '=', $request->pid)->get();

        if($this->getTotalHour($post[0]->pdate)>24){
            $message = "24 hours have passed since the post was written. You could not delete this post.";
        }else{
            $delete = DB::table('wall')
            ->where('pbyid', '=', $request->pbyid)
            ->where('id', '=', $request->pid)
            ->delete();
            $message = "Successful deletion.";
        }
        //dd($message);
        $post = DB::table('wall')->orderBy('pdate', 'DESC')->simplePaginate($this->paginationsize);
        return view('wall.listpost', ['posts' => $post,'delete' => ($message==""?"Failed operation":$message)]);
    }


    /**
     * Return total hours between two dates
     *
     */
    public function getTotalHour($base)
    {
        $datetime1 = new DateTime($base);
        $datetime2 = new DateTime("now");
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');
        $hours = 0;
        if($days){
            $hours += 24 * $days;
        }
        $hours += $interval->format('%H');
        return $hours;
    }

/*
* Api Methods
*
*/


    /**
     * Display a listing of the resource from Api.
     *
     * @return \Illuminate\Http\Response
     */
    public function listApi(Request $request)
    {
        $post = DB::table('wall')->orderBy('pdate', 'DESC')->simplePaginate($this->paginationsize, '*','page',$request->page);
        return response()->json($post,200);
    }

    /**
     * Create a post of the resource from Api.
     *
     * @return \Illuminate\Http\Response
     */
    public function createApi(Request $request)
    {
        //dd("Prueba");
        $id = DB::table('wall')->insertGetId(
            ['ptext' => $request->text, 
             'pby' => $request->by,
             'pdate' => date("Y-m-d H:i:s"),
             'pbyid' => $request->iduser
            ]
        );        
        return response()->json([
            "idCreated" => $id,
            "created_at" => date("Y-m-d H:i:s"),
        ],200);
    }

    /**
     * Create a post of the resource from Api.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteApi(Request $request)
    {

        $message = "";
        //Compare dates and check if 24 hours passed
        $post = DB::table('wall')->where('id', '=', $request->idpostdelete)->get();
        if(count($post) == 0){
            $message = "Post does not exist.";
            return response()->json([
                "message" => $message,
            ],400); 
        }
        //dd(count($post));
        if($this->getTotalHour($post[0]->pdate)>24){
            $message = "24 hours have passed since the post was written. You could not delete this post.";
        }elseif($post[0]->pbyid != $request->iduser){
            $message = "You are not owner of ". $request->idpostdelete ." id post. Due to this, you are not able to delete it.";   
        }else{
            $delete = DB::table('wall')
            ->where('pbyid', '=', $request->iduser)
            ->where('id', '=', $request->idpostdelete)
            ->delete(); 
            return response()->json([
                "deleted" => true,
                "deleted_at" => date("Y-m-d H:i:s"),
            ],200);
        }              
        return response()->json([
            "message" => $message,
        ],400);
    }

}
