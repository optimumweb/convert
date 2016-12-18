<form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
    <div class="container">
        <div class="grid_9">
            <input type="text" value="" name="s" id="s" placeholder="<?php _e('Search', 'wpbp'); ?>">
        </div>
        <div class="grid_3">
            <input type="submit" id="searchsubmit" value="&#xf002;" class="button button-block">
        </div>
    </div>
</form>