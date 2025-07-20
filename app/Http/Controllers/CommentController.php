<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use HTMLPurifier;
use HTMLPurifier_Config;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        if (!Auth::guard('client')->check()) {
            return response()->json(['message' => 'Você precisa estar logado para comentar.'], 401);
        }

        $validated = $request->validate([
            'comment' => 'required|string|max:10000',
            'blog_id' => 'required|exists:blogs,id',
        ]);

        try {
            // Configuração padrão do HTMLPurifier
            $config = HTMLPurifier_Config::createDefault();
            $purifier = new HTMLPurifier($config);

            // Purifica o comentário
            $cleanComment = $purifier->purify($validated['comment']);

            DB::beginTransaction();

            Comment::create([
                'comment' => $cleanComment,
                'blog_id' => $validated['blog_id'],
                'client_id' => Auth::guard('client')->id(),
                'active' => 0,
            ]);

            DB::commit();

            return response()->json(['message' => 'Seu comentário foi enviado com sucesso e está aguardando moderação.']);
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            return response()->json(['message' => 'Erro ao salvar comentário.'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
