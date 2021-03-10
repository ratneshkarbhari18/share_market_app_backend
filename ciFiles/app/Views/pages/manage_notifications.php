<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <h3 class="welcome-text"><?php echo $title; ?></h3>
        <p class="green-text darken-3"><?php echo $success; ?></p>
        <p class="red-text darken-3"><?php echo $error; ?></p>

        <a href="<?php echo site_url("add-new-notification"); ?>" class="btn">+ notification</a>
        <br><br>
        
        <?php if(count($notifications)>0): ?>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <td style="font-size: 1.2rem; font-weight: 500;">Name</td>
                        <td style="font-size: 1.2rem; font-weight: 500;">Current Price</td>
                        <td style="font-size: 1.2rem; font-weight: 500;">Buy Price</td>
                        <td style="font-size: 1.2rem; font-weight: 500;">Stop Loss</td>
                        <td style="font-size: 1.2rem; font-weight: 500;">Actions</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($notifications as $notification): ?>
                    <tr>
                        <td><?php echo $notification['name']; ?></td>
                        <td><?php echo $notification['market_price']; ?></td>
                        <td><?php echo $notification['buy_price']; ?></td>
                        <td><?php echo $notification['stop_loss']; ?></td>
                        <td>
                            <form action="<?php echo site_url('delete-notification-exe'); ?>" style="display: inline;" method="post">
                                <input type="hidden" name="id" value="<?php echo $notification['id']; ?>">
                                <button type="submit" class="btn red">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <?php else: ?>

        <h6>No notifications Added</h6>

        <?php endif; ?>`
        
    </div>
</main>