<div class="featured-slider">
    <div class="flexslider">
        <ul class="slides">
        <?php
         foreach($data_slide->result() as $slide):
     ?>
            <li style="background-image: url('<?php echo base_url() ?>resources/images/slider/<?php echo $slide->foto ?>')">
                <div class="flex-caption">
                    <h2 class="animated fadeInRight"><span><?php echo $slide->caption ?></span></h2>
                </div>
            </li>
            <?php
             endforeach;
            ?>
        </ul>
    </div>
   </div>