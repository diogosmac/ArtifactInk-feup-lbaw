<?php
include_once("../templates/tpl_admin.php");

draw_header();
draw_navbar();
?>

<div class="container-fluid">
  <div class="row">

    <?php draw_sidebar("") ?>

    <main class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="container">

        <div class="mb-4 border-bottom mt-2">
          <h1>Support Messaging</h1>
        </div>

        <div class="row my-3">

          <!-- Adress Cards -->
          <div class="col-md-4 px-1">
            <div class="chat-address">

            <?php
            $user = array(
              "name" => "Fátima Lopes",
              "message" => "Need some help...",
              "img" => "https://images.impresa.pt/famashow/2019-06-19-64544090_150241212777309_6637087329473493969_n.jpg-1/original/mw-320",
            );

            for($i = 0; $i < 6; $i++) {
              draw_support_user_card($user);
            }

            ?>

            </div>
          </div>

          <div class="col-md-8 px-1">
            <div class="chat-messenger">

              <div class="chat-messenger-area border-bottom">

                <?php 
                  $message = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus veritatis doloribus quibusdam possimus amet, vitae optio quidem reiciendis perspiciatis exercitationem rerum repudiandae quas nesciunt cupiditate unde qui similique placeat ratione!";
                  $userimg = "https://images.impresa.pt/famashow/2019-06-19-64544090_150241212777309_6637087329473493969_n.jpg-1/original/mw-320";
                  $adminimg = "https://cdn1.iconfinder.com/data/icons/user-icon-profile-businessman-finance-vector-illus/100/01-1User-2-512.png";

                  for($i = 0; $i < 3; $i++) {
                    draw_support_chat_user_bubble($message, $userimg);
                    draw_support_chat_admin_bubble($message, $adminimg);
                  }

                ?>

              </div>

              <div class="chat-messenger-send">
                <form class="d-flex justify-content-center align-items-center chat-messenger-form">
                  <div class="row w-100">
                    <div class="col-10">
                      <input type="text" class="form-control" placeholder="Write message">
                    </div>
                    <div class="col-2">
                      <button class="btn button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send">
                          <line x1="22" y1="2" x2="11" y2="13"></line>
                          <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                        </svg>
                        Send
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

        </div>

      </div>
    </main>
  </div>
</div>

<?php
draw_footer();
?>