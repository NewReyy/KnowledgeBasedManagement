<?php echo $this->extend('admin/layout'); ?>

<?php echo $this->section('content'); ?>

<div class="border-2 border-gray-200 bg-white p-7 rounded shadow-md text-sm">
    <h2 class="font-bold text-xl">Feedback User</h2>
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
                <button type="button" class="delete-batch-btn inline-block px-4 py-2 border border-white hover:border-red-600 rounded-2xl bg-red-500 hover:bg-red-600" data-action="#">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-5 h-5 stroke-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                    </svg>
                </button>
            </div>
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
                <th class="p-3">Sub Category</th>
                <th class="p-3">Title</th>
                <th class="p-3">Pilihan Keputusan</th>
                <th class="p-3">Keterangan</th>
                <th class="p-3">Action</th>
            </tr>
        </thead>
        <tbody class="border-b">
        <tbody>
        <?php foreach ($feeds as $feed) : ?>
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-3" data-id="<?php echo $feed['id_feed'] ?>">
                        <input type="checkbox" class="delete-checkbox" name="" id="">
                    </td>
                    <!-- <td class="p-3">1</td> -->
                    <td class="p-3"><?php echo $feed['kategori'] ?></td>
                    <td class="p-3"><?php echo $feed['sub_kategori'] ?></td>
                    <td class="p-3"><?php echo $feed['title'] ?></td>
                    <td class="p-3"><?php echo $feed['pilihan_kepuasan'] ?></td>
                    <td class="p-3"><?php echo $feed['keterangan'] ?></td>
                    <td class="p-3 text-center">
                        <a href="<?php echo base_url(); ?>admin/feedback/delete/<?= $feed['id_feed']; ?>"><button>
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
                            <a href="<?php echo base_url(); ?>admin/feedback?page=<?php echo $i; ?>&perPage=<?php echo $pagination['perPage']; ?>" class="flex items-center justify-center px-3 h-8 border border-white <?php echo ($i == $pagination['page']) ? 'bg-main text-white' : 'bg-white text-gray-400'; ?> hover:bg-main hover:text-white"><?php echo $i; ?></a>
                        </li>
                    <?php endfor; ?>
                    <li>
                        <a href="<?php echo base_url(); ?>admin/feedback?page=<?php echo $pagination['page'] + 1; ?>&perPage=<?php echo $pagination['perPage']; ?>" class="flex items-center justify-center px-3 h-8 leading-tight bg-white border hover:bg-gray-100 hover:text-gray-700 border-white dark:text-gray-400">Next</a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>

</div>

<?php echo $this->endSection(); ?>