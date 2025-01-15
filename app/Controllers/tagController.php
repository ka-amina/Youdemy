<?php

namespace App\Controllers;

use App\Models\Tag;

class TagController
{
    protected $tag;

    public function __construct()
    {
        $this->tag =  new Tag();
    }

    public function listTags(): array
    {
        return $this->tag->getTags();
    }

    public function createTag($data)
    {
        if (isset($_GET['action']) && $_GET['action'] == 'create') {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $data = [
                    'name' => $_POST['tagName']
                ];
                $this->tag->createTag($data);
                header("Location: tags.php");
                exit();
            }
        }
    }

    public function getTagById($id)
    {
        return $this->tag->getTagById($id);
    }

    public function updateTag()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->tag->updateTag(
                ['name' => $_POST['tagName']],
                ['id' => $_GET['id']]
            );
            header("Location: tags.php");
            exit();
        }
    }


    public function deleteTag($id)
    {
        if (isset($_GET['action']) && $_GET['action'] == 'delete') {
            if (isset($_GET['id'])) {
                $id = ['id' => $_GET['id']];
                $this->tag->deleteTag($id);
                header("Location: tags.php");
                exit();
            }
        }
    }
}
