<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

}
