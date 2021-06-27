<div class="container-fluid">
    <div class="offset-2 mt-5">
        <div class="accordion" id="accordionExample">
            <?php $index = 1; ?>
            <?php foreach($messages as $message) : ?>
            <div class="accordion-item mb-4 login-form">
                <h2 class="accordion-header" id="heading<?php echo $index; ?>">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse<?php echo $index; ?>" aria-expanded="false"
                        aria-controls="collapse<?php echo $index; ?>">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col text-start">Message <?php echo $index; ?></div>
                                <div class="col text-end">Submitted
                                    <?php echo date('d/m/Y', strtotime($message['created_at'])); ?></div>
                            </div>
                        </div>
                    </button>
                </h2>
                <div id="collapse<?php echo $index; ?>" class="accordion-collapse collapse"
                    aria-labelledby="heading<?php echo $index; ?>" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="container">
                            <div class="row mb-2">
                                <div class="col me-3">USER</div>
                                <div class="col">Message</div>

                            </div>
                            <div class="row mx-3">
                                <div class="col me-2 login-form">
                                    <p>Name: <?php echo $user['firstname']; ?><br>Last name: <?php echo $user['lastname']; ?><br>email: <?php echo $user['email']; ?></p>
                                </div>
                                <div class="col login-form">
                                    <p><?php echo $message['message']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $index++; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>