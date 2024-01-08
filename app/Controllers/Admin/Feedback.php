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
    protected $feedModel;
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
        $this->feedModel = new FeedbackModel();
        $this->db = db_connect();
    }

    public function index()
    {
        $feed = new FeedbackModel();
        $feeds = $feed->findAll();

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

    public function new()
    {
        $categorySelected = $this->request->getVar('category') ?? 0;
        $category = $this->categoryModel->findAll();
        $sub_category = $this->subCategoryModel->findAll();
        $content = $this->contentModel->findAll();
        
        $data = [
            'title' => 'Add Feedback',
            'category' => $category,
            'sub_category' => $sub_category,
            'categorySelected' => $categorySelected,
            'content' => $content,
            'notification' => count($this->complainModel->select("*")->where("is_read", 0)->findAll())
        ];
  
      return view('admin/addfeedback', $data);
    }

    public function deleteFeedback($id)
    {
        // Membuat instance dari model Feedback
        $feedbackModel = new FeedbackModel();
    
        // Mencari data feedback berdasarkan ID
        $feedback = $feedbackModel->find($id);
    
        if ($feedback) {
            // Jika data feedback ditemukan, hapus data dari database
            $deleted = $feedbackModel->delete($id);
    
            if ($deleted) {
                // Jika data berhasil dihapus, redirect ke halaman sukses atau halaman lainnya
                return redirect()->to(previous_url())->with('success', "Data feedback berhasil dihapus");
            } else {
                return redirect()->to(previous_url())->with('error', "Gagal menghapus data feedback");
            }
        } else {
            // Jika data feedback tidak ditemukan, redirect ke halaman sukses atau halaman lainnya
            return redirect()->to(previous_url())->with('error', "Data feedback tidak ditemukan");
        }
    }
    

    public function editFeedback($id)
    {
        // Membuat instance dari model Feedback
        $feedbackModel = new feedback();

        // Mendapatkan data feedback berdasarkan ID
        $feedbackData = $feedbackModel->find($id);

        if (empty($feedbackData)) {
            return redirect()->to(previous_url())->with('error', "Data feedback tidak ditemukan");
        }

        // Menerima data dari form atau sumber lainnya
        $data = [
            'kategori' => $this->request->getVar('category'),
            'sub_kategori' => $this->request->getVar('subcategory'),
            'title' => $this->request->getVar('title'),
            'pilihan_kepuasan' => $this->request->getVar('feedback'),
            'keterangan' => $this->request->getVar('message')
        ];

        // Memperbarui data ke dalam database berdasarkan ID
        $updated = $feedbackModel->update($id, $data);

        if ($updated) {
            // Jika data berhasil diperbarui, redirect ke halaman sukses atau halaman lainnya
            return redirect()->to(previous_url())->with('success', "Data feedback berhasil diperbarui");
        } else {
            return redirect()->to(previous_url())->with('error', "Data feedback gagal diperbarui");
        }
    }
}