<?php echo $this->extend('customer/layout'); ?>

<?php echo $this->section('content'); ?>
<section id="main">
    <div id="faq" class="flex-col justify-center items-center min-h-[40vh] lg:min-h-[80vh] sm:min-h-[70vh] md:min-h-[80vh] 2xl:min-h-[71vh]">
        <img src="<?php echo base_url(); ?>src/images/waves-hero.png" class="w-full h-[38rem] md:h-[49rem] sm:h-[40rem] lg:h-[49rem] 2xl:h-[62rem] object-cover absolute z-[-1] top-0 2xl:-top-20" alt="" data-aos="fade-down" data-aos-duration="500" data-aos-once="true" data-aos-delay="500">
        <div class="mt-12">

        
            <h1 class="flex gap-3 justify-center text-3xl lg:text-5xl sm:text-4xl font-semibold sm:font-bold w-fit mx-auto" data-aos="fade-down" data-aos-duration="500" data-aos-once="true" data-aos-delay="750">
                <span class="text-white">Help center</span>
                <div class="flex">
                    <span class="text-[#2562AE]">Virtu</span>
                    <span class="text-[#FFC700]">see</span>
                </div>
            </h1>
            <div class="flex w-fit mx-auto" id="search" data-aos="fade-down" data-aos-duration="500" data-aos-once="true" data-aos-delay="1000">
                <form action="<?php echo base_url() ?>kb/search" method="get" class="relative">
                    <input type="text" name="search" id="search" placeholder="Search Your question, answer, etc" class="sm:w-[30rem] w-[20rem]  mb-2 px-7 mt-[30px] py-3 border border-gray-400 outline-main rounded-md">
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search absolute sm:left-[450px] left-[295px] top-[47px] cursor-pointer text-[#919191]" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                    </button>
                </form>
            </div>
            <div class="flex justify-center sm:[5px]" data-aos="fade-down" data-aos-duration="500" data-aos-once="true" data-aos-delay="1000">
                <div class="sm:w-[30rem] w-[20rem] text-justify">
                    <p class="text-sm text-white"><span class="text-secondary font-semibold">Search what you want,</span> we will answer your question and you can search anything
                        about the Virtusee Program or technical </p>
                </div>
            </div>
        </div>
        <div id="categories" class="flex flex-wrap justify-center sm:w-3/4 md:w-3/5 mx-auto mt-3">
            <?php $i = 0;
            $delay = 1250;
            foreach ($category as $category) : ?>
                <div class="m-3 sm:m-4 lg:m-6 w-1/3 sm:w-1/4 2xl:w-1/6 flex justify-center">
                    <?php $delay += 250; ?>
                    <?php if ($i % 2 == 0) : ?>
                        <a href="<?php echo base_url() ?>kb/generalarticle?category=<?= $category['name_category']; ?>" data-aos="fade-down" data-aos-duration="500" data-aos-once="true" data-aos-delay="<?= $delay ?>">
                        <?php else : ?>
                            <a href="<?php echo base_url() ?>kb/generalarticle?category=<?= $category['name_category']; ?>" data-aos="fade-up" data-aos-duration="500" data-aos-once="true" data-aos-delay="<?= $delay ?>">
                            <?php endif; ?>

                            <div class="bg-gray-200 hover:bg-gray-300 sm:px-[2rem] py-3 rounded-md w-[8rem] h-[5rem] sm:w-[9rem] sm:h-[5rem] md:w-[12rem] md:h-[7rem] flex items-center justify-center cursor-pointer">
                                <div class="flex-col items-center mb-1 text-center">
                                    <img src="<?php echo base_url() ?>src/images/icon/<?php echo $category['icon'] ?>" alt="" class="mx-auto w-8 h-8 object-cover">
                                    <h4 class="whitespace-nowrap text-sm md:text-md text-center mt-1"><?= $category['name_category']; ?></h4>
                                </div>
                            </div>
                            </a>
                </div>
            <?php $i++;
            endforeach; ?>
        </div>
    </div>

    <!-- </div> -->
    <div id="general_question" class="px-10 mt-10 sm:mt-[5rem] md:mt-[10rem] lg:mt-[12rem]">
        <div class=" w-full mb-2 text-center" data-aos="fade-down" data-aos-duration="500" data-aos-once="true" data-aos-delay="500">
            <h4 class="text-[#18A8D8] font-bold text-3xl md:text-4xl">Frequently Ask Questions</h4>
        </div>
        <div class="flex justify-center">
            <div class="lg:w-5/12 md:flex hidden" data-aos="fade-right" data-aos-duration="500" data-aos-once="true" data-aos-delay="750">
                <img src="<?php echo base_url(); ?>src/images/Question.png" alt="Question.png" class="mx-auto w-[30rem] object-cover">
            </div>
            <div id="question" class="mt-7 w-full lg:w-6/12 md:w-10/12 self-center" data-aos="fade-left" data-aos-duration="500" data-aos-once="true" data-aos-delay="1000">
                <?php $count = 1; ?>
                <?php foreach ($contents as $content) { ?>
                    <div class="border-solid border-2 border-[#919191] rounded-md p-4 ps-10 mb-3">
                        <div class="flex justify-between">
                            <p class="text-md" id="title<?= $count; ?>"><?= $content['title']; ?></p>
                            <p class="text-xl cursor-pointer collapsible" data-target="collapse<?= $count; ?>" data-title="title<?= $count; ?>">
                                <i class="bi bi-chevron-down icon"></i>
                            </p>
                        </div>
                        <div class="max-w-sm md:max-w-xl mt-4 hidden" id="collapse<?= $count; ?>">
                            <p class="text-[14px] line-clamp-1"><?= strip_tags($content['content']); ?></p>
                            <a href="<?= base_url('kb/generalarticle/generalarticledetail?category=' . $content['name_category'] . '&subcategory=' . $content['name_subcategory'] . '&article=' . $content['slug']) ?>" class="article-link text-[#18A8D8]"> more... </a>
                        </div>
                    </div>
                    <?php
                    if ($count == 5) {
                        break;
                    }
                    ?>
                    <?php $count++ ?>
                <?php } ?>
            </div>
        </div>
    </div>

    <div id="customer_complain" class="flex flex-col justify-center items-center w-full bg-[#F8F8F8] pt-12 mt-10 relative">
        <div id="customer_complain" class="mb-2 p-5 w-10/12">
            <h4 class="font-bold text-3xl md:text-4xl text-center mb-10" data-aos="fade-down" data-aos-duration="500" data-aos-once="true" data-aos-delay="500">General Complain User</h4>
            <div class="grid lg:grid-cols-2 md:grid-cols-1 gap-12 gap-y-4">
                <?php $count_complain = 1;
                $i = 0;
                $delay = 750; ?>
                <?php foreach ($complains as $complain) { ?>
                    <?php $delay += 250; ?>
                    <?php if ($i % 2 == 0) : ?>
                        <div class="border-solid bg-white border-2 border-[#919191] rounded-[10px] p-5 pl-10 mb-7 relative" data-aos="fade-right" data-aos-duration="500" data-aos-once="true" data-aos-delay="<?= $delay ?>">
                        <?php else : ?>
                            <div class="border-solid bg-white border-2 border-[#919191] rounded-[10px] p-5 pl-10 mb-7 relative" data-aos="fade-left" data-aos-duration="500" data-aos-once="true" data-aos-delay="<?= $delay ?>">
                            <?php endif; ?>
                            <svg width="30" height="30" viewBox="0 0 13 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute left-[-25px] bg-[#F8F8F8]">
                                <path d="M13 0L13 19.9706L0.514719 9.98528L13 0Z" fill="#919191" />
                                <path d="M13 1.41431L13 18.5564L1.92893 9.98537L13 1.41431Z" fill="white" />
                            </svg>

                            <div class="flex justify-between">
                                <div class="gap-2">
                                    <h4 class="font-bold text-2xl"><?= $complain['subject'] ?></h4>
                                    <h4 class="sm:text-sm text-[14px] sm:mt-2 mt-3"><?= $complain['email'] ?></span> / <span><?= $complain['name_project'] ?></span> </h4>
                                    </h4>
                                </div>
                                <div>
                                    <h4 class="font-bold sm:text-sm text-[10px] text-[#1F9254] sm:mt-2 mt-3 py-2 px-8 bg-[#CFF2DE] rounded-[15px]">Solved</h4>
                                </div>
                            </div>
                            <div class="max-w-4xl text-sm mt-4 line-clamp-2">
                                <p><?php echo $complain['description'] ?></p>
                            </div>
                            </div>
                            <?php
                            if ($count_complain == 6) {
                                break;
                            }
                            ?>
                            <?php $count_complain++;
                            $i++ ?>
                        <?php } ?>
                        </div>
                        <p class="text-center mb-10 mt-10">
                            <a href="<?php echo base_url() ?>kb/allcomplain" class="text-white p-3 rounded-[10px] bg-[#18A8D8] hover:bg-sky-600 font-bold">Read More <i class="bi bi-chevron-double-right"></i></a>
                        </p>
            </div>
            <div class="absolute top-[100%] left-0 right-0 z-0 w-full" data-aos="fade-down" data-aos-duration="500" data-aos-once="true" data-aos-delay="500">
                <img src="<?php echo base_url(); ?>src/images/background.png" class="w-[100%]" alt="">
            </div>
        </div>

        <div id="question" class="flex flex-col justify-center items-center mb-28 xl:mt-20 lg:mt-16 md:mt-2 relative 2xl:mb-56">
            <p class="text-[24px] font-medium">Do you have any question?</p>
            <div class="mt-8 whitespace-nowrap">
                <?php if (logged_in()) : ?>
                    <a data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="p-4 bg-[#FFC700] hover:bg-yellow-500 rounded-[15px] cursor-pointer"><i class="bi bi-envelope-fill "></i> Report a Problem</a>

                    <div id="authentication-modal" data-modal="formModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 bottom-0 z-50 p-4 overflow-x-hidden overflow-y-auto hidden">
                        <!-- Modal content -->
                        <div class="absolute inset-0 bg-white flex items-center justify-center w-full md:w-[55%] lg:w-[40%] h-full md:h-[97%] md:rounded-md my-auto mx-auto">
                            <button type="button" class="absolute top-3 flex justify-center right-2.5 text-gray-400 bg-transparent hover:bg-slate-200  rounded-lg text-sm w-8 h-8 ml-auto items-center hover:text-form" data-modal-hide="authentication-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="px-6 lg:px-8 w-[95%]">
                                <form class="form space-y-2" action="<?php echo base_url(); ?>" method="post" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="id_user" value="<?= user()->id; ?>">
                                    <input type="hidden" name="id_project" value="<?= user()->id_project; ?>">
                                    <input type="hidden" name="error" id="error" value="<?= session('errors.file') ?>">
                                    <script>
                                        var fileMessage = <?php echo json_encode(session('errors')); ?>;
                                    </script>
                                    <div class="flex gap-2">
                                        <div class="w-full">
                                            <label for="username" class="block mb-2 text-xs font-medium text-form">username</label>
                                            <input type="username" name="username" id="username" class=" border text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 border-gray-500 placeholder-gray-400 text-form outline-main" placeholder="Username" value="<?= user()->username; ?>" required readonly>
                                        </div>
                                        <div class="w-full">
                                            <label for="email" class="block mb-2 text-xs font-medium text-form">Your email</label>
                                            <input type="email" name="email" id="email" class=" border text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 border-gray-500 placeholder-gray-400 text-form outline-main" placeholder="name@company.com" value="<?= user()->email; ?>" required readonly>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="subject" class="block mb-2 text-xs font-medium text-form">subject <span class="text-red-600">*</span></label>
                                        <input type="subject" name="subject" id="subject" class=" border text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 border-gray-500 placeholder-gray-400 text-form outline-main" placeholder="Subject" value="<?= old('subject'); ?>" required>
                                    </div>

                                    <div>
                                        <label for="method" class="block mb-2 text-xs font-medium text-form">Method</label>
                                        <select id="method" name="method" class=" border text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 border-gray-500 placeholder-gray-400 text-form outline-main <?php if (session('errors.method')) : ?>border-red-600<?php endif ?>">
                                            <option value="">Choose a method</option>
                                            <option value="request" <?php if (old('method') == "request") {
                                                                        echo "selected";
                                                                    } ?>>Request</option>
                                            <option value="complain" <?php if (old('method') == "complain") {
                                                                            echo "selected";
                                                                        } ?>>Complain</option>
                                        </select>
                                    </div>
                                    <div class="flex gap-2">
                                        <div class="w-full">
                                            <label for="user" class="block mb-2 text-xs font-medium text-form">User member</label>
                                            <input type="user" name="user" id="user" class=" border text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 border-gray-500 placeholder-gray-400 text-form outline-main" value="<?php echo user()->id_project != 0 ? "Old user" : "New user" ?>" readonly>
                                        </div>
                                        <div class="w-full">
                                            <label for="project" class="block mb-2 text-xs font-medium text-form">Project</label>
                                            <input type="text" name="name_project" id="name_project" class=" border text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 border-gray-500 placeholder-gray-400 text-form outline-main" placeholder="name@company.com" value="<?= $project['name_project']; ?>" required readonly>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="message" class="block mb-2 text-xs font-medium text-form">Description</label>
                                        <textarea id="message" name="message" rows="5" class="border text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 border-gray-500 placeholder-gray-400 text-form outline-main" placeholder="Write your thoughts here..."><?= old('message'); ?></textarea>
                                    </div>
                                    <div>
                                        <label for="dropzone-file" id="dropzone" class="flex flex-col items-center justify-center w-28 md:w-40 lg:w-72 h-12 md:h-20 lg:h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 <?php if (session('errors.file')) : ?>border-red-600<?php endif ?>">
                                            <div class="flex flex-col items-center justify-center md:pt-5 lg:pb-8 md:pb-6">
                                                <svg class="w-6 md:w-6 lg:w-8 h-6 md:h-6 lg:h-8 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                                </svg>
                                                <p class="mb-2 md:text-[8px] lg:text-xs text-gray-500 hidden md:block" id="dragdroptext"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                                <p class=" text-gray-500 md:text-[8px] lg:text-xs hidden md:block" id="formatsizetext">SVG, PNG, JPG, or GIF (MAX. 800x400px)</p>
                                            </div>
                                            <input id="dropzone-file" type="file" class="hidden" name="file" onchange="handleFileChange(this.files)" accept=".svg, .png, .jpg, .gif" />
                                            <p id="selected-file-name" class="mb-2 text-[8px] md:text-sm font-semibold text-center text-main"></p>
                                        </label>
                                        <div class="text-[8px] md:text-xs w-max mt-2">
                                            <?php if (session('errors.file')) : ?>
                                                <p class="text-red-500 absolute"><?= session('errors.file'); ?></p>
                                            <?php endif; ?>
                                            <p class="text-red-500 lg:hidden">* SVG, PNG, JPG, or GIF (MAX. 800x400px)</p>
                                        </div>
                                    </div>

                                    <button type="submit" class=" text-white float-right bg-main focus:ring-2 focus:outline-none rounded-lg text-sm px-5 py-2.5 text-center hover:bg-[#179CC8] ">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php else : ?>
                    <a href="/kb/login" class="p-4 bg-[#FFC700] hover:bg-yellow-500 rounded-[15px] cursor-pointer"><i class="bi bi-envelope-fill "></i> Report a Problem</a>
                <?php endif; ?>
            </div>
            <?php if (session()->has('success')) : ?>
                <div class="flash-success" data-flashmessage="<?php echo session('success') ?>"></div>
            <?php else : ?>
                <div class="flash-error" data-flashmessage="<?php echo session('error') ?>"></div>
            <?php endif; ?>
        </div>
</section>

<?php echo $this->endSection(); ?>