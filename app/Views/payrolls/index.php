<section class="bg-white py-40 lg:py-[120px]">
    <div class="container mx-auto">
        <div class="-mx-4 ">
            <h2 class=" mb-10  text-4xl font-semibold text-primary ">PAYROLL LIST in the </h2>

            <?php foreach ($activities as $key => $activity): ?>
                <h3 class="mb-10  text-4xl font-semibold text-black ">
                    Payroll <?= $key + 1; ?>:<a href="payrolls/<?= $activity; ?>"
                        class="ml-4 hover:text-primary"><?= $activity; ?></a></h3>
            <?php endforeach ?>
        </div>
    </div>
</section>