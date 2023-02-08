<h1> News Settings </h1>
<form method='post' action='<?php echo admin_url('edit.php?post_type=news&page=news-settings') ?>'>
    <?php wp_nonce_field('news-settings-save', 'new_settings_nonce'); ?>
    <table class="form-table" role="presentation">
        <tbody>
            <tr>
                <th scope="row"><label for="relatednewsname">Related News Title</label></th>
                <td><input name="relatednewsname" type="text" id="blogname" value="Related News" class="regular-text"></td>
            </tr>
            <tr>
                <td><p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"></p></td>
            </tr>
        </tbody>
    </table>
</form>