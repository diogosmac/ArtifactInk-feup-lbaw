<?php
  include_once("../templates/tpl_admin.php");

  draw_header();
  draw_navbar();
?>

<div class="container-fluid">
  <div class="row">

    <?php draw_sidebar("info") ?>

    <main class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="container">

        <div class="mb-4 d-flex justify-content-between align-items-center flex-wrap border-bottom mt-2">
          <h1>General Information</h1>
          <button onclick="editGeneralInfo()" type="button" class="btn btn-primary">
            Edit Information
          </button>
        </div>
        <div class="mt-2">
          <div id="infoSubmitButtons" class="d-flex mt-2 flex-row-reverse my-2 info-submit-buttons">
            <button onclick="saveGeneralInfo()" type="button" class="btn btn-primary mx-1">
              Save Information
            </button>
            <button onclick="cancelGeneralInfo()" type="button" class="btn btn-secondary mx-1">
              Cancel
            </button>
          </div>
          <div class="text-justify" id="generalInfo">
            <p>
              Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptates assumenda nihil inventore sed laudantium earum ipsa. Accusamus accusantium aliquid ducimus aperiam dicta, animi, dolor esse asperiores tenetur at voluptate aliquam. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolore labore rem quo molestias! Nihil velit doloribus sint fugit repellat? Consectetur laborum tenetur similique. Ex laudantium eaque quibusdam dolorem eum voluptatum?
            </p>
            <p>
              Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptates assumenda nihil inventore sed laudantium earum ipsa. Accusamus accusantium aliquid ducimus aperiam dicta, animi, dolor esse asperiores tenetur at voluptate aliquam. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolore labore rem quo molestias! Nihil velit doloribus sint fugit repellat? Consectetur laborum tenetur similique. Ex laudantium eaque quibusdam dolorem eum voluptatum?
            </p>
            <p>
              Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptates assumenda nihil inventore sed laudantium earum ipsa. Accusamus accusantium aliquid ducimus aperiam dicta, animi, dolor esse asperiores tenetur at voluptate aliquam. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolore labore rem quo molestias! Nihil velit doloribus sint fugit repellat? Consectetur laborum tenetur similique. Ex laudantium eaque quibusdam dolorem eum voluptatum?
            </p>
            <p>
              Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptates assumenda nihil inventore sed laudantium earum ipsa. Accusamus accusantium aliquid ducimus aperiam dicta, animi, dolor esse asperiores tenetur at voluptate aliquam. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolore labore rem quo molestias! Nihil velit doloribus sint fugit repellat? Consectetur laborum tenetur similique. Ex laudantium eaque quibusdam dolorem eum voluptatum?
            </p>
            <p>
              Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptates assumenda nihil inventore sed laudantium earum ipsa. Accusamus accusantium aliquid ducimus aperiam dicta, animi, dolor esse asperiores tenetur at voluptate aliquam. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolore labore rem quo molestias! Nihil velit doloribus sint fugit repellat? Consectetur laborum tenetur similique. Ex laudantium eaque quibusdam dolorem eum voluptatum?
            </p>
          </div>
        </div>
      </div>
    </main>

  </div>
</div>

<?php
  draw_footer();
?>