<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Question extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Register::hasData()){
            $questions_array = array(1 => 'one', 2 => 'two', 3 => 'three', 4 => 'four', 5 => 'five');
            $question_number = session('question', 0);
            if((session()->has('question_answer') && session('question_answer')) || $question_number == 0){
                $isSaved = session('is_saved', false);
                if($question_number == 5){
                    if(!$isSaved){
                        Register::create();
                        session(['is_saved' => true]);
                    }
                    return view('test_complete');
                }
                $question_number++;
                session(['question_answer' => false]);
            }
            session(['question' => $question_number]);
            return view('questions/question_' . $questions_array[$question_number]);
        }
        return redirect()->action('Register@index');
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
    public function destroy($id)
    {
        //
    }
}
