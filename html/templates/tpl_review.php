<?php

function draw_review()
{ ?>
    <div class="container p-0 mb-5">
        <div class="row">
            <div class="col-4 d-flex flex-row justify-content-center">
                <div class="d-flex flex-column align-items-center">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTn9doOawyILir4RkSAH7LpWutreyCG1FlG4Vak3xamlUCkcG9L" alt="" style="max-width: 100px">
                    <h5>Name</h5>
                </div>
                <div class="d-flex flex-column align-items-center justify-content-start px-3 border-right border-dark">
                    <div class="d-flex flex-row align-items-center py-2">
                        4/5 <i class="material-icons pl-1" style="color: gold;">star</i>
                    </div>
                    12/05/2019
                    <a href="" class="py-2">Report Review</a>
                </div>
            </div>
            <div class="col-8">
                <h4>Header</h4>
                <p>Praesent vitae urna et odio ullamcorper finibus. Nunc dictum malesuada velit, eu molestie ligula. Phasellus ante diam, tempus sed lobortis eu, sollicitudin vel orci. Morbi interdum aliquam bibendum. Sed dapibus risus sit amet viverra aliquam. Suspendisse aliquam odio porttitor sem bibendum, a tempor massa pretium. Etiam eget accumsan magna. Donec euismod neque et metus aliquet sodales. Pellentesque sed enim ut elit maximus fringilla.</p>
                <p>In a pretium mi. Nam mattis laoreet arcu, sit amet bibendum orci mollis vel. Vestibulum pulvinar enim tortor, et fringilla est aliquam in. Fusce nec nulla consequat, rhoncus nisi et, pellentesque sapien. Praesent pulvinar ut lorem eu tristique. Vivamus sit amet lacus sed ante finibus consequat. Donec ac fringilla lectus. Mauris facilisis erat velit, et suscipit eros egestas eget. Vestibulum vel orci in lacus sollicitudin posuere. Maecenas quis congue leo. Nullam ultricies, odio a vehicula sollicitudin, augue nunc commodo libero, vel feugiat tellus lorem non purus. Nam ultricies consectetur purus, vel varius leo viverra eget. </p>
            </div>
        </div>
    </div>

<?php
}


function draw_review_popup()
{
?>
    <div class="d-flex flex-column border rounded border-secondary bg-light w-25 mx-auto">
        <div class="px-2">
            <button type="button" class="close" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="d-flex flex-column align-items-center justify-content-around px-4 pb-3">
            <h4>Black Ink</h4>
            <div class="d-flex flex-row justify-content-start mt-2 w-100">
                <h5>Rating</h5>
                <div class="d-flex flex-row px-3">
                    <i class="material-icons" style="color: gold;">star_outline</i>
                    <i class="material-icons" style="color: gold;">star_outline</i>
                    <i class="material-icons" style="color: gold;">star_outline</i>
                    <i class="material-icons" style="color: gold;">star_outline</i>
                    <i class="material-icons" style="color: gold;">star_outline</i>
                </div>
            </div>
            <input class="form-control m-1" type="text" placeholder="Subject">
            <textarea class="form-control m-1" rows="3" placeholder="Tell us what you think"></textarea>
            <button type="button" class="btn btn-primary w-50 mt-2">Submit</button>
        </div>
    </div>
<?php
}
?>