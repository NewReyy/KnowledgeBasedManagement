<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>src/images/favicon.png" type="image/x-icon">
  <title><?php echo $title; ?></title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>node_modules/daterangepicker/daterangepicker.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>src/css/style.css">
</head>

<body class="bg-[#F8F8F8]">

  <!-- HEADER -->
  <div class="flex">
    <?php //zdd($notification); 
    ?>

    <!-- LEFT SIDE -->
    <!-- SIDEBAR -->
    <section class="fixed md:w-[22%] xl:w-[18%] 2xl:w-[14%] h-full bg-white shadow-md sidebar">
      <div>
        <img src="<?php echo base_url(); ?>src/images/logo.png" alt="" class="w-[78%] mx-auto py-5 mb-5">
      </div>
      <div class="flex flex-col gap-2 px-7" id="sidebar-child">
        <a href="<?php echo base_url(); ?>kb/administrator/dashboard" class="flex items-center py-3 px-5 hover:rounded-md hover:bg-main hover:text-white">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
          </svg>
          <span class="pl-6">Dashboard</span>
        </a>
        <a href="<?php echo base_url(); ?>kb/administrator/project" class="flex items-center py-3 px-5 hover:rounded-md hover:bg-main hover:text-white">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder" viewBox="0 0 16 16">
            <path d="M.54 3.87.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31zM2.19 4a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4H2.19zm4.69-1.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707z" />
          </svg>
          <span class="pl-6">Project</span>
        </a>
        <a href="<?php echo base_url(); ?>kb/administrator/user" class="flex items-center py-3 px-5 hover:rounded-md hover:bg-main hover:text-white">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
          </svg>
          <span class="pl-6">User</span>
        </a>
        <a href="<?php echo base_url(); ?>kb/administrator/category" class="flex items-center py-3 px-5 hover:rounded-md hover:bg-main hover:text-white">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
          </svg>
          <span class="pl-6">Category</span>
        </a>
        <a href="<?php echo base_url(); ?>kb/administrator/article" class="flex items-center py-3 px-5 hover:rounded-md hover:bg-main hover:text-white">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
          </svg>
          <span class="pl-6">Article</span>
        </a>
        <a href="<?php echo base_url(); ?>kb/administrator/complain" class="flex items-center py-3 px-5 hover:rounded-md hover:bg-main hover:text-white">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
          </svg>
          <span class="pl-6">Inbox</span>
        </a>
        <!-- <a href="<?php echo base_url(); ?>admin/faq" class="flex items-center py-3 px-5 hover:rounded-md hover:bg-main hover:text-white">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 10a1 1 0 010 2H3a1 1 0 010-2h18zM21 6a1 1 0 010 2H3a1 1 0 010-2h18zM21 14a1 1 0 010 2H3a1 1 0 010-2h18zM3 18h18"></path>
          </svg>
          <span class="pl-6">FAQ</span>
        </a> -->
        <a href="<?php echo base_url(); ?>admin/feedback" class="flex items-center py-3 px-5 hover:rounded-md hover:bg-main hover:text-white">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 10a1 1 0 010 2H3a1 1 0 010-2h18zM21 6a1 1 0 010 2H3a1 1 0 010-2h18zM21 14a1 1 0 010 2H3a1 1 0 010-2h18zM3 18h18"></path>
          </svg>
          <span class="pl-6">Feedback</span>
        </a>
        <a href="<?php echo base_url() ?>kb/logout" class="flex items-center py-3 px-5 hover:rounded-md hover:bg-main hover:text-white">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
          </svg>
          <span class="pl-6">Logout</span>
        </a>
      </div>
    </section>

    <!-- RIGHT SIDE -->
    <div class="md:ml-[22%] xl:ml-[18%] 2xl:ml-[14%] md:w-[78%] xl:w-[82%] 2xl:w-[86%] w-full right-side">
      <!-- NAVBAR -->
      <section class="flex justify-between items-center h-16">
        <div class="ml-4 burger cursor-pointer" id="burger">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 burger-icon" id="burger-icon">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
        </div>

        <div class="flex mr-10">
          <a href="<?php echo base_url(); ?>kb/administrator/complain">
            <div class="mr-8 relative">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
              </svg>
              <?php if ($notification > 0) : ?>
                <div class="p-1 flex justify-center bg-red-600 text-white rounded-[50%] text-[10px] absolute top-0 right-0"></div>
              <?php endif; ?>
            </div>
          </a>

          <div class="flex">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
            </svg>
            <span class="pl-2">Admin</span>
          </div>
        </div>
      </section>

      <!-- MAIN -->
      <section class="pt-5 pb-16 px-10">

        <?php echo $this->renderSection('content'); ?>

      </section>
    </div>

  </div>

  <?php
  $uploadurl = base_url() . 'kb/administrator/article/create';
  ?>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="<?php echo base_url(); ?>node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
  <script src="<?php echo base_url(); ?>node_modules/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>
  <script src="<?php echo base_url(); ?>node_modules/timeago.js/dist/timeago.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>node_modules/daterangepicker/moment.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>node_modules/daterangepicker/daterangepicker.js"></script>
  <script src="<?php echo base_url(); ?>/src/js/dataTables.js"></script>
  <script src="<?php echo base_url(); ?>/src/js/script.js"></script>
  <script>
    // CKEDITOR 5 CLASSIC
    ClassicEditor
      .create(document.querySelector("#editor"), {
        ckfinder: {
          uploadUrl: 'https://ckeditor.com/apps/ckfinder/3.5.0/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
        }
      })
      .then(editor => {})
      .catch((error) => {});
  </script>
  <script>
    $(document).ready(function() {
      $('#date-range-picker').daterangepicker();
      $('#date-range-picker').on("change", function() {
        const form = $("#filterForm");
        form.submit();
      })
      $("#methodFilter").on("change", function() {
        document.getElementById("filterForm").submit();
      });
    });
  </script>

</body>

</html>