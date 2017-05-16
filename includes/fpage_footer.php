<!-- footer starts here -->

<footer class="page-footer transparent " style="position: relative !important;

    width: 100% !important;

    bottom: 0 !important;">

    <div class="container grey-text" style="border-top: 1px solid #eee;">

      <div class="row">

        <div class="col l6 s12">

          <h5 class="grey-text bold">Liked our work?</h5>

          <p class="grey-text bold">If you have any project to get done or a problem that we can solve, just feel free to give us a ring.<br>We've got tea, coffee and biscuits!

          <br>+91-7057538634, Team Code_Blooded</p>

        </div>

        <div class="col l4 offset-l2 s12">

          <?php

            if(isset($_POST['fsubmit'])){
              $fName=mysqli_reaL_escape_string($db ,$_POST['fName']);

              if(
                !empty($_POST['fSug'])
                )
                {$fSug=mysqli_reaL_escape_string($db ,$_POST['fSug']);}
                else{
                  $error = $error." Please fill out every field";
                }          



              if($_POST['fMark']<11 && $_POST['fMark']>0 && empty($error)){

               $fMark=mysqli_reaL_escape_string($db ,$_POST['fMark']);

              }

              else{

               $error= $error." Thnx but rate us only between 0 & 10";

              }


              if(empty($error)){
              $insert=$db->query("INSERT INTO feedback (id, fName, fMark, fSug, fDate) VALUES ('', '$fName', '$fMark', '$fSug', NOW())");



              if($insert){ ?>

              <div class="card-panel teal">

                <span class="white-text"><?php echo "Thank you for getting in touch! This means a lot to us." ?>

                </span>

              </div>

            <?php }

            else{ ?>

              <div class="card-panel teal">

                <span class="black-text"><?php echo " Some error occured please try again"; ?>

                </span>

              </div>

            <?php }
            } else {?>
              <div class="card-panel teal">

                <span class="black-text"><?php echo $error; ?>

                </span>

              </div>
            <?php }

            }

          ?>

          <h5 class="grey-text bold">Feedbacks / suggestions here</h5>

          <form method="post" enctype="multipart/form-data">

            <div class="input-field col m12 s12">

              <input name="fName" id="fName" type="text" class="validate black-text bold" style="border-bottom: 1px solid white;" required>

              <label for="fName" class="grey-text ">Name</label>

            </div>

            <div class="input-field col m12 s12">

              <!-- <input id="fMark" type="number" name="fMark" class="validate black-text bold" style="border-bottom: 1px solid white;" required>
 -->

              <p class="range-field">
                <input type="range" name="fMark" id="fMark" min="0" max="10" />
              </p>


              <label for="fMark" class="grey-text">Rate it out of 10</label>


            </div>

            <div class="input-field col m12 s12">

              <textarea id="textarea1" class="materialize-textarea black-text bold" name="fSug" style="border-bottom: 1px solid white;" required></textarea>

              <label for="textarea1" class="grey-text">Message</label>

            </div>

            <button class="btn waves-effect waves-light" type="submit" name="fsubmit">Submit

              <i class="material-icons right">send</i>

            </button>

          </form>


        </div>

      </div>

    </div>

    <div class="footer-copyright">

      <div class="container row grey-text">

      <div class="col s12 m6">© 2017 RIGHTS RESERVED</div>

      <!-- <div class="col s12 m6"><a class="grey-text text-lighten-4 right" href="https://docs.google.com/document/d/1gVicigIDPJ3CL1G69tJqf9wHVn0YTvk7hLymakLrf1s/pub">NIKHIL BHANDARKAR</a></div>
 -->
    <span class="right">Made with <!-- <i class="materialize-red-text text-lighten-3 mdi-action-favorite"></i> -->love by <a>Team Code_Blooded</a></span>
      </div>

    </div>

</footer>

  <!-- footer ends here -->

