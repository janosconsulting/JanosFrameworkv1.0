<?php echo view::show('standard/default/header');?>
 <div class="page secondary">
        <div class="page-header">
            <div class="page-header-content">
                <h1><?php echo $titulo;?><small><?php echo $subtitulo;?></small></h1>
                <a href="/" class="back-button big page-back"></a>
            </div>
        </div>

        <div class="page-region">
            <div class="page-region-content">
                <div class="grid">
                    <div class="row">
                        <div class="span10">
                           
                           <?php echo $pagemaincontent;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php echo view::show('standard/default/footer');?>

