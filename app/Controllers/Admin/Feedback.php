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

        $data = [
            'title' => 'Virtusee | Feedback',
            'feeds' => $feeds,
            'notification' => count($this->complainModel->select("*")->where("is_read", 0)->findAll())
        ];

        return view('admin/feedback', $data);
    }

    public function addFeedback()
    {
        // Menerima data dari form atau sumber lainnya
        $data = [
            'kategori' => $this->request->getVar('category'),
            'sub_kategori' => $this->request->getVar('subcategory'),
            'title' => $this->request->getVar('title'),
            'pilihan_kepuasan' => $this->request->getVar('feedback'),
            'keterangan' => $this->request->getVar('message')
        ];

        // Membuat instance dari model Feedback
        $feedbackModel = new feedback();

        // Memasukkan data ke dalam database
        $inserted = $feedbackModel->insert($data);

        if ($inserted) {
            // Jika data berhasil dimasukkan, redirect ke halaman sukses atau halaman lainnya
            return redirect()->to(previous_url())->with('success', "Data feedback berhasil ditambah");
        } else {
            return redirect()->to(previous_url())->with('error', "Data feedback gagal ditambah");
        }
    }

    public function deleteFeedback($id)
    {
        // Membuat instance dari model Feedback
        $feedbackModel = new feedback();

        // Menghapus data berdasarkan ID
        $deleted = $feedbackModel->delete($id);

        if ($deleted) {
            // Jika data berhasil dihapus, redirect ke halaman sukses atau halaman lainnya
            return redirect()->to(previous_url())->with('success', "Data feedback berhasil dihapus");
        } else {
            return redirect()->to(previous_url())->with('error', "Data feedback gagal dihapus");
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