<?php echo $this->extend('admin/layout'); ?>

<?php echo $this->section('content'); ?>

<div class="border-2 border-gray-200 bg-white p-7 rounded shadow-md text-sm">
    <h2 class="font-bold text-xl">FAQ (Frequently Asked Question)</h2>
    <div class="flex justify-between items-center my-5">
        <form method="" class="relative flex justify-end items-center">
            <input type="text" id="searchInput" placeholder="search" class="px-5 py-2 pe-10 w-64 rounded-2xl border border-gray-400 outline-main">
            <button class="absolute right-5 cursor-pointer align-middle" disabled>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search text-gray-400" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                </svg>
            </button>
        </form>
        <div class="flex items-center gap-4">
            <div class="delete-batch hidden">
                <button type="button" class="delete-batch-btn inline-block px-4 py-2 border border-white hover:border-red-600 rounded-2xl bg-red-500 hover:bg-red-600" data-action="admin/faq/delete">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-5 h-5 stroke-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                    </svg>
                </button>
            </div>
            <a href="<?php echo base_url(); ?>admin/faq/create" class="border border-gray-400 px-6 py-2 rounded-2xl hover:border-green-400 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-plus" viewBox="0 0 16 16">
                    <path d="m.5 3 .04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2Zm5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.683.12L1.5 2.98a1 1 0 0 1 1-.98h3.672Z" />
                    <path d="M13.5 9a.5.5 0 0 1 .5.5V11h1.5a.5.5 0 1 1 0 1H14v1.5a.5.5 0 1 1-1 0V12h-1.5a.5.5 0 0 1 0-1H13V9.5a.5.5 0 0 1 .5-.5Z" />
                </svg>
            </a>
        </div>
    </div>
    <div class="mb-5 flex items-center justify-end text-xs">
        <label for="entries" class="mr-2">Rows per page : </label>
        <div class="relative">
            <?php $options = [10, 25, 50, 100]; ?>
            <?php if (isset($pagination)) : ?>
                <select id="row-entries" data-url="<?php echo base_url(); ?>kb/administrator/category/fetch" class="appearance-none border border-gray-400 px-6 py-2 rounded-2xl hover:border-blue-500 cursor-pointer focus:outline-none">
                    <?php foreach ($options as $option) : ?>
                        <option value="<?php echo $option; ?>" <?php echo isset($pagination) && $pagination['perPage'] == $option ? 'selected' : ''; ?>><?php echo $option; ?></option>
                    <?php endforeach; ?>
                </select>
            <?php else : ?>
                <select id="row-entries" data-url="<?php echo base_url(); ?>kb/administrator/category/fetch" class="appearance-none border border-gray-400 px-6 py-2 rounded-2xl hover:border-blue-500 cursor-pointer focus:outline-none">
                    <?php foreach ($options as $option) : ?>
                        <option value="<?php echo $option; ?>" <?php echo isset($pagination) && $pagination['perPage'] == $option ? 'selected' : ''; ?>><?php echo $option; ?></option>
                    <?php endforeach; ?>
                </select>
            <?php endif; ?>
            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </div>
        </div>
    </div>

    <?php if (session()->has('success')) : ?>
        <div class="flash-success" data-flashmessage="<?php echo session('success') ?>"></div>
    <?php else : ?>
        <div class="flash-error" data-flashmessage="<?php echo session('error') ?>"></div>
    <?php endif; ?>
    <?php if (session()->has('errorData')) : ?>
        <p class="p-3 rounded-[5px] bg-[#F8D7DA] text-[#721C24]"><?php echo session('errorData'); ?></p>
    <?php endif ?>
    <table class="w-full text-center" id="myTable">
        <thead class="border-b">
            <tr>
                <th class="p-3">
                    <input type="checkbox" class="delete-all-checkbox" name="" id="">
                </th>
                <th class="p-3">Kategori</th>
                <th class="p-3">Pertanyaan</th>
                <th class="p-3">Jawaban</th>
                <th class="p-3">Action</th>
            </tr>
        </thead>
        <tbody class="border-b">
        <tbody>
        <?php foreach ($faqs as $faq) : ?>
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-3" data-id="<?php echo $faq['id_faq'] ?>">
                        <input type="checkbox" class="delete-checkbox" name="" id="">
                    </td>
                    <!-- <td class="p-3">1</td> -->
                    <td class="p-3"><?php echo $faq['kategori'] ?></td>
                    <td class="p-3"><?php echo $faq['pertanyaan'] ?></td>
                    <td class="p-3"><?php echo $faq['jawaban'] ?></td>
                    <td class="p-3 text-center">
                        <a href="<?php echo base_url() ?>admin/faq/edit/<?= $faq['id_faq']; ?>" class="px-2 inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-5 h-5 stroke-secondary hover:stroke-yellow-600">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                        </a>
                        <a href="<?php echo base_url(); ?>admin/faq/delete/<?= $faq['id_faq']; ?>"><button>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-5 h-5 stroke-red-500 hover:stroke-red-700">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                        </a></button>   
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="flex justify-center mt-5">
        <nav aria-label="Page navigation example">
            <ul class="inline-flex -space-x-px text-sm">
                <?php if (isset($pagination) && $pagination['page'] > 1) : ?>
                    <li>
                        <a href="<?php echo base_url(); ?>administrator/category?page=<?php echo $pagination['page'] - 1; ?>&perPage=<?php echo $pagination['perPage']; ?>" class="flex items-center justify-center px-3 h-8 ml-0 leading-tight bg-white border rounded-l-lg hover:bg-gray-100 hover:text-gray-700 border-white dark:text-gray-400">Previous</a>
                    </li>
                <?php endif; ?>
                <?php if (isset($pagination)) : ?>
                    <?php for ($i = 1; $i <= $pagination['totalPages']; $i++) : ?>
                        <li>
                            <a href="<?php echo base_url(); ?>kb/administrator/category?page=<?php echo $i; ?>&perPage=<?php echo $pagination['perPage']; ?>" class="flex items-center justify-center px-3 h-8 border border-white <?php echo ($i == $pagination['page']) ? 'bg-main text-white' : 'bg-white text-gray-400'; ?> hover:bg-main hover:text-white"><?php echo $i; ?></a>
                        </li>
                    <?php endfor; ?>
                    <?php if ($pagination['page'] < $pagination['totalPages']) : ?>
                        <li>
                            <a href="<?php echo base_url(); ?>kb/administrator/category?page=<?php echo $pagination['page'] + 1; ?>&perPage=<?php echo $pagination['perPage']; ?>" class="flex items-center justify-center px-3 h-8 leading-tight bg-white border hover:bg-gray-100 hover:text-gray-700 border-white dark:text-gray-400">Next</a>
                        </li>
                    <?php endif; ?>
                <?php else : ?>
                    <!-- Set pagination page active to page 1 when $pagination is not set -->
                    <?php
                    $pagination['page'] = 1;
                    $pagination['perPage'] = 10;
                    ?>
                    <?php for ($i = 1; $i <= $pagination['page']; $i++) : ?>
                        <li>
                            <a href="<?php echo base_url(); ?>kb/administrator/category?page=<?php echo $i; ?>&perPage=<?php echo $pagination['perPage']; ?>" class="flex items-center justify-center px-3 h-8 border border-white <?php echo ($i == $pagination['page']) ? 'bg-main text-white' : 'bg-white text-gray-400'; ?> hover:bg-main hover:text-white"><?php echo $i; ?></a>
                        </li>
                    <?php endfor; ?>
                    <li>
                        <a href="<?php echo base_url(); ?>kb/administrator/category?page=<?php echo $pagination['page'] + 1; ?>&perPage=<?php echo $pagination['perPage']; ?>" class="flex items-center justify-center px-3 h-8 leading-tight bg-white border hover:bg-gray-100 hover:text-gray-700 border-white dark:text-gray-400">Next</a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>

</div>

<?php echo $this->endSection(); ?>