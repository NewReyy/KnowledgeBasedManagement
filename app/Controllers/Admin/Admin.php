<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\ComplainModel;
use App\Models\Admin\UserDashboardModel;
use App\Models\Admin\CategoryDashboardModel;
use App\Models\Admin\ArticleDashboardModel;
use App\Models\Admin\ComplainDashboardModel;

class Admin extends BaseController
{

  protected $complainModel;

  public function __construct()
  {
    $this->complainModel = new ComplainModel();
  }

  public function index()
  {
    $userModel = new UserDashboardModel();
    $categoryModel = new CategoryDashboardModel();
    $articleModel = new ArticleDashboardModel();
    $complainModel = new ComplainDashboardModel();

    $data = [
      'userCount' => $userModel->countAllResults(),
      'categoryCount' => $categoryModel->countAllResults(),
      'articleCount' => $articleModel->countAllResults(),
      'complainCount' => $complainModel->countAllResults(),
      
      'title' => 'Admin',
      'notification' => count($this->complainModel->select("*")->where("is_read", 0)->findAll())
    ];

    return view('admin/index', $data);
  }

  // public function dashboard()
  //   {
  //       // Mengambil jumlah data dari masing-masing model
  //       $userModel = new UserDashboardModel();
  //       // $categoryModel = new CategoryDashboardModel();
  //       // $articleModel = new ArticleDashboardModel();
  //       // $complainModel = new ComplainDashboardModel();

  //       $data = [
  //           'userCount' => $userModel->countAllResults(),
  //           // 'categoryCount' => $categoryModel->countAllResults(),
  //           // 'articleCount' => $articleModel->countAllResults(),
  //           // 'complainCount' => $complainModel->countAllResults(),
  //       ];

  //       return view('admin/index', $data);
  //   }
}