<?php echo $this->extend('admin/layout'); ?>

<?php echo $this->section('content'); ?>

<div class="border-2 border-gray-200 bg-white p-7 rounded shadow-md text-sm">
    <div class="flex justify-between items-center">
        <a href="<?php echo base_url(); ?>admin/faq">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 hover:stroke-neutral-700">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
        </svg>
        </a>
        <div class="font-medium">
        <a href="<?php echo base_url(); ?>admin/faq" class="text-main hover:text-sky-600">FAQ</a>
        <span> / </span>
        <span>Edit FAQ</span>
        </div>
    </div>
    <form action="<?php echo base_url('admin/faq/update/' . $faq['id_faq']); ?>" method="post" class="px-6 my-10">
        <?php echo csrf_field(); ?>
        <div>
        <label for="kategori" class="block mb-2 font-medium text-gray-800">Kategori</label>
        <input type="text" id="kategori" value="<?php echo $faq['kategori'] ?>" name="kategori" class="bg-gray-50 border text-gray-800 rounded-lg  focus:ring-main focus:outline-none focus:border-main w-full p-3 <?php if (session('errors.kategori')) : ?>border-red-600<?php endif ?>" placeholder="Kategori">
        <?php if (session('errors.kategori')) : ?>
            <div class="mt-1">
                <small class="text-red-600 text-sm"><?= session('errors.kategori'); ?></small>
            </div>
        <?php endif; ?>
        </div>
        <br>
      <div class="mb-5">
        <label for="pertanyaan" class="block mb-2 font-medium text-gray-800">Pertanyaan</label>
        <textarea id="pertanyaan" name="pertanyaan" class="bg-gray-50 border text-gray-800 rounded-lg focus:outline-none focus:ring-blue-500 focus:border-blue-500 w-full p-4 <?php if (session('errors.pertanyaan')) : ?>border-red-600<?php endif ?>" placeholder="Pertanyaan"><?php echo $faq['pertanyaan']; ?></textarea>
        <?php if (session('errors.pertanyaan')) : ?>
          <div class="mt-1">
            <small class="text-red-600 text-sm"><?= session('errors.pertanyaan'); ?></small>
          </div>
        <?php endif; ?>
      </div>

      <div class="mb-5">
        <label for="jawaban" class="block mb-2 font-medium text-gray-800">Jawaban</label>
        <textarea id="jawaban" name="jawaban" class="bg-gray-50 border text-gray-800 rounded-lg focus:outline-none focus:ring-blue-500 focus:border-blue-500 w-full p-4 <?php if (session('errors.jawaban')) : ?>border-red-600<?php endif ?>" placeholder="Jawaban"><?php echo $faq['jawaban']; ?></textarea>
        <?php if (session('errors.jawaban')) : ?>
          <div class="mt-1">
            <small class="text-red-600 text-sm"><?= session('errors.jawaban'); ?></small>
          </div>
        <?php endif; ?>
      </div>

      <div class="mt-5">
      <a href="<?php echo base_url(); ?>admin/faq"><button type="button" class="text-gray-800 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-1 focus:ring-main font-medium rounded-lg px-6 py-2.5 mr-8 ">Batal</button></a>
      <button type="submit" class="text-white bg-main hover:bg-main focus:ring-3 focus:outline-none font-medium rounded-lg sm:w-auto px-6 py-2.5 text-center">Simpan</button>
    </div>
  </form>
</div>

<?php echo $this->endSection(); ?>