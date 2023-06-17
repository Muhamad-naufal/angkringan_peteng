<form action="?" method="get" class="form-inline">
    <div class="input-group ml-auto">
        <input type="text" name="search" class="form-control" placeholder="Search" values="<?php= request()->search ?> ?>">
        <div class="input-group-append">
            <button class="btn btn-outline-light border" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>
</form>
