<ul class="list-unstyled">
    <?php if (count($favourites) > 0) {
    foreach ($favourites as $favourite) { ?>
        <form method="post" action="{{url('/college/edit')}}" id="modalForm">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <input type="hidden" name="_method" value="POST">
            <li><h3><button type="button" class="btn btn-link collegeModal" data-toggle="modal" data-target="#myModal" data-id="{{$favourite->college_id}}" >{{$favourite->college->name}}</button></h3>
            </li>
        </form>
    <?php }
    } ?>
</ul>