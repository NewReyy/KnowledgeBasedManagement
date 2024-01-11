<?php

namespace App\Controllers\Admin;

use App\Models\Admin\ArticleModel;
use App\Models\Admin\ContentModel;
use App\Models\Admin\CategoryModel;
use App\Models\Admin\SubCategoryModel;
use App\Models\Admin\ProjectModel;
use CodeIgniter\RESTful\ResourceController;
use Exception;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use App\Models\Admin\ComplainModel;

class Article extends ResourceController
{
  protected $articleModel;
  protected $contentModel;
  protected $categoryModel;
  protected $subCategoryModel;
  protected $projectModel;
  protected $complainModel;
  protected $db;

  public function __construct()
  {
    $this->articleModel = new ArticleModel();
    $this->contentModel = new ContentModel();
    $this->categoryModel = new CategoryModel();
    $this->subCategoryModel = new SubCategoryModel();
    $this->projectModel = new ProjectModel();
    $this->complainModel = new ComplainModel();
    $this->db = db_connect();
  }

  public function index()
  {
    $page = $this->request->getVar('page') ?? 1;
    $perPage = $this->request->getVar('perPage') ?? 10;

    $offset = ($page - 1) * $perPage;

    $dataArticle = $this->articleModel->findAll($perPage, $offset);

    $totalRecords = $this->articleModel->countAll();

    $totalPages = ceil($totalRecords / $perPage);

    $content = $this->db->table('content a')
      ->select('a.*, COALESCE(b.name_project, "virtusee") AS id_project, c.name_category AS id_category, d.name_subcategory AS id_sub_category')
      ->join('article e', 'a.id = e.id_content')
      ->join('categories c', 'a.id_category = c.id')
      ->join('sub_category d', 'a.id_sub_category = d.id')
      ->join('project b', 'e.id_project = b.id', 'left')
      ->get()
      ->getResultArray();


    $pagination = [
      'page' => $page,
      'perPage' => $perPage,
      'totalRecords' => $totalRecords,
      'totalPages' => $totalPages
    ];

    return view('admin/article', [
      'title' => 'article',
      'articles' => $dataArticle,
      'contents' => $content,
      'pagination' => $pagination,
      'notification' => count($this->complainModel->select("*")->where("is_read", 0)->findAll())
    ]);
  }

  public function new()
  {
    $categorySelected = $this->request->getVar('category') ?? 0;
    $category = $this->categoryModel->findAll();
    $sub_category = $this->subCategoryModel->findAll();
    $project = $this->projectModel->findAll();

    $data = [
      'title' => 'Add Article',
      'category' => $category,
      'sub_category' => $sub_category,
      'categorySelected' => $categorySelected,
      'project' => $project,
      'notification' => count($this->complainModel->select("*")->where("is_read", 0)->findAll())
    ];
    return view('admin/addarticle', $data);
  }

  public function create()
  {
    $rules = [
      'title'            => 'required|regex_match[/^[A-Za-z0-9\s.,!?]+$/]',
      'category'         => 'required',
      'subcategory'     => 'required',
      'project'          => 'required',
    ];

    if (!$this->validate($rules)) {
      return redirect()->to('kb/administrator/article/new')->withInput()->with('errors', $this->validator->getErrors());
    } else {
      $title = $this->request->getVar('title');
      $slug = url_title($title, "-", true);

      $category = $this->request->getVar('category');
      $subcategory = $this->request->getVar('subcategory');
      $project = $this->request->getVar('project');
      $desc = $_REQUEST['description'];

      $file_upload = array();
      if (isset($_FILES['upload']['name'])) {
        $file_name = $_FILES['upload']['name'];
        $file_path = base_url() . 'public/src/images/img_article/' . $file_name;
        $file_extension = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
        if ($file_extension == 'jpg' || $file_extension == 'jpeg' || $file_extension == 'png' || $file_extension == 'webp' || $file_extension == 'svg') {
          if (move_uploaded_file($_FILES['upload']['tmp_name'], $file_path)) {
            $file_upload['file'] = $file_name;
            $file_upload['url'] = $file_path;
            $file_upload['uploaded'] = 1;
          } else {
            $file_upload['uploaded'] = 0;
            $file_upload['error']['message'] = 'Error! File not uploaded';
          }
        } else {
          $file_upload['uploaded'] = 0;
          $file_upload['error']['message'] = 'Invalid Extension !';
        }
      }

      echo json_encode($file_upload);

      $data = [
        'id_category'     => $category,
        'id_sub_category'  => $subcategory,
        'title'           => $title,
        'slug'            => $slug,
        'content'         => $desc
      ];

      $this->contentModel->save($data);

      $insertedID = $this->contentModel->insertID();

      $data2 = [
        'id_content'  => $insertedID,
        'id_project'  => $project
      ];
      if (!$this->articleModel->save($data2)) {
        return redirect()->to('kb/administrator/article')->with('error', "Article gagal ditambah");
      } else {
        return redirect()->to('kb/administrator/article')->with('success', "Article berhasil ditambah");
      }
    }
  }

  public function edit($id = null)
  {
    $article = $this->articleModel->where('id_content', $id)->findAll();
    $content = $this->contentModel->where('id', $id)->findAll();

    $category = $this->categoryModel->findAll();
    $subcategory = $this->subCategoryModel->findAll();
    $project = $this->projectModel->findAll();

    $data = [
      'title' => 'Edit Article',
      'article'  => $article,
      'content'  => $content,
      'category'  => $category,
      'subcategory'  => $subcategory,
      'project'  => $project,
      'notification' => count($this->complainModel->select("*")->where("is_read", 0)->findAll())
    ];

    return view('admin/editarticle', $data);
  }

  public function update($id = null)
  {
    $rules = [
      'title'            => 'required|regex_match[/^[A-Za-z0-9\s.,!?]+$/]',
      'category'         => 'required',
      'subcategory'     => 'required',
      'project'          => 'required',
    ];

    if (!$this->validate($rules)) {
      return redirect()->to('kb/administrator/article/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
    } else {
      $title = $this->request->getVar('title');
      $slug = url_title($title, "-", true);

      $category = $this->request->getVar('category');
      $subcategory = $this->request->getVar('subcategory');
      $project = $this->request->getVar('project');
      $desc = $_REQUEST['description'];

      $file_upload = array();
      if (isset($_FILES['upload']['name'])) {
        $file_name = $_FILES['upload']['name'];
        $file_path = base_url() . 'public/src/images/img_article/' . $file_name;
        $file_extension = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
        if ($file_extension == 'jpg' || $file_extension == 'jpeg' || $file_extension == 'png' || $file_extension == 'webp' || $file_extension == 'svg') {
          if (move_uploaded_file($_FILES['upload']['tmp_name'], $file_path)) {
            $file_upload['file'] = $file_name;
            $file_upload['url'] = $file_path;
            $file_upload['uploaded'] = 1;
          } else {
            $file_upload['uploaded'] = 0;
            $file_upload['error']['message'] = 'Error! File not uploaded';
          }
        } else {
          $file_upload['uploaded'] = 0;
          $file_upload['error']['message'] = 'Invalid Extension !';
        }
      }

      echo json_encode($file_upload);

      $data = [
        'id'              => $id,
        'id_category'     => $category,
        'id_sub_category' => $subcategory,
        'title'           => $title,
        'slug'            => $slug,
        'content'         => $desc
      ];

      $this->contentModel->update($id, $data);

      $article = $this->articleModel->where('id_content', $id)->findAll();
      $id_article = $article[0]['id'];

      $data2 = [
        'id'          => $id_article,
        'id_content'  => $id,
        'id_project'  => $project
      ];
      if (!$this->articleModel->update($id, $data2)) {
        return redirect()->to('kb/administrator/article')->with('error', "Article gagal diupdate");
      } else {
        return redirect()->to('kb/administrator/article')->with('success', "Article berhasil diupdate");
      }
    }
  }

  public function delete($id = null)
  {
    if (!$this->contentModel->delete($id)) {
      return redirect()->to('kb/administrator/article')->with('error', "Data article gagal hapus");
    } else {
      $this->articleModel->where("id_content", $id)->delete();
      return redirect()->to('kb/administrator/article')->with('success', "Data article berhasil dihapus");
    }
  }

  public function deleteBatchArticle()
  {
    $id_contents = $this->request->getVar("ids");
    for ($i = 0; $i < count($id_contents); $i++) {
      $id = $id_contents[$i];

      $this->articleModel->where("id_content", $id)->delete();
      $this->contentModel->delete($id);
    }
    return redirect()->to('kb/administrator/article')->with('success', "Data article berhasil dihapus");
  }

  public function detail($id = null)
  {
    $article = $this->articleModel->where('id_content', $id)->findAll();
    $content = $this->contentModel->where('id', $id)->findAll();

    $data = [
      'title'     => 'Detail Article',
      'articles'  => $article,
      'contents'   => $content,
      'notification' => count($this->complainModel->select("*")->where("is_read", 0)->findAll())
    ];

    return view('admin/detailarticle', $data);
  }

  public function updateVisibility()
  {
    $id = $this->request->getVar('id');
    $visibility = $this->request->getVar('visibility');
    $this->contentModel->set('visibility', $visibility);
    $this->contentModel->where('id', $id);
    if (!$this->contentModel->update()) {
      return redirect()->to('kb/administrator/article');
    } else {
      return redirect()->to('kb/administrator/article');
    }
  }

  public function exportDataToExcel()
  {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $data = [
      ['No', 'Title', 'Slug', 'Category', 'Sub Category', 'Project', 'Content', 'Good Insight', 'Bad Insight', 'Content Views', 'Visibility']
    ];
    $article = $content = $this->db->table('content a')
      ->select('a.*, c.name_category AS id_category, d.name_subcategory AS id_sub_category, b.name_project AS id_project')
      ->join('article e', 'a.id = e.id_content')
      ->join('categories c', 'a.id_category = c.id')
      ->join('sub_category d', 'a.id_sub_category = d.id')
      ->join('project b', 'e.id_project = b.id')
      ->get()
      ->getResultArray();

    $i = 1;
    foreach ($article as $article) {
      $rowData = [];
      array_push($rowData, $i, $article['title'], $article['slug'], $article['id_category'], $article['id_sub_category'], $article['id_project'], $article['content'], $article['good_insight'], $article['bad_insight'], $article['content_views'], $article['visibility']);

      array_push($data, $rowData);
      $i++;
    }

    // Set data ke dalam spreadsheet
    $row = 1;
    foreach ($data as $rowData) {
      $col = 1;
      foreach ($rowData as $cellData) {
        if ($row === 1) {
          $sheet->getStyleByColumnAndRow($col, $row)->getFont()->setBold(true);
        }
        // Atur border untuk sel-sel
        $style = $sheet->getStyleByColumnAndRow($col, $row);
        $style->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $sheet->setCellValueByColumnAndRow($col, $row, $cellData);
        $col++;
      }
      $row++;
    }

    // Membuat file Excel
    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
    $filename = 'articles.xlsx';

    // Atur header HTTP untuk menghasilkan file XLSX
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="' . $filename . '"');

    // Tulis file Excel ke output
    $writer->save('php://output');
  }
}
