<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 page-content">
    <div class="container">
        
        <h3 class="welcome-text"><?php echo $title; ?></h3>
        <p class="green-text darken-2"><?php echo $success; ?></p>
        <p class="red-text darken-2"><?php echo $error; ?></p>

        <form action="<?php echo site_url("create-notification-exe"); ?>" method="post">
            
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="mb-3">
                <label for="current_price">Current Price</label>
                <input type="text" name="current_price" id="current_price" class="form-control">
            </div>
            <div class="mb-3">
                <label for="buy_price">Buy Price</label>
                <input type="text" name="buy_price" id="buy_price" class="form-control">
            </div>
            <div class="mb-3">
                <label for="stop_loss">Stop Loss</label>
                <input type="text" name="stop_loss" id="stop_loss" class="form-control">
            </div>

            <br>
            <button type="submit" class="btn btn-success">Add Notification</button>
            
        </form>

    </div>
</div>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'body' );
</script>