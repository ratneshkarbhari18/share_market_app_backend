<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <h3 class="welcome-text"><?php echo $title; ?></h3>
        <p class="green-text darken-3"><?php echo $success; ?></p>
        <p class="red-text darken-3"><?php echo $error; ?></p>

        <a href="<?php echo site_url("add-new-subscriber"); ?>" class="btn btn-success">+ Subscriber</a>
        <br><br>
        
        <?php if(count($subscribers)>0): ?>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <td style="font-size: 1.2rem; font-weight: 500;">Name</td>
                        <td style="font-size: 1.2rem; font-weight: 500;">Email</td>
                        <td style="font-size: 1.2rem; font-weight: 500;">Actions</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($subscribers as $subscriber): ?>
                    <tr>
                        <td><?php echo $subscriber['first_name'].' '.$subscriber["last_name"]; ?></td>
                        <td><?php echo $subscriber['email']; ?></td>
                        <td>
                            <form action="<?php echo site_url('deactivate-subscriber-exe'); ?>" style="display: inline;" method="post">
                                <input type="hidden" name="id" value="<?php echo $subscriber['id']; ?>">
                                <button type="submit" class="btn"><?php if ($subscriber['status']=="active") {
                                    echo "Disable";
                                } else {
                                    echo "Activate";
                                }
                                 ?></button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <?php else: ?>

        <h6>No subscribers Added</h6>

        <?php endif; ?>`
        
    </div>
</main>