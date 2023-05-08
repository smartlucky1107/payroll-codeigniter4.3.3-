<section class="h-screen">
    <div class="container h-full px-6 py-24">
        <div class="g-6 flex h-full flex-wrap items-center justify-center ">

            <div class="md:w-8/12 lg:ml-6 lg:w-5/12">
                <h2 class="mb-8 text-4xl text-primary text-center font-semibold">REGISTER NOW</h2>

                <?php if (session()->get('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->get('success') ?>
                    </div>
                <?php endif; ?>
                <form class="bg-white" action="/register" method="post">
                    <div class="grid grid-cols-12 gap-6 mb-6">
                        <div class=" col-span-6">
                            <input type="text"
                                class="peer block min-h-[auto] w-full rounded  bg-white selected:bg-white border-2 focus:border-primary px-3 py-[0.32rem] leading-[2.15]  transition-all duration-200 ease-linear"
                                name="firstname" id="firstname" value="<?= set_value('firstname') ?>"
                                placeholder="First Name" />
                        </div>
                        <div class=" col-span-6">
                            <input type="text"
                                class="peer block min-h-[auto] w-full rounded  bg-white selected:bg-white border-2 focus:border-primary px-3 py-[0.32rem] leading-[2.15]  transition-all duration-200 ease-linear"
                                name="lastname" id="lastname" value="<?= set_value('lastname') ?>"
                                placeholder="Last Name" />
                        </div>
                        <div class=" col-span-12">
                            <input type="text"
                                class="peer block min-h-[auto] w-full rounded  bg-white selected:bg-white border-2 focus:border-primary px-3 py-[0.32rem] leading-[2.15]  transition-all duration-200 ease-linear"
                                name="middlename" id="lastname" value="<?= set_value('middlename') ?>"
                                placeholder="Middle Name" />
                        </div>
                    </div>

                    <!-- Email input -->
                    <div class="relative mb-6">
                        <input type="text"
                            class="peer block min-h-[auto] w-full rounded  bg-white selected:bg-white border-2 focus:border-primary px-3 py-[0.32rem] leading-[2.15]  transition-all duration-200 ease-linear"
                            name="email" id="email" value="<?= set_value('email') ?>" placeholder="Email address" />
                    </div>

                    <!-- Password input -->
                    <div class="relative mb-6">
                        <input type="password"
                            class="peer block min-h-[auto] w-full rounded border-2 focus:border-primary bg-white focus:bg-white px-3 py-[0.32rem] leading-[2.15]   transition-all duration-200 ease-linear"
                            name="password" id="password" value="" placeholder="Password" />

                    </div>

                    <!-- Password input -->
                    <div class="relative mb-6">
                        <input type="password"
                            class="peer block min-h-[auto] w-full rounded border-2 focus:border-primary bg-white focus:bg-white px-3 py-[0.32rem] leading-[2.15]   transition-all duration-200 ease-linear"
                            name="password_confirm" id="password_confirm" value="" placeholder="Confirm Password" />

                    </div>

                    <?php if (isset($validation)): ?>
                        <div class="mb-8">
                            <div class="alert alert-danger text-red-500" role="alert">
                                <?= $validation->listErrors() ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Remember me checkbox -->


                    <!-- Submit button -->
                    <button type="submit"
                        class="inline-block w-full mb-6 rounded bg-primary px-7 pb-2.5 pt-3 text-sm font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
                        Register
                    </button>

                    <div class="mb-6 flex items-center justify-center">

                        <!-- Forgot password link -->
                        <a href="/"
                            class="text-primary font-semibold transition duration-150 ease-in-out hover:text-primary-600 focus:text-primary-600 active:text-primary-700 dark:text-primary-400 dark:hover:text-primary-500 dark:focus:text-primary-500 dark:active:text-primary-600">Already
                            have a account!</a>
                    </div>

                    <!-- Divider -->
                    <div
                        class="my-4 flex items-center before:mt-0.5 before:flex-1 before:border-t before:border-neutral-300 after:mt-0.5 after:flex-1 after:border-t after:border-neutral-300">
                        <p class="mx-4 mb-0 text-center font-semibold dark:text-neutral-200">
                            OR
                        </p>
                    </div>

                    <!-- Social login buttons -->
                    <a class="mb-3 flex w-full items-center justify-center rounded bg-primary px-7 pb-2.5 pt-3 text-center text-sm font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                        style="background-color: #3b5998" href="#!" role="button" data-te-ripple-init
                        data-te-ripple-color="light">
                        <!-- Facebook -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-3.5 w-3.5" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                        </svg>
                        Continue with Facebook
                    </a>
                    <a class="mb-3 flex w-full items-center justify-center rounded bg-info px-7 pb-2.5 pt-3 text-center text-sm font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#54b4d3] transition duration-150 ease-in-out hover:bg-info-600 hover:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] focus:bg-info-600 focus:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] focus:outline-none focus:ring-0 active:bg-info-700 active:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(84,180,211,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)]"
                        style="background-color: #55acee" href="#!" role="button" data-te-ripple-init
                        data-te-ripple-color="light">
                        <!-- Twitter -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-3.5 w-3.5" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                        </svg>
                        Continue with Twitter
                    </a>
                </form>
            </div>
        </div>
    </div>
</section>