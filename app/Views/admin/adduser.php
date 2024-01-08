<?php echo $this->extend('admin/layout'); ?>

<?php echo $this->section('content'); ?>

<div class="border-2 border-gray-200 bg-white p-7 rounded shadow-md text-sm">
    <div class="flex justify-between items-center">
        <a href="<?php echo base_url(); ?>kb/administrator/user">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 hover:stroke-neutral-700">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
        </a>
        <div class="font-medium">
            <a href="<?php echo base_url(); ?>kb/administrator/user" class="text-main hover:text-sky-600">User</a>
            <span> / </span>
            <span>Add User</span>
        </div>
    </div>

    <form action="<?php echo base_url(); ?>kb/administrator/user" method="post">
        <?php echo csrf_field(); ?>
        <div class="grid grid-cols-2 gap-4 py-10">
            <div class="mb-4">
                <label for="name" class="block mb-2 text-sm font-medium text-form">Name</label>
                <input type="name" name="name" id="name" class="bg-gray-50 text-sm rounded-lg block w-full p-3.5  placeholder-gray-400 text-black border border-[#CCCCCC] focus:outline-none focus:ring-blue-500 focus:border-blue-500 <?php if (session('errors.name')) : ?>border-red-600<?php endif ?>" placeholder="Name" value="<?= old('name'); ?>">
                <?php if (session('errors.name')) : ?>
                    <div class="mt-1">
                        <small class=" text-red-600 text-sm"><?= session('errors.name'); ?></small>
                    </div>
                    
                <?php endif; ?>
            </div>
            <div class="mb-4">
                <label for="username" class="block mb-2 text-sm font-medium text-form">Username</label>
                <input type="username" name="username" id="username" class="bg-gray-50 text-sm rounded-lg block w-full p-3.5  placeholder-gray-400 text-black border border-[#CCCCCC] focus:outline-none focus:ring-blue-500 focus:border-blue-500 <?php if (session('errors.username')) : ?>border-red-600<?php endif ?>" placeholder="Username" value="<?= old('username'); ?>">
                <?php if (session('errors.username')) : ?>
                    <div class="mt-1">
                        <small class=" text-red-600 text-sm"><?= session('errors.username'); ?></small>
                    </div>
                <?php endif; ?>
            </div>
            <div class="mb-4">
                <label for="email" class="block mb-2 text-sm font-medium text-form">Email</label>
                <input type="email" name="email" id="email" class="bg-gray-50 text-sm rounded-lg block w-full p-3.5  placeholder-gray-400 text-black border border-[#CCCCCC] focus:outline-none focus:ring-blue-500 focus:border-blue-500 <?php if (session('errors.email')) : ?>border-red-600<?php endif ?>" placeholder="Email" value="<?= old('email'); ?>">
                <?php if (session('errors.email')) : ?>
                    <div class="mt-1">
                        <small class=" text-red-600 text-sm"><?= session('errors.email'); ?></small>
                    </div>
                <?php endif; ?>
            </div>
            <div class="mb-4">
                <label for="password" class="block mb-2 text-sm font-medium text-form">Password</label>
                <input type="password" name="password" id="password" class="bg-gray-50 text-sm rounded-lg block w-full p-3.5  placeholder-gray-400 text-black border border-[#CCCCCC] focus:outline-none focus:ring-blue-500 focus:border-blue-500 <?php if (session('errors.password')) : ?>border-red-600<?php endif ?>" placeholder="Password">
                <?php if (session('errors.password')) : ?>
                    <div class="mt-1">
                        <small class=" text-red-600 text-sm"><?= session('errors.password'); ?></small>
                    </div>
                <?php endif; ?>
            </div>
            <div class="flex gap-2">
                <div class="mb-4 relative w-full">
                    <label for="status_user" class="block mb-2 text-sm font-medium text-form">Status user</label>
                    <select id="status_user" name="status_user" class="cursor-pointer bg-gray-50 border appearance-none border-gray-300 text-sm rounded-lg block w-full p-3.5 placeholder-gray-400 text-form focus:outline-none focus:ring-blue-500 focus:border-blue-500 <?php if (session('errors.status_user')) : ?>border-red-600<?php endif ?>">
                        <option value="">Choose user status</option>
                        <option value="new" <?php if (old('status_user') == 'new') echo "selected" ?>>New user</option>
                        <option value="old" <?php if (old('status_user') == 'old') echo "selected" ?>>Old user</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 top-7 flex items-center pr-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                    <?php if (session('errors.status_user')) : ?>
                        <div class="mt-1">
                            <small class=" text-red-600 text-sm"><?= session('errors.status_user'); ?></small>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="mb-4 relative w-full">
                    <label for="id_project" class="block mb-2 text-sm font-medium text-form">Project Name</label>
                    <select id="id_project" name="id_project" class="cursor-pointer bg-gray-50 border appearance-none border-gray-300 text-sm rounded-lg block w-full p-3.5 placeholder-gray-400 text-form focus:outline-none focus:ring-blue-500 focus:border-blue-500 <?php if (session('errors.id_project')) : ?>border-red-600<?php endif ?>">
                        <option value="">Choose project name</option>
                        <?php foreach ($projects as $project) : ?>
                            <option value="<?= $project['id'] ?>" <?php if (old('id_project') == $project['id']) echo "selected" ?>><?= $project['name_project'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="absolute inset-y-0 right-0 top-7 flex items-center pr-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                    <?php if (session('errors.id_project')) : ?>
                        <div class="mt-1">
                            <small class=" text-red-600 text-sm"><?= session('errors.id_project'); ?></small>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="mb-4 relative">
                <label for="level" class="block mb-2 text-sm font-medium text-form">Level</label>
                <select id="level" name="level" class="cursor-pointer bg-gray-50 border appearance-none border-gray-300 text-sm rounded-lg block w-full p-3.5 placeholder-gray-400 text-form focus:outline-none focus:ring-blue-500 focus:border-blue-500 <?php if (session('errors.level')) : ?>border-red-600<?php endif ?>">
                    <option value="">Choose Level</option>
                    <option value="admin" <?php if (old('level') == 'admin') echo "selected" ?>>Admin</option>
                    <option value="user" <?php if (old('level') == 'user') echo "selected" ?>>User</option>
                </select>
                <div class="absolute inset-y-0 right-0 top-7 flex items-center pr-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
                <?php if (session('errors.level')) : ?>
                    <div class="mt-1">
                        <small class=" text-red-600 text-sm"><?= session('errors.level'); ?></small>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="flex justify-end grid-cols-2 gap-8 pt-12">
            <button type="reset" class="text-main font  -normal rounded-lg text-sm w-full sm:w-auto px-10 py-2.5 text-center border border-main hover:bg-slate-100">Clear</button>
            <button type="submit" class="text-white bg-main font-normal rounded-lg text-sm w-full sm:w-auto px-10 py-2.5 text-center hover:bg-[#1592BC]">Add</button>
        </div>
    </form>

</div>

<?php echo $this->endSection(); ?>