<section class="bg-white py-40 lg:py-[120px]">
    <div class="container mx-auto">
        <div class="-mx-4 flex flex-wrap">
            <div class="w-full px-4 mb-20">
                <h2 class=" mb-10  text-4xl font-semibold text-primary ">PAYROLL for <?= $activity; ?> in
                    <?= $municipality; ?></h2>

                <h4 class=" text-3xl font-semibold ">Comelec Office: Municipality of
                    <?= $municipality; ?>
                </h4>
                <h4 class=" text-3xl font-semibold ">Activity: <?= $activity; ?></h4>
                <div class="mt-6 mb-6">


                    <table class="w-full table-auto">
                        <thead>
                            <tr class="bg-primary text-center">
                                <th
                                    class=" border-l border-transparent py-4 px-3 text-lg font-semibold text-white lg:py-7 lg:px-4">
                                    PWName
                                </th>
                                <th class=" py-4 px-3 text-lg font-semibold text-white lg:py-7 lg:px-4">
                                    Position
                                </th>
                                <th class=" py-4 px-3 text-lg font-semibold text-white lg:py-7 lg:px-4">
                                    TaxID
                                </th>
                                <?php foreach ($allowance_titles as $allowance_title): ?>
                                    <th data-title="allowance"
                                        class="w-48 relative  py-4 px-3 text-lg font-semibold text-white lg:py-7 lg:px-4">
                                        <?= $allowance_title; ?>
                                    </th>
                                <?php endforeach ?>
                                <th class=" py-4 px-3 text-lg font-semibold text-white lg:py-7 lg:px-4">
                                    Total
                                </th>
                                <?php foreach ($tax_titles as $tax_title): ?>
                                    <th data-title="tax"
                                        class="w-48 relative py-4 px-3 text-lg font-semibold text-white lg:py-7 lg:px-4">
                                        <?= $tax_title; ?>
                                    </th>
                                <?php endforeach ?>
                                <th class=" py-4 px-3 text-lg font-semibold text-white lg:py-7 lg:px-4">
                                    Income Tax
                                </th>
                                <th
                                    class=" border-r border-transparent py-4 px-3 text-lg font-semibold text-white lg:py-7 lg:px-4">
                                    Amount Due
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($payrolls as $payroll): ?>
                                <tr>

                                    <td
                                        class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">
                                        <?= $payroll->firstname; ?>
                                    </td>
                                    <td
                                        class="text-dark border-b border-[#E8E8E8] bg-white py-5 px-2 text-center text-base font-medium">
                                        <?= $payroll->position; ?>
                                    </td>
                                    <td
                                        class="text-dark border-b border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">
                                        <?= $payroll->taxID; ?>
                                    </td>
                                    <?php foreach ($payroll->allowances as $item): ?>
                                        <td
                                            class="allowance-td text-dark border-b border-[#E8E8E8] bg-white py-5 px-2 text-center text-base font-medium">
                                            <?= $item; ?>
                                        </td>
                                    <?php endforeach ?>
                                    <td
                                        class="total-td text-dark border-b border-r border-[#E8E8E8] bg-white py-5 px-2 text-center text-base font-medium">
                                        <?= $payroll->total; ?>


                                    </td>
                                    <?php foreach ($payroll->taxes as $item): ?>
                                        <td
                                            class="tax-td text-dark border-b border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">
                                            <?= $item; ?>%
                                        </td>
                                    <?php endforeach ?>
                                    <td
                                        class="income-tax-td text-dark border-b border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">
                                        <?= $payroll->incomeTax ?>
                                    </td>
                                    <td
                                        class="amount-due-td text-dark border-b border-r border-[#E8E8E8] bg-white py-5 px-2 text-center text-base font-medium">
                                        <?= $payroll->amountDue; ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>



                        </tbody>
                    </table>

                    <div class="mt-12 grid grid-cols-12">
                        <div class="col-span-6 grid grid-cols-12 gap-3">
                            <div class="col-span-2">
                                <h3 class=" px-2 border-4 border-black text-center text-2xl text-black font-bold">A</h3>
                            </div>
                            <div class="col-span-10">
                                <div class="grid grid-cols-12">
                                    <div class="col-span-3">
                                        <h3 class="text-2xl text-black font-bold">Certified:</h3>
                                    </div>
                                    <div class="col-span-9">
                                        <h3 class="text-2xl text-black font-semibold">This is the first part</h3>

                                    </div>
                                </div>
                                <div class="grid grid-cols-12 items-center">
                                    <div class="col-span-9">
                                        <input type="text" name="sign1"
                                            class="w-full text-center mt-8 pt-1 mb-1 text-2xl text-black font-bold border-b-4 border-black"
                                            value=<?= $payroll->sign1; ?> readonly />

                                        <h3 class="text-center text-2xl text-black font-semibold">Election Officer</h3>
                                    </div>
                                    <div class="col-span-3">
                                        <input type="Date" name="date1"
                                            class="w-full text-center mt-8 pt-1 mb-1 text-xl text-black font-semibold border-b-4 border-black"
                                            value=<?= $payroll->date1; ?> readonly />
                                        <h3 class="text-center text-2xl text-black font-semibold">Date</h3>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-span-6 grid grid-cols-12 gap-3">
                            <div class="col-span-2">
                                <h3 class=" px-2 border-4 border-black text-center text-2xl text-black font-bold">C</h3>
                            </div>
                            <div class="col-span-10">
                                <div class="grid grid-cols-12">
                                    <div class="col-span-3">
                                        <h3 class="text-2xl text-black font-bold">Approved:</h3>
                                    </div>
                                    <div class="col-span-9">
                                        <h3 class="text-2xl text-black font-semibold">This is the Third part</h3>

                                    </div>
                                </div>
                                <div class="grid grid-cols-12 items-center">
                                    <div class="col-span-9">
                                        <input type="text" name="supervisor"
                                            class="w-full text-center mt-8 pt-1 mb-1 text-2xl text-black font-bold border-b-4 border-black"
                                            value=<?= $payroll->supervisor; ?> readonly />

                                        <h3 class="text-center text-2xl text-black font-semibold">Provincal Election
                                            Supervisor</h3>
                                    </div>
                                    <div class="col-span-3">
                                        <input type="Date" name="date2"
                                            class="w-full text-center mt-8 pt-1 mb-1 text-xl text-black font-semibold border-b-4 border-black"
                                            value=<?= $payroll->date2; ?> readonly />
                                        <h3 class="text-center text-2xl text-black font-semibold">Date</h3>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="mt-12 grid grid-cols-12 ">
                        <div class="col-span-6 grid grid-cols-12 gap-3">
                            <div class="col-span-2">
                                <h3 class=" px-2 border-4 border-black text-center text-2xl text-black font-bold">B</h3>
                            </div>
                            <div class="col-span-10">
                                <div class="grid grid-cols-12">
                                    <div class="col-span-3">
                                        <h3 class="text-2xl text-black font-bold">Certified:</h3>
                                    </div>
                                    <div class="col-span-9">
                                        <h3 class="text-2xl text-black font-semibold">This is the Second part</h3>

                                    </div>
                                </div>
                                <div class="grid grid-cols-12 items-center">
                                    <div class="col-span-9">
                                        <input type="text" name="sign2"
                                            class="w-full text-center mt-8 pt-1 mb-1 text-2xl text-black font-bold border-b-4 border-black"
                                            value=<?= $payroll->sign2; ?> readonly />

                                        <h3 class="text-center text-2xl text-black font-semibold">Election Officer</h3>
                                    </div>
                                    <div class="col-span-3">
                                        <input type="Date" name="date3"
                                            class="w-full text-center mt-8 pt-1 mb-1 text-xl text-black font-semibold border-b-4 border-black"
                                            value=<?= $payroll->date3; ?> readonly />
                                        <h3 class="text-center text-2xl text-black font-semibold">Date</h3>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-span-6 grid grid-cols-12 gap-3">
                            <div class="col-span-2">
                                <h3 class=" px-2 border-4 border-black text-center text-2xl text-black font-bold">D</h3>
                            </div>
                            <div class="col-span-10">
                                <div class="grid grid-cols-12">
                                    <div class="col-span-3">
                                        <h3 class="text-2xl text-black font-bold">Certified:</h3>
                                    </div>
                                    <div class="col-span-9">
                                        <h3 class="text-2xl text-black font-semibold">This is the Fourth part</h3>

                                    </div>
                                </div>
                                <div class="grid grid-cols-12 items-center">
                                    <div class="col-span-9">
                                        <input type="text" name="sign3"
                                            class="w-full text-center mt-8 pt-1 mb-1 text-2xl text-black font-bold border-b-4 border-black"
                                            value=<?= $payroll->sign3; ?> readonly />

                                        <h3 class="text-center text-2xl text-black font-semibold">Election Officer</h3>
                                    </div>
                                    <div class="col-span-3">
                                        <input type="Date" name="date3"
                                            class="w-full text-center mt-8 pt-1 mb-1 text-xl text-black font-semibold border-b-4 border-black"
                                            value=<?= $payroll->date4; ?> readonly />
                                        <h3 class="text-center text-2xl text-black font-semibold">Date</h3>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>