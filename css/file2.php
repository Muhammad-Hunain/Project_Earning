<div class="col-md-6 col-sm-8 my-5  ">
                <div class="col-md-8 card-parent  ">DisplayPunycode
                    <img class="card-2" id="imgPunny" src="assests/<?php echo empty($_FILES['img']['name'])  ? 'user.jpg' :  $_FILES['img']['name'];?>" style="width:100px;height:100px" alt="Nothing">
                    <?php
                    if (isset($row['DisplayPunycode']) || isset($row['Year'])) {
                    ?>
                        <span class=" col-4 px-4 py-2 my-1  data "><?php echo $row['DisplayPunycode'] ?></span>
                        <span class=" col-4 px-4 py-2    data-1 "><?php echo $row['Year'] ?></span>
                <?php 
                 
                    }
                ?>
                    </div>
            </div>

       