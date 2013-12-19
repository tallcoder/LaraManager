<?php

class UploadsController extends BaseController {

    public function index() {
        $data = array(
          'title' => 'Uploads Overview',
          'uploads' => Upload::all()
        );
        return View::make('uploads.index', $data);
    }

    public function store() {
        if(Input::file('file1')) {
            $f = new Upload;
            $f->name = Input::file('file1')->getClientOriginalName();
            $f->type = Input::file('file1')->getClientOriginalExtension();
            $f->size = Input::file('file1')->getSize();
            $f->created_by = Input::get('user');
            $f->permission = Input::get('perm1');
            $f->parent_type = 'task';
            $f->parent_id = $pid;
            $f->save();
            Input::file('file1')->move('./public/uploads', $f->name);
        }

        if(Input::file('file2')) {
            $f = new Upload;
            $f->name = Input::file('file2')->getClientOriginalName();
            $f->type = Input::file('file2')->getClientOriginalExtension();
            $f->size = Input::file('file2')->getSize();
            $f->created_by = Input::get('user');
            $f->permission = Input::get('perm2');
            $f->parent_type = 'task';
            $f->parent_id = $pid;
            $f->save();
            Input::file('file2')->move('/public/uploads', $f->name);
        }

        if(Input::file('file3')) {
            $f = new Upload;
            $f->name = Input::file('file3')->getClientOriginalName();
            $f->type = Input::file('file3')->getClientOriginalExtension();
            $f->size = Input::file('file3')->getSize();
            $f->created_by = Input::get('user');
            $f->permission = Input::get('perm3');
            $f->parent_type = 'task';
            $f->parent_id = $pid;
            $f->save();
            Input::file('file3')->move('/public/uploads', $f->name);
        }
    }
}