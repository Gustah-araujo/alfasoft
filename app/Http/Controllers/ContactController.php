<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();

        return view('index', ['contacts' => $contacts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create-contact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validação dos dados inseridos

        $validated = $request->validate([
            'name' => 'required|min:5',
            'contact' => 'required|min:9|max:9|unique:contacts,contact',
            'email' => 'email|unique:contacts,email'
        ]);

        //Caso os dados sejam validados, inicio uma nova instância de um contato no Banco de Dados

        $contact = new Contact();

        //Insiro os dados que recebi do formulário na página de Criar Contato, no novo contato criado

        $contact->name = $request->name;
        $contact->contact = $request->contact;
        $contact->email = $request->email;

        //Dados inseridos, salvo o novo contato no Banco de dados

        $contact->save();

        //Retorno o usuário para a lista de contatos

        return redirect('/');
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
        $contact = Contact::findOrFail($id);

        return view('edit-contact', ['contact' => $contact]);
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
        //Validação dos dados

        $validated = $request->validate([
            'new_name' => 'required|min:5',
            'new_contact' => 'required|min:9|max:9|unique:contacts,contact,' . $id,
            'new_email' => 'email|unique:contacts,email,' .$id
        ]);

        //Caso os dados sejam validados, seleciono a instância do Contato a ser atualizado

        $contact = Contact::findOrFail($id);

        //Com o contato certo selecionado, altero seus dados

        $contact->name = $request->new_name;
        $contact->contact = $request->new_contact;
        $contact->email = $request->new_email;

        //Com os dados alterados, salvo o contato e redireciono o usuário para a lista de contatos

        $contact->save();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Seleciono a instância do contato a ser excluído

        $contact = Contact::findOrFail($id);

        //Com o contato selecionado, removo seus dados do Banco de Dados e redireciono o usuário para a lista de contatos

        $contact->delete();
        return redirect('/');
    }
}
