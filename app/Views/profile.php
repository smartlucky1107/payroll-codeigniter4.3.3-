<div class="container">
    <div class="row">
        <div class="col-12 col-sm8- offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
            <div class="container">
                <h3 class="text-3xl text-black"><?= $user['firstname'] . ' ' . $user['lastname'] ?></h3>
                <hr>
                <?php if (session()->get('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->get('success') ?>
                    </div>
                <?php endif; ?>
                <form action="/profile" method="post" enctype="multipart/form-data">
                    <div class="grid grid-cols-12 gap-6 mt-20 text-black">
                        <div x-data="{photoName: null, photoPreview: null}" class="col-span-12 md:mr-3">
                            <!-- Photo File Input -->
                            <input type="file" name="photo" class="hidden" x-ref="photo" x-on:change="
                                photoName = $refs.photo.files[0].name;
                                const reader = new FileReader();
                                reader.onload = (e) => {
                                    photoPreview = e.target.result;
                                };
                                reader.readAsDataURL($refs.photo.files[0]);">

                            <label class="block text-gray-700 text-xl font-bold mb-2 text-center" for="photo">
                                Profile Photo <span class="text-red-600"> </span>
                            </label>

                            <div class="text-center">
                                <!-- Current Profile Photo -->
                                <div class="mt-2" x-show="! photoPreview">
                                    <img src=<?= $user['img_name']; ?> class="w-40 h-40 m-auto rounded-full shadow">
                                </div>
                                <!-- New Profile Photo Preview -->
                                <div class="mt-2" x-show="photoPreview" style="display: none;">
                                    <span class="block w-40 h-40 rounded-full m-auto shadow"
                                        x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'"
                                        style="background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url('null');">
                                    </span>
                                </div>
                                <button type="button"
                                    class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-400 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150 mt-2 ml-3"
                                    x-on:click.prevent="$refs.photo.click()">
                                    Select New Photo
                                </button>
                            </div>
                        </div>
                        <div class="col-span-6 flex rounded-md ">
                            <span class="px-4 inline-flex items-center min-w-[190px] text-2xl ">Last
                                Name</span>
                            <input type="text" name="lastname"
                                class="py-2 px-4 pr-11 block w-full border border-gray-200 shadow-sm rounded-md text-2xl focus:z-10 focus:border-primary focus:ring-primary dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 "
                                value="<?= $user['lastname']; ?>" readonly />
                        </div>
                        <div class="col-span-6 flex rounded-md ">
                            <span class="px-4 inline-flex items-center min-w-[190px] text-2xl ">First
                                Name</span>
                            <input type="text" name="firstname"
                                class="py-2 px-4 pr-11 block w-full border border-gray-200 shadow-sm rounded-md text-2xl focus:z-10 focus:border-primary focus:ring-primary dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 "
                                value="<?= $user['firstname']; ?>" readonly />
                        </div>
                        <div class="col-span-6 flex rounded-md ">
                            <span class="px-4 inline-flex items-center min-w-[190px] text-2xl ">Middle
                                Name</span>
                            <input type="text" name="middlename"
                                class="py-2 px-4 pr-11 block w-full border border-gray-200 shadow-sm rounded-md text-2xl focus:z-10 focus:border-primary focus:ring-primary dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 "
                                value="<?= $user['middlename']; ?>" readonly />
                        </div>
                        <div class="col-span-9 flex rounded-md ">
                            <span class="px-4 inline-flex items-center min-w-[190px] text-2xl ">Birthday</span>
                            <div class="sm:flex rounded-md border">
                                <span
                                    class="px-4 inline-flex items-center border-r bg-gray-300  min-w-fit text-2xl ">Year</span>
                                <input type="number" name="birthYear"
                                    class="py-2 px-4 pr-11 block w-full  border-gray-200  rounded-r-md text-2xl focus:z-10 focus:border-primary focus:ring-primary dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 "
                                    value="<?= $user['birthYear']; ?>" />
                                <span
                                    class="px-4 inline-flex items-center border-l border-r bg-gray-300 min-w-fit text-2xl ">Month</span>
                                <input type="number" name="birthMonth"
                                    class="py-2 px-4 pr-11 block w-full  border-gray-200  rounded-r-md text-2xl focus:z-10 focus:border-primary focus:ring-primary dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 "
                                    value="<?= $user['birthMonth']; ?>" />
                                <span
                                    class="px-4 inline-flex items-center border-r border-l bg-gray-300 min-w-fit text-2xl ">Day</span>
                                <input type="number" name="birthDate"
                                    class="py-2 px-4 pr-11 block w-full  border-gray-200  rounded-r-md text-2xl focus:z-10 focus:border-primary focus:ring-primary dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 "
                                    value="<?= $user['birthDate']; ?>" />
                            </div>
                        </div>
                        <div class="col-span-12 flex rounded-md ">
                            <span class="px-4 inline-flex items-center min-w-[190px] text-2xl ">Address</span>
                            <input type="text" name="address"
                                class="py-2 px-4 pr-11 block w-full border border-gray-200 shadow-sm rounded-md text-2xl focus:z-10 focus:border-primary focus:ring-primary dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 "
                                value="<?= $user['address']; ?>" />
                        </div>
                        <div class="col-span-12 flex rounded-md ">
                            <span class="px-4 inline-flex items-center min-w-[190px] text-2xl ">Province</span>
                            <input type="text" name="province"
                                class="py-2 px-4 pr-11 block w-full border border-gray-200 shadow-sm rounded-md text-2xl focus:z-10 focus:border-primary focus:ring-primary dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 "
                                value="<?= $user['province']; ?>" />
                        </div>
                        <div class="col-span-12 flex rounded-md ">
                            <span class="px-4 inline-flex items-center min-w-[190px] text-2xl ">Municipality</span>
                            <input type="text" name="municipality"
                                class="py-2 px-4 pr-11 block w-full border border-gray-200 shadow-sm rounded-md text-2xl focus:z-10 focus:border-primary focus:ring-primary dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 "
                                value="<?= $user['municipality']; ?>" />
                        </div>
                        <div class="col-span-12 flex rounded-md ">
                            <span class="px-4 inline-flex items-center min-w-[190px] text-2xl ">Barangay</span>
                            <input type="text" name="barangay"
                                class="py-2 px-4 pr-11 block w-full border border-gray-200 shadow-sm rounded-md text-2xl focus:z-10 focus:border-primary focus:ring-primary dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 "
                                value="<?= $user['barangay']; ?>" />
                        </div>
                        <div class="col-span-12 flex rounded-md ">
                            <span class="px-4 inline-flex items-center min-w-[190px] text-2xl ">Street</span>
                            <input type="text" name="street"
                                class="py-2 px-4 pr-11 block w-full border border-gray-200 shadow-sm rounded-md text-2xl focus:z-10 focus:border-primary focus:ring-primary dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 "
                                value="<?= $user['street']; ?>" />
                        </div>
                        <div class="col-span-12 flex rounded-md ">
                            <span class="px-4 inline-flex items-center min-w-[190px] text-2xl ">Number</span>
                            <input type="number" name="number"
                                class="py-2 px-4 pr-11 block w-full border border-gray-200 shadow-sm rounded-md text-2xl focus:z-10 focus:border-primary focus:ring-primary dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 "
                                value="<?= $user['number']; ?>" />
                        </div>
                        <div class="col-span-12 flex rounded-md ">
                            <span class="px-4 inline-flex items-center min-w-[190px] text-2xl ">Email Address</span>
                            <input type="text" name="email"
                                class="py-2 px-4 pr-11 block w-full border border-gray-200 shadow-sm rounded-md text-2xl focus:z-10 focus:border-primary focus:ring-primary dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 "
                                value="<?= $user['email']; ?>" readonly />
                        </div>
                        <div class="col-span-5 flex rounded-md ">
                            <span class="px-4 inline-flex items-center min-w-[190px] text-2xl ">Mobile No. (1)</span>
                            <input type="text" name="mobile1"
                                class="py-2 px-4 pr-11 block w-full border border-gray-200 shadow-sm rounded-md text-2xl focus:z-10 focus:border-primary focus:ring-primary dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 "
                                value="<?= $user['mobile1']; ?>" />
                        </div>
                        <div class="col-span-2"></div>
                        <div class="col-span-5 flex rounded-md ">
                            <span class="px-4 inline-flex items-center min-w-[190px] text-2xl ">Mobile No. (2)</span>
                            <input type="text" name="mobile2"
                                class="py-2 px-4 pr-11 block w-full border border-gray-200 shadow-sm rounded-md text-2xl focus:z-10 focus:border-primary focus:ring-primary dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 "
                                value="<?= $user['mobile2']; ?>" />
                        </div>
                        <div class="col-span-5 flex rounded-md ">
                            <span class="px-4 inline-flex items-center min-w-[190px] text-2xl ">TIN No.</span>
                            <input type="text" name="taxID"
                                class="py-2 px-4 pr-11 block w-full border border-gray-200 shadow-sm rounded-md text-2xl focus:z-10 focus:border-primary focus:ring-primary dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 "
                                value="<?= $user['taxID']; ?>" />
                        </div>
                        <div class="col-span-12 flex rounded-md ">
                            <span class="px-4 inline-flex items-center min-w-[350px] text-2xl ">Sex</span>
                            <input type="radio" id="male" name="sex" clssas="text-2xl" value="male" <?php if ($user['sex'] == 'male')
                                echo "checked='checked'"; ?>>
                            <label class=" inline-block text-2xl ml-3 mr-20 text-black" for="male">Male</label>
                            <input type="radio" id="female" name="sex" clssas="text-2xl" value="female" <?php if ($user['sex'] == 'female')
                                echo "checked='checked'"; ?>>
                            <label class=" inline-block text-2xl ml-3 text-black" for="female">Female</label>
                        </div>
                        <div class="col-span-9 flex rounded-md ">
                            <span class="px-4 inline-flex items-center min-w-[350px] text-2xl ">Governemnt</span>
                            <div class="sm:flex rounded-md border">
                                <span
                                    class="px-4 inline-flex items-center border-r bg-gray-300  min-w-fit text-2xl ">Position</span>
                                <input type="text" name="governmentPosition"
                                    class="py-2 px-4 pr-11 block w-full  border-gray-200  rounded-r-md text-2xl focus:z-10 focus:border-primary focus:ring-primary dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 "
                                    value="<?= $user['governmentPosition']; ?>" />
                                <span
                                    class="px-4 inline-flex items-center border-l border-r bg-gray-300 min-w-fit text-2xl ">Salary
                                    Grade</span>
                                <input type="text" name="governmentSalaryGrade"
                                    class="py-2 px-4 pr-11 block w-full  border-gray-200  rounded-r-md text-2xl focus:z-10 focus:border-primary focus:ring-primary dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 "
                                    value="<?= $user['governmentSalaryGrade']; ?>" />
                                <span
                                    class="px-4 inline-flex items-center border-r border-l bg-gray-300 min-w-fit text-2xl ">Step
                                    Increment</span>
                                <input type="text" name="governmentSalaryStep"
                                    class="py-2 px-4 pr-11 block w-full  border-gray-200  rounded-r-md text-2xl focus:z-10 focus:border-primary focus:ring-primary dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 "
                                    value="<?= $user['governmentSalaryStep']; ?>" />
                            </div>
                        </div>
                        <div class="col-span-9 flex rounded-md ">
                            <span class="px-4 inline-flex items-center min-w-[350px] text-2xl ">Non-Government</span>
                            <div class="sm:flex rounded-md border">
                                <span
                                    class="px-4 inline-flex items-center border-r bg-gray-300  min-w-fit text-2xl ">Position</span>
                                <input type="text" name="nonGovernmentPosition"
                                    class="py-2 px-4 pr-11 block w-full  border-gray-200  rounded-r-md text-2xl focus:z-10 focus:border-primary focus:ring-primary dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 "
                                    value="<?= $user['nonGovernmentPosition']; ?>" />
                                <span
                                    class="px-4 inline-flex items-center border-l border-r bg-gray-300 min-w-fit text-2xl ">Monthly
                                    Salary</span>
                                <input type="text" name="nonGovernmentSalary"
                                    class="py-2 px-4 pr-11 block w-full  border-gray-200  rounded-r-md text-2xl focus:z-10 focus:border-primary focus:ring-primary dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 "
                                    value="<?= $user['nonGovernmentSalary']; ?>" />
                                <span
                                    class="px-4 inline-flex items-center border-r border-l bg-gray-300 min-w-fit text-2xl ">Tax
                                    Class</span>
                                <input type="text" name="nonGovernmentTax"
                                    class="py-2 px-4 pr-11 block w-full  border-gray-200  rounded-r-md text-2xl focus:z-10 focus:border-primary focus:ring-primary dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 "
                                    value="<?= $user['nonGovernmentTax']; ?>" />
                            </div>
                        </div>
                        <div class="col-span-12 flex rounded-md ">
                            <span class="px-4 inline-flex items-center min-w-[350px] text-2xl ">Teaching</span>
                            <input type="radio" id="true" name="teaching" clssas="text-2xl" value='true' <?php if ($user['teaching'])
                                echo "checked='checked'"; ?> />
                            <label class=" inline-block text-2xl ml-3 mr-20 text-black" for="true">Yes </label>
                            <input type="radio" id="false" name="teaching" clssas="text-2xl" value="false" <?php if (!$user['teaching'])
                                echo "checked='checked'"; ?> />
                            <label class=" inline-block text-2xl ml-3 text-black" for="false">No</label>
                        </div>
                        <div class="col-span-12 flex rounded-md ">
                            <span class="px-4 inline-flex items-center min-w-[350px] text-2xl ">School Name If
                                teaching:</span>
                            <input type="text" name="school"
                                class="py-2 px-4 pr-11 block w-full border border-gray-200 shadow-sm rounded-md text-2xl focus:z-10 focus:border-primary focus:ring-primary dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 "
                                value="<?= $user['school']; ?>" />
                        </div>
                        <div class="col-span-3  rounded-md ">
                            <span class="px-4 inline-flex items-center w-full text-2xl ">Government Issue ID</span>
                            <input type="text" name="IDNumber"
                                class="py-2 px-4 pr-11 block w-full border border-gray-200 shadow-sm rounded-md text-2xl focus:z-10 focus:border-primary focus:ring-primary dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 "
                                value="<?= $user['IDNumber']; ?>" />
                        </div>
                        <div class="col-span-6 grid grid-cols-12  rounded-md ">
                            <div class="col-span-4">
                                <input type="checkbox" class="mr-6 text-xl" id="umid" name="IDType" value="UMID" <?php if ($user['IDType'] == 'UMID')
                                    echo "checked='checked'"; ?> />
                                <label class="text-xl" for="umid">UMID</label>
                            </div>
                            <div class="col-span-4">
                                <input type="checkbox" class="mr-6 text-xl" id="driverLicense" name="IDType"
                                    value="driverLicense" <?php if ($user['IDType'] == 'driverLicense')
                                        echo "checked='checked'"; ?> />
                                <label class="text-xl" for="driverLicense"> Driver's license</label>
                            </div>
                            <div class="col-span-4">
                                <input type="checkbox" class="mr-6 text-xl" id="companyID" name="IDType"
                                    value="companyID" <?php if ($user['IDType'] == 'companyID')
                                        echo "checked='checked'"; ?>>
                                <label class="text-xl" for="CompanyID"> Company/School ID</label>
                            </div>
                            <div class="col-span-4">
                                <input type="checkbox" class="mr-6 text-xl" id="passport" name="IDType" value="passport" <?php if ($user['IDType'] == 'passport')
                                    echo "checked='checked'"; ?>>
                                <label class="text-xl" for="passport"> Passport</label>
                            </div>
                            <div class="col-span-4">
                                <input type="checkbox" class="mr-6 text-xl" id="philhealth" name="IDType"
                                    value="philhealth" <?php if ($user['IDType'] == 'philhealth')
                                        echo "checked='checked'"; ?>>
                                <label class="text-xl" for="philhealth"> Philhealth</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit"
                        class="inline-block w-full mt-20 mb-6 rounded bg-primary px-7 pb-2.5 pt-3 text-2xl font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
                        Save
                    </button>

                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>

<script src="https://cdn.jsdelivr.net/gh/alpine-collective/alpine-magic-helpers@0.3.x/dist/index.js"></script>