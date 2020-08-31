<?php if(count($errors2) > 0): ?>
    <div class="errorone">
        <?php foreach ($errors2 as $error): ?>
            <p><?php echo $error?></p>
        <?php endforeach ?>      
    </div>  
<?php endif ?>            