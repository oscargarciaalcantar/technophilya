<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //crear una variable que rcupere todas las publicaciones de la bd
        $posts = Post::all();

        //Regresar las vista y pasar la variables de las publicaciones
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Valida los datos recibidos a partir de un formulario
        $this->validate($request, array(
            'titulo' => 'required|max:225',
            'descripcion' => 'required'
        ));

        //Guarda la informacion dentro de la base de datos
        $post = new Post;

        $post->titulo = $request->titulo;
        $post->descripcion = $request->descripcion;

        $post->save();

        Session::flash('success', 'La publicación ha sido agregada exitosamente.');

        //REdirige a otra pâgina
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Recuepra la informacion de l apublicacion y la guarda en una variable
        $post = Post::find($id);
        //Regresa la vista con la variable
        return view('posts.edit')->withPost($post);
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
        //Validar los datos recibidos en el formulario
        $this->validate($request, array(
            'titulo' => 'required|max:225',
            'descripcion' => 'required'
        ));
        //Guardar los datos en la base de datos
        $post = Post::find($id);

        $post->titulo = $request->input('titulo');
        $post->descripcion = $request->input('descripcion');

        $post->save();

        //Mensaje flash de cambio
        Session::flash('success', 'Esta publicación ha sido actualizada con éxito');

        //Redirigir con un flash mensaje a la pagina post.show
        return redirect()->route('posts.show', $post->id);

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
