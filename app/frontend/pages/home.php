<div class="container text-center">
    <div class="form-group">
        <form method="get" action="<?php echo URL::home_url() . 'seo-checker.php'; ?>">
            <div id="url" class="w-50 m-auto my-2">
                <label for="urlInput" class="">URL: </label>
                <input type="text" name="url" id="urlInput" class="form-control w-75 d-inline-block" >
            </div>
            <div id="submit" class="my-2">
                <input type="submit" id="submitBtn" class="btn btn-primary" >
            </div>
        </form>
    </div>
</div>