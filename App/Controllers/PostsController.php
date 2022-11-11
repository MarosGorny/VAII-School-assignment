<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Like;
use App\Models\Post;

class PostsController extends AControllerBase
{

    /**
     * Authorize controller actions
     * @param $action
     * @return bool
     */
    public function authorize($action)
    {
        //Metody ktore sa ukazu ked sa odhlasim/prihlasim
        switch ($action) {
            case "delete":
            case "create":
            case "store":
            case "edit":
            case "like":
                return $this->app->getAuth()->isLogged();
        }
        return true;
    }


    public function index(): Response
    {
        //defaultne zobrazenie nasho kontrolera by mali byt nase posty
        //-vytiahnut moje posty
        $posts = Post::getAll();
        return $this->html($posts);
    }

    public function delete() {

        $id = $this->request()->getValue('id');

        $postToDelete = Post::getOne($id);
        //ak tam je tak ho vymazem
        if($postToDelete) {
            $postToDelete->delete();
        }
        return $this->redirect("?c=posts");
    }

    public function store() {

        //ak ma hodnotu id, tak editujem, inak vytvram novy post
        $id = $this->request()->getValue('id');

        $post = ( $id ? Post::getOne($id) : new Post());
        //text je podla toho ako sme ho nastavili v name
        //<input type="text" name="text">
        $post->setText($this->request()->getValue('text'));
        $post->save();
        return $this->redirect("?c=posts");

    }

    public function create() {
        return $this->html(new Post(),viewName: 'create.form');
    }

    //akcia pri edite
    public function edit() {
        //najprv si musim post vytiahnut
        $id = $this->request()->getValue('id');


        $postToEdit = Post::getOne($id); //zislo by sa dorobit, ze co ak mi id neexistuje?

        return $this->html($postToEdit, viewName: 'create.form');
    }

    public function like() {
        //najprv si musim post vytiahnut
        $id = $this->request()->getValue('id');
        $postToLike = Post::getOne($id); //zislo by sa dorobit, ze co ak mi id neexistuje?
                                            //ci je nul a ak tak, vratit redirect

        //Kontrola co v tom poste je
        /** @var Like $like */
        foreach ($postToLike->getLikes() as $like) {
            if($like->getUser() == $this->app->getAuth()->getLoggedUserName()) {
                $like->delete();
                return $this->redirect("?c=posts");
            }
        }

        $newLike = new Like();
        $newLike->setUser($this->app->getAuth()->getLoggedUserName());
        $newLike->setPostId($id);
        $newLike->save();

        return $this->redirect("?c=posts");

    }
}