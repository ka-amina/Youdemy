<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Tag;

class TagController extends Controller
{
    protected $tag;

    public function __construct()
    {
        $this->tag =  new Tag();
    }

    public function listTags()
    {
        $tags = $this->tag->getTags();
        $this->render('tag/index', ['tags' => $tags]);
    }

    public function createTag()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'name' => $_POST['tagName']
            ];
            $this->tag->createTag($data);
            header("Location: /tags");
            exit();
        }
    }

    public function getTagById()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $tag =  $this->tag->getTagById($id);
            $this->render('tag/editTag', ['tagInfo' => $tag]);
        }
    }

    public function updateTag()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->tag->updateTag(
                ['name' => $_POST['tagName']],
                ['id' => $_GET['id']]
            );
            header("Location: /tags");
            exit();
        }
    }


    public function deleteTag()
    {

        if (isset($_GET['id'])) {
            $id = ['id' => $_GET['id']];
            $this->tag->deleteTag($id);
            header("Location: /tags");
            exit();
        }
    }
}
