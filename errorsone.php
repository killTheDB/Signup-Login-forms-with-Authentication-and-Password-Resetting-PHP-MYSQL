<?php if(count($errors1) > 0): ?>
    <div class="errorone">
        <?php foreach ($errors1 as $error): ?>
            <p><?php echo $error?></p>
        <?php endforeach ?>      
    </div>  
<?php endif ?>            