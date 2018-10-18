

<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">choose picture</button>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <?php foreach ($media as $media){
                    echo "<img data-id = \"$media->id\" class=\"img\" src=".'/uploads/'.$media->unique_name ." style=\"height: 100px;cursor: pointer\" >";
                }?>
            </div>
            <div class="modal-footer">
                <button id="closeButton" type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
            </div>
        </div>

    </div>
</div>
