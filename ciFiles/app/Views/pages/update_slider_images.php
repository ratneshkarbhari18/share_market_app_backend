<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <h3 class="welcome-text"><?php echo $title; ?></h3>
        <p class="green-text darken-3"><?php echo $success; ?></p>
        <p class="red-text darken-3"><?php echo $error; ?></p>


        <form method="POST" action="<?php echo site_url("upload-slider-image"); ?>" enctype="multipart/form-data">
            <div class="file-field input-field">
            <div class="btn">
                <span>Upload Slider Image</span>
                <input type="file" name="slider_image">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text" placeholder="Upload Slider Image">
            </div>
            </div>
            <button type="submit" class="btn">Upload</button>
        </form>

        <br><br><br>
        
        <div class="row">
        
        <?php if(count($slider_images)>0): foreach($slider_images as $slider_image): ?>

            <div class="col  l4 m12 s12">

                <img src="<?php echo site_url("assets/images/slider/".$slider_image["name"]); ?>" style="width: 100%;">
                <br>
                <form action="<?php echo site_url("delete-slider-image"); ?>" method="post">
                    <input type="hidden" name="id" value="<?php echo $slider_image["id"]; ?>">
                    <button type="submit" class="btn btn-danger">delete</button>
                </form>

            </div>
            

        <?php endforeach; else: ?>

        </div>

        <h6>No Images Added</h6>

        <?php endif; ?>`
        
    </div>
</main>