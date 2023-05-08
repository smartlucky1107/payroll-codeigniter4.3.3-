<section class="h-screen">
    <div class="container h-full px-6 py-24">
        <div class="g-6 flex h-full flex-wrap items-center justify-center ">

            <div class="md:w-8/12 lg:ml-6 lg:w-5/12">
                <h2 class="mb-8 text-4xl text-primary text-center font-semibold">INPUT PASSWORD</h2>


                <?php if (session()->get('success')): ?>
                <div class=" text-green-500 text-3xl" role="alert">
                    <?= session()->get('success') ?>
                </div>
                <?php endif; ?>
                <form class="bg-white" action="/confirm-password" method="post">
                    <input type="hidden" name="email" id="email" value=<?= session()->getFlashdata('email') ?> />
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
                        SUBMIT
                    </button>

                    <div class="mb-6 flex items-center justify-center">

                        <!-- Forgot password link -->
                        <a href="/"
                            class="text-primary font-semibold transition duration-150 ease-in-out hover:text-primary-600 focus:text-primary-600 active:text-primary-700 dark:text-primary-400 dark:hover:text-primary-500 dark:focus:text-primary-500 dark:active:text-primary-600">Login
                            Now!</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>