<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 page-content">
    <div class="container">
        
        <h3 class="welcome-text"><?php echo $title; ?></h3>
        <p class="green-text darken-2"><?php echo $success; ?></p>
        <p class="red-text darken-2"><?php echo $error; ?></p>

        <form action="<?php echo site_url("create-horoscope-exe"); ?>" method="post">
            
            
            <div class="mb-3">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control">
            </div>
            <div class="mb-3">
                <label for="date">Date</label>
                <input type="text" name="date" id="date" class="form-control datepicker">
            </div>
            <?php
                $astroSigns = array(
                    "aries",
                    "taurus",
                    "gemini",
                    "cancer",
                    "leo",
                    "virgo",
                    "libra",
                    "scorpio",
                    "sagittarius",
                    "capricorn",
                    "aquarius",
                    "pisces"
                );
            ?>
            <?php foreach($astroSigns as $astroSign): ?>
            <div class="mb-3">
                <label for="<?php echo $astroSign; ?>"><?php echo ucfirst($astroSign); ?></label>
                <textarea name="<?php echo $astroSign; ?>" id="<?php echo $astroSign; ?>" class="materialize-textarea"></textarea>
            </div>
            <?php endforeach; ?>
            <br>
            <button type="submit" class="btn btn-success">Add Horoscope</button>
            
        </form>

    </div>
</div>

<style>
.page-content{
    padding-bottom: 5%;
}
</style>