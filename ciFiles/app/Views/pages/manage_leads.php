<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <h3 class="welcome-text"><?php echo $title; ?></h3>
        <p class="green-text darken-3"><?php echo $success; ?></p>
        <p class="red-text darken-3"><?php echo $error; ?></p>


        
        <?php if(count($leads)>0): ?>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <td style="font-size: 1.2rem; font-weight: 500;">Name</td>
                        <td style="font-size: 1.2rem; font-weight: 500;">Contact Number</td>
                        <td style="font-size: 1.2rem; font-weight: 500;">Service</td>
                        <td>Birth Info</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($leads as $lead): ?>
                    <tr>
                        <td><?php echo $lead['name']; ?></td>
                        <td><?php echo $lead['contact_number']; ?></td>
                        <td><?php echo $lead['service']; ?></td>
                        <td>
                            <?php echo "Birth Date: ".$lead['birth_date'].'<br>'; ?>
                            <?php echo "Birth Month: ".$lead['birth_month'].'<br>'; ?>
                            <?php echo "Birth Year: ".$lead['birth_year'].'<br>'; ?>
                            <?php echo "Birth Hour: ".$lead['birth_hour'].'<br>'; ?>
                            <?php echo "Birth Minute: ".$lead['birth_minute'].'<br>'; ?>
                            <?php echo "Birth Second: ".$lead['birth_second'].'<br>'; ?>
                            <?php echo "Birth Place: ".$lead['birth_place'].'<br>'; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <?php else: ?>

        <h6>No Leads Added</h6>

        <?php endif; ?>`
        
    </div>
</main>