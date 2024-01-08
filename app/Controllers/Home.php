<?php

namespace App\Controllers;

use App\Controllers\Admin\Complain;
use App\Models\Admin\ComplainModel;
use App\Models\Admin\ComplainReplyModel;
use App\Models\Admin\CategoryModel;
use App\Models\Admin\feedback;
use App\Models\Admin\SubCategoryModel;
use App\Models\Admin\ContentModel;
use App\Models\Admin\projectModel;

class Home extends BaseController
{
    protected $complainModel;
    protected $complainReplyModel;
    protected $categoryModel;
    protected $subCategoryModel;
    protected $contentModel;
    protected $projectModel;
    protected $db;

    public function __construct()
    {
        $this->complainModel = new ComplainModel();
        $this->complainReplyModel = new ComplainReplyModel();
        $this->categoryModel = new categoryModel();
        $this->subCategoryModel = new subcategoryModel();
        $this->contentModel = new contentModel();
        $this->projectModel = new projectModel();
        $this->db = db_connect();
    }

    public function index()
    {
        $category =  $this->categoryModel->findAll();

        $content = $this->db->table('content a')
            ->select('a.*, b.name_category AS name_category, c.name_subcategory AS name_subcategory')
            ->join('categories b', 'a.id_category = b.id')
            ->join('sub_category c', 'a.id_sub_category = c.id')
            ->where('a.visibility', 'open')
            ->get()
            ->getResultArray();
        if (logged_in()) {
            $project =  $this->projectModel->find(user()->id_project);
            if ($project === null) {
                $project = [
                    'name_project' => 'virtusee'
                ];
            }
        } else {
            $project = "";
        }
        $complain = $this->db->table('complains')
            ->select('complains.*, project.name_project')
            ->join('project', 'project.id = complains.id_project')
            ->where(['complains.visibility' => 'open', 'complains.status' => 'solved'])
            ->get()
            ->getResultArray();
        $data = [
            'title' => 'Virtusee | Knowledge Based',
            'category' => $category,
            'contents' => $content,
            'complains' => $complain,
            'project' => $project
        ];
        return view('customer/index', $data);
    }

    public function generalarticle()
    {
        $category = $this->request->getVar('category');
        $subcategory = $this->request->getVar('subcategory');
        $categories =  $this->categoryModel->findAll();
        $subcategories =  $this->subCategoryModel->findAll();
        $content = $this->db->table('content a')
            ->select('a.*, b.name_category AS name_category, c.name_subcategory AS name_subcategory')
            ->join('categories b', 'a.id_category = b.id')
            ->join('sub_category c', 'a.id_sub_category = c.id')
            ->orderBy('a.content_views', 'DESC')
            ->limit(5)
            ->get()
            ->getResultArray();
        if (logged_in()) {
            $project =  $this->projectModel->find(user()->id_project);
            if ($project === null) {
                $project = [
                    'name_project' => 'virtusee'
                ];
            }
        } else {
            $project = "";
        }
        $data = [
            'title' => 'Virtusee | article',
            'category_title' => $category,
            'subcategory_title' => $subcategory,
            'categories' => $categories,
            'subcategories' => $subcategories,
            'content' => $content,
            'project' => $project
        ];
        return view('customer/articlegeneral', $data);
    }

    public function generalarticledetail()
    {
        $category = $this->request->getVar('category');
        $subcategory = $this->request->getVar('subcategory');
        $id = $this->request->getVar('article');
        $categories =  $this->categoryModel->findAll();
        $subcategories =  $this->subCategoryModel->findAll();
        $content = $this->db->table('content a')
            ->select('a.*, b.name_category AS name_category, c.name_subcategory AS name_subcategory')
            ->join('categories b', 'a.id_category = b.id')
            ->join('sub_category c', 'a.id_sub_category = c.id')
            ->where('b.name_category', $category)
            ->where('c.name_subcategory', $subcategory)
            ->where('a.slug', $id)
            ->get()
            ->getRow();
        if (logged_in()) {
            $project =  $this->projectModel->find(user()->id_project);
            if ($project === null) {
                $project = [
                    'name_project' => 'virtusee'
                ];
            }
        } else {
            $project = "";
        }
        $data = [
            'title' => 'Virtusee | article detail',
            'category_title' => $category,
            'subcategory_title' => $subcategory,
            'categories' => $categories,
            'subcategories' => $subcategories,
            'content' => $content,
            'project' => $project
        ];
        return view('customer/articledetailgeneral', $data);
    }

    public function updateReaction()
    {
        $id = $this->request->getVar('id');
        $type = $this->request->getVar('type');
        if ($type === 'like') {
            $content = $this->contentModel
                ->where('id', $id)
                ->first();
            if ($content) {
                $good_insight = $content['good_insight'] + 1;
                $this->contentModel
                    ->where('id', $content['id'])
                    ->set('good_insight', $good_insight);
            }
        } else {
            $content = $this->contentModel
                ->where('id', $id)
                ->first();
            if ($content) {
                $bad_insight = $content['bad_insight'] + 1;
                $this->contentModel
                    ->where('id', $content['id'])
                    ->set('bad_insight', $bad_insight);
            }
        }
        if (!$this->contentModel->update()) {
            return redirect()->to(current_url())->with('error', "Terimakasih feedback-nya");
        } else {
            return redirect()->to(current_url())->with('success', "Terimakasih feedback-nya")->with('' . $type . '', $type);
        }
    }

    public function updateContentviews()
    {
        $id = $this->request->getVar('article');
        $href = $this->request->getVar('href');
        $content = $this->contentModel
            ->where('id', $id)
            ->first();
        if ($content) {
            $content_views = $content['content_views'] + 1;
            $this->contentModel
                ->where('id', $content['id'])
                ->set('content_views', $content_views);
        }
        if (!$this->contentModel->update()) {
            return redirect()->to($href);
        } else {
            return redirect()->to($href);
        }
    }

    public function complain()
    {
        if (logged_in()) {
            $project =  $this->projectModel->find(user()->id_project);
            if ($project === null) {
                $project = [
                    'name_project' => 'virtusee'
                ];
            }
        } else {
            $project = "";
        }

        $complains = $this->db->table('complains')
            ->select('complains.*,CASE WHEN complains.id_project = 0 THEN "virtusee" ELSE project.name_project END AS name_project', FALSE)
            ->join('project', 'complains.id_project = project.id', 'left')
            ->where('complains.id_user', user()->id)
            ->where('complains.method', 'complain')
            ->whereNotIn('complains.status', ['solved'])
            ->get()
            ->getResultArray();

        $request = $this->db->table('complains')
            ->select('complains.*,CASE WHEN complains.id_project = 0 THEN "virtusee" ELSE project.name_project END AS name_project', FALSE)
            ->join('project', 'complains.id_project = project.id', 'left')
            ->where('complains.id_user', user()->id)
            ->where('complains.method', 'request')
            ->whereNotIn('complains.status', ['solved'])
            ->get()
            ->getResultArray();

        $data = [
            'title' => 'Virtusee | complain',
            'project' => $project,
            'request' => $request,
            'complain' => $complains
        ];
        return view('customer/complain', $data);
    }

    public function create()
    {
        $rules = [
            'message'      => 'required|alpha_numeric_space',
            'file'          => 'uploaded[file]|max_size[file,1024]|is_image[file]|mime_in[file,image/jpg,image/jpeg,image/png,image/svg,image/webp]',
            'method'          => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->to(previous_url())->withInput()->with('errors', $this->validator->getErrors());
        } else {
            $id_project = $this->request->getVar('id_project');
            $id_user = $this->request->getVar('id_user');
            $email = $this->request->getVar('email');
            $subject = $this->request->getVar('subject');
            $message = $this->request->getVar('message');
            $method = $this->request->getVar('method');

            $picture_file = $this->request->getFile('file');
            $picture_name = $picture_file->getRandomName();
            $picture_file->move('src/images/prove', $picture_name);
            $slug = str_pad(mt_rand(1, 999999999999999), 15, '0', STR_PAD_LEFT);


            $data = [
                'id_user' => $id_user,
                'id_project' => $id_project,
                'email' => $email,
                'subject' => $subject,
                'description' => $message,
                'method' => $method,
                'file'  => $picture_name,
                'slug' => $slug
            ];
            if (!$this->complainModel->save($data)) {
                return redirect()->to(previous_url())->with('error', "Data complain gagal ditambah");
            } else {
                return redirect()->to(previous_url())->with('success', "Data complain berhasil ditambah");
            }
        }
    }

    public function feedback()
    {
        $feedbck = new feedback();
        $feeds = $feedbck->findAll();

        $data = [
            'title' => 'Virtusee | Feedback',
            'feeds' => $feeds,
            'notification' => count($this->complainModel->select("*")->where("is_read", 0)->findAll())
        ];

        return view('admin/feedback/', $data);
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

    public function history()
    {

        if (logged_in()) {
            $project =  $this->projectModel->find(user()->id_project);
            if ($project === null) {
                $project = [
                    'name_project' => 'virtusee'
                ];
            }
        } else {
            $project = "";
        }
        $complain = $this->db->table('complains')
            ->select('complains.*, CASE WHEN complains.id_project = 0 THEN "virtusee" ELSE project.name_project END AS name_project', FALSE)
            ->join('project', 'project.id = complains.id_project', 'left')
            ->where('complains.id_user', user()->id)
            ->where('complains.status', 'solved')
            ->get()
            ->getResultArray();
        $data = [
            'title' => 'Virtusee | history complain',
            'project' => $project,
            'complain' => $complain

        ];
        return view('customer/historycomplain', $data);
    }

    public function personalarticle()
    {
        if (logged_in()) {
            $project =  $this->projectModel->find(user()->id_project);
            if ($project === null) {
                $project = [
                    'name_project' => 'virtusee'
                ];
            }
        } else {
            $project = "";
        }

        $content = $this->db->table('content a')
            ->select('a.*, 
        CASE WHEN b.id_project = 0 THEN "virtusee" ELSE c.name_project END AS name_project, 
        d.name_category AS name_category, e.name_subcategory AS name_subcategory', FALSE)
            ->join('article b', 'a.id = b.id_content')
            ->join('project c', 'b.id_project = c.id', 'left')
            ->join('categories d', 'a.id_category = d.id')
            ->join('sub_category e', 'a.id_sub_category = e.id')
            ->where('b.id_project', user()->id_project)
            ->where('visibility', 'open')
            ->get()
            ->getResultArray();
        $data = [
            'title' => 'Virtusee | article',
            'project' => $project,
            'content' => $content
        ];
        return view('customer/articlepersonal', $data);
    }

    public function personalarticledetail()
    {
        if (logged_in()) {
            $project =  $this->projectModel->find(user()->id_project);
            if ($project === null) {
                $project = [
                    'name_project' => 'virtusee'
                ];
            }
        } else {
            $project = "";
        }
        $category = $this->request->getVar('category');
        $subcategory = $this->request->getVar('subcategory');
        $id = $this->request->getVar('article');
        $categories =  $this->categoryModel->findAll();
        $subcategories =  $this->subCategoryModel->findAll();
        $content = $this->db->table('content a')
            ->select('a.*, b.name_category AS name_category, c.name_subcategory AS name_subcategory')
            ->join('categories b', 'a.id_category = b.id')
            ->join('sub_category c', 'a.id_sub_category = c.id')
            ->where('b.name_category', $category)
            ->where('c.name_subcategory', $subcategory)
            ->where('a.slug', $id)
            ->get()
            ->getRow();
        $data = [
            'title' => 'Virtusee | article detail',
            'category_title' => $category,
            'subcategory_title' => $subcategory,
            'categories' => $categories,
            'subcategories' => $subcategories,
            'content' => $content,
            'project' => $project
        ];
        return view('customer/articledetailpersonal', $data);
    }

    public function reply()
    {
        $slug = $this->request->getVar('complainId');
        if (logged_in()) {
            $project =  $this->projectModel->find(user()->id_project);
            if ($project === null) {
                $project = [
                    'name_project' => 'virtusee'
                ];
            }
        } else {
            $project = "";
        }
        $complain = $this->db->table('complains a')
            ->select('a.*, b.username AS username, b.level')
            ->join('users b', 'a.id_user = b.id')
            ->where('a.slug', $slug)
            ->get()
            ->getRowArray();
        $id_complain = $complain["id"];
        $data = [
            'title' => 'Virtusee | article reply',
            'project' => $project,
            'complain' => $complain,
            'complainReply' => $this->db->table('complain_reply')->select('complain_reply.*, users.level')->join("users", "complain_reply.id_user = users.id")->where("complain_reply.id_complain", $id_complain)->orderBy('complain_reply.created_at', 'ASC')->get()->getResultArray(),
            "slug" => $slug
        ];
        return view('customer/replycomplain', $data);
    }

    public function sendReply()
    {
        $id_complain = $this->request->getVar('id_complain');
        $id_user = $this->request->getVar('id_user');
        $slug = $this->request->getVar('slug');
        $message = $this->request->getVar('message');

        $data = [
            'id_complain' => $id_complain,
            'id_user'     => $id_user,
            'description' => $message,
            'is_read'     => 0
        ];

        if (!$this->complainReplyModel->save($data)) {
            return redirect()->to('kb/complain/reply?complainId=' . $slug)->with('errorMessage', "Pesan gagal terkirim");
        } else {
            $this->complainModel->set("is_read", 0)->where("id", $id_complain)->update();
            return redirect()->to('kb/complain/reply?complainId=' . $slug)->with('successMessage', "Pesan telah terkirim");
        }
    }

    public function allcomplain()
    {
        if (logged_in()) {
            $project =  $this->projectModel->find(user()->id_project);
            if ($project === null) {
                $project = [
                    'name_project' => 'virtusee'
                ];
            }
        } else {
            $project = "";
        }

        $complain = $this->db->table('complains')
            ->select('complains.*, project.name_project')
            ->join('project', 'project.id = complains.id_project')
            ->where(['visibility' => 'open', 'status' => 'solved'])
            ->orderBy('complains.created_at', 'DESC')
            ->get()
            ->getResultArray();
        $data = [
            'title' => 'Virtusee | complain',
            'project' => $project,
            'complains' => $complain
        ];
        return view('customer/complaingeneral', $data);
    }

    public function searchresult()
    {
        $search = $this->request->getVar('search');
        $content = $this->db->table('content a')
            ->select('*')
            ->join('article b', 'a.id = b.id_content')
            ->join('project c', 'b.id_project = c.id')
            ->join('categories d', 'a.id_category = d.id')
            ->join('sub_category e', 'a.id_sub_category = e.id')
            ->like('a.title', $search, 'both')
            ->where('a.visibility', 'open')
            ->get()
            ->getResultArray();

        $complain = $this->db->table('complains')
            ->select('complains.*, project.name_project')
            ->join('project', 'project.id = complains.id_project')
            ->like('complains.subject', $search, 'both')
            ->where(['complains.visibility' => 'open', 'complains.status' => 'solved'])
            ->get()
            ->getResultArray();

        if (logged_in()) {
            $project =  $this->projectModel->find(user()->id_project);
            if ($project === null) {
                $project = [
                    'name_project' => 'virtusee'
                ];
            }
        } else {
            $project = "";
        }

        $data = [
            'title' => 'Virtusee | complain',
            'contents' => $content,
            'complains' => $complain,
            'project' => $project,
            'keyword' => $search
        ];
        return view('customer/searchresult', $data);
    }


    public function faq()
    {
        return view('customer/faq/index');
    }
}
