
$(document).ready(function () {
    var allowanceCount = 1,
        taxCount = 1;


    // Add new Allowance sub column when user click on add button 
    $('.add-allowance').click(function (e) {
        allowanceCount++;
        e.preventDefault();

        var allowance = $(
            '<th data-title="allowance_' + allowanceCount + '"\
                class="allowance-th relative  text-lg font-semibold text-white">\
                <select name="allowance_title[]"\
                    class=" text-center bg-primary border-none focus:outline-none"\
                    title="Pls input allowance name">\
                    <option value="default">Allowance</option>\
                    <option value="travelling">Travelling</option>\
                    <option value="health">Health</option>\
                    <option value="communication">Communication</option>\
                </select>\
            </th>'
        );

        // Grab necessary elements from the DOM
        const table = document.querySelector("table");
        const tr = table.querySelector("thead tr");
        const allHeaders = table.querySelectorAll("th");

        var index = Array.prototype.indexOf.call($("thead tr").find(`[data-title='tax_1']`)[0]
            .parentNode
            .children, $("thead tr").find(`[data-title='tax_1']`)[0]) - 1;


        allowance.insertBefore(allHeaders[index]);

        const tbody = table.querySelector("tbody");
        Array.from(tbody.children).forEach(function (
            row) {
            const emptyTd = $('<td class="allowance-td text-dark border-b border-r  bg-white py-5 px-2 text-center text-base font-medium">\
                            <input data-title="allowance_' + allowanceCount + '" type="number" name="allowance_' + allowanceCount + '[]"\
                                class="  text-center bg-transparent border-none focus:outline-none" step="0.01" title="Input allowance" placeholader="0" /> </td>');
            emptyTd.insertBefore(row.children[index]);
        })
    });

    $('.add-tax').click(function (e) {
        taxCount++;
        e.preventDefault();





        var tax = $(
            '<th data-title="tax_' + taxCount + '"\
                class="tax-th relative  text-lg font-semibold text-white">\
                <select name="tax_title[]"\
                    class=" text-center bg-primary border-none focus:outline-none"\
                    title="Pls input tax name">\
                    <option value="default">Tax</option>\
                    <option value="government">government</option>\
                    <option value="non-government">non-government</option>\
                </select>\
            </th>'
        );

        // Grab necessary elements from the DOM
        const table = document.querySelector("table");
        const tr = table.querySelector("thead tr");
        const allHeaders = table.querySelectorAll("th");

        var index = Array.prototype.indexOf.call($("thead tr").find('.tax-th')[0]
            .parentNode
            .children, $("thead tr").find('.tax-th').last()[0]);


        tax.insertBefore(allHeaders[index + 1]);

        const tbody = table.querySelector("tbody");
        Array.from(tbody.children).forEach(function (
            row) {
            const emptyTd = $('<td class="tax-td  text-dark border-b border-r  bg-white py-5 px-2 text-center text-base font-medium">\
                            <input data-title="tax_' + taxCount + '" type="number" name="tax_' + taxCount + '[]"\
                                class="  text-center bg-transparent border-none focus:outline-none" step="0.01" title="Input tax" value="0" /></td>');
            emptyTd.insertBefore(row.children[index + 1]);
        })
    })

    $('.add-pw').click(function (e) {
        e.preventDefault();
        var addTr = document.querySelector('form tbody tr:last-child');
        var tr = document.createElement("tr");
        tr.innerHTML = addTr.innerHTML;
        console.log(tr);
        document.querySelector('form tbody').appendChild(tr);


        // addTr.appendTo('table tbody');
    })




    $('body').on('input', '.allowance-td input', function (e) {
        console.log('allowance changed!');
        e.preventDefault();
        var currentTr = e.currentTarget.closest('tr');
        var $total = 0;
        currentTr.querySelectorAll('.allowance-td input').forEach(function ($el, index) {
            $total = parseFloat($total) + parseFloat($el.value);
        })
        currentTr.querySelector('.total-td input').value = $total;

        var $incomeTax = 0;
        currentTr.querySelectorAll('.tax-td input').forEach(function ($el, index) {
            $incomeTax = parseFloat($incomeTax) + (parseFloat($el.value) / 100) * $total;
        })
        currentTr.querySelector('.income-tax-td input').value = $incomeTax.toFixed(2);
        currentTr.querySelector('.amount-due-td input').value = (parseFloat($total) - parseFloat($incomeTax)).toFixed(2);

    });

    $('body').on('input', '.tax-td input', function (e) {
        e.preventDefault();
        var currentTr = e.currentTarget.closest('tr');
        var $total = currentTr.querySelector('.total-td input').value;
        var $tax = 0;
        currentTr.querySelectorAll('.tax-td input').forEach(function ($el, index) {
            $tax = parseFloat($tax) + (parseFloat($el.value) / 100) * $total;
        })
        currentTr.querySelector('.income-tax-td input').value = $tax.toFixed(2);
        currentTr.querySelector('.amount-due-td input').value = (parseFloat($total) - parseFloat($tax)).toFixed(2);

    });




});