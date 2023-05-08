<style>
td select {
    width: 100%;
    height: 100%;
    text-align: center;
    appearance: none;
    padding: 1rem;
}

th select {
    width: 100%;
    height: 100%;
    text-align: center;
    appearance: none;
    padding: 1rem;
}

td select:focus {
    outline: none;
}

th select:focus {
    outline: none;
}
</style>
<section class="bg-white py-40 lg:py-[120px]">
    <div class="container mx-auto">
        <div class="-mx-4 flex flex-wrap">
            <div class="w-full px-4 overflow-x-auto overflow-y-hidden">
                <form class="max-w-full pb-5" action="/payrolls/create" method="post">
                    <h2 class=" mb-10 text-center text-4xl font-semibold text-primary ">PAYROLL CREATE</h2>

                    <h4 class="text-center text-3xl font-semibold ">Comelec Office: Municipality of
                        <?= $municipality; ?>
                    </h4>
                    <h4 class="text-center text-3xl font-semibold ">Activity:<input type="text" name="activity"
                            class="ml-4" placeholder="Input Activity Name"></h4>

                    <div class="mb-6 flex items-center justify-end">
                        <button class="block add-allowance mr-6 bg-primary text-white py-1 px-2">Add Allowance</button>
                        <button class="block add-tax mr-6 bg-primary text-white py-1 px-2">Add Tax</button>
                        <button class="block add-pw bg-primary text-white py-1 px-2">Add PW</button>

                    </div>
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
                                <th data-title="allowance_1"
                                    class="allowance-th relative  text-lg font-semibold text-white">
                                    <select name="allowance_title[]"
                                        class=" text-center bg-primary border-none focus:outline-none"
                                        title="Pls input allowance name">
                                        <option value="default">Allowance</option>
                                        <option value="travelling">Travelling</option>
                                        <option value="health">Health</option>
                                        <option value="communication">Communication</option>
                                    </select>
                                </th>
                                <th class=" py-4 px-3 text-lg font-semibold text-white lg:py-7 lg:px-4">
                                    Total
                                </th>
                                <th data-title="tax_1"
                                    class="tax-th relative py-4 px-3 text-lg font-semibold text-white lg:py-7 lg:px-4">
                                    <select name="tax_title[]"
                                        class=" text-center bg-primary border-none focus:outline-none"
                                        title="Pls input tax name">
                                        <option value="default">Tax</option>
                                        <?php foreach ($taxes as $tax): ?>
                                            <option value=<?= $tax->type; ?>><?= $tax->type; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </th>

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

                            <tr>
                                <td
                                    class="PW-td text-dark border-b border-l border-r  bg-white text-center text-base font-medium">
                                    <select name="PWID[]">
                                        <option value="default">Choose</option>
                                        <?php foreach ($PWs as $PW): ?>
                                            <option value=<?= $PW->id; ?>><?= $PW->firstname; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </td>
                                <td
                                    class="position-td  text-dark border-b border-r  app bg-white  text-center text-base font-medium">
                                    <select name="position[]">
                                        <?php foreach ($positions as $position): ?>
                                            <option value=<?= $position->id; ?>><?= $position->name; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </td>
                                <td
                                    class="taxID-td text-dark border-b border-r  bg-white py-5 px-2 text-center text-base font-medium">
                                    <input type="text" name="taxID[]"
                                        class=" text-center bg-transparent border-none focus:outline-none"
                                        title="Input TaxID" />
                                </td>
                                <td
                                    class="allowance-td text-dark border-b border-r  bg-white py-5 px-2 text-center text-base font-medium">
                                    <input data-title="allowance_1" type="number" name="allowance_1[]"
                                        class="  text-center bg-transparent border-none focus:outline-none" step="0.01"
                                        title="Input allowance" placeholader="0" />
                                </td>
                                <td
                                    class="total-td text-dark border-b border-r   bg-white py-5 px-2 text-center text-base font-medium">

                                    <input type="number" name="total[]"
                                        class="  text-center bg-transparent border-none focus:outline-none" step="0.01"
                                        value="0" readonly />

                                </td>
                                <td
                                    class="tax-td   text-dark border-b border-r  bg-white py-5 px-2 text-center text-base font-medium">
                                    <input type="number" data-title="tax_1" name="tax_1[]"
                                        class="  text-center bg-transparent border-none focus:outline-none" step="0.01"
                                        title="Input tax" value="0" />
                                </td>

                                <td
                                    class="income-tax-td text-dark border-b border-r  bg-white py-5 px-2 text-center text-base font-medium">
                                    <input type="number" name="incomeTax[]"
                                        class="  text-center bg-transparent border-none focus:outline-none" step="0.01"
                                        value="0" readonly />
                                </td>
                                <td
                                    class="amount-due-td text-dark border-b border-r  bg-white py-5 px-2 text-center text-base font-medium">
                                    <input type="number" name="amountDue[]"
                                        class="  text-center bg-transparent border-none focus:outline-none" step="0.01"
                                        value="0" readonly />
                                </td>
                            </tr>
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
                                            placeholder="Input Name">

                                        <h3 class="text-center text-2xl text-black font-semibold">Election Officer</h3>
                                    </div>
                                    <div class="col-span-3">
                                        <input type="Date" name="date1"
                                            class="w-full text-center mt-8 pt-1 mb-1 text-xl text-black font-semibold border-b-4 border-black">
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
                                            placeholder="Input Name">

                                        <h3 class="text-center text-2xl text-black font-semibold">Provincal Election
                                            Supervisor</h3>
                                    </div>
                                    <div class="col-span-3">
                                        <input type="Date" name="date2"
                                            class="w-full text-center mt-8 pt-1 mb-1 text-xl text-black font-semibold border-b-4 border-black">
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
                                            placeholder="Input Name">

                                        <h3 class="text-center text-2xl text-black font-semibold">Election Officer</h3>
                                    </div>
                                    <div class="col-span-3">
                                        <input type="Date" name="date3"
                                            class="w-full text-center mt-8 pt-1 mb-1 text-xl text-black font-semibold border-b-4 border-black">
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
                                            placeholder="Input Name">

                                        <h3 class="text-center text-2xl text-black font-semibold">Election Officer</h3>
                                    </div>
                                    <div class="col-span-3">
                                        <input type="Date" name="date4"
                                            class="w-full text-center mt-8 pt-1 mb-1 text-xl text-black font-semibold border-b-4 border-black">
                                        <h3 class="text-center text-2xl text-black font-semibold">Date</h3>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <button type="submit"
                        class="flex ml-auto mr-0 mt-6 rounded bg-primary px-7 pb-2.5 pt-3 text-sm font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
                        SAVE
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
var positions = <?php echo json_encode($positions); ?>;
var PWs = <?php echo json_encode($PWs); ?>;
var taxes = <?php echo json_encode($taxes); ?>;
$(document).ready(function() {
    $('body').on('change', '.PW-td select', function(e) {
        e.preventDefault();
        var target = e.currentTarget;
        var id = target.value;
        var currentPW = PWs.filter(item => item.id == id);
        console.log(currentPW);
        target.closest('tr').querySelector('.taxID-td input').value = currentPW[0]['taxID']

    });

    function allowanceChange(target, trs) {
        var allowanceName = target.value;
        var title = target.closest('th').getAttribute('data-title');
        console.log(title);
        trs.forEach(function($el) {
            var positionid = $el.querySelector('.position-td select').value;
            var currentPosition = positions.filter(item => item.id == positionid);
            $el.querySelector('input[data-title=' + title + ']').value =
                currentPosition[0][
                    allowanceName
                ];
            jQuery($el).find('input[data-title=' + title + ']').trigger('input');
        })
    }

    function taxChanges(target, trs) {
        var taxType = target.value;
        if (taxType != 'default') {
            var tax = taxes.filter(item => item.type == taxType);
            var title = target.closest('th').getAttribute('data-title');
            trs.forEach(function($el) {
                var PWid = $el.querySelector('.PW-td select').value;
                var currentPW = PWs.filter(item => item.id == PWid);
                console.log(currentPW[0]);
                console.log(currentPW[0]['government']);
                $el.querySelector('input[data-title=' + title + ']').value = taxType == 'government' ?
                    parseInt((currentPW[0]['governmentPosition'] != '') ? 1 : 0) * tax[0]['value'] : ((
                        currentPW[0]['governmentPosition'] == '') ? 1 : 0) * tax[0]['value'];
                jQuery($el).find('input[data-title=' + title + ']').trigger('input');
            })

        }
    }
    $('body').on('change', '.allowance-th select', function(e) {
        e.preventDefault();
        var target = e.currentTarget;
        var trs = document.querySelectorAll('form tbody tr');
        allowanceChange(target, trs);

    });


    $('body').on('change', '.tax-th select', function(e) {
        e.preventDefault();
        var target = e.currentTarget;
        var trs = document.querySelectorAll('form tbody tr');
        taxChanges(target, trs);
    })


    $('body').on('change', '.position-td select', function(e) {
        e.preventDefault();
        var target = e.currentTarget;
        console.log('position changed!');
        var trs = [];
        trs.push(target.closest('tr'));
        var targets = document.querySelectorAll('.allowance-th select');
        targets.forEach(function($el) {
            allowanceChange($el, trs);
        })
    })

    $('body').on('change', '.PW-td select', function(e) {
        e.preventDefault();
        var target = e.currentTarget;
        var trs = [];
        trs.push(target.closest('tr'));
        var targets = document.querySelectorAll('.tax-th select');
        targets.forEach(function($el) {
            taxChanges($el, trs);
        })
    })
})
</script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/payrolls/create.js"></script>