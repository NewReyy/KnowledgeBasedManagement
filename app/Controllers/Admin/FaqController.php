<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\FaqModel;
use App\Controllers\Admin\Complain;
use App\Models\Admin\ComplainModel;
use App\Models\Admin\ComplainReplyModel;
use App\Models\Admin\CategoryModel;
use App\Models\Admin\SubCategoryModel;
use App\Models\Admin\ContentModel;
use App\Models\Admin\projectModel;

class FaqController extends BaseController
{
    protected $complainModel;
    protected $complainReplyModel;
    protected $categoryModel;
    protected $subCategoryModel;
    protected $contentModel;
    protected $projectModel;
    protected $faqModel;
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
        $this->db = db_connect();
    }

    public function index()
    {
        $faqModel = new FaqModel();
        $faqs = $faqModel->findAll();

        // $content = $this->db->table('content a')
        //     ->select('*')
        //     ->join('article b', 'a.id = b.id_content')
        //     ->join('project c', 'b.id_project = c.id')
        //     ->join('categories d', 'a.id_category = d.id')
        //     ->join('sub_category e', 'a.id_sub_category = e.id')
        //     ->like('a.title', $search, 'both')
        //     ->where('a.visibility', 'open')
        //     ->get()
        //     ->getResultArray();

        // if (logged_in()) {
        //     $project =  $this->projectModel->find(user()->id_project);
        //     if ($project === null) {
        //         $project = [
        //             'name_project' => 'virtusee'
        //         ];
        //     }
        // } else {
        //     $project = "";
        // }

        $data = [
            'title' => 'Virtusee | FAQ',
            'faqs' => $faqs,
            'notification' => count($this->complainModel->select("*")->where("is_read", 0)->findAll())
            // 'contents' => $content,
            // 'complains' => $complain,
            // 'project' => $project,
            // 'keyword' => $search
        ];

        return view('admin/faq/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Virtusee | Edit FAQ',
            'notification' => count($this->complainModel->select("*")->where("is_read", 0)->findAll())
        ];
        return view('admin/faq/create', $data);
    }

    public function store()
    {
        $faqModel = new FaqModel();

        $data = [
            'kategori' => $this->request->getPost('kategori'),
            'pertanyaan' => $this->request->getPost('pertanyaan'),
            'jawaban' => $this->request->getPost('jawaban'), // tambahkan baris ini untuk menyimpan jawaban
        ];

        $faqModel->insert($data);

        return redirect()->to('/admin/faq')->with('success', 'Pertanyaan berhasil ditambahkan.');
    }

    public function edit($id_faq)
    {
        $faqModel = new FaqModel();
        $faq = $faqModel->find($id_faq);
        $data = [
            'title' => 'Virtusee | Edit FAQ',
            'faq' => $faq,
            'notification' => count($this->complainModel->select("*")->where("is_read", 0)->findAll())
        ];
        return view('admin/faq/edit', $data);
    }

    public function update($id_faq)
    {
        $faqModel = new FaqModel();

        $data = [
            'kategori' => $this->request->getPost('kategori'),
            'pertanyaan' => $this->request->getPost('pertanyaan'),
            'jawaban' => $this->request->getPost('jawaban'), // tambahkan baris ini untuk menyimpan jawaban
        ];

        $faqModel->update($id_faq, $data);

        return redirect()->to('/admin/faq')->with('success', 'Pertanyaan berhasil diperbarui.');
    }

    public function delete($id_faq)
    {
        $faqModel = new FaqModel();
        $faq = $faqModel->find($id_faq);
        $data = [
            'title' => 'Virtusee | Konfirmasi Delete',
            'faq' => $faq,
            'kategori' => $this->request->getPost('kategori'),
            'notification' => count($this->complainModel->select("*")->where("is_read", 0)->findAll()), 
            'pertanyaan' => $this->request->getPost('pertanyaan'),
            'jawaban' => $this->request->getPost('jawaban'), // tambahkan baris ini untuk menyimpan jawaban
        ];
        return view('admin/faq/delete', $data);
    }

    public function performDelete($id_faq)
    {
        $faqModel = new FaqModel();
        $faqModel->delete($id_faq);
        return redirect()->to('/admin/faq')->with('success', 'Pertanyaan berhasil dihapus.');
    }
}