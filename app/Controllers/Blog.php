<?php

namespace App\Controllers;

use App\Models\BlogModel;
use CodeIgniter\Controller;

class Blog extends Controller
{
    public function __construct(){
        helper(['form','url']);
    }

    public function index()
    {
        $model = new BlogModel();
        $data['posts'] = $model->findAll();

        return view('blog/index', $data);
    }

    public function create()
    {
        return view('blog/create');
    }

    public function store()
    {

        $validationRules = [
            'title' => 'required|max_length[50]|alpha',
            'content'=> 'required|max_length[354]|',
            
        ];

        if ($this->validate($validationRules)) {
            $model = new BlogModel();
            $model->save([
                'title' => $this->request->getPost('title'),
                'content' => $this->request->getPost('content'),
            ]);

            return redirect()->to('/blog');
        } else {
            return view('blog/create', ['validation' => $this->validator]);
        }

        return redirect()->to('/blog');
    }

    public function edit($id = null)
    {
        $model = new BlogModel();
        $data['post'] = $model->find($id);

        return view('blog/edit', $data);
    }

    public function update()
    {
        $model = new BlogModel();
        $model->update($this->request->getPost('id'), [
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
        ]);

        return redirect()->to('/blog');
    }

    public function delete($id)
    {
        $model = new BlogModel();
        $model->delete($id);

        return redirect()->to('/blog');
    }
}
