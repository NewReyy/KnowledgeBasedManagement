<?php echo $this->extend('customer/layout'); ?>

<?php echo $this->section('content'); ?>
<section id="main">
    <div class="container lg:w-8/12 mx-auto">

        <div class="m-7 md:mx-12 mb-20">

            <div class="flex justify-end">

                <div data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="fixed lg:absolute bottom-4 lg:bottom-0 lg:left-16 right-4 lg:right-0 lg:top-32 md:right-8 bg-main text-white drop-shadow-md flex items-center border-2 font-medium text-xs rounded-full px-1 lg:px-3 py-2 w-fit h-fit cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 md:w-11 lg:w-7 h-8 md:h-9 lg:h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                    </svg>
                    <p class="hidden lg:block">Make a Question</p>
                </div>


                <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 bottom-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto">
                    <!-- Modal content -->
                    <div class="absolute inset-0 bg-white flex items-center justify-center w-full md:w-[55%] lg:w-[40%] h-full md:h-[95%] md:rounded-md my-auto mx-auto">
                        <button type="button" class="absolute top-3 flex justify-center right-2.5 text-gray-400 bg-transparent hover:bg-slate-200  rounded-lg text-sm w-8 h-8 ml-auto items-center hover:text-form" data-modal-hide="authentication-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="px-6 lg:px-8 w-[95%]">
                            <form class="space-y-2" action="<?php echo base_url(); ?>kb/complain" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id_user" value="1">
                                <input type="hidden" name="id_project" value="1">
                                <div>
                                    <label for="username" class="block mb-2 text-xs font-medium text-form">username</label>
                                    <input type="username" name="username" id="username" class=" border text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 border-gray-500 placeholder-gray-400 text-form outline-main" value="name@company.com" readonly>
                                </div>
                                <div>
                                    <label for="subject" class="block mb-2 text-xs font-medium text-form">subject</label>
                                    <input type="subject" name="subject" id="subject" class=" border text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 border-gray-500 placeholder-gray-400 text-form outline-main" value="name@company.com" readonly>
                                </div>
                                <div>
                                    <label for="email" class="block mb-2 text-xs font-medium text-form">Your email</label>
                                    <input type="email" name="email" id="email" class=" border text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 border-gray-500 placeholder-gray-400 text-form outline-main" value="name@company.com" readonly>
                                </div>
                                <div>
                                    <label for="user" class="block mb-2 text-xs font-medium text-form">User member</label>
                                    <input type="user" name="user" id="user" class=" border text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 border-gray-500 placeholder-gray-400 text-form outline-main" value="Old User" readonly>
                                </div>
                                <div>
                                    <label for="project" class="block mb-2 text-xs font-medium text-form">Project</label>
                                    <input type="project" name="project" id="project" class=" border text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 border-gray-500 placeholder-gray-400 text-form outline-main" value="Tracking Karyawan" readonly>
                                </div>
                                <div>
                                    <label for="message" class="block mb-2 text-xs font-medium text-form">Description</label>
                                    <textarea name="message" id="message" rows="5" class="border text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 border-gray-500 placeholder-gray-400 text-form outline-main" placeholder="Write your thoughts here..." required></textarea>
                                </div>
                                <div class="flex items-center justify-start ">
                                    <label for="dropzone-file" id="dropzone" class="flex flex-col items-center justify-center w-28 md:w-40 lg:w-72 h-12 md:h-20 lg:h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 ">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-8 h-8 mb-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                            </svg>
                                            <p class="mb-2 text-sm text-gray-500 block" id="dragdroptext"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                            <p class="text-xs text-gray-500 block" id="formatsizetext">SVG, PNG, JPG, WEBP (MAX 1MB)</p>
                                        </div>
                                        <input id="dropzone-file" type="file" class="hidden" name="file" onchange="handleFileChange(this.files)" />
                                        <p id="selected-file-name" class="mb-2 text-sm font-semibold text-center text-main"></p>
                                    </label>
                                </div>
                                <button type="submit" class=" text-white float-right bg-main focus:ring-2 focus:outline-none rounded-lg text-sm px-5 py-2.5 text-center hover:bg-[#179CC8] ">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pb-3 flex flex-col">
                <span class=" border-slate-200 font-semibold text-xl">August 2023</span>
                <a href="" class="py-3 border-b-2 pb-3 font-semibold text-xl text-orange-600">How to maintenance server down</a>
                <span class="text-ellipsis pt-3 text-sm overflow-hidden text-justify whitespace-nowrap">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. At illum ab aspernatur voluptatem enim ipsa ex dolore, adipisci amet eius optio fugiat, dolorem magni aliquam nam, eum repellat rerum fuga! Laudantium aut dolorem itaque facere, dolore et, impedit similique laboriosam vel nesciunt excepturi corporis ab repellendus sint. Quibusdam velit error enim dolor exercitationem iste, debitis asperiores placeat facere, sint minima autem numquam! Deleniti, earum. Inventore magnam vel, tenetur non nam minus exercitationem odit odio libero reiciendis sapiente repellendus porro temporibus accusamus labore, laboriosam dolorum sint laudantium enim magni suscipit fugit pariatur consequatur incidunt. Eum, aspernatur consequuntur modi quisquam corporis assumenda!Deleniti, earum. Inventore magnam vel, tenetur non nam minus exercitationem odit odio libero reiciendis sapiente repellendus porro temporibus accusamus labore, laboriosam dolorum sint laudantium enim magni suscipit fugit pariatur consequatur incidunt. Eum, aspernatur consequuntur modi quisquam corporis assumenda!Deleniti, earum. Inventore magnam vel, tenetur non nam minus exercitationem odit odio libero reiciendis sapiente repellendus porro temporibus accusamus labore, laboriosam dolorum sint laudantium enim magni suscipit fugit pariatur consequatur incidunt. Eum, aspernatur consequuntur modi quisquam corporis assumenda!
                </span>
            </div>
            <div class="pb-3 flex flex-col">
                <span class=" border-slate-200 font-semibold text-xl">August 2023</span>
                <a href="" class="py-3 border-b-2 pb-3 font-semibold text-xl text-orange-600">How to maintenance server down</a>
                <span class="text-ellipsis pt-3 text-sm overflow-hidden text-justify whitespace-nowrap">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. At illum ab aspernatur voluptatem enim ipsa ex dolore, adipisci amet eius optio fugiat, dolorem magni aliquam nam, eum repellat rerum fuga! Laudantium aut dolorem itaque facere, dolore et, impedit similique laboriosam vel nesciunt excepturi corporis ab repellendus sint. Quibusdam velit error enim dolor exercitationem iste, debitis asperiores placeat facere, sint minima autem numquam! Deleniti, earum. Inventore magnam vel, tenetur non nam minus exercitationem odit odio libero reiciendis sapiente repellendus porro temporibus accusamus labore, laboriosam dolorum sint laudantium enim magni suscipit fugit pariatur consequatur incidunt. Eum, aspernatur consequuntur modi quisquam corporis assumenda!Deleniti, earum. Inventore magnam vel, tenetur non nam minus exercitationem odit odio libero reiciendis sapiente repellendus porro temporibus accusamus labore, laboriosam dolorum sint laudantium enim magni suscipit fugit pariatur consequatur incidunt. Eum, aspernatur consequuntur modi quisquam corporis assumenda!Deleniti, earum. Inventore magnam vel, tenetur non nam minus exercitationem odit odio libero reiciendis sapiente repellendus porro temporibus accusamus labore, laboriosam dolorum sint laudantium enim magni suscipit fugit pariatur consequatur incidunt. Eum, aspernatur consequuntur modi quisquam corporis assumenda!
                </span>
            </div>
            <div class="pb-3 flex flex-col">
                <span class=" border-slate-200 font-semibold text-xl">August 2023</span>
                <a href="" class="py-3 border-b-2 pb-3 font-semibold text-xl text-orange-600">How to maintenance server down</a>
                <span class="text-ellipsis pt-3 text-sm overflow-hidden text-justify whitespace-nowrap">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. At illum ab aspernatur voluptatem enim ipsa ex dolore, adipisci amet eius optio fugiat, dolorem magni aliquam nam, eum repellat rerum fuga! Laudantium aut dolorem itaque facere, dolore et, impedit similique laboriosam vel nesciunt excepturi corporis ab repellendus sint. Quibusdam velit error enim dolor exercitationem iste, debitis asperiores placeat facere, sint minima autem numquam! Deleniti, earum. Inventore magnam vel, tenetur non nam minus exercitationem odit odio libero reiciendis sapiente repellendus porro temporibus accusamus labore, laboriosam dolorum sint laudantium enim magni suscipit fugit pariatur consequatur incidunt. Eum, aspernatur consequuntur modi quisquam corporis assumenda!Deleniti, earum. Inventore magnam vel, tenetur non nam minus exercitationem odit odio libero reiciendis sapiente repellendus porro temporibus accusamus labore, laboriosam dolorum sint laudantium enim magni suscipit fugit pariatur consequatur incidunt. Eum, aspernatur consequuntur modi quisquam corporis assumenda!Deleniti, earum. Inventore magnam vel, tenetur non nam minus exercitationem odit odio libero reiciendis sapiente repellendus porro temporibus accusamus labore, laboriosam dolorum sint laudantium enim magni suscipit fugit pariatur consequatur incidunt. Eum, aspernatur consequuntur modi quisquam corporis assumenda!
                </span>
            </div>

        </div>
    </div>
</section>

<?php echo $this->endSection(); ?>