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
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addQuestionModal">
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
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Add Question</button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="mx-auto my-2">

          <div class="d-flex justify-content-between align-items-start flex-wrap">
            <h3>Lorem ipsum dolor sit amet?</h3>
            <div>
              <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#editQuestion1Modal">
                Edit
              </button>
              <div class="modal fade" id="editQuestion1Modal" tabindex="-1" role="dialog" aria-labelledby="question1Modal" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="question1Modal">Edit Frequently Asked Question</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form>
                        <div class="form-group">
                          <label for="question1Title">Question</label>
                          <input type="text" class="form-control" id="question1Title" value="Lorem ipsum dolor sit amet?" placeholder="Write question here...">
                        </div>
                        <div class="form-group">
                          <label for="question1Answer">Answer</label>
                          <textarea class="form-control" id="question1Answer" rows="5" placeholder="Write answer here...">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus viverra dui libero, a venenatis justo fermentum at. Cras id tellus quis ex aliquam egestas. Pellentesque vel erat vitae libero semper consectetur. Mauris ligula ante, aliquet interdum lobortis non, elementum non dolor. Vestibulum sodales pulvinar pellentesque. Sed eget volutpat metus, non vulputate nulla. Nulla in elit quam. Donec pulvinar, felis hendrerit molestie volutpat, lectus risus luctus ipsum, ut suscipit nibh dolor eu arcu. Ut efficitur commodo fermentum. Sed et laoreet diam, vel mattis diam.</textarea>
                        </div>
                        <div class="form-group">
                          <label for="question1Number">Question number:</label>
                          <select class="form-control" id="question1Number">
                            <option selected>1</option>
                            <option>2</option>
                            <option>3</option>
                          </select>
                        </div>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Add Question</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="text-justify">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus viverra dui libero, a venenatis justo fermentum at. Cras id tellus quis ex aliquam egestas. Pellentesque vel erat vitae libero semper consectetur. Mauris ligula ante, aliquet interdum lobortis non, elementum non dolor. Vestibulum sodales pulvinar pellentesque. Sed eget volutpat metus, non vulputate nulla. Nulla in elit quam. Donec pulvinar, felis hendrerit molestie volutpat, lectus risus luctus ipsum, ut suscipit nibh dolor eu arcu. Ut efficitur commodo fermentum. Sed et laoreet diam, vel mattis diam.
            </p>
            <p>
              Sed vitae mattis magna. Maecenas tortor libero, maximus sit amet dictum nec, venenatis nec nulla. Nunc eu dapibus eros, ut iaculis justo. Integer auctor condimentum massa, eget aliquam eros dictum ut. Donec ac vestibulum orci. Donec et sodales nulla. In mauris massa, condimentum ut tellus ornare, aliquet luctus sapien. Cras id sagittis turpis. Quisque sed porta libero. Quisque vitae orci fringilla, porta justo in, sollicitudin sem. Donec sit amet finibus lectus. Nulla tincidunt sit amet tortor et venenatis. Ut tincidunt magna a convallis ornare. Cras porttitor dolor at turpis congue, eu cursus nisl fringilla. Curabitur a eleifend dui, commodo ornare quam.
            </p>
            <p>
              Maecenas pulvinar purus id mauris lacinia euismod. Morbi pretium cursus nulla, sed volutpat urna. Sed efficitur arcu et nibh accumsan, ac faucibus neque feugiat. Phasellus id eros finibus, tincidunt quam et, blandit magna. Curabitur quis mollis mauris. Sed faucibus nulla risus, at volutpat ligula maximus a. Sed tellus tellus, mollis quis justo quis, porttitor scelerisque metus. Praesent enim est, posuere nec sodales ut, placerat id arcu. Praesent iaculis vulputate quam, egestas porttitor eros bibendum vel. Integer semper enim ligula, quis fermentum augue iaculis vitae. Donec gravida et erat eget eleifend. Morbi sagittis dapibus tempus. Nulla gravida massa varius pellentesque ultricies. Suspendisse orci erat, maximus vulputate laoreet eget, lacinia eget lacus. Donec congue feugiat sapien in tincidunt.
            </p>
          </div>

          <div class="d-flex justify-content-between align-items-start flex-wrap">
            <h3>Lorem ipsum dolor sit amet?</h3>
            <div>
              <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#editQuestion2Modal">
                Edit
              </button>
              <div class="modal fade" id="editQuestion2Modal" tabindex="-1" role="dialog" aria-labelledby="question2Modal" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="question2Modal">Edit Frequently Asked Question</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form>
                        <div class="form-group">
                          <label for="question2Title">Question</label>
                          <input type="text" class="form-control" id="question2Title" value="Lorem ipsum dolor sit amet?" placeholder="Write question here...">
                        </div>
                        <div class="form-group">
                          <label for="question2Answer">Answer</label>
                          <textarea class="form-control" id="question2Answer" rows="5" placeholder="Write answer here...">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus viverra dui libero, a venenatis justo fermentum at. Cras id tellus quis ex aliquam egestas. Pellentesque vel erat vitae libero semper consectetur. Mauris ligula ante, aliquet interdum lobortis non, elementum non dolor. Vestibulum sodales pulvinar pellentesque. Sed eget volutpat metus, non vulputate nulla. Nulla in elit quam. Donec pulvinar, felis hendrerit molestie volutpat, lectus risus luctus ipsum, ut suscipit nibh dolor eu arcu. Ut efficitur commodo fermentum. Sed et laoreet diam, vel mattis diam.</textarea>
                        </div>
                        <div class="form-group">
                          <label for="question2Number">Question number:</label>
                          <select class="form-control" id="question2Number">
                            <option>1</option>
                            <option selected>2</option>
                            <option>3</option>
                          </select>
                        </div>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Add Question</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="text-justify">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus viverra dui libero, a venenatis justo fermentum at. Cras id tellus quis ex aliquam egestas. Pellentesque vel erat vitae libero semper consectetur. Mauris ligula ante, aliquet interdum lobortis non, elementum non dolor. Vestibulum sodales pulvinar pellentesque. Sed eget volutpat metus, non vulputate nulla. Nulla in elit quam. Donec pulvinar, felis hendrerit molestie volutpat, lectus risus luctus ipsum, ut suscipit nibh dolor eu arcu. Ut efficitur commodo fermentum. Sed et laoreet diam, vel mattis diam.
            </p>
            <p>
              Sed vitae mattis magna. Maecenas tortor libero, maximus sit amet dictum nec, venenatis nec nulla. Nunc eu dapibus eros, ut iaculis justo. Integer auctor condimentum massa, eget aliquam eros dictum ut. Donec ac vestibulum orci. Donec et sodales nulla. In mauris massa, condimentum ut tellus ornare, aliquet luctus sapien. Cras id sagittis turpis. Quisque sed porta libero. Quisque vitae orci fringilla, porta justo in, sollicitudin sem. Donec sit amet finibus lectus. Nulla tincidunt sit amet tortor et venenatis. Ut tincidunt magna a convallis ornare. Cras porttitor dolor at turpis congue, eu cursus nisl fringilla. Curabitur a eleifend dui, commodo ornare quam.
            </p>
            <p>
              Maecenas pulvinar purus id mauris lacinia euismod. Morbi pretium cursus nulla, sed volutpat urna. Sed efficitur arcu et nibh accumsan, ac faucibus neque feugiat. Phasellus id eros finibus, tincidunt quam et, blandit magna. Curabitur quis mollis mauris. Sed faucibus nulla risus, at volutpat ligula maximus a. Sed tellus tellus, mollis quis justo quis, porttitor scelerisque metus. Praesent enim est, posuere nec sodales ut, placerat id arcu. Praesent iaculis vulputate quam, egestas porttitor eros bibendum vel. Integer semper enim ligula, quis fermentum augue iaculis vitae. Donec gravida et erat eget eleifend. Morbi sagittis dapibus tempus. Nulla gravida massa varius pellentesque ultricies. Suspendisse orci erat, maximus vulputate laoreet eget, lacinia eget lacus. Donec congue feugiat sapien in tincidunt.
            </p>
          </div>

          <div class="d-flex justify-content-between align-items-start flex-wrap">
            <h3>Lorem ipsum dolor sit amet?</h3>
            <div>
              <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#editQuestion3Modal">
                Edit
              </button>
              <div class="modal fade" id="editQuestion3Modal" tabindex="-1" role="dialog" aria-labelledby="question3Modal" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="question3Modal">Edit Frequently Asked Question</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form>
                        <div class="form-group">
                          <label for="question3Title">Question</label>
                          <input type="text" class="form-control" id="question3Title" value="Lorem ipsum dolor sit amet?" placeholder="Write question here...">
                        </div>
                        <div class="form-group">
                          <label for="question3Answer">Answer</label>
                          <textarea class="form-control" id="question3Answer" rows="5" placeholder="Write answer here...">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus viverra dui libero, a venenatis justo fermentum at. Cras id tellus quis ex aliquam egestas. Pellentesque vel erat vitae libero semper consectetur. Mauris ligula ante, aliquet interdum lobortis non, elementum non dolor. Vestibulum sodales pulvinar pellentesque. Sed eget volutpat metus, non vulputate nulla. Nulla in elit quam. Donec pulvinar, felis hendrerit molestie volutpat, lectus risus luctus ipsum, ut suscipit nibh dolor eu arcu. Ut efficitur commodo fermentum. Sed et laoreet diam, vel mattis diam.</textarea>
                        </div>
                        <div class="form-group">
                          <label for="question3Number">Question number:</label>
                          <select class="form-control" id="question3Number">
                            <option>1</option>
                            <option selected>2</option>
                            <option>3</option>
                          </select>
                        </div>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Add Question</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="text-justify">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus viverra dui libero, a venenatis justo fermentum at. Cras id tellus quis ex aliquam egestas. Pellentesque vel erat vitae libero semper consectetur. Mauris ligula ante, aliquet interdum lobortis non, elementum non dolor. Vestibulum sodales pulvinar pellentesque. Sed eget volutpat metus, non vulputate nulla. Nulla in elit quam. Donec pulvinar, felis hendrerit molestie volutpat, lectus risus luctus ipsum, ut suscipit nibh dolor eu arcu. Ut efficitur commodo fermentum. Sed et laoreet diam, vel mattis diam.
            </p>
            <p>
              Sed vitae mattis magna. Maecenas tortor libero, maximus sit amet dictum nec, venenatis nec nulla. Nunc eu dapibus eros, ut iaculis justo. Integer auctor condimentum massa, eget aliquam eros dictum ut. Donec ac vestibulum orci. Donec et sodales nulla. In mauris massa, condimentum ut tellus ornare, aliquet luctus sapien. Cras id sagittis turpis. Quisque sed porta libero. Quisque vitae orci fringilla, porta justo in, sollicitudin sem. Donec sit amet finibus lectus. Nulla tincidunt sit amet tortor et venenatis. Ut tincidunt magna a convallis ornare. Cras porttitor dolor at turpis congue, eu cursus nisl fringilla. Curabitur a eleifend dui, commodo ornare quam.
            </p>
            <p>
              Maecenas pulvinar purus id mauris lacinia euismod. Morbi pretium cursus nulla, sed volutpat urna. Sed efficitur arcu et nibh accumsan, ac faucibus neque feugiat. Phasellus id eros finibus, tincidunt quam et, blandit magna. Curabitur quis mollis mauris. Sed faucibus nulla risus, at volutpat ligula maximus a. Sed tellus tellus, mollis quis justo quis, porttitor scelerisque metus. Praesent enim est, posuere nec sodales ut, placerat id arcu. Praesent iaculis vulputate quam, egestas porttitor eros bibendum vel. Integer semper enim ligula, quis fermentum augue iaculis vitae. Donec gravida et erat eget eleifend. Morbi sagittis dapibus tempus. Nulla gravida massa varius pellentesque ultricies. Suspendisse orci erat, maximus vulputate laoreet eget, lacinia eget lacus. Donec congue feugiat sapien in tincidunt.
            </p>
          </div>

        </div>
      </div>


  </div>
</div>

<?php
  draw_footer();
?>