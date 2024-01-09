<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\FaqModel;
use App\Models\Admin\FeedbackModel;
use App\Controllers\Admin\Complain;
use App\Models\Admin\ComplainModel;
use App\Models\Admin\ComplainReplyModel;
use App\Models\Admin\CategoryModel;
use App\Models\Admin\SubCategoryModel;
use App\Models\Admin\ContentModel;
use App\Models\Admin\projectModel;

class Feedback extends BaseController
{
    protected $complainModel;
    protected $complainReplyModel;
    protected $categoryModel;
    protected $subCategoryModel;
    protected $contentModel;
    protected $projectModel;
    protected $faqModel;
    protected $feedbackModel;
    protected $db;

    public function __construct()
    {
        $this->complainModel = new ComplainModel();
        $this->complainReplyModel = new ComplainReplyModel();
        $this->categoryModel = new categoryModel();
        $this->subCategoryModel = new subcategoryModel();
        $this->contentModel = new contentModel();
        $this->projectModel = new projectModel();
        $this->faqModel = new FaqModel();
        $this->feedbackModel = new FeedbackModel();
        $this->db = db_connect();
    }

    public function index()
    {
        $feeds = $this->feedbackModel->findAll();

        $content = $this->db->table('content a')
        ->select('a.*, COALESCE(b.name_project, "virtusee") AS id_project, c.name_category AS id_category, d.name_subcategory AS id_sub_category')
        ->join('article e', 'a.id = e.id_content')
        ->join('categories c', 'a.id_category = c.id')
        ->join('sub_category d', 'a.id_sub_category = d.id')
        ->join('project b', 'e.id_project = b.id', 'left')
        ->get()
        ->getResultArray();

        $data = [
            'title' => 'Virtusee | Feedback',
            'feeds' => $feeds,
            'content' => $content,
            'notification' => count($this->complainModel->select("*")->where("is_read", 0)->findAll())
        ];

        return view('admin/feedback', $data);
    }

    public function deleteFeedback($id = null)
    {
        $this->feedbackModel->delete($id);
        return redirect()->to('admin/feedback')->with('success', "Data Feedback berhasil dihapus");
    }
}