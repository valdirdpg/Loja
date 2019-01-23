<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestUserRegister;
use App\Http\Requests\RequestUserUpdate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function logout()
    {

        Auth::logout();
        return redirect()->route('home');
    }

    public function register()
    {
        $title = 'Cadastro do Usuário';
        return view('escola.user.register', compact('title'));
    }

    public function profile()
    {
        $title = 'Meur Perfil';
        return view('escola.user.profile', compact('title'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function cadastrar(RequestUserRegister $request)
    {
        //variávelque recebe todos os dados do formulário
        $dataForm = $request->all();
        //verifica se foi carregada alguma imagem com a função hasFile e atribui a uma variável
        $upload = $request->hasFile('image');
        //testa se a imagem foi carregada com exito
        if ($upload) {
            //requisita informação da imagem e passa o valor para uma variável
            $imagem = $request->file('image');
            //obitem o nome da imagem
            $nameImage = uniqid(date('Ymdhis')) . '.' . $imagem->getClientOriginalExtension();
            //modifica o nome da imagem no banco, atualizando um valor vazio
            $dataForm['image'] = $nameImage;
            // indica o caminho em que a imagem deve ser guardada
            $uploads = $imagem->storeAs('users', $nameImage);
            // verifica se a imagem foi salva com êxito
            if (!$uploads)
                return redirect()->back()->with(['errors' => 'Erro ao carregar arquivo!']);

        }
        //encrypta a senha
        $dataForm['password'] = bcrypt($dataForm['password']);
        //de posse dados dados (dataForm) crea-se um novo objeto (usuario) no banco de dados
        $insert = $this->user->create($dataForm);
        //testa se a criação de novo usuário ocorreu com sucesso ou não
        return $insert ? redirect()->route('home') : redirect()->back()->with(['errors' => 'Falha ao cadastrar usuário!']);

    }

    public function update(RequestUserUpdate $request)
    {
        //recebeo valor procurado a partir do id do usuario autenticado
        $dataForm = $request->all();

        $usuario = $this->user->find(auth()->user()->id);

        //verifica se uma imagem foi carregada
        $upload = $request->hasFile('image');
        //se a imagem foi carregada, encripita a senha e faz a alteração do perfil
        if ($upload) {
            //requisita informação da imagem e passa o valor para uma variável
            $imagem = $request->file('image');
            if ($usuario->image != null)
                //O nameImagem terá o mesmo nome da imagem cadastrada
                $nameImage = $usuario->image;
            else
                //obitem o nome da imagem
                $nameImage = uniqid(date('Ymdhis')) . '.' . $imagem->getClientOriginalExtension();
            //modifica o nome da imagem no banco, atualizando um valor vazio
            $dataForm['image'] = $nameImage;
            // indica o caminho em que a imagem deve ser guardada
            $uploads = $imagem->storeAs('users', $nameImage);
            if (!$uploads)
                return redirect()->back()->with(['errors' => 'Erro ao carregar imagem!']);

        }

        if ($dataForm['password'] != '')

            $dataForm['password'] = bcrypt($dataForm['password']);
        else
            unset($dataForm['password']);
        //altera o perfil
        $update = $usuario->update($dataForm);
        if ($update):
            return redirect()->back()->with(['success' => 'Perfil editado com sucesso']);
        else:
            return redirect()->back()->with(['errors' => 'Erro na tentaiva de alterar perfil']);
        endif;


    }
}
