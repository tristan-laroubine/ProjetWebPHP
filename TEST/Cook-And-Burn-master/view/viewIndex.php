<?php
$this->_t = 'Cook And Burn';
?>
    <div class="banner-info">
        <h2>Bienvenu sur Cook And Burn !</h2>
        <p>BLABLABLA</p>
    </div>
    <div class="banner-grads">
        <div class="col-md-4 banner-grad">
            <div class="banner-grad-img">
                <img src="images/b1.jpg" alt="" />
                <h4>Suspendisse</h4>
            </div>
        </div>
        <div class="col-md-4 banner-grad">
            <div class="banner-grad-img">
                <img src="images/b2.jpg" alt="" />
                <h4>Molestie</h4>
            </div>
        </div>
        <div class="col-md-4 banner-grad">
            <div class="banner-grad-img">
                <img src="images/b3.jpg" alt="" />
                <h4>Imperdiet</h4>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
    </div>
</div>
</div>

    <div class="special">
        <div class="container">
            <div class="special-heading">
                <h3>Les recettes avec le plus de burns !!!</h3>
            </div>
<?php
foreach($recette as $rec) :?>

            <div class="w3ls-menu-grids">
                <div class="menu-top-grids agileinfo">
                    <div class="col-md-3 menu-grid">
                        <div class="agile-menu-grid">
                            <a href="single.html">
                                <img src="images/<?php echo $rec->getTitre();?>.jpg" alt="" />
                                <div class="agileits-caption">
                                    <h4><?php echo $rec->getTitre();?> </h4>
                                    <p>$18</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>

            </div>



<?php endforeach; ?>
        </div>
    </div>




