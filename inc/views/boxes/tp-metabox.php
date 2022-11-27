<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!!' ); ?>
<input type="hidden" name="your_meta_box_nonce"
       value="<?php echo wp_create_nonce( basename( __FILE__ ) ); ?>">
<p>
    <label for="source-data">Textarea</label>
    <br>
    <textarea name="source-data" id="source-data" rows="10" cols="10"
              style="width:500px;"><?php echo $meta; ?></textarea>
</p>