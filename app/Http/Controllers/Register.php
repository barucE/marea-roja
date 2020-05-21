<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Register as RegisterModel;

class Register extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session()->forget(['name','country','career','email','gender', 'question', 'question_answer', 'score', 'is_saved']);
        $careers = array("Big Data and Business Intelligence",
                            "Ciberseguridad",
                            "Creación y Aceleración Empresarial MICAE",
                            "Dirección de Comunicación Corporativa y Marketing digital",
                            "Dirección de Comunicación y Marketing Corporativo",
                            "Economía verde",
                            "Inteligencia Turística: Gestión y Competitividad Internacional",
                            "International Business MIB",
                            "Marketing Turístico",
                            "Otra");
        return view('register/index', compact('careers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function create()
    {
        $input["name"] = session("name");
        $input["career"] = session("career");
        $input["gender"] = session("gender");
        $input["email"] = session("email");
        $input["country"] = session("country");
        $input["score"] = session("score");

        RegisterModel::create($input);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => 'required',
            "career" => 'required',
            "email" => 'required|email',
            "gender" => 'required',
            "country" => 'required'
        ]);

        session(['name' => $request->name,
                'career' => $request->career,
                'email' => $request->email,
                'gender' => $request->gender,
                'country' => $request->country]);

        return redirect()->action('Question@index');
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

    public static function hasData(){

        return (session()->has('name') && session()->has('career') &&
session()->has('email') && session()->has('gender') && session()->has('country'));
    }

    public function setScore(Request $request){
        $score = session('score', 0);
        $score = $request['isCorrect'] == 'true' ? $score + 1 : $score;
        session(['score' => $score, 'question_answer' => true]);
        return response()->json(array('success' => true));
    }
}
