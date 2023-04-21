<section class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-4 position-relative">
                <div class="p-3 text-center">
                    <?php 
                    $inbox = $conn->query("SELECT * FROM `conversation_list` where id in (SELECT conversation_id FROM `message_list` where to_user = '{$_settings->userdata('id')}') ")->num_rows;
                    ?>
                    <h1 class="text-gradient text-primary"><span id="state1" countto="70"><?= number_format($inbox) ?></span></h1>
                    <h5 class="mt-3">Inbox</h5>
                    <p class="text-lg h2 font-weight-normal text-dark"><span style="font-size:3rem" class="material-icons">mail</span></p>
                </div>
                <hr class="vertical dark">
            </div>
            <div class="col-md-4 position-relative">
                <div class="p-3 text-center">
                    <?php 
                    $sent = $conn->query("SELECT * FROM `conversation_list` where id in (SELECT conversation_id FROM `message_list` where from_user = '{$_settings->userdata('id')}') ")->num_rows;
                    ?>
                    <h1 class="text-gradient text-primary"><span id="state1" countto="70"><?= number_format($inbox) ?></span></h1>
                    <h5 class="mt-3">Sent</h5>
                    <p class="text-lg h2 font-weight-normal text-info"><span style="font-size:3rem" class="material-icons">send</span></p>
                </div>
                <hr class="vertical dark">
            </div>
            <div class="col-md-4 position-relative">
                <div class="p-3 text-center">
                    <h1 class="text-gradient text-primary"><span id="state1" countto="70"><?= number_format($unread) ?></span></h1>
                    <h5 class="mt-3">Unread</h5>
                    <p class="text-lg h2 font-weight-normal text-primary"><span style="font-size:3rem" class="material-icons">mark_email_unread</span></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-1">
    <div class="container">
        <h3 class="text-center fw-bolder">Welcome to <?= $_settings->info('name') ?></h3>
        <hr>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sed dui mollis, blandit lorem eu, ullamcorper urna. Curabitur iaculis molestie malesuada. Praesent ipsum neque, mollis in elit in, pellentesque ornare quam. Vivamus fermentum est urna, non ullamcorper lorem fringilla nec. Integer arcu dolor, lacinia sit amet lectus in, tempor egestas nisl. Aliquam erat volutpat. In cursus eros quis elementum vulputate. Integer consectetur risus vel rhoncus cursus.
<br>
<br>
Quisque cursus libero sem, vitae commodo elit efficitur nec. Donec metus odio, posuere sit amet bibendum ac, malesuada id ipsum. Nullam rhoncus eros ut nisl fermentum, sit amet bibendum justo varius. Donec ante est, vehicula vitae mattis ac, fermentum ut nibh. Integer eu consectetur quam. Sed sed velit at enim eleifend blandit vitae ac ligula. Pellentesque convallis auctor tempus. Curabitur laoreet, lectus ac congue posuere, orci odio condimentum tortor, et pharetra quam nisi quis purus. Nulla et orci est. Maecenas facilisis, dolor sed aliquet sollicitudin, mauris lacus ultrices urna, eget posuere lorem urna non risus. Curabitur gravida turpis eget orci sollicitudin varius. Fusce tempus odio vel accumsan laoreet. Quisque odio odio, porttitor et sapien nec, malesuada pretium sapien.
<br>
<br>

Phasellus feugiat euismod ornare. Cras eget sagittis dui, eget luctus nunc. Aenean euismod enim nec convallis convallis. Sed ultricies, nisi eu euismod finibus, elit odio imperdiet libero, non lobortis purus odio quis nibh. Ut fermentum non augue id tristique. Pellentesque scelerisque orci vel convallis dignissim. Cras scelerisque posuere congue. Quisque in urna eu dui eleifend pharetra et vitae mi. Cras volutpat dignissim venenatis. Morbi eu eleifend urna. Maecenas blandit quis tortor sit amet facilisis. Integer facilisis venenatis dapibus. Cras sollicitudin, nibh vel blandit venenatis, nibh eros ultrices lacus, ut viverra lectus justo vel ipsum.


</div>
</section>