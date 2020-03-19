<?php
include_once("../templates/tpl_admin.php");

draw_header();
draw_navbar();
?>

<div class="container-fluid">
  <div class="row">

    <?php draw_sidebar("faq") ?>

    <main class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="container">

        <div class="mb-4 d-flex justify-content-between align-items-center flex-wrap border-bottom mt-2">
          <h1>Frequently Asked Questions</h1>
          <button type="button" class="btn button" data-toggle="modal" data-target="#addQuestionModal">
            Add Question
          </button>
          <!-- Modal -->
          <div class="modal fade" id="addQuestionModal" tabindex="-1" role="dialog" aria-labelledby="question0Modal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="question0Modal">Add Frequently Asked Question</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form>
                    <div class="form-group">
                      <label for="questionTitle">Question</label>
                      <input type="text" class="form-control" id="questionTitle" placeholder="Write question here...">
                    </div>
                    <div class="form-group">
                      <label for="questionAnswer">Answer</label>
                      <textarea class="form-control" id="questionAnswer" rows="5" placeholder="Write answer here..."></textarea>
                    </div>
                    <div class="form-group">
                      <label for="questionNumber">Question number:</label>
                      <select class="form-control" id="questionNumber">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option selected>4</option>
                      </select>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-link a_link" data-dismiss="modal">Close</button>
                  <button type="button" class="btn button">Add Question</button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="mx-auto my-2">

          <?php
          $questions = array(
            array(
              "id" => 3,
              "question" => "Lorem ipsum dolor sit?",
              "answer" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus viverra dui libero, a venenatis justo fermentum at. Cras id tellus quis ex aliquam egestas. Pellentesque vel erat vitae libero semper consectetur. Mauris ligula ante, aliquet interdum lobortis non, elementum non dolor. Vestibulum sodales pulvinar pellentesque. Sed eget volutpat metus, non vulputate nulla. Nulla in elit quam. Donec pulvinar, felis hendrerit molestie volutpat, lectus risus luctus ipsum, ut suscipit nibh dolor eu arcu. Ut efficitur commodo fermentum. Sed et laoreet diam, vel mattis diam.",
              "number" => 3
            ),
            array(
              "id" => 2,
              "question" => "Lorem ipsum dolor sit amet?",
              "answer" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus viverra dui libero, a venenatis justo fermentum at. Cras id tellus quis ex aliquam egestas. Pellentesque vel erat vitae libero semper consectetur. Mauris ligula ante, aliquet interdum lobortis non, elementum non dolor. Vestibulum sodales pulvinar pellentesque. Sed eget volutpat metus, non vulputate nulla. Nulla in elit quam. Donec pulvinar, felis hendrerit molestie volutpat, lectus risus luctus ipsum, ut suscipit nibh dolor eu arcu. Ut efficitur commodo fermentum. Sed et laoreet diam, vel mattis diam.",
              "number" => 2
            ),
            array(
              "id" => 1,
              "question" => "Lorem ipsum dolor?",
              "answer" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus viverra dui libero, a venenatis justo fermentum at. Cras id tellus quis ex aliquam egestas. Pellentesque vel erat vitae libero semper consectetur. Mauris ligula ante, aliquet interdum lobortis non, elementum non dolor. Vestibulum sodales pulvinar pellentesque. Sed eget volutpat metus, non vulputate nulla. Nulla in elit quam. Donec pulvinar, felis hendrerit molestie volutpat, lectus risus luctus ipsum, ut suscipit nibh dolor eu arcu. Ut efficitur commodo fermentum. Sed et laoreet diam, vel mattis diam.",
              "number" => 1
            ),
          );

          foreach ($questions as $question) {
            draw_faq_row($question);
          }
          ?>
        </div>
      </div>
    </main>
  </div>
</div>

<?php
draw_footer();
?>