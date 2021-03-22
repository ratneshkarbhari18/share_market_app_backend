<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <h3 class="welcome-text"><?php echo $title; ?></h3>
        <p class="green-text darken-3"><?php echo $success; ?></p>
        <p class="red-text darken-3"><?php echo $error; ?></p>


        
        <?php if(count($messages)>0): ?>

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
                    <?php foreach($messages as $message): ?>
                    <tr>
                        <td><?php echo $message['first_name'].' '.$message["last_name"]; ?></td>
                        <td><?php echo $message['contact_number']; ?></td>
                        <td><?php echo $message['message']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <?php else: ?>

        <h6>No messages Added</h6>

        <?php endif; ?>`
        
    </div>
</main>