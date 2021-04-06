<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <h3 class="welcome-text"><?php echo $title; ?></h3>
        <p class="green-text darken-3"><?php echo $success; ?></p>
        <p class="red-text darken-3"><?php echo $error; ?></p>

        <a href="<?php echo site_url("add-new-horoscope"); ?>" class="btn">+ horoscope</a>
        <br><br>
        
        <?php if(count($horoscopes)>0): ?>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <td style="font-size: 1.2rem; font-weight: 500;">Title</td>
                        <td style="font-size: 1.2rem; font-weight: 500;">Date</td>
                        <td style="font-size: 1.2rem; font-weight: 500;">Horoscopes</td>
                        <td style="font-size: 1.2rem; font-weight: 500;">Actions</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($horoscopes as $horoscope): ?>
                    <tr>
                        <td><?php echo $horoscope['title']; ?></td>
                        <td><?php echo $horoscope['date']; ?></td>
                        <td><?php foreach($horoscopes as $horoscope): ?>
                            <p><?php echo($horoscope['horoscopes']); ?></p>
                            <?php endforeach; ?>
                        </td>
                        <td>
                            <form action="<?php echo site_url('delete-horoscope-exe'); ?>" style="display: inline;" method="post">
                                <input type="hidden" name="id" value="<?php echo $horoscope['id']; ?>">
                                <button type="submit" class="btn red">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    
                </tbody>
            </table>
        </div>

        <?php else: ?>

        <h6>No Horoscope Added</h6>

        <?php endif; ?>`
        
    </div>
</main>